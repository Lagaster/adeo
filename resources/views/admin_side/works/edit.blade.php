@extends('layouts.admin')
@section('title')
    Admin Previous Work Edit
@endsection

@push('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.css') }}">
@endpush

@section('content')
     <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Program Create</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Works</a></li>
              <li class="breadcrumb-item active">Previous Work Edit</li>
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
          <h3 class="card-title">
            <span class=""><i class="fa fa-pencil" aria-hidden="true"></i> Edit Work</span>
            <span class="ml-2" >
                <a href="{{ route('works.index') }}" class="btn btn-primary mr-2"> <i class="fa fa-angle-left" aria-hidden="true"></i> Back</a>
            </span>
            
        </h3>

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
          <form action="{{ route('works.update',$work) }}" method="post" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="form-group">
              <label for="title">Previous Work Title</label>
              <input id="title"
              placeholder="Program Title"
               type="text" class="form-control @error('title') is-invalid @enderror" name="title" 
               value="{{ $work->title }}"
               required >
               @error('title')
               <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
               </span>
           @enderror
            </div>
            <div class="form-group">
                <label for="image">Work Image</label>
                <input id="image"
                placeholder="Program image"
                 type="file" class="form-control @error('image') is-invalid @enderror" name="image" 
                  >
                 @error('image')
                 <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
             @enderror
              </div>
              <div class="form-group">
                <label for="description">Previous Work Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ $work->description }}</textarea>
              </div>
              <div class="">
                <button type="submit" class="btn btn-primary">Update Work</button>
              </div>
        </form>
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="">
                Created By: {{ $work->user->name }} <br> 
           </div>
           <div class="">
               Created At: {{ $work->created_at->diffForHumans() }} <br>
           </div>
              <div class="">
                Updated At: {{ $work->updated_at->diffForHumans() }} <br>
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

<!-- Summernote -->
<script src="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.js') }}"></script>

<!-- Page specific script -->
<script>
    $(function () {
     
          // Summernote
    $('#description').summernote();
    

    });
   
  
  </script>

@endpush