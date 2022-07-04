<?php

namespace App\Http\Controllers;

use App\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    /**
     * @throws AuthorizationException
     */
    public function show($slug, Category $category)
    {
        Gate::authorize('view', $category);

        $category->loadCount('articles');

        $articles = $category->articles()
            ->paginate(5);

        return view('categories.show', compact(['category', 'articles']));
    }

    public function check_slug(Request $request)
    {
        $slug = SlugService::createSlug(Category::class, 'slug', $request->input('name',''));

        return response()->json(['slug' => $slug]);
    }
}
