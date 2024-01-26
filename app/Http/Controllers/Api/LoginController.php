<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticateUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticateUsers;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'student'){
                return redirect()->route('student.dashboard');
            }else if(auth()->user()->type == 'programAdviser'){
                return redirect()->route('program-adviser.dashboard');
            }else{
                return redirect()->route('ojt-coordinator.dashboard');
            }
        }else{
            return redirect()->route('login')
                ->with('error','Email-Address And Password Are Wrong.');
        }
    }
}
