<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Auth;
use Mail;
Use App\Mail\AfterRegister;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback =Socialite::driver('google')->stateless()->user();
        $data = [
            'name'=>$callback->getName(),
            'email'=>$callback->getEmail(),
            'photo'=>$callback->getAvatar(),
            'email_verified_at'=>date('Y-m-d H:i:s', time())
        ];
        // $user = User::firstOrCreate(['email'=>$data['email']], $data); //firstOrCreate untuk cek apakah di table sudah ada email yang sama, jika belum maka insert data ke table, jia sudah maka tidak perlu

        $user = User::where('email', '=', $data['email'])->first(); //cek apakah ada user yang memakai email itu atau engga
        if(!$user){
            $user = User::create($data);
            Mail::to($user->email)->send(new AfterRegister($user));
        }
        Auth::login($user, true);

        return redirect(route('welcome'));

    }
}
