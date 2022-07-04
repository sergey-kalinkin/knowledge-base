<?php

namespace App\Policies;

use App\Article;
use App\Models\Follower;
use Illuminate\Auth\Access\HandlesAuthorization;

class ArticlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function view($follower, Article $article)
    {
        return \Gate::allows('view', $article->category()->first());
    }
}
