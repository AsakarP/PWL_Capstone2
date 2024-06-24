@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Pengajuan Beasiswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Mahasiswa</li>
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
                        
                        {{-- <div class="form-group">
                            <h1>Beasiswa</h1>
                            <h2>Jenis Beasiswa</h2>
                                @foreach ($beas as $bea)
                                    @if ($bea->idBeasiswa == $id)
                                        <p value="{{ $bea->idBeasiswa }}">{{ $bea->namaBeasiswa }}</p>
                                    @endif
                                @endforeach
                        </div> --}}

                        <form method="post" action="{{ route('mab-store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="dokumen">Dokumen (PDF)</label>
                                <input type="file" class="form-control-file" id="dokumen" name="dokumen" accept=".pdf"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>IPK</label>
                                <input type="text" class="form-control" placeholder="Contoh: 3.75" name="ipk"
                                    required autofocus maxlength="4">
                            </div>
                            <div class="form-group">
                                <label>Poin Portofolio</label>
                                <input type="text" class="form-control" placeholder="Contoh: 385" name="poin" required
                                    autofocus maxlength="4">
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
