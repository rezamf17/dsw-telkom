@extends('layouts.temp')
@section('title')
Edit Data Laporan
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Edit Data Laporan</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">
    <div class="card">
      <div class="card-header">
        <h4>Edit Data Laporan</h4>
        <div class="float-right" style="margin-left: 80%;">
              <a href="{{url('KelolaLaporan/'.$laporan->id_nama_produk)}}" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ url('KelolaLaporan/'.$laporan->id) }}" method="POST">
          @method('PUT')
          @csrf
           <div class="form-group">
            Jenis Produk
            <select name="id_jenis" class="form-control form-control-sm" required>
              <option value="">Pilih Jenis Produk</option>
              @foreach ($jenis as $element)
              <option value="{{$element->id}}" {{$element->id == $laporan->id_jenis ? 'selected' : ''}}>{{$element->jenis}}</option>
              @endforeach
            </select>
          </div>
           <div class="form-group">
            Nama Produk
            <select name="id_nama_produk" class="form-control form-control-sm" required>
              <option value="">Pilih Nama Produk</option>
              @foreach ($nama as $element)
              <option value="{{$element->id}}" {{$element->id == $laporan->id_nama_produk ? 'selected' : ''}}>{{$element->nama}}</option>
              @endforeach
            </select>
          </div>
         <table class="table table-striped" id="dynamicAddRemove">
          
                <thead>
                 <tr>
                  <th>NO</th>
                  <th>WITEL</th>
                  <th>TGTMTD</th>
                  <th>REALMTD</th>
                  <th>TGT REV</th>
                  <th>PROGREV</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>
                    <div class="col-xs-1">
                    <input type="text" name="witel" class="form-control input-sm" value="{{$laporan->witel}}" required/>
                    </div>
                  </td>
                  <td>
                    <input type="text" name="tgtmtd" placeholder="0" class="form-control" value="{{$laporan->tgtmtd}}" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
                  </td>
                  <td>
                    <input type="text" name="realmtd" placeholder="0" class="form-control" value="{{$laporan->realmtd}}" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
                  </td>
                  <td>
                    <input type="text" name="tgtrev" placeholder="0" class="form-control" value="{{$laporan->tgtrev}}" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
                  </td>
                  <td>
                    <input type="text" name="progrev" placeholder="0" class="form-control" value="{{$laporan->progrev}}" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
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
