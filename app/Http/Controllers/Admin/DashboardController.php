<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Checkout;
use Auth;
use Mail;
Use App\Mail\GeneralMail;


class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::all();
        $data['checkouts'] = $checkouts;
        // dd($data['checkouts']);
        return view('admin.dashboard', $data);
    }

    public function update(Request $request, Checkout $checkout)
    {
        $checkout->is_paid = 1;
        $checkout->save();

        //kirim email setelah update status
        Mail::to($checkout->User->email)->send(new GeneralMail($checkout, 'Update Status'));


        $request->session()->flash('success', 'Checkout with ID  '.$checkout->id.' has been updated');
        return redirect(route('admin.dashboard'));    
    }
}
