@extends('layouts.master')

@section('web-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Beasiswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan</li>
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
                @if(\Illuminate\Support\Facades\Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif                 
            <div class="card-body">
                <table id="table-mas" class="table table-striped">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Beasiswa</th>
                        <th>Jenis Mahasiswa</th>
                        <th>Periode Mulai</th>
                        <th>Periode Tutup</th>
                    </tr>
                    </thead>
                    <tbody>
                
                @foreach ($beas as $bea)
                <tr>
                    <td>{{ $bea->idBeasiswa }}</td>
                    <td>{{ $bea->namaBeasiswa }}</td>
                    <td>{{ $bea->jenisBeasiswa }}</td>
                    <td>{{ $bea->periodeMulai }}</td>
                    <td>{{ $bea->periodeTutup }}</td>
                    <td>
                        <a href="{{ route('mab-create', $bea->idBeasiswa) }}" class="btn btn-success " role="button"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('mab-edit', $bea->idBeasiswa) }}" class="btn btn-warning" role="button"><i class="fas fa-edit"></i></a>
                        <a href="{{ route('mab-delete', $bea->idBeasiswa) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach

                    </tbody>
                </table>
            </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Pengajuan Beasiswa</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card p-4">
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    

                    <div class="card-body">
                        <table id="table-mas" class="table table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>NRP</th>
                                <th>Nama Mahasiswa</th>
                                <th>Dokumen</th>
                            </tr>
                            </thead>
                            <tbody>
                        
                        @foreach ($mas as $ma )
                        <tr>
                            <td>{{ $ma->noMas }}</td>
                            <td>{{ $ma->NRP }}</td>
                            <td>{{ $ma->Nama }}</td>
                            <td>{{ $ma->Dokumen }}</td>
                            <td>
                                <a href="{{ route('mab-create', $ma->noMas) }}" class="btn btn-check" role="button"><i class="fas fa-create"></i></a>
                                <a href="{{ route('mab-edit', $ma->noMas) }}" class="btn btn-pen" role="button"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('mab-delete', $ma->noMas) }}" class="btn btn-danger del-button" role="button"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
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