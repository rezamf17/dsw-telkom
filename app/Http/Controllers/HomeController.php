<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Target;

class HomeController extends Controller
{
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
        $user_count = User::all()->count();
        $admin_count = User::where('role', 1)->count();
        $staff_count = User::where('role', 3)->count();
        $manager_count = User::where('role', 2)->count();
        $target_count = Target::all()->count();
        return view('home', compact('user_count', 'admin_count', 'staff_count', 'target_count', 'manager_count'));
    }
}
