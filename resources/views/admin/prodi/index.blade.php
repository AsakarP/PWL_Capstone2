@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Program studi</h1>
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
                    @if (\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <div class="card-header">
                        <a href="{{ route('ap-create') }}" role="button" class="btn btn-success">Tambah Prodi</a>
                    </div>
                    <div class="card-body">
                        <table id="table-ps" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Prodi</th>
                                    <th>Fakultas</th>
                                    <th>Jenjang Pendidikan</th>
                                    <th>Akreditasi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($pss as $ps)
                                    <tr>
                                        <td>{{ $ps->id }}</td>
                                        <td>{{ $ps->kode_prodi }}</td>
                                        <td>{{ $ps->nama_fakultas }}</td>
                                        <td>{{ $ps->jenjang }}</td>
                                        <td>{{ $ps->akreditasi }}</td>
                                        <td>
                                            <a href="{{ route('ap-edit', $ps->id) }}" class="btn btn-warning"
                                                role="button"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('ap-delete', $ps->id) }}" class="btn btn-danger del-button"
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
