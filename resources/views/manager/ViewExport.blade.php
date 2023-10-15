@extends('layouts.temp')
@section('title')
Report
@endsection
@section('content')
<section class="section">
  <div class="card">
    <div class="card-header"><h4>Report</h4>
      <div class="float-right" style="margin-left: 80%;">
        <a href="{{url('KelolaLaporan/'.$nama->id_nama_produk)}}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <h5>Nama Produk : {{$nama->nama->nama}}</h5>
      <h5>Tanggal : {{$nama->created_at->format('j F, Y')}}</h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>NO</th>
            <th>WITEL</th>
            <th>TGTMTD</th>
            <th>REALMTD</th>
            <th>ACH</th>
            <th>SHRTGE</th>
            <th>RANK</th>
            <th>TGT REV</th>
            <th>PROGREV</th>
            <th>ACH REV</th>
            <th>RANK REV</th>
          </tr>
        </thead>
        <tbody>
          @foreach($laporan_query as $element)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$element->witel}}</td>
            <td>{{$element->tgtmtd}}</td>
            <td>{{$element->realmtd}}</td>
            <td>{{$element->ach}}%</td>
            <td>{{$element->shrtge}}</td>
            <td>{{$element->rank}}</td>
            <td>{{$element->tgtrev}}</td>
            <td>{{$element->progrev}}</td>
            <td>{{$element->achrev}}%</td>
            <td>{{$element->rankrev}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="2">Total</td>
            <td>{{$sumtgtmtd}}</td>
            <td>{{$sumrealmtd}}</td>
            <td>{{$sumach}}%</td>
            <td></td>
            <td>{{$sumtgtrev}}</td>
            <td>{{$sumprogrev}}</td>
            <td>{{$sumachrev}}%</td>
          </tr>
        </tbody>
      </table>

  </div>
  <div class="card-footer">
    <form action="{{ url('exportLaporan/'.$nama->nama->id) }}" method="post" accept-charset="utf-8">
      @csrf
      <input style="display: none;" type="text" name="time" value="{{$nama->created_at}}">
      <button type="submit" class="btn btn-primary">Report Excel</button>
    </form>
  </div>
</div>
</section>
@endsection
