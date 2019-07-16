<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = "articles";
    protected $fillable = [
        'title', 'text_content', 'published_at', 'subject_id', 'img_url',
    ];

public function subject()
{
    return $this->hasOne('App\Subject', 'id', 'subject_id');
}
}
