@extends('layouts.admin')
@section('title')
    Admin Programs
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
                        <h1>Gallery</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Gallery</li>
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
                    <h3 class="card-title">Galleries</h3>

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
                        <div class="col-md-12" id="gallery_image_upload">

                        </div>
                    </div>
                    <div class="row">
                        
                        @foreach ($galleries as $gallery)
                        <div class="col-md-4" id="galleries-container">
                            <div class="gallery-image">
                                <img src="{{ $gallery->gallery_image()  }}" alt="" class="">
                            </div>
                            <div class="gallery-title">
                                <h3>{{ $gallery->title }}</h3>
                            </div>
                        </div>
                            
                        @endforeach
                        
                        
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
   
  
@endpush
