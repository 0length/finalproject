<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Article;
use App\Subject;
use Illuminate\Http\Request;

class DataController extends Controller
{


    public function popular()
    {
        $popu = Article::all();
        $trand =  $popu->sortByDesc('view_count')->values()->all();

             return response()->json($trand);
    }

    public function articlesid($id)
    {
        $article = Article::find($id);
        // visits($article)->forceIncrement();
        // $value = visits($article)->count();
        $article->update([
            'view_count' => $article->view_count + 1,
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
