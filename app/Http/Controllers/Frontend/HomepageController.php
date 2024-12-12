<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{

    // Creates Homepage view
    public function index()
    {
        $daily_needs = DB::table('products')->where('daily_needs', true)->get();

        // Retrieves one product from each subcat (retrives the min ID)
        $cakes = DB::table('products')->select('products.*')->where('cat_id', 3)
            ->whereIn('id', function($query) {
                $query->select(DB::raw('MIN(id)'))
                    ->from('products')->where('cat_id', 3)->groupBy('subcat_id');
            })
            ->orderBy('created_at', 'desc')->get();

        $cookies = DB::table('products')->where('cat_id', 6)
            ->orderBy('created_at', 'desc')->get();

        $ex_cake = DB::table('products')->where('cat_id', 18)
            ->where('subcat_id', 18)
            ->orderBy('created_at', 'desc')->get();

        $dessert = DB::table('products')->where('cat_id', 7)
            ->where('status', true)->take(3)->get();

        $tart = DB::table('products')->where('cat_id', 8)
            ->where('status', true)->take(3)->get();

        $savory = DB::table('products')->where('cat_id', 9)
            ->where('status', true)->take(3)->get();


        // dd($cookies);

        return view('frontend.index',
           compact('daily_needs',
           'cakes',
            'cookies',
            'ex_cake',
            'dessert',
            'tart',
            'savory'
        ));
    }

}
