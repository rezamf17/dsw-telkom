<table>
    <thead>
      <tr>
        <th></th>
        <th>{{$nama->nama->nama}}</th>
        <th>{{$nama->created_at->format('j F, Y')}}</th>
      </tr>
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
<table>
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