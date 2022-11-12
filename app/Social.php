<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{

    public $table = "social";


    protected $fillable = [
        'user_id', 'title_soc', 'content_soc', 'icon_soc', 'visible_soc'
    ];  

}
