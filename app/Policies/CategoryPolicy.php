<?php

namespace App\Policies;

use App\Category;
use App\Models\Follower;
use Illuminate\Auth\Access\HandlesAuthorization;
use Ramsey\Collection\Collection;

class CategoryPolicy
{
    use HandlesAuthorization;

    /** @var Collection */
    private $allowedCategories;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->allowedCategories = collect();

        //
        /** @var Follower $user */
        $user = \Auth::guard('web')->user();

        if($user) {
            $user->load('permissions.categories');

            $this->allowedCategories = $user->permissions->pluck('categories')
                ->reduce(function ($res, $item) {
                    return $res ? $res->concat($item) : $item;
                })
                ->pluck('id');
        }
    }

    public function view($user, Category $category)
    {
        return \Auth::guard('admin')->user() ||
            $this->allowedCategories->contains($category->id);
    }
}
