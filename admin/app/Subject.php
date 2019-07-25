<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $fillable = [
        'name', 'img_url',  'description',
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

}
