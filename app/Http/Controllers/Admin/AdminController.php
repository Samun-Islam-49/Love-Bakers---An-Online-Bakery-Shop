<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $users = DB::table('users')->get();
        $products = DB::table('products')->get();
        $orders = DB::table('orders')->get();
        $comp = DB::table('orders')->where( 'status', 1)->get();
        $seo = DB::table('seos')->where('id', 1)->first();
        $cat = DB::table('categories')->get();
        $subcat = DB::table('subcategories')->get();

        $chart = DB::table('products')
        ->select(DB::raw('categories.category_name as label'), DB::raw('COUNT(products.id) as count'))
        ->leftJoin('categories', 'products.cat_id', '=', 'categories.id')
        ->groupBy('products.cat_id', 'categories.category_name')
        ->get();


        return view('admin.home', compact('users', 'products', 'orders', 'comp', 'seo', 'cat', 'subcat', 'chart'));
    }


    /**
     * Handle an pasword change request.
     */
  public function update_password(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|different:old_password',
            'confirm_password' => 'required|same:new_password',
        ]);

        if (Auth::guard('admin')->attempt([
            'email' => Auth::guard('admin')->user()->email,
            'password' => $request->old_password
        ])) {
            $user = Admin::findOrFail(Auth::guard('admin')->id());
            $user->password = Hash::make($request->new_password);
            $user->save();
            Auth::guard('admin')->logout();

            $notification = array('message' => 'Your password has been changed!', 'alert-type' => 'success');
            return redirect('/admin/login')->with($notification);
        } else {
            return redirect()->back()->withErrors(['old_password' => 'The old password is incorrect.']);
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array('message' => 'You are logged out!', 'alert-type' => 'success');

        return redirect('/admin/login')->with($notification);
    }


    /**
     * Display the change password view.
     */
    public function change_password()
    {
        return view('admin.auth.password-change');
    }
}

