<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = [];

public function subject()
{
    return $this->hasOne('App\Subject', 'id', 'subject_id');
}
}
