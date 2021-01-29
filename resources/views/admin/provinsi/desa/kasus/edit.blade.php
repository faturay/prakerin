@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
     <div class="card-header">
        Edit Data Kasus
    </div>
    <div class="card-body">
       <form action="{{route('kasus.update',$kasus->id)}}" method="post">
       @method('put')
       @csrf 
       <div class="form-group">
        <label>Pilih Kasus</label>
        <select name="id_kecamatan" class="form-control">
        @foreach ($kasus as $item)
             <option value="{{ $item->id }}">{{$item->nama_kasus}}</option>
        @endforeach
        </select>
     </div> 
       <div class="form-group">
       <label for="">Nama Kasus</label>
          <input type="text" name="nama_kasus" class="form-control" value={{$kasus->nama_kasus}}" class="form-control" required>
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


