@extends('layouts.admin')
@push('desa')
active  
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                        <div class="card-header">
                                Tambah Data desa
                            </div>
                            <div class="card-body">
                                <form action="{{route('desa.store')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="from-group">
                                        <label for="">Nama Desa</label>
                                      
                                        <select name="id_desa" id="" class="form-control" name="id_desa[]">
                                            @foreach ($Desa as $item)
                                                <option value="{{$item->id}}">{{$item->nama_Desa}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="from-group">
                                        <label for="">Nama Desa</label>
                                        <input type="text" name="nama_desa" class="form-control" value="{{old('nama_desa')}}" >
                                        {!! $errors->first('nama_desa','<p class="help-block" style="color:red">:message</p>') !!}
                                     
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