<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginWebRequest;
use App\Models\City;
use App\Models\Country;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthenticatedSessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(AuthLoginWebRequest $request)
    {
        if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
            if(auth()->user()->type=='support'){
                return redirect()->route('offers.index');
            }
            elseif(auth()->user()->type == 'admin'){
                return redirect()->route('home');
            }
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }else{
            session()->flash('error', __('admin/app.phone_or_password_invalid'));
            return Redirect::back()->withErrors(['']);
        }
    }

    public function profile()
    {
        $countries=Country::all();
        $cities=City::all();
        return view('auth.profile',compact('countries','cities'));

    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
