@extends('layouts.temp')
@section('title')
Profile
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Profile</a></div>
</div>
@endsection
@section('content')
<section class="section">
    <div class="section-body">

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            Profile Akun
          </div>
          <div class="card-body">
            <table class="table">
              <tbody>
                <tr>
                  <th>Nama Lengkap</th>
                  <td>{{ Auth::user()->name }}</td>
                </tr>
                <tr>
                  <th>Alamat</th>
                  <td>{{ Auth::user()->address }}</td>
                </tr>
                <tr>
                  <th>No. Telepon</th>
                  <td>{{ Auth::user()->telp }}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{ Auth::user()->email }}</td>
                </tr>
                <tr>
                  <th>Role</th>
                  <td>
                    @if (Auth::user()->role == 1)
                    Admin
                    @elseif(Auth::user()->role == 2)
                    Manager
                    @else
                    Staff
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</section>
@endsection
