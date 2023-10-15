<table>
  <thead>
    <tr>
      <th></th>
      <th>{{$nama->nama->nama}}</th>
      <th>{{$nama->created_at->format('j F, Y')}}</th>
    </tr>
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
