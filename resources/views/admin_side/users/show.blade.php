@extends('layouts.admin')
@section('title')
    Admin Show User
@endsection

@push('css')
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
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ $user->avatarView() }}"
                                        alt="{{ $user->name }}">
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
                                <!-- Modal trigger button -->


                                <!-- Button trigger modal -->
                                <a href="#" class="btn btn-success btn-block" data-toggle="modal"
                                    data-target="#editModelId">
                                    <b>Edit Profile</b>
                                </a>



                                <br>
                                <form action="{{ route('users.destroy', $user->id) }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    @if (Auth::user()->type == 'admin')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete User</button>
                                    @elseif(Auth::user()->type == 'user')
                                        <div style="padding-left:30%">
                                            <button type="submit" class="btn btn-lg btn-danger btn-block" disabled>Delete
                                                User</button>

                                        </div>
                                    @endif
                                </form>
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

                        <div class="input-group">

                            <div class="custom-file">

                                <input type="file" class="custom-file-input  @error('image') is-invalid @enderror"
                                    id="image">
                                <label class="custom-file-label" for="image">Upload Profile Image</label>
                            </div>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>


                        <div class="form-group">
                            <label for="name">Name <i class="fa fa-asterisk text-danger"
                                    aria-hidden="true"></i></label>
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
                                    <strong>info</strong> Leave password fields blank if you don't want to change password
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

    <!-- /.content-wrapper -->
@endsection
@push('js')
    <!-- Page specific script -->
    <script>
        function deleteUser(event, element) {
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
                            success: function(response) {
                                if (response.status == true) {
                                    new swal(response.message, {
                                        icon: "success",
                                    }).then(function() {
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
