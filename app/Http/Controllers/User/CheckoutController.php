<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Camp;
use App\Models\Checkout;
use Auth;
use Mail;
Use App\Mail\GeneralMail;

class CheckoutController extends Controller
{
    public function index()
    {
        
    }

    public function create(Request $request, $slug)
    {
        $camp = Camp::where('slug', $slug)->first();
        // dd($camp);
        $ischeckoutted = Checkout::where('id_users', Auth::id())->where('id_camps', $camp->id)->first();
        if(empty($ischeckoutted)){
            $data['camp'] = $camp;
            return view('checkout', $data);
        }else{
            $request->session()->flash('error', 'You already registered on '.$camp->title.' camp');
            return redirect(url('/user/dashboard'));
        }
    }

    public function success($slug)
    {
        return view('success_checkout');
    }

    public function store(Request $request, $id)
    {
        $expiredvalidation = date('Y-m', time());
        $validated = $request->validate([
            'occupation'=>'required|string',
            'card_number'=>'required|numeric|digits_between:8,16',
            'expired' => 'required|date|date_format:Y-m|after_or_equal:'.$expiredvalidation,
            'cvc' => 'required|numeric|digits:3',
        ]);
        // return $request->all();
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

        //kirim email setelah berhasil checkout
        Mail::to(Auth::user()->email)->send(new GeneralMail($checkout));

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
