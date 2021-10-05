@extends('layouts.temp')
@section('title')
Lihat Produk
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Lihat Produk</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelola Target</h4>
            <div class="float-right" style="margin-left: 80%;">
              <a href="{{url('KelolaProduk')}}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
          <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                 <tr>
                  <th rowspan="2">NO</th>
                  <th rowspan="2">WITEL</th>
                  <th colspan="3" class="text-center">SALES</th>
                  <th rowspan="2">RANK</th>
                  <th rowspan="2">TGT REV</th>
                  <th rowspan="2">PROGREV</th>
                  <th rowspan="2">ACH REV</th>
                  <th rowspan="2">RANK REV</th>
                </tr>
                <tr>
                  <th>TGT</th>
                  <th>PSBLN</th>
                  <th>ACH</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($produk as $element)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$element->witel}}</td>
                  <td>{{$element->tgt}}</td>
                  <td>{{$element->psbln}}</td>
                  <td>{{$element->ach}}</td>
                  <td>{{$element->rank}}</td>
                  <td>{{$element->tgtrev}}</td>
                  <td>{{$element->progrev}}</td>
                  <td>{{$element->achrev}}</td>
                  <td>{{$element->rankrev}}</td>
                </tr>
                @endforeach
                {{-- <tr>
                  <td>{{$produk->witel}}</td>
                </tr> --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</section>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Target</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('KelolaTarget')}}" method="post" accept-charset="utf-8">
          @csrf
          <div class="form-group">
            Jumlah Target
            <input type="text" name="jml_target" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            Tanggal
            <input type="date" name="time" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            Produk
            <select name="produk" class="form-control form-control-sm" required>
              <option>Pilih Produk</option>

            </select>
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          {{-- <input type="submit" name="" value="Simpan"> --}}
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')

@endsection
