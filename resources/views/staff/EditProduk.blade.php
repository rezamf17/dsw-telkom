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
      <div class="card-header"></div>
      <div class="card-body">
        <form action="{{ url('KelolaProduk/'.$produk->id) }}" method="POST">
          @method('PUT')
          @csrf
           <div class="form-group">
            Jenis Produk
            <select name="id_jenis" class="form-control form-control-sm" required>
              <option>Pilih Jenis Produk</option>
              @foreach ($jenis as $element)
              <option value="{{$element->id}}" selected>{{$element->jenis}}</option>
              @endforeach
            </select>
          </div>
           <div class="form-group">
            Nama Produk
            <select name="id_nama_produk" class="form-control form-control-sm" required>
              <option>Pilih Nama Produk</option>
              @foreach ($nama as $element)
              <option value="{{$element->id}}" selected>{{$element->nama}}</option>
              @endforeach
            </select>
          </div>
         <table class="table table-striped" id="dynamicAddRemove">
          
                <thead>
                 <tr>
                  <th rowspan="2">NO</th>
                  <th rowspan="2">WITEL</th>
                  <th colspan="3" class="text-center">SALES</th>
                  <th rowspan="2">TGT REV</th>
                  <th rowspan="2">PROGREV</th>
                  <th rowspan="2">ACH REV</th>
                </tr>
                <tr>
                  <th>TGT</th>
                  <th>PSBLN</th>
                  <th>ACH</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td style="width: 180px;">
                    <div class="col-xs-1">
                    <input type="text" name="witel" class="form-control input-sm" value="{{$produk->witel}}" />
                      
                    </div>
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="tgt" placeholder="0" class="form-control" value="{{$produk->tgt}}" />
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="psbln" placeholder="0" class="form-control" value="{{$produk->psbln}}" />
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="ach" placeholder="0" class="form-control" value="{{$produk->ach}}" />
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="tgtrev" placeholder="0" class="form-control" value="{{$produk->tgtrev}}" />
                  </td>
                  <td style="width: 80px;">
                    <input type="text" name="progrev" placeholder="0" class="form-control" value="{{$produk->progrev}}" />
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="achrev" placeholder="0" class="form-control" value="{{$produk->achrev}}" />
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
