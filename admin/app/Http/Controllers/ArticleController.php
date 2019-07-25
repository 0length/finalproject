<?php

namespace App\Http\Controllers;

use App\Article;
use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::all();
        $subjects = Subject::all();

        return view('admin.articles.index', compact('articles', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::all();

        return view('admin.articles.create', compact('subjects'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/article'), $imageName);

          Article::create([
              'subject_id' => $request->input('subject'),
              'author_name'=> $request->input('author_id'),
              'title' => $request->input('title'),
              'img_url' => "images/article/".$imageName,
              'text_content' => $request->content,
              'published_at' => date('D, d M y'),


          ]);
          return redirect('/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $subjects = Subject::all();
        return view('admin.articles.edit', compact('article', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/article'), $imageName);
          $article = Article::find($id);
          $article->update([
              'subject_id' => $request->input('subject'),
              'author_name'=> $request->input('author_id'),
              'title' => $request->input('title'),
              'img_url' => "images/article/".$imageName,
              'text_content' => $request->content,
              'published_at' => date('D, d M y'),


          ]);
          return redirect('/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect('/article');
    }

}