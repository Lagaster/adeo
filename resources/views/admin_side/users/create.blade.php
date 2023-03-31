@extends('layouts.admin')
@section('title')
    Admin Create User
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
            <h1>Create new User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('users.index') }}">users</a></li>
              <li class="breadcrumb-item active">user Create</li>
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
          <h3 class="card-title"><i class="fa fa-plus" aria-hidden="true"></i> New user</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                      <strong>
                        User Password will be generated automatically and sent to the user email.
                        </strong> 
                    </div>
                </div>
              </div>
          <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data" >
            @csrf
            <div class="form-group">
              <label for="name">Name <i class="fa fa-asterisk text-danger" aria-hidden="true"></i></label>
              <input id="name"
              placeholder="Name"
               type="text" class="form-control @error('name') is-invalid @enderror" name="name" 
               value="{{ old('name') }}"
               required >
               @error('name')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email <i class="fa fa-asterisk text-danger" aria-hidden="true"></i></label>
                    <input id="email"
                    placeholder="User Email"
                    title="Please enter a valid email address"
                    value="{{ old('email') }}"
                     type="email" class="form-control @error('email') is-invalid @enderror" name="email" 
                     required >
                     @error('email')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                  </div>
    
                  <div class="form-group col-md-6">
                    <label for="phone">phone</label>
                    <input id="phone"
                    placeholder="User phone"
                    title="Please enter a valid phone number"
                    value="{{ old('phone') }}"
                     type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" 
                      >
                     @error('phone')
                     <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                     </span>
                 @enderror
                  </div>

            </div>
          
             
             
              <div class="">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
        </form>
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer">
          
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

<!-- Page specific script -->
<script>
    $(function () {
        // Summernote
        $('.textarea').summernote()
    })
  
  </script>

@endpush