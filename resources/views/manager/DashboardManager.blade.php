@extends('layouts.temp')
@section('title')
Dashboard Manager
@endsection
@section('content')
<section class="section">
<div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                  <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Data Laporan</h4>
                  </div>
                  <div class="card-body">
                    {{$produk_count}}
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
              <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                  <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Data Produk</h4>
                  </div>
                  <div class="card-body">
                    {{$laporan_count}}
                  </div>
                </div>
              </div>
            </div>
          </div>
</section>
@endsection
