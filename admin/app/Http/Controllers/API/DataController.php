<?php

namespace App\Http\Controllers\API;

use App\Article;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function countItem($id)
    {
        $post = Article::find($id);
        $visitcount = $post->visits()->count();
        return response()->json($visitcount);
    }

    public function increItem($id)
    {
        $post = Article::find($id);
        $post->visits()->increment();
    }

    public function articlesid($id)
    {
        $articles = Article::find($id);
        return response()->json($articles);
    }

    public function articles()
    {
        $articles = Article::all();
        return response()->json($articles);
    }

    public function subjectsid($id)
    {

            $subjects = Subject::find($id);
            return response()->json($subjects);


    }

    public function subjects()
    {

        $subjects = Subject::all();
        return response()->json($subjects);


    }
}
