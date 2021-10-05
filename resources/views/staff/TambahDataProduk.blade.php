@extends('layouts.temp')
@section('title')
Kelola Target
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Kelola Target</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        {{-- <form action="{{url('KelolaProduk')}}" method="post" accept-charset="utf-8">
          @csrf
           <div class="form-group">
            Jenis Produk
            <select name="id_jenis" class="form-control form-control-sm" required>
              <option>Pilih Jenis Produk</option>
              @foreach ($jenis as $element)
              <option value="{{$element->id}}">{{$element->jenis}}</option>
              @endforeach
            </select>
          </div>
           <div class="form-group">
            Nama Produk
            <select name="id_nama_produk" class="form-control form-control-sm" required>
              <option>Pilih Nama Produk</option>
              @foreach ($nama as $element)
              <option value="{{$element->id}}">{{$element->nama}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            Witel
            <input type="text" name="witel" class="form-control">
          </div>
          <div class="form-group">
            TGT
            <input type="number" name="tgt" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <div class="form-group">
            PSBLN
            <input type="number" name="psbln" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <div class="form-group">
            ACH
            <input type="number" name="ach" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <div class="form-group">
            RANK
            <input type="number" name="rank" class="form-control" value="2" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <div class="form-group">
            TGT REV
            <input type="number" name="tgtrev" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <div class="form-group">
            PROG REV
            <input type="number" name="progrev" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <div class="form-group">
            ACH REV
            <input type="number" name="achrev" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <div class="form-group">
            RANK REV
            <input type="number" name="rankrev" class="form-control" value="2" onkeypress='return event.charCode >= 48 && event.charCode<= 57'>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form> --}}
        {{-- <form action="{{ url('KelolaProduk') }}" method="POST">
          @csrf
          @if ($errors->any())
          <div class="alert alert-danger" role="alert">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
          @if (Session::has('success'))
          <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
          </div>
          @endif
          <table class="table table-bordered" id="dynamicAddRemove">
            <tr>
              <th>Subject</th>
              <th>Action</th>
            </tr>
            <tr>
              <td>
                <div class="form-group">
                  Jenis Produk
                  <select name="id_jenis" class="form-control form-control-sm" required>
                    <option>Pilih Jenis Produk</option>
                    @foreach ($jenis as $element)
                    <option value="{{$element->id}}">{{$element->jenis}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  Nama Produk
                  <select name="id_nama_produk" class="form-control form-control-sm" required>
                    <option>Pilih Nama Produk</option>
                    @foreach ($nama as $element)
                    <option value="{{$element->id}}">{{$element->nama}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  WITEL
                  <input type="text" name="addMoreInputFields[0][witel]" placeholder="Enter subject" class="form-control"/>

                </div>
                <div class="form-group">
                  TGT
                  <input type="text" name="addMoreInputFields[0][tgt]" placeholder="Enter subject" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'/>

                </div>
                <div class="form-group">
                  PSBLN
                  <input type="text" name="addMoreInputFields[0][psbln]" placeholder="Enter subject" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'/>

                </div>
                <div class="form-group">
                  RANK
                  <input type="text" name="addMoreInputFields[0][rank]" placeholder="Enter subject" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'/>

                </div>
                <div class="form-group">
                  ACH REV
                  <input type="text" name="addMoreInputFields[0][achrev]" placeholder="Enter subject" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'/>

                </div>
                <div class="form-group">
                  TGT REV
                  <input type="text" name="addMoreInputFields[0][tgtrev]" placeholder="Enter subject" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'/>

                </div>
                <div class="form-group">
                  PROG REV
                  <input type="text" name="addMoreInputFields[0][progrev]" placeholder="Enter subject" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'/>

                </div>
                <div class="form-group">
                  RANK REV
                  <input type="text" name="addMoreInputFields[0][rankrev]" placeholder="Enter subject" class="form-control" onkeypress='return event.charCode >= 48 && event.charCode<= 57'/>

                </div>
              </td>
              <td></td>
            </tr>
          </table>
          <button type="submit" class="btn btn-outline-success d-inline">Save</button>
          <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button>
        </form> --}}
         <table class="table table-striped" id="dynamicAddRemove">
                <thead>
                 <tr>
                  <th rowspan="2">NO</th>
                  <th rowspan="2">WITEL</th>
                  <th colspan="3" class="text-center">SALES</th>
                  {{-- <th rowspan="2">RANK</th> --}}
                  <th rowspan="2">TGT REV</th>
                  <th rowspan="2">PROGREV</th>
                  <th rowspan="2">ACH REV</th>
                  {{-- <th rowspan="2">RANK REV</th> --}}
                  <th rowspan="2">ACTION</th>
                </tr>
                <tr>
                  <th>TGT</th>
                  <th>PSBLN</th>
                  <th>ACH</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td style="width: 180px;">
                    <div class="col-xs-1">
                    <input type="text" name="addMoreInputFields[0][witel]" class="form-control"/>
                      
                    </div>
                  </td>
                  <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][tgt]" placeholder="0" class="form-control"/>
                  </td>
                  <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][psbln]" placeholder="0" class="form-control"/>
                  </td>
                  <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][ach]" placeholder="0" class="form-control"/>
                  </td>
                 {{--  <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][rank]" placeholder="" class="form-control"/>
                  </td> --}}
                  <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][tgtrev]" placeholder="0" class="form-control"/>
                  </td>
                  <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][progrev]" placeholder="0" class="form-control"/>
                  </td>
                  <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][achrev]" placeholder="0" class="form-control"/>
                  </td>
                  {{-- <td style="width: 80px;">
                    <input type="text" name="addMoreInputFields[0][rankrev]" placeholder="" class="form-control"/>
                  </td> --}}
                  <td>
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button>
                  </td>
                </tr>
              </tbody>
          </table>
      </div>
    </div>
  </div>
  @include('sweetalert::alert')
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
  
  <script type="text/javascript">
    var i = 0;
    var j = 1;
    var numberOnly = "onkeypress='return event.charCode >= 48 && event.charCode<= 57'";
    
    $("#dynamic-ar").click(function () {
      ++i;
      ++j;
      var witel = '<td><input type="text" name="addMoreInputFields[0][witel]" class="form-control"/></td>'
      var tgt = '<td><input type="text" name="addMoreInputFields[0][tgt]" class="form-control"/></td>'
      var psbln = '<td><input type="text" name="addMoreInputFields[0][psbln]" class="form-control"/></td>'
      var ach = '<td><input type="text" name="addMoreInputFields[0][ach]" class="form-control"/></td>'
      var rank ='<td><input type="text" name="addMoreInputFields[0][rank]" class="form-control"/></td>'
      var tgtrev = '<td><input type="text" name="addMoreInputFields[0][tgtrev]" class="form-control"/></td>'
      var progrev = '<td><input type="text" name="addMoreInputFields[0][progrev]" class="form-control"/></td>'
      var achrev = '<td><input type="text" name="addMoreInputFields[0][achrev]" class="form-control"/></td>'
      var rankrev = '<td><input type="text" name="addMoreInputFields[0][rankrev]" class="form-control"/></td>'
      var action = '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>'
      var all = '<tr><td>'+j+'</td>'+witel+tgt+psbln+ach+tgtrev+progrev+achrev+action+'</tr>'

      $("#dynamicAddRemove").append(all
        );
    });
    $(document).on('click', '.remove-input-field', function () {
      $(this).parents('tr').remove();
      --j
    });
  </script>
  @endsection
