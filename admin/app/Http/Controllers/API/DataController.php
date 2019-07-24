<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Article;
use App\Subject;
use Illuminate\Http\Request;

class DataController extends Controller
{
    // public function countItem($id)
    // {
    //     $post = Article::find($id);
    //     $visitcount = visits($post)->count();

    //     return response()->json($visitcount);
    // }

    // public function increItem($id)
    // {
    //     $post = Article::find($id);

    //     visits($post)->forceIncrement();
    // }

    public function popular()
    {
        $popu = Article::all();
        $trand =  $popu->sortByDesc('view_count');
        foreach($trand as $trands){

          $a =    response()->json($trands);
         $b =  json_decode($a);
          return $a;
        }
        //  return response()->json($trand);
    }

    public function articlesid($id)
    {
        $article = Article::find($id);
        visits($article)->forceIncrement();
        $value = visits($article)->count();
        $article->update([
            'view_count' => $value,
        ]);
        $updated = Article::find($id);

        return response()->json($article);
    }

    public function articleskeyword($keyword)
    {

        $articles = Article::when($keyword, function ($query) use ($keyword) {
            $query->where('title', 'like', "%{$keyword}%")
                ->orWhere('text_content', 'like', "%{$keyword}%");
        })->get();

        return  response()->json($articles);
    }

    public function articles()
    {
        $articles = Article::all();
        return response()->json($articles);
    }

    public function subjectsid($id)
    {

            $subjects = Article::where('subject_id', '=', $id)->get();

            return response()->json($subjects);
    }

    public function subjects()
    {

        $subjects = Subject::all();

        return response()->json($subjects);
    }

}
