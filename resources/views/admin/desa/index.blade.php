@extends('layouts.admin')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data desa
                    <a href="{{route('desa.create')}}"
                       class="btn btn-primary float-right">
                        Tambah
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>desa</th>
                                    <th>Kecamatan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($desa as $data)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$data->nama_desa}}</td>
                                    <td>{{$data->kecamatan->nama_kecamatan}}</td>
                                    <td>
                                        <form action="{{route('desa.destroy',$data->id)}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{route('desa.edit',$data->id)}}" class="btn btn-success">Edit</a>
                                            <a href="{{route('desa.show',$data->id)}}" class="btn btn-warning">Show</a>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection