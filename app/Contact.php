<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = "contact";


    protected $fillable = [
        'user_id', 'title_con', 'content_con', 'icon_con', 'visible_con'
    ];  

}
