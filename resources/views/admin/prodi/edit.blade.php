@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Edit Data Program Studi</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Program Studi</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ implode('', $errors->all(':message')) }}
                            </div>
                        @endif

                        <form method="Post" action="{{ route('ap-update', ['id' => $pss->id]) }}">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="no-kk">Kode Prodi</label>
                                <input type="text" class="form-control" placeholder="Contoh: TI123" name="kode_prodi"
                                    required autofocus maxlength="10" value="{{ $pss->kode_prodi }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Fakultas</label>
                                <input type="text" class="form-control" placeholder="Contoh: Psikologi"
                                    name="nama_fakultas" required maxlength="32" value="{{ $pss->nama_fakultas }}">
                            </div>
                            <div class="form-group">
                                <label>Jenjang</label>
                                <input type="text" class="form-control" placeholder="Contoh: S1" name="jenjang" required
                                    maxlength="10" value="{{ $pss->jenjang }}">
                            </div>
                            <div class="form-group">
                                <label>Akreditasi</label>
                                <input type="text" class="form-control" placeholder="Contoh: A" name="akreditasi"
                                    required maxlength="10" value="{{ $pss->akreditasi }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection

@section('ExtraCSS')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.css') }}">
@endsection

@section('ExtraJS')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script></script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
