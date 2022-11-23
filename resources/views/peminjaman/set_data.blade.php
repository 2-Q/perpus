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
                        <li class="breadcrumb-item active">{{ isset($peminjaman) ? 'Edit' : 'Tambah' }} Data Peminjaman</li>
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
                            <div class="card-title">Form Peminjaman</div>
                        </div>
                        <form action="{{ isset($peminjaman) ? Route('peminjaman.update', $peminjaman->no) : Route('peminjaman.store') }}" method="POST" onsubmit="return confirm('Submit data ini?')">
                            @csrf
                            @isset($peminjaman)
                            @method('PUT')
                            @endisset

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="kode_buku">Buku</label>
                                    <select class="form-control" id="kode_buku" name="kode_buku">
                                        <option selected>Select Buku</option>
                                        @foreach($bukus as $buku)
                                        @isset($peminjaman)
                                        <option value="{{$buku->kode}}" {{ old('kode_buku', $peminjaman->kode_buku) == $buku->kode ? 'selected' : '' }}>{{$buku->kode}} ~ {{$buku->nama}}</option>
                                        @else
                                        <option value="{{$buku->kode}}">{{$buku->kode}} ~ {{$buku->nama}}</option>
                                        @endisset
                                        @endforeach
                                    </select>
                                    @error('kode_buku')
                                    <div class="mt-2 text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nrp_mahasiswa">Peminjam Buku</label>
                                    <select class="form-control" id="nrp_mahasiswa" name="nrp_mahasiswa">
                                        <option selected>Select Mahasiswa</option>
                                        @foreach($mahasiswas as $mahasiswa)
                                        @isset($peminjaman)
                                        <option value="{{$mahasiswa->nrp}}" {{ old('nrp_mahasiswa', $peminjaman->nrp_mahasiswa) == $mahasiswa->nrp ? 'selected' : '' }}>{{$mahasiswa->nrp}} ~ {{$mahasiswa->nama}}</option>
                                        @else
                                        <option value="{{$mahasiswa->nrp}}">{{$mahasiswa->nrp}} ~ {{$mahasiswa->nama}}</option>
                                        @endisset
                                        @endforeach
                                    </select>
                                    @error('nrp_mahasiswa')
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
    sidebarActive('sidebarPeminjaman')
</script>
@endsection