<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyArticleRequest;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Tag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('admin.articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Category::all()->pluck('name', 'id');

        $tags = Tag::all()->pluck('name', 'id');

        return view('admin.articles.create', compact('categories', 'tags'));
    }

    public function store(StoreArticleRequest $request)
    {
        $article = Article::create($request->all());
        $article->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.articles.index');
    }

    public function edit(Article $article)
    {
        $categories = Category::all()->pluck('name', 'id');

        $tags = Tag::all()->pluck('name', 'id');

        $article->load('category', 'tags');

        return view('admin.articles.edit', compact('categories', 'tags', 'article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->all());
        $article->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.articles.index');
    }

    public function show(Article $article)
    {
        $article->load('category', 'tags');

        return view('admin.articles.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();

        return back();
    }

    public function massDestroy(MassDestroyArticleRequest $request)
    {
        Article::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
