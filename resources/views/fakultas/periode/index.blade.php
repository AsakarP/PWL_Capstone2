@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Periode</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Periode</li>
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
                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="card-header">
                        <a href="{{ route('fak-create') }}" role="button" class="btn btn-success">Tambah Periode</a>
                    </div>
                    <div class="card-body">
                        <table id="table-fak" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Periode</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Active</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($period as $per)
                                    <tr>
                                        <td>{{ $per->id }}</td>
                                        <td>{{ $per->namaperiode }}</td>
                                        <td>{{ $per->tglmulai }}</td>
                                        <td>{{ $per->tglakhir }}</td>
                                        <td>{{ $per->tglakhir }}</td>
                                        <td>
                                            <a href="{{ route('fak-edit', $per->id) }}" class="btn btn-warning"
                                                role="button"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('fak-delete', $per->id) }}" class="btn btn-danger del-button"
                                                role="button"><i class="fas fa-trash"></i></a>
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
