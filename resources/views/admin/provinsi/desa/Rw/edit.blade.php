@extends('layouts.admin')
@push('rw')
active  
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                        <div class="card-header">
                                Edit Data
                            </div>
                            <div class="card-body">
                                <form action="{{route('rw.update',$rw->id)}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="from-group">
                                        <label for="">Nama desa</label>
                                      
                                        <select name="id_desa" id="" class="form-control" name="id_desa[]">
                                            @foreach ($desa as $item)
                                                <option value="{{$item->id}}" {{$item->id==$item->id_kelurahan ? 'selected' : ''}} >{{$item->nama_desa}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="from-group">
                                        <label for="">Nama Rw</label>
                                            <input type="text" name="nama_rw" value="{{$rw->nama_rw}}" class="form-control" >
                                            {!! $errors->first('nama_rw','<p class="help-block" style="color:red">:message</p>') !!}
                                     
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" > Simpan </button>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection