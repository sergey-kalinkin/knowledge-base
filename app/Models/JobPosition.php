<?php

namespace App\Models;

use App\Category;
use App\Http\Requests\RoleRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Throwable;

class JobPosition extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * @throws Throwable
     */
    public static function new(RoleRequest $request, string $class_name)
    {
        try {
            DB::beginTransaction();
            $job = JobPosition::create($request->getName());
            $relation = ['job_position_id' => $job->id, 'ability_type' => $class_name];

            $data = collect($request->getPermissions())
                ->map(function ($id) use($relation) {
                    return collect(['ability_id' => $id])
                        ->merge($relation)
                        ->toArray();
                })->toArray();

            DB::table('job_permissions')->insert($data);
            DB::commit();
        }
        catch (Throwable $t) {
            DB::rollBack();
            throw $t;
        }
    }

    public function categories(): MorphToMany
    {
        return $this->morphedByMany(Category::class, 'ability', 'job_permissions');
    }

    public function followers(): MorphToMany
    {
        return $this->morphedByMany(Follower::class, 'ability', 'job_permissions');
    }
}
