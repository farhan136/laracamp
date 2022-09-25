<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;
use Auth;

class HomeController extends Controller
{
    public function dashboard()
    {
        $checkouts = DB::table('checkouts')
                    ->leftJoin('camps', 'camps.id', '=', 'checkouts.id_camps')
                    ->select('camps.title', 'camps.created_at', 'camps.price', 'checkouts.is_paid')
                    ->where('checkouts.id_users', '=', Auth::id())
                    ->get();
        // dd($checkouts);
        $data['checkouts'] = $checkouts;
        // Checkout::with('camp')
        return view('user.dashboard', $data);
    }
}
