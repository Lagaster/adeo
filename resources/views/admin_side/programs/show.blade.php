@extends('layouts.admin')
@section('title')
    Admin Programs
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
            <h1>Program </h1>
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
          <span class="">
            <a href="{{ route('programs.index') }}" class="btn btn-primary mr-2">Back</a>
            <a href="{{ route('programs.edit',$program->id) }}"
            class="btn btn-info mr-2"
                >Edit</a>
            <a href="#"
            data-program-id="{{ $program->id }}"
            onclick="deleteData(event, this)" class="btn btn-danger mr-2" 
                >Delete</a>
            </span>

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
            <div class="col-md-12">
                <h3>{{ $program->title }}</h3>
            </div>
         <div class="col-md-12">
            <img src="{{ $program->programAvatar() }}"
            class="img-fluid img-thumbnail"
             alt="{{ $program->title }}" >
         </div>
            <div class="col-md-12">
                <h3>Description</h3>
                @php
                    echo $program->description;
                @endphp
            </div>
        </div>
        
        <!-- /.card-body -->
        <div class="card-footer d-flex justify-content-between ">
            <div class="">
                 Created By: {{ $program->user->name }} <br> 
            </div>
            <div class="">
                Created At: {{ $program->created_at->diffForHumans() }} <br>
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

    function deleteData(event, element) {
            event.preventDefault();
            var id = $(element).data('program-id');
            var url = '{{ route('programs.destroy', ':id') }}';
            url = url.replace(':id', id);
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.message
                            ).then(() => {
                                location.href = '{{ route('programs.index') }}'
                            })


                        },
                        error: function(error) {
                            Swal.fire(
                                'Error!',
                                "Error Occurred Please try again later."
                            )
                        }
                    });
                }
            })
        }
   
  
  </script>

@endpush