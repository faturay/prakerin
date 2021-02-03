@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Show Data desa
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Kecamatan</label>
                        <input type="text" name="kode_kecamatan" value="{{$desa->kecamatan->nama_kecamatan}}" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label for="">Nama desa</label>
                        <input type="text" name="nama_desa" value="{{$desa->nama_desa}}" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <a href="{{route('desa.index')}}" class="btn btn-primary btn-block">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection