@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="row">
   <div clas="col-md-12">
     <div class="card-header">
           Edit Data Kasus
           </div>
           <div class="card body">

           <div class="form-group">
             <label for="">Nama kasus</label>
             <input type="text" name="nama_kasus" class="form-control" value= "{{$kasus->nama_kasus}}"
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
             

            
