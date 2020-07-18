<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Status;

use Illuminate\Http\Request;
use Illuminate\Http\Auth; // for authorization input and validation

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
        return view('home');
    }

    public function dashboard(){

        $userAdmin = User::where('role_id','1')->count();
        $userLeague = User::where('role_id','2')->count();
        $userTeam = User::where('role_id','3')->count();

        return view('dashboard.dashboard', ['userAdmin'=>$userAdmin, 'userTeam'=>$userTeam, 'userLeague'=>$userLeague] );
    }
}
