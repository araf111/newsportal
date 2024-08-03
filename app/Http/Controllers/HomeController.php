<?php

namespace App\Http\Controllers;

use App\Models\UserPackage;
use App\Traits\General;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use IvanoMatteo\LaravelDeviceTracking\Models\Device;

class HomeController extends Controller
{
    use General;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->is_admin())
        {
            return redirect(route('admin.dashboard'));

        } else {
            return redirect(route('main.index'));
        }
    }

}
