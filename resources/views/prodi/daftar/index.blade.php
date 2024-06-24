@extends('layouts.master')

@section('web-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Daftar Pengajuan</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Daftar</li>
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
                    <div class="card-body">
                        <table id="table-mas" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Dokumen</th>
                                    <th>IPK</th>
                                    <th>Poin Portofolio</th>
                                    <th>Status 1</th>
                                    <th>Status 2</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appf as $app)
                                    <tr>
                                        <td><a href="{{ route('download', $app->id) }}">{{ $app->dokumen }}</a></td>
                                        <td>{{ $app->ipk }}</td>
                                        <td>{{ $app->poin }}</td>
                                        <td>{{ $app->status1 }}</td>
                                        <td>{{ $app->status2 }}</td>
                                        <td>
                                            <a href="{{ url('proa_approve_apply', $app->id) }}" class="btn btn-success"><i
                                                    class="fas fa-check"></i></a>
                                            <a href="{{ url('proa_deny_apply', $app->id) }}" class="btn btn-danger"><i
                                                class="fas fa-times"></i></a>
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
