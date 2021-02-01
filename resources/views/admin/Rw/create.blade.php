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
                    Tambah Data Rw
                </div>
                <div class="card-body">
                    <form action="{{route('rw.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="from-group">
                            <label for="">Nama Desa</label>
                          
                            <select name="id_desa" id="" class="form-control" name="id_rw[]">
                                @foreach ($desa as $item)
                                    <option value="{{$item->id}}">{{$item->nama_desa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="from-group">
                            <label for="">Nama Rw</label>
                            <input type="text" name="nama_rw" class="form-control" value="{{old('nama_rw')}}">
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