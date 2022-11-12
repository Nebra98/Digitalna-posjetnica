<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasicInformation extends Model
{

    public $table = "basicinformation";

    protected $fillable = [
        'user_id', 'name', 'icon', 'visible'
    ];  
    
}
