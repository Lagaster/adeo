@extends('layouts.admin')
@section('title')
    Admin Previous Works
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
            <h1>Work </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('works.index') }}">works</a></li>
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
        <div class="card-header  ">
          <span class=" float-right">
            <a href="{{ route('works.index') }}" class="btn btn-primary mr-2">Back</a>
            <a href="{{ route('works.edit',$work->id) }}"
            class="btn btn-info mr-2"
                >Edit</a>
            <a href="#"
            data-program-id="{{ $work->id }}"
            onclick="deleteData(event, this)" class="btn btn-danger " 
                >Delete</a>
            </span>

         
        </div>
        <div class="card-body row">
            <div class="col-md-12">
                <h3>{{ $work->title }}</h3>
            </div>
         <div class="col-md-6">
            <img   src="{{ $work->workAvatar() }}"
            class="img-fluid img-thumbnail"
             alt="{{ $work->title }}" >
         </div>
            <div class="col-md-6">
                @php
                    echo $work->description;
                @endphp
            </div>
        </div>
        
        <!-- /.card-body -->
        <div class="col-md-12 card-footer d-flex justify-content-between ">
            <div class="">
                 Created By: {{ $work->user->name }} <br> 
            </div>
            <div class="">
                Created At: {{ $work->created_at->diffForHumans() }} <br>
            </div>
            <div class="">
              Created At: {{ $work->updated_at->diffForHumans() }} <br>
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
            var url = '{{ route('works.destroy', ':id') }}';
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
                                location.href = '{{ route('works.index') }}'
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