@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card"> 
               Data provinsi
           <a href="{{route('provinsi.create')}}"
             class="btn btn-dark float-right">Tambah</a>
         </a>
         </div>
         </div class="card-body">
           </div clas="table-responsive">
             <table class="table">
              <tr>
                 <th>No</th>
                 <th>Kode Provinsi</th>
                 <th>Provinsi</th>
                 <th>AKSI</th>
            </tr>
            @php
               $no=1;
            @endphp
            @foreach ($provinsi as $data)
               <tr>
                  <td>{{$no++}}</td>
                  <td>{{$data->kode_provinsi}} </td>
                  <td>{{$data->nama_provinsi}} </td>      
                  <td>
                    <form action="{{route('provinsi.destroy',$data->id)}}" method="post">
                      @method('Delete')
                      @csrf
                      <a class="btn btn-info" href="{{ route('provinsi.edit', $data->id) }}">edit</a>
                      <a class="btn btn-warning" href="{{ route('provinsi.show', $data->id) }}">show</a>
                      <button type="submit" class="btn btn-denger">Delete</button>
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
      </div>
@endsection 