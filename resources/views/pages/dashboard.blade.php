@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')


<div class="container mt-4">

    <h1 class="mb-4">Dashboard</h1>

    <div class="row">

        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h5>Total Users</h5>
                <h2 class="text-primary">{{ $stats['totalUsers'] }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h5>Total Dokumen</h5>
                <h2 class="text-success">{{ $stats['totalDokumen'] }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h5>Total Kategori</h5>
                <h2 class="text-warning">{{ $stats['totalKategori'] }}</h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h5>Total Jenis</h5>
                <h2 class="text-danger">{{ $stats['totalJenis'] }}</h2>
            </div>
        </div>

    </div>

</div>


@include('layouts.scripts')

@endsection
