@extends('layouts.admin')
@section('title')
    Admin @if ($param == 'create') {{ __('New Blog') }} @else Edit Blog @endif
@endsection


@push('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.css') }}">
  <style>
    .note-editor.note-frame .note-editing-area .note-editable {
      height: 300px;
    }
    /**
    *edit input file
    */
   
    .input-group{
        display: flex;
        width: 100%;

    }
    input[type="file"] {
        display: block;
        width: 100%;

      }
      button[type='submit']{
        margin-top: 0px;
        padding: 0.5rem 2rem; 
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
            <h1>Program Create</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('programs.index') }}">Programs</a></li>
              <li class="breadcrumb-item active">Program Create</li>
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
          <h3 class="card-title"><i class="fa fa-plus" aria-hidden="true"></i> New Blog</h3>

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
            @if ($param == 'create')
            <form role="form" enctype="multipart/form-data"
                action="{{ route('admin-blogs.store') }}" method="POST">
                @csrf
                @method('POST')
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" class="form-control" required
                        value="{{ old('title') }}"
                            id="title" name="title"
                            placeholder="Enter blog title">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="subtitle">Blog Subtitle</label>
                            <input type="text" class="form-control" required
                                id="subtitle" name="subtitle"
                                value="{{ old('subtitle') }}"
                                placeholder="Enter blog subtittle">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="blog_image">Blog Image</label>
                            <div class="input-group">
                                <input type="file" name="image" required
                                accept="image/*"
                                    class="form-control"
                                id="blog_image">
                            </div>
    
                        </div>
                    </div>

                    </div>
                   

                <div class="card-body">
                    <div class="form-group">
                        <textarea type="textarea" class="form-control"required id="summary-body" name="body" placeholder="Blog Content....">{{ old('body') }}</textarea>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

            </form>

@else
    <form role="form" enctype="multipart/form-data"
        action="{{ route('admin-blogs.update', $blog->slug) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Blog Title</label>
                <input type="text" class="form-control" required id="exampleInputEmail1"
                    value="{{ $blog->title }}" name="title"
                    placeholder="Enter blog title">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="subtitle">Blog Subtitle</label>
                    <input type="text" class="form-control" required
                        id="subtitle" value="{{ $blog->subtitle }}"
                        name="subtitle" placeholder="Enter blog subtittle">
                </div>
                <div class="form-group col-md-6">
                    <label for="image">Blog Image</label>
                    <div class="input-group ">
                        <input type="file" name="image" 
                        accept="image/*"
                            class="form-control"
                             id="image">
                            
                    </div>
    
                </div>

            </div>

            <div class="form-group">
                <textarea type="textarea" class="form-control "required id="summary-body" name="body"  placeholder="Blog Content....">@php
                    echo $blog->body;
                @endphp </textarea>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </div>

      
            

           

    </form>

@endif
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
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
    $('#summary-body').summernote();

  
    

    });
   
  
  </script>

@endpush