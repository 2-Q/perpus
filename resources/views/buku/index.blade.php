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
                            <div class="d-flex text-nowrap justify-content-end" style="gap: .2rem">
                                <a href="{{ Route('buku.create') }}" class="btn btn-sm btn-primary">
                                    <i class="mr-1 fas fa-plus"></i>
                                    <span>Tambah Data</span>
                                </a>
                            </div>
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
                                    @foreach ($bukus as $key => $buku)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $buku->kode }}</td>
                                        <td>{{ $buku->nama }}</td>
                                        <td>
                                            <x-btn-crud id="{{ $buku->kode }}" />
                                        </td>
                                    </tr>
                                    @endforeach
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