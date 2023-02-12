<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class Appiontment extends Model
{
    use HasFactory;
    
    protected $dates = ['date'];

    public function doctor(){
        return $this->hasOne(User::class,'id','doctor_id');
    }

    public function patient(){
        return $this->hasOne(User::class,'id','patient_id');
    }
}
