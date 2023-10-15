@extends('layouts.temp')
@section('title')
Kelola Nama Produk
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Kelola Nama Produk</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelola Nama Produk</h4>
          </div>
          <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($nama as $element)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$element->nama}}</td>
                    <th>
                      <a href="{{ url('NamaProduk/'.$element->id.'/edit') }}" title="" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a>
                      <form action="{{ url('NamaProduk/'.$element->id) }}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                          <i class="fa fa-trash"></i>Hapus
                        </button>
                      </form>
                      </th>
                    </tr>
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
        <h5 class="modal-title">Tambah Data Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('NamaProduk')}}" method="post" accept-charset="utf-8">
          @csrf
         <div class="form-group">
           Nama Produk
           <input type="text" name="nama" class="form-control">
         </div>
        </div>
        <div class="modal-footer bg-whitesmoke br">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')

@endsection
