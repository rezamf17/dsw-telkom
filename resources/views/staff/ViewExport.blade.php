@extends('layouts.temp')
@section('title')
Report
@endsection
@section('content')
<section class="section">
  <div class="card">
    <div class="card-header"><h4>Report</h4>
      <div class="float-right" style="margin-left: 80%;">
        <a href="{{url('KelolaProduk/'.$nama->id_nama_produk)}}" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
    <div class="card-body">
      <h5>Nama Produk : {{$nama->nama->nama}}</h5>
      <h5>Tanggal : {{$nama->created_at->format('j F, Y')}}</h5>
      <table class="table table-striped">
        <thead>
          <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">WITEL</th>
            <th colspan="3" class="text-center">SALES</th>
            <th rowspan="2">RANK</th>
            <th rowspan="2">TGT REV</th>
            <th rowspan="2">PROGREV</th>
            <th rowspan="2">ACH REV</th>
            <th rowspan="2">RANK REV</th>
          </tr>
          <tr>
            <th>TGT</th>
            <th>PSBLN</th>
            <th>ACH</th>
          </tr>
        </thead>
        <tbody>
          @foreach($produk_query as $element)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$element->witel}}</td>
            <td>{{$element->tgt}}</td>
            <td>{{$element->psbln}}</td>
            <td>{{$element->ach}}%</td>
            <td>{{$element->rank}}</td>
            <td>{{$element->tgtrev}}</td>
            <td>{{$element->progrev}}</td>
            <td>{{$element->achrev}}%</td>
            <td>{{$element->rankrev}}</td>
          </tr>
          @endforeach
          <tr>
            <td colspan="2">Total</td>
            <td>{{$sumtgt}}</td>
            <td>{{$sumpsbln}}</td>
            <td>{{$sumach}}%</td>
            <td></td>
            <td>{{$sumtgtrev}}</td>
            <td>{{$sumprogrev}}</td>
            <td>{{$sumachrev}}%</td>
          </tr>
        </tbody>
      </table>
      <h4>TREG</h4>
      <br>
      <table class="table table-striped">
        <thead>
         <tr>
          <th rowspan="2">NO</th>
          <th rowspan="2">WITEL</th>
          <th colspan="3" class="text-center">SALES</th>
          <th rowspan="2">RANK</th>
          <th rowspan="2">TGT REV</th>
          <th rowspan="2">PROGREV</th>
          <th rowspan="2">ACH REV</th>
          <th rowspan="2">RANK REV</th>
        </tr>
        <tr>
          <th>TGT</th>
          <th>PSBLN</th>
          <th>ACH</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($treg_query as $element)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{$element->witel}}</td>
          <td>{{$element->tgt}}</td>
          <td>{{$element->psbln}}</td>
          <td>{{$element->ach}}%</td>
          <td>{{$element->rank}}</td>
          <td>{{$element->tgtrev}}</td>
          <td>{{$element->progrev}}</td>
          <td>{{$element->achrev}}%</td>
          <td>{{$element->rankrev}}</td>
        </tr>
        @endforeach
        <tr>
          <td colspan="2">Total</td>
          <td>{{$sumtgt_treg}}</td>
          <td>{{$sumpsbln_treg}}</td>
          <td>{{$sumach_treg}}%</td>
          <td></td>
          <td>{{$sumtgtrev_treg}}</td>
          <td>{{$sumprogrev_treg}}</td>
          <td>{{$sumachrev_treg}}%</td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="card-footer">
    <form action="{{ url('export/'.$produk_id->id_nama_produk) }}" method="post" accept-charset="utf-8">
      @csrf
      <input style="display: none;" type="text" name="time" value="{{$nama->created_at}}">
      <button type="submit" class="btn btn-primary">Report Excel</button>
    </form>
  </div>
</div>
</section>
@endsection
