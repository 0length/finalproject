<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    // use HasApiTokens;
    protected $table = "articles";
    protected $fillable = [
        'title', 'text_content', 'published_at', 'subject_id', 'img_url', 'view_count',
    ];

    public function subject()
    {
    return $this->hasOne('App\Subject', 'id', 'subject_id');
    }

    public function visits()
    {
        return visits($this);
    }
}
