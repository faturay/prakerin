@extends('layouts.admin')
@push('desa')
active
@endpush
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             

                <div class="card-body">
                    @if (session('succes'))
                        <div class="alert alert-success" role="alert">
                            {{ session('succes') }}
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">Kecamatan
                                <a href="{{route('desa.create')}}" class="float-right btn btn-primary"> Tambah </a>
                        </div>   
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kecamatan</th>
                                                        <th>Nama Desa</th>
                                                        <th>
                                                            <center>
                                                                Action
                                                            </center>
                                                        </th>
                                                    </tr>
                                                    
                                                </thead>
                                                <tbody>
                                                    @php $no = 1; @endphp
                                                    @foreach ($desa as $item)
                                                    <tr>
                                                        <th >{{$no++}}</th>
                                                        <th>{{$item->Kecamatan->nama_kecamatan}}</th>
                                                        <th>{{$item->nama_desa}}</th>
                                                        
                                                        <td>
                                                          
                                                             <a class="btn btn-outline-success" href="{{route('desa.edit',$item->id)}}"><i class="fas fa-eye">Edit</i></a>
                                                            <a class="btn btn-outline-danger" href="{{route('desa.delete',$item->id)}}"><i class="fas fa-trash">Hapus</i></a>
                                                   
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
            </div>
        </div>
    </div>
</div>
@endsection