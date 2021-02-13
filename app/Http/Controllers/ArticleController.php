<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(12);
        return view('article.index', compact('articles'));
    }

    public function category(Category $category)
    {
        $articles = $category->articles()->paginate(12);
        return view('article.index', compact('articles', 'category'));
    }

    public function author(User $user)
    {
        $articles = $user->articles()->paginate(12);
        return view('article.index', compact('articles', 'user'));
    }

    public function show($id)
    {
        $article = Article::where('id', $id)->first();
        return view('article.show', compact('article'));
    }

    public function create(Request $request)
    {
        $category = category::get();
        return view('article.create', compact('category'));
    }

    public function store()
    {
        $data = request()->validate([
            'image' => 'required|image',
            'title' => 'required|min:3',
            'content' => 'required|min:50',
            'category_id' => 'required|numeric'
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        Auth()->user()->articles()->create([
            'image' => $imagePath,
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
        ]);

        return redirect('/');
    }

    public function edit($id)
    {
        $article = Article::where('id', $id)->first();
        $category = Category::all();
        return view('article.edit', compact( 'article','category'));
    }

    public function update(Article $article)
    {
        $this->authorize('update', $article);

        $data = request()->validate([
            'image' => 'required|image',
            'title' => 'required|min:3',
            'content' => 'required|min:50',
            'category_id' => 'required|numeric'
        ]);

        $imagePath = request('image')->store('uploads', 'public');


        $article->update([
            'image' => $imagePath,
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        Article::where('id', $id)->delete();

        return redirect('/');
    }
}
