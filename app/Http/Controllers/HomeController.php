<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
        $companies = DB::table('company_user')->where('user_id',\auth()->id())
            ->join('companies', 'companies.id', '=', 'company_id')
            ->pluck('trading_name','companies.id');
        return view('home', compact('companies'));
    }
}
