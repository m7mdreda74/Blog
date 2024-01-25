<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index( )
    {
        $articles = Article::query()
            ->approved()
            ->get();
        //resources/views/articles/index.blade.php === articles.index
        return view('articles.index',[
            'articles'=>$articles
        ]);
    }
    public function create()
    {
        return view('articles.create',[
            'categories'=>Category::all(),
            'tags'=>Tag::all()
        ]);
    }
    public function store( )
    {

        //validate the request from the user!
        request()->validate([
            'title'=>'required|string|max:255',
            'body'=>'required',
            'tags.*' =>'exists:tags,id',
            'categories.*' =>'exists:categories,id'
        ]);

        //Create article i the database
        $article =Article::create([
            'title'=>request('title'),
            'body'=>request('body'),
            //get the person who is logged in and get his id
            'employee_id'=>Auth::id()
        ]);


        $article
            ->tags()
            ->sync(request('tags'));

        $article
            ->categories()
            ->sync(request('categories'));

        return redirect()->route('articles.index');
    }
    public function show(Article $article)
    {
        return view('articles.show',[
            'article'=>$article
        ]);
    }
    public function edit(Article $article)
    {
        return view('articles.edit',compact('article'));
    }
    public function update(Article $article)
    {
        //validate the request from the user!
        request()->validate([
            'title'=>'required|string|max:255',
            'body'=>'required'
        ]);

        $article->update(request()->all());

        return redirect()->route('articles.index');

    }
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index');
    }
}
