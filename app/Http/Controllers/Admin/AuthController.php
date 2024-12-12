<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\Auth\AdminLoginRequest;

class AuthController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create_register()
    {
        if(Auth::guard('admin')->check())
        {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     */
    public function store_register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Admin::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($admin));

        Auth::guard('admin')->login($admin);

        return redirect(route('admin.dashboard', absolute: false));
    }



    /**
     * Display the login view.
     */
    public function create_login()
    {
        if(Auth::guard('admin')->check())
        {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }


    /**
     * Handle an incoming authentication request.
     */
    public function store_login(AdminLoginRequest $request)
    {
        $request->authenticate();
        $request->session()->regenerate();

        $notification = array('message' => 'You are logged in!', 'alert-type' => 'success');
        return redirect()->intended(route('admin.dashboard'))->with($notification);
    }
}

