@extends('layouts.admin')
@section('content')
<div class="row">
  <div class="col-md-12">
   <div clas="card-header">
     Tambah Data Provinsi
    </div>
    <div class="card-body">
     <form action="{{route('provinsi.store')}}" method="post">
     @csrf 
     <div class="form-group">
        <label for="">Kode Provinsi</label>
        <input type="text" name="kode_provinsi" class="form-control" required">
        </div>
        <div class="form-group">
          <label for="">Nama Provinsi</label>
          <input type="text" name="nama_provinsi" class="form-control" required">
          </div>
          <div class="form-group">
            <button type="submit" class="btn-primary btn-block">Simpan</
           </form>
          </div>
        </div>
       </div>
     </div>
  </div>
@endsection

     