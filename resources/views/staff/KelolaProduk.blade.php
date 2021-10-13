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
        <table class="table table-striped" id="table-1">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Produk</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($nama as $element)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$element->nama}}</td>
              <th>
                <a class="btn btn-success" href="{{url('KelolaProduk/'.$element->id)}}" title="">Lihat</a>
              </th>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div> 

    </div>
  </div>
</div>
@include('sweetalert::alert')

@endsection
