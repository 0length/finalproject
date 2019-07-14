<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = "subjects";
    protected $fillable = [
        'name', 'description',
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

}
