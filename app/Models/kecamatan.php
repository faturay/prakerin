<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    public function kota(){
        return $this->belongsTo('app\Models\id_kota');
    }
    public function desa() {
        return $this->hasmany('app\Models\id_kecamatan');
    }
}
