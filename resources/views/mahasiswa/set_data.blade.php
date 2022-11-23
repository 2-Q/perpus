@extends('layouts.panel')

@section('title', 'Mahasiswa')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ Route('mahasiswa.index') }}">Mahasiswa</a></li>
                        <li class="breadcrumb-item active">{{ isset($mahasiswa) ? 'Edit' : 'Tambah' }} Data Mahasiswa</li>
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
                            <div class="card-title">Form Mahasiswa</div>
                        </div>
                        <form action="{{ isset($mahasiswa) ? Route('mahasiswa.update', $mahasiswa->nrp) : Route('mahasiswa.store') }}" method="POST" onsubmit="return confirm('Submit data ini?')">
                            @csrf
                            @isset($mahasiswa)
                            @method('PUT')
                            @endisset

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nrp">NRP Mahasiswa</label>
                                    <input class="form-control" id="nrp" {{isset($mahasiswa) ? 'disabled' : '' }} name="nrp" value="{{ old('nrp', $mahasiswa->nrp ?? null) }}" placeholder="Masukkan NRP Mahasiswa">
                                    @error('nrp')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Mahasiswa</label>
                                    <input class="form-control" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama ?? null) }}" placeholder="Masukkan Nama Mahasiswa">
                                    @error('nama')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="prodi">Prodi</label>
                                    <input class="form-control" id="prodi" name="prodi" value="{{ old('prodi', $mahasiswa->prodi ?? null) }}" placeholder="Masukkan Prodi">
                                    @error('prodi')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <input class="form-control" id="kelas" name="kelas" value="{{ old('kelas', $mahasiswa->kelas ?? null) }}" placeholder="Masukkan Kelas">
                                    @error('kelas')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="angkatan">Angkatan</label>
                                    <input class="form-control" id="angkatan" name="angkatan" value="{{ old('angkatan', $mahasiswa->angkatan ?? null) }}" placeholder="Masukkan Angkatan">
                                    @error('angkatan')
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
    sidebarActive('sidebarMahasiswa')
</script>
@endsection