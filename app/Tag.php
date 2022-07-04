<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, Sluggable;

    public $table = 'tags';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function restrictedArticles()
    {
        return $this->belongsToMany(Article::class)
                    ->when(\Auth::guard('web')->user(), function ($q) {//this is a policy statement
                        $q->whereHas('category.permissions.followers', function ($q) {
                            $q->where('followers.id', \Auth::guard('web')->id());
                        });
                    });
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function newRestrictedQuery()
    {
        return static::when(\Auth::guard('web')->user(), function ($q) {//this is a policy statement
            $q->whereHas('articles.category.permissions.followers', function ($q) {
                $q->where('followers.id', \Auth::guard('web')->id());
            });
        });
    }
}
