@extends('layouts.temp')
@section('title')
Kelola Laporan
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Kelola Produk</a></div>
</div>
@endsection
@section('content')
<section class="section">
  <div class="section-body">
    <div class="card">
      <div class="card-header"><h4>Data Produk</h4></div>
      <div class="card-body">
        <a href="{{url('KelolaProduk/create')}}" class="btn btn-primary">Tambah Data</a>
        

      </div> 

    </div>
  </div>
</div>
@include('sweetalert::alert')

@endsection
