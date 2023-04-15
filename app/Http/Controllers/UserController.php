<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Notification;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->latest()->get();
        return view('admin_side.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin_side.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt('password');
        tap(User::query()->create($data), function (User $user) {
            // TODO: Send email to user
           $user->notify(new \App\Notifications\NewUserNotification($user));
        });
        return redirect()->route('users.index')->with('success', 'User created successfully');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('admin_side.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        // validate $data['current_password'] against $user->password
        if (!password_verify($data['current_password'], $user->password)) {
            return redirect()->back()->with('error', 'Current password is incorrect');
        }
        // check if password is to be updated
        if ($data['password']) {
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }
        
        unset($data['current_password']);
        $user->update($data);
        return redirect()->back()->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // TODO: Delete user's image
        $imageExists = file_exists(public_path('storage/images/users/'.$user->image));
        if ($imageExists) {
            unlink(public_path('storage/images/users/'.$user->image));
        }

        $user->delete();
        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully'
        ]);
    }

    public function userProfileImage (Request $request, User $user)
    {
        try {
            $user = User::query()->findOrFail(auth()->user()->id);
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048',
        ]);
            // TODO: Delete user's image
            if($user->image !== 'default_user.png'){
                $imageExists = file_exists(public_path('storage/images/users/'.$user->image));
                if ($imageExists) {
                    unlink(public_path('storage/images/users/'.$user->image));
                }
            }

            // TODO: Upload new image
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('storage/images/users/'), $imageName);
            $data['image'] = $imageName;
            $user->image = $imageName;
            $user->save();
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
        
        return response()->json([
            'status' => true,
            'message' => 'User profile image updated successfully'
        ]);
        
    }
}
