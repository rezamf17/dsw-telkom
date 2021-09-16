@extends('layouts.temp')
@section('title')
Kelola Akun
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Modules</a></div>
  <div class="breadcrumb-item">DataTables</div>
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
            <a href="#" class="btn btn-primary" title="">Tambah Akun</a>
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
                    @elseif($item->role == 2)
                    Calon Siswa
                    @else
                    Panitia
                  @endif</td>
                  <td><a href="#" title="" class="btn btn-success">Edit</a></td>
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
@endsection
