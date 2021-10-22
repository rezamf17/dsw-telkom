@extends('layouts.temp')
@section('title')
Kelola Target
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Kelola Target</a></div>
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
          </div>
          <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th>Jumlah Target</th>
                    <th>Tanggal</th>
                    <th>Nama Produk</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($target as $item)
                 <tr>

                   <td>{{$loop->iteration}}</td>
                   <td>{{$item->jml_target}}</td>
                   <td>{{$item->time}}</td>
                   <td>{{$item->produk}}</td>
                   <th>
                    <a href="{{url('KelolaTarget/'.$item->id.'/edit')}}" title="" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{url('KelolaTarget/'.$item->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                      @method('delete')
                      @csrf
                      <button type="submit" class="btn btn-danger">
                        <i class="fa fa-trash"></i>Hapus
                      </button>
                    </th>
                  </tr>
                  </form>
                  @endforeach
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
              @foreach ($nama as $element)
              <option value="{{$element->nama}}">{{$element->nama}}</option>
              @endforeach
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
