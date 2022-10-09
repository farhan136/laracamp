<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $checkouts = DB::table('checkouts')
                    ->leftJoin('camps', 'camps.id', '=', 'checkouts.id_camps')
                    ->select('camps.title', 'camps.created_at', 'camps.price', 'checkouts.is_paid')
                    ->where('checkouts.id_users', '=', Auth::id())
                    ->get();
        $data['checkouts'] = $checkouts;
        return view('user.dashboard', $data);
    }
}
