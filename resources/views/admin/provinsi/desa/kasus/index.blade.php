@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div clas="col-md-12">
     <div class="card-header">
       Data Kasus
    <a href="{{route('desa.create')}}"
       class="btn btn-dark float-right">
       Tambah
     </a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
         <table class="table">
         <tr>
            <th>No</th>
            <th>Nama kasus<th>
            <th>Aksi</th>
      </tr> 
      @php
         $no=1;
      @endphp
      @foreach ($kasus as $data)
       <tr>
          <td>{{$no++}}</td>
          <td>{{$data->nama_kasus}}</td>
          <td>
            <form action="{{route('kasus.destroy', $data->id)}}" method="post">
            @method('delete')
            @csrf
             <a href="{{route('kasus.edit', $data->id)}}" class="btn btn-succes">Edit</a>
             <a href="{{route('kasus.show', $data->id)}}" class="btn btn-info">Show</a>
             <button type="submit" class="btn-primary btn-danger">Delete</button>
                    </form>
                  </td>
                </tr>
              @endforeach
             </table>
          </div>
        </div>
       </div>
      </div>
    </div>
  </div?
@endsection