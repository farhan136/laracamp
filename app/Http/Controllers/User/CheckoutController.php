<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Camp;
use App\Models\Checkout;
use Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        
    }

    public function create($slug)
    {
        $camp = Camp::where('slug', $slug)->first();
        $data['camp'] = $camp;
        return view('checkout', $data);
    }

    public function success($slug)
    {
        return view('success_checkout');
    }

    public function store(Request $request, $id)
    {
        $insert = array(
            'id_users'=>Auth::id(),
            'id_camps'=>$id,
            'expired'=>date('Y-m-t', strtotime($request->expired)),
            'cvc'=>$request->cvc,
            'is_paid'=>1,
            'card_number'=>$request->card_number,
        );
        //update user data
        $user = Auth::user();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->ocupation = $request->occupation;
        $user->save();

        //store insert data to checkout table
        $checkout = Checkout::create($insert);

        return redirect(url('/success_checkout'));
        // dd($checkout);
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
