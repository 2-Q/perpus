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
                        <li class="breadcrumb-item active">Detail Buku</li>
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
                            <div class="card-title">Detail Buku</div>
                        </div>
                        <div class="card-body">
                            ---
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
    sidebarActive('sidebarBuku')
</script>
@endsection