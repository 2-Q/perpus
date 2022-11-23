@extends('layouts.panel')

@section('title', 'Peminjaman')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ Route('peminjaman.index') }}">Peminjaman</a></li>
                        <li class="breadcrumb-item active">Detail Peminjaman</li>
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
                            <div class="card-title">Detail Peminjaman</div>
                        </div>
                        <div class="card-body">
                        <ol class="list-group list-group-numbered">
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <h5 class="fw-bold">Judul Buku</h5>
                                    {{ $peminjaman->buku }}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <h5 class="fw-bold">Category</h5>
                                    {{ $peminjaman->category }}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <h5 class="fw-bold">Peminjam</h5>
                                    {{ $peminjaman->mahasiswa }} ~ {{$peminjaman->nrp}} ~ {{ $peminjaman->prodi }} {{$peminjaman->kelas}} ~ {{$peminjaman->angkatan}}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <h5 class="fw-bold">Tanggal Pinjam</h5>
                                    {{ $peminjaman->tgl_pinjam }}
                                    </div>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-start">
                                    <div class="ms-2 me-auto">
                                    <h5 class="fw-bold">Tanggal Kembali</h5>
                                    {{ $peminjaman->tgl_kembali }}
                                    </div>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    sidebarActive('sidebarPeminjaman')
</script>
@endsection