@extends('layouts.temp')
@section('title')
Kelola Akun
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Kelola Akun</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelola Akun</h4>
          </div>
          <div class="card-body">
          <form action="{{url('KelolaTarget/'.$target->id)}}" method="post" accept-charset="utf-8">
                  @method('PUT')
                  @csrf
                   <div class="form-group">
                    Jumlah Target
                    <input type="text" name="jml_target" class="form-control form-control-sm" value="{{$target->jml_target}}">
                  </div>
                  <div class="form-group">
                    Tanggal
                    <input type="date" name="time" class="form-control form-control-sm" value="{{$target->time}}">
                  </div>
                  <div class="form-group">
                    Produk
                    <select name="produk" class="form-control form-control-sm" required>
                      <option>Pilih Produk</option>
                      @foreach ($produk as $element)
                        <option value="{{$element->nama_produk}}" {{old('id', $target->id) == $element->id ?'selected' : null}} >{{$element->nama_produk}}</option>
                      @endforeach
                    </select>
                  </div>
              </div>
              <div class="card-footer bg-whitesmoke br">
                <a href="{{ url('KelolaTarget') }}" class="btn btn-secondary" title="">Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
                </form>
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

@include('sweetalert::alert')

@endsection
