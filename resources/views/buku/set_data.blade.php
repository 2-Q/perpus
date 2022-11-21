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
                        <li class="breadcrumb-item active">{{ isset($peminjaman) ? 'Edit' : 'Tambah' }} Data Buku</li>
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
                        <form action="" method="POST" onsubmit="return confirm('Submit data ini?')">
                            @csrf
                            @isset($varForm)
                            @method('PUT')
                            @endisset

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="myName">myLabel</label>
                                    <input class="form-control" id="myName" name="myName" value="{{ old('myName', $varForm->myName ?? null) }}" placeholder="Masukkan myLabel">
                                    @error('myName')
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