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
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah Data</button>
            <div class="table-responsive">
              <table class="table table-striped" id="table-1">
                <thead>
                  <tr>
                    <th class="text-center">
                      No
                    </th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No. Telp</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  <tr>
                   <td>{{$loop->iteration}}</td>
                   <td>{{$user->name}}</td>
                   <td>{{$user->address}}</td>
                   <td>{{$user->telp}}</td>
                   <td>{{$user->email}}</td>
                   <td>@if ($user->role == 1)
                    Admin
                    @elseif($user->role == 2)
                    Manager
                    @else
                    Staff
                  @endif</td>
                  <th>
                    <a href="{{url('KelolaAkun/'.$user->id.'/edit')}}" title="" class="btn btn-success d-inline"><i class="fa fa-edit"></i>Edit</a>
                    <form action="{{url('KelolaAkun', $user->id)}}" method="post" class="d-inline" onsubmit="return confirm('Yakin hapus data?')">
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
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('KelolaAkun')}}" method="post" accept-charset="utf-8">
                  @csrf
                  <div class="form-group">
                    Nama
                    <input type="text" name="name" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                    Alamat
                    <input type="text" name="address" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                    No Telp
                    <input type="text" name="telp" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                    Email
                    <input type="email" name="email" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                    Role
                    <select name="role" class="form-control form-control-sm" required>
                      <option>Pilih Role</option>
                      <option value="1">Admin</option>
                      <option value="2">Manager</option>
                      <option value="3">Staff</option>
                    </select>
                  </div>
                  <div class="form-group">
                    Password
                    <input type="password" name="password" class="form-control form-control-sm">
                  </div>
                  <div class="form-group">
                    Password Confirm
                    <input type="password" name="password_confirmation" class="form-control form-control-sm">
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
