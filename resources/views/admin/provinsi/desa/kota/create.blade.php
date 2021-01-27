@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div clas="col-md-12">
     <div class="card">
       <div class="card-header">
         Tambah Data kota
       </div>
       <div class="card-body">
       <form action="{{route('kota.store')}}" method="post">
       @csrf 
       <div class="form-group">
        <label>Pilih Kota</label>
        <select name="id_kota" class="form-control">
        @foreach ($kota as $item)
             <option value="{{ $item->id }}">{{$item->nama_kota}}</option>
        @endforeach
        </select>
      </div> 
     <div class="form-group">
          <label for="">Nama kota</label>
          <input type="text" name="nama_kota" class="form-control" required">
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

     