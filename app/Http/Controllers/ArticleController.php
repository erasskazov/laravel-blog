<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index ()
    {
        $articles = Article::paginate();

        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(StoreArticleRequest $request)
    {
        $validated = $request->validated();
        $article = new Article();
        $article->fill($validated);
        $article->save();
        session()->flash('message', 'Статья была успешно сохранена!');
        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(StoreArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $validated = $request->validated();
        $article->fill($validated);
        $article->save();
        session()->flash('message', 'Статья успешно обновлена!');
        return redirect()->route('articles.index');
    }
}
