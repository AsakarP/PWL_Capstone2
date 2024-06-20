@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Beasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Create</a></li>
                            <li class="breadcrumb-item active">Beasiswa</li>
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
                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ implode('', $errors->all(':message')) }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('ab-store') }}">
                            @csrf
                            <div class="form-group">
                                <label>Nama Beasiswa</label>
                                <input type="text" class="form-control" 
                                       placeholder="Contoh: Beasiswa ABC" name="namaBeasiswa" required autofocus
                                       maxlength="16">
                            </div>
                            <div class="form-group">
                                <label>Jenis Beasiswa</label>
                                <select name="jenisBeasiswa" class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;">
                                  <option selected="selected" value="akademik">Akademik</option>
                                  <option value="non-akademik">non-Akademik</option>
                                  <option value="el">EL</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Periode Mulai</label>
                                <input type="date" class="form-control" 
                                    name="periodeMulai" required >
                            </div>
                            <div class="form-group">
                                <label>Periode Tutup</label>
                                <input type="date" class="form-control" 
                                    name="periodeTutup" required >
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
    <script>
    </script>
    <script src="{{ asset('plugins/sweetalert2/sweetalert2.js') }}"></script>
@endsection
