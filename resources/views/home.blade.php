@extends('layouts.admin')
@section('title', 'Dashboard')
@push('css')
    <style>
      .program-lists{
        list-style: none;
        padding: 0!important;
        margin: 0 !important;
        max-height: 400px;
        overflow-y: scroll;
        display: flex;
        flex-direction: column;
      }
      .program-lists .program-list{
          border-bottom: 1px solid #ccc;
          padding: 0!important;
          margin: 0 !important;
      }
      
      .program-lists .program-list a{
        display: flex;
        color: #000;
        padding: 0px;
        margin: 0px;
        text-decoration: none;
        text-align: center;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: space-between;

      }
      .program-lists .program-list a:hover{
        background-color: #ccc;
        cursor: pointer;
      }
      .badge-info{
        font-size: 1rem;
      }
    </style>
@endpush
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
             <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{ $users_count }}</h3>
  
                  <p>Users</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>0</h3>
  
                  <p>Packages</p>
                </div>
                <div class="icon">
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>0</h3>
  
                  <p>Users Logs </p>
                </div>
                <div class="icon">
                  <i class="fa fa-database" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>65</h3>
  
                  <p>Unique Visitors</p>
                </div>
                <div class="icon">
                  <i class="fa fa-user" aria-hidden="true"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>

                    <div class="card-tools">
                        <span class="badge badge-info">{{ $users_count }}</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <ul class="users-list clearfix">
                        @foreach ($users as $user)
                            <li>
                                <a href="{{ route('users.show', $user->id) }}"> <img
                                        src="{{ $user->avatarView() }}" style=" width:80px; height:50%"
                                        alt="{{ $user->name }}"></a>

                                <a class="users-list-name" href="{{ route('users.show', $user->id) }}">
                                    <h6>{{ $user->name }}</h6>
                                </a>
                                {{--  <span class="users-list-date">
                                    <h6>{{ $user->type }}</h6>
                                </span>  --}}
                            </li>
                        @endforeach

                    </ul>
                    <div class="">
                      <a href="{{ route('users.index') }}" class="btn btn-primary btn-block"><b>View All Users</b></a>
                    </div>
                    <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                
                <!-- /.card-footer -->
            </div>
            <!--/.card -->
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ADEO Programs</h3>

              <div class="card-tools">
                  <span class="badge badge-info">{{ $programs_count }}</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                          class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                          class="fas fa-times"></i>
                  </button>
              </div>
          </div>
            <div class="card-body1">
              <ul class="list-group clearfix program-lists">
                
                @foreach ($programs as $program)
                <li class="list-group-item program-list ">
                  <a  href="{{ route('programs.show',$program->id) }}">
                    <div>
                      <img src="{{  $program->programAvatar() }}" height="70" width="100" alt="{{ $program->title }}">
                    </div>
                    <h4 class=" text-capitalize text-black " >{{ $program->title }}</h4>
                  </a>
                </li>
                @endforeach
              </ul>
              <div class="">
                <a href="{{ route('programs.index') }}" class="btn btn-primary btn-block"><b>View All Programs</b></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <!-- Blogs LIST -->
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Blogs</h3>

                  <div class="card-tools">
                      <span class="badge badge-info">{{ $blogs_count }}</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                              class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                              class="fas fa-times"></i>
                      </button>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table id="blogs_table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                @foreach ($blogs as $blog)
                <tr>
                    <td>{{$blog->title}}</td>
                    <td>{{ Str::limit($blog->subtitle,50) }}</td>
                    <td> {{$blog->created_at}}</td>
                <td><a href="{{route('admin-blogs.show',$blog->slug)}}" class="btn btn-sm btn-primary">Read more</a></td>
                  </tr>

                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
                  <div class="">
                    <a href="{{ route('admin-blogs.index') }}" class="btn btn-primary btn-block"><b>View All Blogs</b></a>
                  </div>
                  <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
          </div>
          <!--/.card -->
      </div>

        </div>

       

    </section>
    <!-- /.content -->
</div>
@endsection