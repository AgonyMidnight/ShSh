<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function EnterUser(Request $request) {
        $request->validate([
            'email' => 'email|max:50|required',
            'password' => 'min:8|required|max:20'
        ]);
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            return redirect('/');
        }
        else {
            return redirect()->back()->with('error', 'Incorrect login or password');
        }
    }

    public function OutUser() {
        Auth::logout();
        return redirect('/');
    }

    public function Registration (Request $request) {
        //dd($request->all());
        $request->validate([
            'fname' => 'max:35|required',
            'sname' => 'max:35|required',
            'email' => 'email|max:50|unique:users|required',
            'login' => 'max:50|unique:users|required',
            'password' => 'min:8|required|confirmed|max:20'
        ]);
        try {
           /* $user = User::create([
                'fname' => $request->fname,
                'sname' => $request->sname,
                'email' => $request->email,
                'login' => $request->login,
                'password' => Hash::make($request->password)
            ]);*/
            $user = new User();
            $user->fname = $request->fname;
            $user->sname = $request->sname;
            $user->email = $request->email;
            $user->login = $request->login;
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::login($user);
            event(new Registered($user));
            return redirect('email/verify');
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

    }
}
