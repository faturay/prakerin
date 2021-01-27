@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div clas="col-md-12">
     <div class="card">
       <div class="card-header">
         Tambah Data kecamatan
       </div>
       <div class="card-body">
       <form action="{{route('kecamatan.store')}}" method="post">
       @csrf 
       <div class="form-group">
        <label>Pilih Kecamatan</label>
        <select name="id_kecamatan" class="form-control">
        @foreach ($kecamatan as $item)
             <option value="{{ $item->id }}">{{$item->nama_kecamatan}}</option>
        @endforeach
        </select>
      </div> 
     <div class="form-group">
          <label for="">Nama kecamatan</label>
          <input type="text" name="nama_kecamatan" class="form-control" required">
          </div>
          <div class="form-group">
             <button type="submit" class="btn-primary btn-block">Simpan</button>
             </div>
             </form>
           </div>
         </div>
      </div>
    </div>
  </div>
@endsection

     