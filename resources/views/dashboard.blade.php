@extends('layouts.master')

@section('web-content')


    <!-- Background with shapes -->
    <div class="bg-shapes">
        <!-- Insert shapes and stars dynamically using Blade loops or static HTML -->
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="shape"></div>
        <div class="star"></div>
        <div class="star"></div>
        <div class="star"></div>
    </div>

    <!-- Content Wrapper -->
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @if(Auth::user()->role == 'Admin')
                            <h1 class="m-0">Selamat Datang Admin-{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
                        @elseif(Auth::user()->role == 'Fakultas')
                            <h1 class="m-0">Selamat Datang Fakultas-{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
                        @elseif(Auth::user()->role == 'Prodi')
                            <h1 class="m-0">Selamat Datang Prodi-{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
                        @elseif(Auth::user()->role == 'Mahasiswa')
                            <h1 class="m-0">Selamat Datang Mahasiswa-{{ \Illuminate\Support\Facades\Auth::user()->name }}</h1>
                        @endif
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Your main content goes here -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

@endsection
