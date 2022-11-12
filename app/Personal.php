<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    public $table = "personal";

    protected $fillable = [
        'user_id', 'title_per', 'content_per', 'icon_per', 'visible_per', 'aboutme_per'
    ];  

}
