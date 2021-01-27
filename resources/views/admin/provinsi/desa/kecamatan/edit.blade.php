@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
     <div class="card-header">
        Edit Data Kecamatan
    </div>
    <div class="card-body">
       <form action="{{route('kecamatan.update',$kecamatan->id)}}" method="post">
       @method('put')
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
       <label for="">Nama Kecamatan</label>
          <input type="text" name="nama_desa" class="form-control" value={{$desa->nama_kecamatan}}" class="form-control" required>
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

     