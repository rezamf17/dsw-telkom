@extends('layouts.temp')
@section('title')
Kelola Produk
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
        @foreach ($nama as $element)
           <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Nama Produk</h4>
            </div>
            <div class="card-body">
              {{$element->nama}}
            </div>
            <a href="{{url('KelolaProduk/'.$element->id)}}" title="">Lihat</a>
          </div>
        </div>
        @endforeach
    </div>
  </div>
</div>
@include('sweetalert::alert')

@endsection
