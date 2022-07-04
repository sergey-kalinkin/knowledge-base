<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRequest;
use App\Http\Requests\RoleRequest;
use App\Models\JobPosition;
use Illuminate\Http\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class RolesController extends Controller
{
    public function index()
    {
        $roles = JobPosition::with(['categories'])
                            ->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Category::all()->pluck('name', 'id');

        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * @throws \Throwable
     */
    public function store(RoleRequest $request)
    {
        JobPosition::new($request, Category::class);

        return redirect()->route('admin.roles.index');
    }

    public function edit(JobPosition $role)
    {
        $permissions = Category::all()->pluck('name', 'id');

        $role->load('categories');

        return view('admin.roles.edit', compact('permissions', 'role'));
    }

    public function update(RoleRequest $request, JobPosition $role)
    {
        $role->update($request->getName());
        $role->categories()->sync($request->getPermissions());

        return redirect()->route('admin.roles.index');
    }

    public function show(JobPosition $role)
    {
        $role->load('categories');

        return view('admin.roles.show', compact('role'));
    }

    /**
     * @throws \Exception
     */
    public function destroy(JobPosition $role): RedirectResponse
    {
        $role->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequest $request)
    {
        JobPosition::whereIn('id', $request->getIds())
            ->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
