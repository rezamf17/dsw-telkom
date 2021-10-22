@extends('layouts.temp')
@section('title')
Tambah Data Laporan
@endsection
@section('breadcrumb')
<div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Tambah Data Laporan</a></div>
</div>
@endsection
@section('content')
<section class="section">

  <div class="section-body">
    <div class="card">
      <div class="card-header"></div>
      <div class="card-body">
        <form action="{{ url('KelolaLaporan') }}" method="POST">
          @csrf
           <div class="form-group">
            Jenis Produk
            <select name="id_jenis[0]" class="form-control form-control-sm" required>
              <option value="">Pilih Jenis Produk</option>
              @foreach ($jenis as $element)
              <option value="{{$element->id}}">{{$element->jenis}}</option>
              @endforeach
            </select>
          </div>
           <div class="form-group">
            Nama Produk
            <select name="id_nama_produk[0]" class="form-control form-control-sm" required>
              <option value="">Pilih Nama Produk</option>
              @foreach ($nama as $element)
              <option value="{{$element->id}}">{{$element->nama}}</option>
              @endforeach
            </select>
          </div>
         <table class="table table-bordered" id="dynamicAddRemove">
          
                <thead>
                 <tr>
                  <th rowspan="2">NO</th>
                  <th rowspan="2">WITEL</th>
                   <th rowspan="2">TGTMTD</th>
                  <th rowspan="2">REALMTD</th>
                  <th rowspan="2">TGT REV</th>
                  <th rowspan="2">PROGREV</th>
                  <th rowspan="2">ACTION</th>
                </tr>
                <tr>
                 
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td style="width: 180px;">
                    <div class="col-xs-1">
                    <input type="text" name="witel[]" class="form-control input-sm" placeholder="Witel" required/>
                    </div>
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="tgtmtd[]" placeholder="0" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="realmtd[]" placeholder="0" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
                  </td>
                  <td style="width: 120px;">
                    <input type="text" name="tgtrev[]" placeholder="0" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
                  </td>
                  <td style="width: 80px;">
                    <input type="text" name="progrev[]" placeholder="0" class="form-control" onkeypress="return event.charCode >=48 && event.charCode <=57" required/>
                  </td>
                  <td>
                    <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Subject</button>
                  </td>
                </tr>
              </tbody>
          </table>
          <div class="card-footer">
          <button type="submit" class="btn btn-outline-success d-inline">Save</button>
          </div>
        </form>
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
      var witel = '<td><input type="text" name="witel[]" class="form-control" placeholder="Witel" required/></td>'
      var tgtmtd = '<td><input type="text" name="tgtmtd[]" class="form-control" placeholder="0" onkeypress="return event.charCode >=48 && event.charCode <=57" required/></td>'
      var realmtd = '<td><input type="text" name="realmtd[]" class="form-control" placeholder="0" onkeypress="return event.charCode >=48 && event.charCode <=57" required/></td>'
      var tgtrev = '<td><input type="text" name="tgtrev[]" class="form-control" placeholder="0" onkeypress="return event.charCode >=48 && event.charCode <=57" required/></td>'
      var progrev = '<td><input type="text" name="progrev[]" class="form-control" placeholder="0" onkeypress="return event.charCode >=48 && event.charCode <=57" required/></td>'
      var action = '<td><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></td>'
      var id_jenis = `<select name="addMoreInputFields[`+i+`][id_jenis]" class="form-control form-control-sm" required>
              <option>Pilih Jenis Produk</option>
              @foreach ($jenis as $element)
              <option value="{{$element->id}}">{{$element->jenis}}</option>
              @endforeach
            </select>`
      var all = '<tr><td>'+j+'</td>'+witel+tgtmtd+realmtd+tgtrev+progrev+action+'</tr>'

      $("#dynamicAddRemove").append(all
        );
    });
    $(document).on('click', '.remove-input-field', function () {
      $(this).parents('tr').remove();
      --j
    });
  </script>
  @endsection
