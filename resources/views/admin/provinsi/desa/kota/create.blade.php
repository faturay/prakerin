@extends('layouts.admin')
@push('kota')
active  
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                        <div class="card-header">
                                Edit Data Kota
                            </div>
                            <div class="card-body">
                                <form action="{{route('kota.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                   
                                    <div class="from-group">
                                        <label for="">Nama Provinsi</label>
                                      
                                        <select name="id_provinsi" id="" class="form-control" name="id_provinsi[]">
                                            @foreach ($provinsi as $item)
                                                <option value="{{$item->id}}">{{$item->nama_provinsi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="from-group">
                                        <label for="">Nama Kota</label>
                                        <input type="text" name="nama_kota" class="form-control" value="{{old('nama_kota')}}" >
                                        {!! $errors->first('nama_kota','<p class="help-block" style="color:red">:message</p>') !!}
                                     
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