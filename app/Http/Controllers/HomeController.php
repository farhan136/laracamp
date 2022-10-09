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
        switch (Auth::user()->is_admin) {
            case 1:
                return redirect(url('admin/dashboard'));
                break;
            
            default:
                return redirect(url('user/dashboard'));
                break;
        }
    }
}
