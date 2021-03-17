<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friends extends Model
{
    use HasFactory;
    protected $table="friends";
        
    public function Data(){
        return $this->belongsTo('App\Models\User','id_friend','id');
    }
}
