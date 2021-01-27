@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div clas="col-md-12">
     <div class="card-header">
           Edit Data desa
           </div>
           <div class="card body">

           <div class="form-group">
             <label for="">Nama desa</label>
             <input type="text" name="nama_desa" class="form-control" value= "{{$desa->nama_desa}}"
             </div>
             <div class="fprm-group">
               <a href="{{url()->previous()}}" class="btn btn-primary">Kembali</a>
               </div>
             
              </div>
             </div>
            </div>
          </div>
        </div>
@endsection
             

            