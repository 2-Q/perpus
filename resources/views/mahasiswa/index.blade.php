@extends('layouts.panel')

@section('title', 'Mahasiswa')

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
                        <li class="breadcrumb-item active">Mahasiswa</li>
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
                            <h3 class="card-title">Mahasiswa</h3>
                            <div class="d-flex text-nowrap justify-content-end" style="gap: .2rem">
                                <a href="{{ Route('mahasiswa.create') }}" class="btn btn-sm btn-primary">
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
                                        <th>NRP</th>
                                        <th>Nama</th>
                                        <th style="width: 250px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mahasiswas as $key => $mahasiswa)
                                    <tr>
                                        <td>{{ $key + 1 }}.</td>
                                        <td>{{ $mahasiswa->nrp }}</td>
                                        <td>{{ $mahasiswa->nama }}</td>
                                        <td>
                                            <x-btn-crud id="{{ $mahasiswa->nrp }}" />
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
    sidebarActive('sidebarMahasiswa')

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