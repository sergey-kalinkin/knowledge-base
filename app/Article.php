<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes, Sluggable;

    public $table = 'articles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'full_text',
        'short_text',
        'views_count',
        'category_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function newRestrictedQuery()
    {
        return static::when(\Auth::guard('web')->user(), function ($q) {//this is a policy statement
            $q->whereHas('category.permissions.followers', function ($q) {
                $q->where('followers.id', \Auth::guard('web')->id());
            });
        });
    }
}
