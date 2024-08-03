<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['title'] = 'Dashboard';
        $data['total_admins'] = User::whereRole(1)->count();
        $data['total_instructors'] = User::whereRole(2)->count();
        $data['total_students'] = User::whereNotIn('role', [1])->count();
        return view('admin.dashboard', $data);
    }

}
