@extends('layouts.admin')
@section('title')
    Admin Contact Messages
@endsection

@push('css')
 <style>
  .badge-large{
    font-size: 1.2rem;

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
            <h1>Work </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('messages.index') }}">messages</a></li>
              <li class="breadcrumb-item active">Admin Contact Messages</li>
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
          <div class="float-left">
            @if ($contact->is_read)
                <span class="badge badge-success badge-large ">Rread</span>
                
            @else
                <span class="badge badge-danger badge-large ">Unread</span>
                
            @endif
          </div>
          
          <span class=" float-right">
            <a href="{{ route('messages.index') }}" class="btn btn-primary mr-2">Back</a>
           
            <a href="#"
            data-program-id="{{ $contact->id }}"
            data-url = "{{ route('messages.destroy') }}"
            onclick="deleteData(event, this)" class="btn btn-danger " 
                >Delete</a>
            </span>

         
        </div>
        <div class="card-body row">
          <div class="col-md-6">
            <h4 class="">{{ $contact->name }}</h3>
          </div>
            <div class="col-md-6">
                <h3>{{ $contact->subject  }}</h3>
            </div>
         
            <div class="col-md-12">
                @php
                    echo $contact->message;
                @endphp
            </div>
        </div>
        
        <!-- /.card-body -->
        <div class="col-md-12 card-footer d-flex justify-content-between ">
            
            <div class="">
                Created At: {{ $contact->created_at->diffForHumans() }} <br>
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
            var url = $(element).data('url');
            var token = $("meta[name='csrf-token']").attr("content");
            var data = {
              contacts: [id] ,
                _token: token
            };
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
                        type: 'POST',
                        data: data,
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.message
                            ).then(() => {
                                location.href = '{{ route('messages.index') }}'
                            })


                        },
                        error: function(error) {
                          let errors = error.responseJSON.errors;
                          let errorMessage = '';
                          for (let key in errors) {
                            errorMessage += errors[key] + '\n';
                          }

                            Swal.fire(
                                'Error!',
                                errorMessage,
                            )
                        }
                    });
                }
            })
        }
   
  
  </script>

@endpush