<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtcController extends Controller
{
    public function showFreshUsersForm()
    {
        return view('admin.etc.index');
    }

    public function freshUsers()
    {
        \Artisan::call('iiko:sync_employees');
        return back();
    }
}
