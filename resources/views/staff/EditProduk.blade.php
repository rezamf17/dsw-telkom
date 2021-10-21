@extends('layouts.temp')
@section('title')
Edit Data Produk
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Edit Data Produk</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Edit Data Produk</h4>
        <div class="float-right" style="margin-left: 80%;">
              <a href="{{url('KelolaProduk/'.$produk->id_nama_produk)}}" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ url('KelolaProduk/'.$produk->id) }}" method="POST">
          @method('PUT')
          @csrf
           <div class="form-group">
            Jenis Produk
            <select name="id_jenis" class="form-control form-control-sm" required>
              <option>Pilih Jenis Produk</option>
              @foreach ($jenis as $element)
              <option value="{{$element->id}}" {{$element->id == $produk->id_jenis ? 'selected' : ''}}>{{$element->jenis}}</option>
              @endforeach
            </select>
          </div>
           <div class="form-group">
            Nama Produk
            <select name="id_nama_produk" class="form-control form-control-sm" required>
              <option>Pilih Nama Produk</option>
              @foreach ($nama as $element)
              <option value="{{$element->id}}" {{$element->id == $produk->id_nama_produk ? 'selected' : ''}}>{{$element->nama}}</option>
              @endforeach
            </select>
          </div>
         <table class="table table-striped" id="dynamicAddRemove">
          
                <thead>
                 <tr>
                  <th rowspan="2">NO</th>
                  <th rowspan="2">WITEL</th>
                  <th colspan="2" class="text-center">SALES</th>
                  <th rowspan="2">TGT REV</th>
                  <th rowspan="2">PROGREV</th>
                </tr>
                <tr>
                  <th>TGT</th>
                  <th>PSBLN</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="col-xs-1">
                    <input type="text" name="witel" class="form-control input-sm" value="{{$produk->witel}}" />
                      
                    </div>
                  </td>
                  <td>
                    <input type="text" name="tgt" placeholder="0" class="form-control" value="{{$produk->tgt}}" />
                  </td>
                  <td>
                    <input type="text" name="psbln" placeholder="0" class="form-control" value="{{$produk->psbln}}" />
                  </td>
                  <td>
                    <input type="text" name="tgtrev" placeholder="0" class="form-control" value="{{$produk->tgtrev}}" />
                  </td>
                  <td>
                    <input type="text" name="progrev" placeholder="0" class="form-control" value="{{$produk->progrev}}" />
                  </td>
                </tr>
              </tbody>
          </table>
          <div class="card-footer">
          <button type="submit" class="btn btn-outline-success d-inline">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
  @endsection
