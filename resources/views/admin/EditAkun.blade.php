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
          <form action="{{url('KelolaAkun/'. $users->id)}}" method="post" accept-charset="utf-8">
                  @method('PUT')
                  @csrf
                  <div class="form-group">
                    Nama
                    <input type="text" name="name" class="form-control form-control-sm" value="{{$users->name}}">
                  </div>
                  <div class="form-group">
                    Alamat
                    <input type="text" name="address" class="form-control form-control-sm" value="{{$users->address}}">
                  </div>
                  <div class="form-group">
                    No Telp
                    <input type="text" name="telp" class="form-control form-control-sm"value="{{$users->telp}}">
                  </div>
                  <div class="form-group">
                    Email
                    <input type="email" name="email" class="form-control form-control-sm"value="{{$users->email}}">
                  </div>
                  <div class="form-group">
                    Role
                    <select name="role" class="form-control form-control-sm" required>
                      <option>Pilih Role</option>
                      <option value="1"  @if($users->role == 1) selected @endif>Admin</option>
                      <option value="2"  @if($users->role == 2) selected @endif>Manager</option>
                      <option value="3"  @if($users->role == 3) selected @endif>Staff</option>
                    </select>
                  </div>
                  <div class="form-group">
                    Password
                    <input type="password" name="password" class="form-control form-control-sm">
                    Kosongkan Password apabila tidak diganti
                  </div>
                  <div class="form-group">
                    Password Confirm
                    <input type="password" name="password_confirmation" class="form-control form-control-sm">
                  </div>
              </div>
              <div class="card-footer bg-whitesmoke br">
                <a href="{{ url('KelolaAkun') }}" class="btn btn-secondary" title="">Kembali</a>
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
