<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function create_view()
    {
        $cart = [];
        if(Auth::check()) {
            $user = DB::table('users')->where('id', Auth::id());
            $cart = json_decode($user->first()->cart, true);
        } else {
            $cart = session()->get('cart', []);
        }

        return view('frontend.cart', compact('cart'));
    }

    public function addCart(Request $request)
    {
        $cartItem = $request->input('cartItem');

        if(Auth::check()) {
            $user = DB::table('users')->where('id', Auth::id());

            $cart = json_decode($user->first()->cart, true);
            $cart[$cartItem['cart_id']] = $cartItem;

            $user->update(['cart' => json_encode($cart)]);
        } else {
            $cart = session()->get('cart', []);
            $cart[$cartItem['cart_id']] = $cartItem;
            session(['cart' => $cart]);
        }

        $cart_count = count($cart);

        $total = 0;
        foreach ($cart as $cart_item) {
            $total += intval($cart_item['total']);
        }

        return response()->json(['success' => true, 'curt_count' => $cart_count, 'total_price' => $total]);
    }

    public function loadCart()
    {
        // session()->forget('cart');
        $cart = [];
        if(Auth::check()) {
            $user = DB::table('users')->where('id', Auth::id());
            $cart = json_decode($user->first()->cart, true);
        } else {
            $cart = session()->get('cart', []);
        }

        $total = 0;
        foreach ($cart as $cart_item) {
            $total += intval($cart_item['total']);
        }

        return response()->json(['success' => true, 'data' => array_values($cart), 'total_price' => $total]);
    }

    public function removeCart(Request $request)
    {
        $itemId = $request->input('item_id');

        if(Auth::check()) {
            $user = DB::table('users')->where('id', Auth::id());

            $cart = json_decode($user->first()->cart, true);
            unset($cart[$itemId]);

            $user->update(['cart' => json_encode($cart)]);
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$itemId]);
            session()->put('cart', $cart);
        }

        $total = 0;
        foreach ($cart as $cart_item) {
            $total += intval($cart_item['total']);
        }

        return response()->json(['success' => true, 'curt_count' => count($cart), 'total_price' => $total]);
    }

    public function updateCart(Request $request)
    {
        if(Auth::check()) {
            $user = DB::table('users')->where('id', Auth::id());

            $cart = json_decode($user->first()->cart, true);
            $cartItem = $cart[$request->cart_id];

            $cartItem['quantity'] = $request->quantity;
            $cartItem['total'] = $request->total;

            $cart[$request->cart_id] = $cartItem;
            $user->update(['cart' => json_encode($cart)]);
        } else {
            $cart = session()->get('cart', []);
            $cartItem = $cart[$request->cart_id];

            $cartItem['quantity'] = $request->quantity;
            $cartItem['total'] = $request->total;

            $cart[$request->cart_id] = $cartItem;
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }
}
