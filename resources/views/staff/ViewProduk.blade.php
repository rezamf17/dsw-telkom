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
            <h4>Lihat Produk {{$produk_id->nama->nama}}</h4>
            <div class="float-right" style="margin-left: 80%;">
              <a href="{{url('KelolaProduk')}}" class="btn btn-secondary">Kembali</a>
            </div>
          </div>
          <div class="card-body">
            <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Buat Laporan</button>
            <a href="{{url('KelolaProduk/create')}}" class="btn btn-primary">Tambah Data Produk</a>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                 <tr>
                  <th rowspan="2">NO</th>
                  <th rowspan="2">WITEL</th>
                  <th colspan="3" class="text-center">SALES</th>
                  <th rowspan="2">TGT REV</th>
                  <th rowspan="2">PROGREV</th>
                  <th rowspan="2">ACH REV</th>
                  <th rowspan="2">TANGGAL</th>
                  <th rowspan="2">ACTION</th>
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
                  <td>{{$element->ach}}%</td>
                  <td>{{$element->tgtrev}}</td>
                  <td>{{$element->progrev}}</td>
                  <td>{{$element->achrev}}%</td>
                  <td>{{$element->created_at->format('j F, Y')}}</td>
                  <th>
                     <a href="{{ url('KelolaProduk/'.$element->id.'/edit') }}" title="" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{ url('KelolaProduk/'.$element->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                  @method('delete')
                  @csrf
                  <button type="submit" class="btn btn-danger">
                    <i class="fa fa-trash"></i>Hapus
                  </button>
                  </th>
                </form>
                  {{-- <td>{{$element->rankrev}}</td> --}}
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
        <h5 class="modal-title">Buat Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('KelolaProduk/viewExport/'.$produk_id->id_nama_produk)}}" method="post" accept-charset="utf-8">
          @csrf
          <div class="form-group">
            Pilih Tanggal Laporan
            <input type="date" name="time" class="form-control form-control-sm">
          </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
          {{-- <a href="{{ url('export/'.$produk_id->id_nama_produk.$request->time) }}" title="">save</a> --}}
          {{-- <input type="submit" name="" value="Simpan"> --}}
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')

@endsection
