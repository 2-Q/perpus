@extends('layouts.panel')

@section('title', 'Buku')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ Route('buku.index') }}">Buku</a></li>
                        <li class="breadcrumb-item active">{{ isset($buku) ? 'Edit' : 'Tambah' }} Data Buku</li>
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
                            <div class="card-title">Form Buku</div>
                        </div>
                        <form action="{{ isset($buku) ? Route('buku.update', $buku->kode) : Route('buku.store') }}" method="POST" onsubmit="return confirm('Submit data ini?')">
                            @csrf
                            @isset($buku)
                            @method('PUT')
                            @endisset

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode">Kode Buku</label>
                                    <input class="form-control" id="kode" {{isset($buku) ? 'disabled' : '' }} name="kode" value="{{ old('kode', $buku->kode ?? null) }}" placeholder="Masukkan Kode Buku">
                                    @error('kode')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Buku</label>
                                    <input class="form-control" id="nama" name="nama" value="{{ old('nama', $buku->nama ?? null) }}" placeholder="Masukkan Nama Buku">
                                    @error('nama')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Category Buku</label>
                                    <input class="form-control" id="category" name="category" value="{{ old('category', $buku->category ?? null) }}" placeholder="Masukkan Category Buku">
                                    @error('category')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pengarang">Pengarang</label>
                                    <input class="form-control" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang ?? null) }}" placeholder="Masukkan Pengarang">
                                    @error('pengarang')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="tahun">Tahun Terbit</label>
                                    <input class="form-control" id="tahun" name="tahun" value="{{ old('tahun', $buku->tahun ?? null) }}" placeholder="Masukkan Tahun Terbit">
                                    @error('tahun')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer d-flex">
                                <button class="btn btn-primary ml-auto">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script>
    sidebarActive('sidebarBuku')
</script>
@endsection