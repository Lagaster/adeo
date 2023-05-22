@extends('layouts.admin')
@section('title')
    Admin Contacts Messages
@endsection

@push('css')
    <style>
        .checkboxes{
            width: 20px;
            height: 20px;
        }
    </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Contacts Messages</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contacts Messages</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Contacts Messages</h3>
                    <div class="float-right">
                       
                        <a href="#" class="btn btn-primary btn-sm" 
                        title="Mark All As Read"
                        id="markAllSelectedAsRead">
                            <i class="fas fa-check"></i> Mark As Read All Selected
                        </a>
                        <a href="" class="btn btn-danger btn-sm ml-2"
                        title="Delete All Selected"
                         id="deleteAllSelectedData"><i class="fas fa-trash"></i> Delete All Selected</a>
                    </div>

                    
                </div>
                <div class="card-body">
                  
                    <table id="contacts_table" class="table table-striped table-hover table-inverse ">
                        <thead class="thead-inverse">
                            <tr>
                                <th>
                                    <input type="checkbox" class="checkboxes" title= "Select All" id="select-all">
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td scope="row">
                                        <input type="checkbox"
                                        class="checkboxes single-checkbox"
                                         name="contactMessage" id="{{ $contact->id }}">
                                    </td>
                                    <td>
                                        <a href="{{ route('messages.show', $contact->id) }}">
                                            {{ $contact->name }}
                                        </a>
                                    </td>
                                    
                                    <td scope="row">{{ $contact->email }}</td>
                                    <td> {{ $contact->subject }}</td>
                                    <td>
                                        {{ $contact->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        @if ($contact->is_read)
                                            <span class="badge badge-success">Seen</span>
                                        @else
                                            <span class="badge badge-danger">Unseen</span>
                                        @endif
                                    <td>
                                        <a href="{{ route('messages.show', $contact->id) }}" class="btn btn-info btn-sm"><i
                                                class="fas fa-eye"></i> View</a>

                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>
                                </th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Created At</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- /.card-body -->
                <div class="card-footer d-flex justify-content-end ">
                    <div>
                       {{ $contacts->links() }} 
                    </div>
                    
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
@vite([ 'resources/js/messages.js'])
@endpush
