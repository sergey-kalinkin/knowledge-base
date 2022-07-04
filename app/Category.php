<?php

namespace App;

use App\Models\JobPosition;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes, Sluggable;

    public $table = 'categories';

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
        return $this->hasMany(Article::class);
    }

    public function permissions()
    {
        return $this->morphToMany(JobPosition::class, 'ability', 'job_permissions');
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
            $q->whereHas('permissions.followers', function ($q) {
                $q->where('followers.id', \Auth::guard('web')->id());
            });
        });
    }
}
