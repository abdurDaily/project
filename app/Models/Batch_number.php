<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch_number extends Model
{
    use HasFactory;
    
    //* RELATION BETWEEN BATCH_NO WITH ADMIT_STUDENT TABLE
    public function admitStd(){
        return $this->hasMany(AdmitStudent::class);
    }
}