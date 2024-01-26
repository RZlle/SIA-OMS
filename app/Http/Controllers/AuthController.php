<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request, $role, $dashboardRoute)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $account = Account::where('email', $request->email)->first();

        if ($account && $account->accountType === $role) {
            if (Auth()->attempt($credentials)) {
                return redirect()->route($dashboardRoute);
            }
        }

        return back()->withErrors([
            'credentials' => 'Invalid account name or password',
        ]);
    }

    public function studentLoginPOST(Request $request)
    {
        return $this->authenticate($request, 'S', 'studentDashboard');
    }

    public function adviserLoginPOST(Request $request)
    {
        return $this->authenticate($request, 'A', 'program-adviser');
    }

    public function coordinatorLoginPOST(Request $request)
    {
        return $this->authenticate($request, 'C', 'ojt-coordinator');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('studentDashboard');
    }
}
