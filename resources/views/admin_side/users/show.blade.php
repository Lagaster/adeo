@extends('layouts.admin')
@section('title')
    Admin Show User
@endsection

@push('css')
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View User</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">users</a></li>
                            <li class="breadcrumb-item active">View User</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="image d-flex justify-content-center ">
                    <img src="{{ $user->avatarView() }}" alt="{{ $user->name }}" width="250" height="200">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p>
                                <strong>Name:</strong> {{ $user->name }}
                            </p>
                            <p>
                                <strong>Email:</strong> {{ $user->email }}
                            </p>
                            <p>
                                <strong>Phone:</strong> {{ $user->phone }}
                            </p>

                        </div>
                        <div class="col-md-6">

                            <p>
                                <strong>Created At:</strong> {{ $user->created_at }}
                            </p>
                            <p>
                                <strong>Updated At:</strong> {{ $user->updated_at }}
                            </p>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between">
                            <div>
                                <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                            </div>
                            <div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info " data-toggle="modal"
                                    data-target="#editModelId">
                                    <i class="fa fa-pencil" aria-hidden="true"></i> Edit User
                                </button>

                            </div>
                            <div>
                                <a href="#" class="btn btn-danger" id="deleteUser" data-id="{{ $user->id }}"
                                    onclick="deleteUser(event, this)"
                                    data-url="{{ route('users.destroy', $user->id) }}"> <i class="fa fa-trash"
                                        aria-hidden="true"></i>
                                     Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </section>
        <!-- /.content -->
    </div>

    <!-- Modal Edit User Profile -->

    <!-- Modal -->
    <div class="modal fade" id="editModelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('users.update',$user) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    
                        @csrf
                        @method('PUT')

                        <div class="input-group">
                            
                            <div class="custom-file">
                                
                              <input type="file" class="custom-file-input  @error('image') is-invalid @enderror" id="image">
                              <label class="custom-file-label" for="image">Upload Profile Image</label>
                            </div>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                            
                          </div>

                      
                        <div class="form-group">
                            <label for="name">Name <i class="fa fa-asterisk text-danger" aria-hidden="true"></i></label>
                            <input id="name" placeholder="Name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ $user->name }}" required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email <i class="fa fa-asterisk text-danger" ria-hidden="true"></i></label>
                                <input id="email" placeholder="User Email" title="Please enter a valid email address"
                                    value="{{ $user->email }}" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="phone">phone</label>
                                <input id="phone" placeholder="User phone" title="Please enter a valid phone number"
                                    value="{{ $user->phone }}" type="number"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="current_password">Current Password  <i class="fa fa-asterisk text-danger" ria-hidden="true"></i></label>
                                <input id="current_password" placeholder="User current_password" 
                                    type="password"
                                    class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    <strong>info</strong> Leave password fields blank if you don't want to change password
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="password">Current Password</label>
                                <input id="password" placeholder="Change password" 
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password_confirmation">Password Confirmation</label>
                                <input id="password_confirmation" placeholder="User password_confirmation" 
                                    type="password"
                                    class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                        </div>



                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- /.content-wrapper -->
@endsection
@push('js')
    <!-- Page specific script -->
    <script>
        function deleteUser (event, element) {
            event.preventDefault();
            var url = $(element).attr('data-url');
            var id = $(element).attr('data-id');
           new swal({
                title: "Are you sure?",
                html: "<b style='color:red'>You will not be able to recover this user!</b> <br> <b style='color:blue'>Do you want to continue?</b>",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",

            })
                .then((response) => {
                    // console.log(response);
                    if (response.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: "{{ csrf_token() }}",
                                id: id
                            },
                            success: function (response) {
                                if (response.status == true) {
                                   new swal(response.message, {
                                        icon: "success",
                                    }).then(function () {
                                        location.href = "{{ route('users.index') }}";
                                    });
                                    
                                } else {
                                   new swal("Something went wrong");
                                }
                            }
                        });
                    } else {
                       new swal("User is safe!");
                    }
                });
        }
    </script>
@endpush
