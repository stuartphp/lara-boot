<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

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
        $companies = DB::table('company_user')->where('company_user.user_id',auth()->id())
            ->join('companies', 'companies.id', '=', 'company_id')
            ->pluck('trading_name','companies.id');
        return view('home', compact('companies'));
    }
    public function selection($id)
    {

        $company = DB::table('companies')
            ->join('company_setups', 'company_id', '=', 'companies.id')
            ->where('company_id', $id)
            ->first();
        session()->put('company_id', $id);
        session()->put('trading_name', $company->trading_name);
        session()->put('financial_year', $company->financial_year);
        session()->put('financial_period', $company->financial_period);

        // Get permissions
        $roles = DB::table('role_user')->where('user_id', auth()->id())
                ->join('roles', 'roles.id', '=', 'role_user.role_id')
        ->get();
        $permissions = [];
        foreach($roles as $role)
        {
            $perm = DB::table('permission_role')->where('role_id', $role->role_id)
                ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
                ->get();
            foreach($perm as $p)
            {
                $permissions[]=$p->title;
            }
        }

        session()->put('grant',$permissions);

        return redirect('dashboard');
    }
}
