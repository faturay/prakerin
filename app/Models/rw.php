<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rw extends Model
{
    public function desa(){
        return $this->belongsTo('app\Models\id_desa');
    }
    public function kasus(){
        return $this->hasmany('app\Models\rw/id_rw');
    }
}
