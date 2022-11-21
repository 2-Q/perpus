@extends('layouts.panel')

@section('title', 'Buku')

@section('style')
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Buku</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Buku</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>ID Buku</th>
                                        <th>Judul</th>
                                        <th style="width: 250px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ([1,2] as $key => $table)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ '191'.$key }}</td>
                                        <td>{{ 'Dasar Pemrograman PHP' }}</td>
                                        <td>
                                            <x-btn-crud id="{{ $table }}" />
                                        </td>
                                    </tr>
                                    @endforeach
                                    <!-- just demo -->
                                    <tr>
                                        <td>{{ $key + 2 }}.</td>
                                        <td>{{ '1914' }}</td>
                                        <td>{{ 'Pengenalan Lingkungan Frontend' }}</td>
                                        <td>
                                            <x-btn-crud id="{{ $table }}" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
    sidebarActive('sidebarBuku')

    // data tables
    $('#example1').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });
</script>
@endsection