<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;
use App\Notifications\ContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::query()->latest()->paginate(10);
        return view('admin_side.contacts.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $data = $request->validated();

        DB::beginTransaction();
        try {
            //save data to database
            $contact = Contact::create($data);
            // send email to email address below
            $email = "info@adeointl.org";
            Notification::route('mail', $email)->notify(new ContactNotification($contact));
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            // with input will return the data the user entered
            return back()->with('error', 'An error occurred while submitting your message')
                ->withInput();
        }

        return back()->with('success', 'Your message was successfully submitted.');
    }

    /**
     * Display the specified resource.
     */
    public function show($contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $contact->update(['is_read' => true]);
        return view('admin_side.contacts.show', compact('contact'));
    }

    /**
     * Remove the
     */
    public function destroy(Request $request)
    {
        $validated = $request->validate([
            'contacts' => 'required|array',
            'contacts.*' => 'required|integer',
        ]);

        DB::beginTransaction();
        try {
            Contact::destroy($validated['contacts']);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            if (request()->ajax()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'An error occurred while deleting the message(s)',
                ]);
            }
            return back()->with('error', 'An error occurred while deleting the message(s)');
        }

        // Contact::destroy($contactsId);
        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Message(s) deleted successfully',
            ]);
        }

        return back()->with('success', 'Message(s) deleted successfully');
    }

    public function markAllAsRead(Request $request)
    {
        $validated = $request->validate([
            'contacts' => 'required|array',
            'contacts.*' => 'required|integer',
        ]);

        Contact::whereIn('id', $validated['contacts'])->update(['is_read' => true]);
        if (request()->ajax()) {
            return response()->json([
                'status' => 'success',
                'message' => 'Message(s) marked as read successfully',
            ]);
        }

        return back()->with('success', 'Message(s) marked as read successfully');
    }
}
