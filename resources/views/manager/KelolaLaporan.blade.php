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
      <div class="card-header"><h4>Data Laporan</h4></div>
      <div class="card-body">
        @if(auth()->user()->role == 3)
        <a href="{{url('KelolaLaporan/create')}}" class="btn btn-primary">Tambah Data</a>
        @endif
        <table class="table table-striped">
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
                 @if(DB::table('kelola_laporan')->where('id_nama_produk', $element->id)->doesntExist())
                Data Belum Ada
                  @else
                <a href="{{ url('KelolaLaporan/'.$element->id) }}" class="btn btn-success">Lihat</a>
                @endif
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
