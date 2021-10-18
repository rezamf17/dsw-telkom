@extends('layouts.temp')
@section('title')
Edit Nama Produk
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Edit Nama Produk</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">
    <div class="card">
      <div class="card-header">Edit Nama Produk</div>
      <div class="card-body">
        <form action="{{ url('NamaProduk/'.$nama->id) }}" method="POST">
          @method('PUT')
          @csrf
          <div class="form-group">
            Nama Produk
            <input type="text" name="nama" class="form-control" value="{{$nama->nama}}">
          </div>
          <div class="card-footer">
          <button type="submit" class="btn btn-outline-success d-inline">Update</button>
          <a href="{{ url('NamaProduk') }}" class="btn btn-secondary">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
  @endsection
