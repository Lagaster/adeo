@extends('layouts.admin')
@section('title')
    Admin Show User
@endsection

@push('css')
    <style>
        .profile-actions-container {
            width: 100%;
            height: auto;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;

        }

        .profile-actions-container a {
            width: 45%;
            height: auto;
            margin: 0;
            padding: 0;
            border: 0;
            outline: 0;
            font-size: 14px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0 0 5px #000;
            transition: all 0.3s ease-in-out;
        }

        .profile-user-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            object-position: center;
        }

        .img-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            position: relative;
        }

        .img-container .update-profile-image {
            width: 40px;
            height: 40px;
            position: absolute;

            bottom: 0;
            right: 70px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
            background-color: #807e7e;
            color: #ffffff;
            border: 1px solid #0000;

        }

        .img-container .update-profile-image:hover {
            background-color: #000000;
            color: #ffffff;
            border: 1px solid #0000;
        }

        .modal-footer-action {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.75rem;
            border-top: 1px solid #e9ecef;
            border-bottom-right-radius: calc(0.3rem - 1px);
            border-bottom-left-radius: calc(0.3rem - 1px);
        }
    </style>
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">User Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center img-container">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ $user->avatarView() }}"
                                        alt="{{ $user->name }}">
                                    <div class="update-profile-image" data-toggle="modal"
                                        data-target="#updateProfileImagemodelId">
                                        <i class="fas fa-image fa-lg fa-fw"></i>
                                    </div>
                                </div>

                                <h3 class="profile-username text-center text-uppercase">{{ $user->name }}</h3>

                                {{--  <p class="text-muted text-center">{{$user->type}}</p>  --}}

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right">{{ $user->phone }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                                    </li>
                                    {{--  <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">13,287</a>
                                    </li>  --}}
                                </ul>
                                <div class="profile-actions-container">
                                    <a href="#" class="btn btn-success " data-toggle="modal"
                                        data-target="#editModelId">
                                        <b>Edit Profile</b>
                                    </a>
                                    <a href="#" id="delete-user" data-id="{{ $user->id }}"
                                        data-action="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">
                                        <b>Delete Profile</b>
                                    </a>
                                </div>







                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->


                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#blogsTab"
                                            data-toggle="tab">Blogs</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Projects</a>
                                    </li>
                                    {{-- <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li> --}}
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="blogsTab">
                                        <!-- Post -->
                                        <div class="post">
                                            <div class="user-block">
                                                Your written blogs
                                            </div>
                                            <div>

                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">

                                                @foreach ($user->blogs as $blog)
                                                    <div class="col-sm-6">
                                                        <img class="img-fluid" src="{{ $blog->blog_image() }}"
                                                            alt="Blog ttPhoto">
                                                        <span class="username">
                                                            <a href="#"><label
                                                                    for="">{{ $blog->title }}</label></a>
                                                        </span>
                                                        <br> <span class="description">Created at
                                                            {{ $blog->created_at }}</span><br>
                                                        <a href="{{ route('admin-blogs.show', $blog->slug) }}"
                                                            class="btn btn-warning btn-sm">Read more</a>
                                                    </div>
                                                @endforeach


                                            </div>
                                            <!-- /.row -->



                                        </div>
                                        <!-- /.post -->
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="post">
                                            <div class="user-block">

                                            </div>
                                            <div>

                                            </div>
                                            <!-- /.user-block -->
                                            <div class="row mb-3">

                                                {{--  @foreach ($user->portfolios as $portfolio) <div class="col-sm-6">
                                        <img class="img-fluid" src="storage/portfolio/{{$portfolio->image}}" alt="Photo">
                                            <span class="username">
                                              <a href="#"><label for="">{{$portfolio->title}}</label></a>
                                              </span>
                                            <br>   <span class="description">Created at  {{$portfolio->created_at}}</span><br>
                                            <a href="{{route('portfolios.show',$portfolio->id)}}" class="btn btn-warning btn-sm">Read more</a>
                                                                    </div> @endforeach  --}}

                                                <!-- END timeline item -->

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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
                <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                        @csrf
                        @method('PUT')
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
                                <label for="email">Email <i class="fa fa-asterisk text-danger"
                                        ria-hidden="true"></i></label>
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
                                <label for="current_password">Current Password <i class="fa fa-asterisk text-danger"
                                        ria-hidden="true"></i></label>
                                <input id="current_password" placeholder="User current_password" type="password"
                                    class="form-control @error('current_password') is-invalid @enderror"
                                    name="current_password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="alert alert-info" role="alert">
                                    <strong>info</strong> Leave password fields blank if you do not want to change password
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="password">Current Password</label>
                                <input id="password" placeholder="Change password" type="password"
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
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    name="password_confirmation">
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


    <!-- Modal -->
    <div class="modal fade" id="updateProfileImagemodelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Profile Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <button id="select-image-btn" class="btn btn-primary btn-block mb-2">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <span class="pl-2">Select Image To Upload</span>
                    </button>
                    {{--  use dropzone  --}}
                    <form action="{{ route('user-profile-image', $user->id) }}" class="dropzone d-none"
                        id="my-awesome-dropzone-form" method="post"></form>


                </div>
                <div class="modal-footer-action flex justify-between">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="upload-image-btn" class="btn btn-primary d-none">
                        <i class="fa fa-upload" aria-hidden="true"></i>
                        <span class="pl-2">Upload Image</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- /.content-wrapper -->
@endsection
@push('js')
    @vite(['resources/js/profile_user.js'])
    <script src=""></script>
@endpush
