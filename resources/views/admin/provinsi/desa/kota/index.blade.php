@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div clas="col-md-12">
     <div class="card-header">
       Data Kecamatan
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
            <th>Nama kecamatan<th>
            <th>Aksi</th>
      </tr> 
      @php
         $no=1;
      @endphp
      @foreach ($desa as $data)
       <tr>
          <td>{{$no++}}</td>
          <td>{{$data->nama_desa}}</td>
          <td>
            <form action="{{route('desa destroy', $data->id)}}" method="post">
            @method('delete')
            @csrf
             <a href="{{route('desa.edit', $data->id)}}" class="btn btn-succes">Edit</a>
             <a href="{{route('desa.show', $data->id)}}" class="btn btn-info">Show</a>
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