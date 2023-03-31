@extends('layouts.admin')
@section('title')
    Admin Programs
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin_asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Programs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Programs</li>
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
                    <h3 class="card-title">Programs</h3>

                    <div class="card-tools">
                        <a class="btn btn-outline-primary" href="{{ route('programs.create') }}"><i class="fa fa-plus"
                                aria-hidden="true"></i> New Program</a>
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
                        <div class="col-md-6" id="example1_wrapper"></div>
                    </div>
                    <table id="programs_table" class="table table-striped table-hover table-inverse ">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Title</th>
                                <th>Created By</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($programs as $program)
                                <tr>
                                    <td scope="row">{{ $program->title }}</td>
                                    <td>
                                        <a href="#" target="_blank" rel="noopener noreferrer">
                                            @if ($program->user)
                                                {{ $program->user->name }}
                                            @endif
                                        </a>
                                    </td>
                                    <td>
                                        {{ $program->created_at->diffForHumans() }}
                                    </td>
                                    <td>
                                        <a href="{{ route('programs.show', $program->id) }}" class="btn btn-info btn-sm"><i
                                                class="fas fa-eye"></i> View</a>
                                        {{-- <a href="{{ route('programs.edit', $program->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> Edit</a>
                            <a href="#"
                            data-delete-program="{{ $program->id }}"
                                onclick="deleteData(event, this)"
                               class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
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
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('admin_asset/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin_asset/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->

    <!-- Page specific script -->
    <script>
        $(function() {


            $('#programs_table').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper');



        });

      
    </script>
@endpush
