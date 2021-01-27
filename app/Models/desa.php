<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desa extends Model
{
    public function kecamatan(){
        return $this->belongTo('app\Models\kecamatan\id_kota');
    }
    public function rw(){
        return $this->hasmany('app\Models\rw\id_desa');
    }

}
