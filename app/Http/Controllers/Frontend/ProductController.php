<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Create the product page view
    public function index($code)
    {

        $data = DB::table('products')->where('code', $code)->first();
        $cat = DB::table('categories')->where('id', $data->cat_id)->first();
        $related = DB::table('products')->where('cat_id', $data->cat_id);

        $subcat = [];
        if ($data->subcat_id)
        {
            $subcat = DB::table('subcategories')->where('id', $data->subcat_id)->first();
            $related->where('subcat_id', $data->subcat_id);
        }
        $related = $related->get();

        return view('frontend.product', compact('data', 'cat', 'subcat', 'related'));
    }


    // Create all product view
    public function all_index($slug = null)
    {
        $meta = [];
        $products = DB::table('products');

        $subcat = DB::table('subcategories')->where('subcat_slug', $slug)->first();

        if($subcat) {
            $meta = [
                'name' => $subcat->subcat_name,
                'slug' => $subcat->subcat_slug,
                'cat_id' => $subcat->cat_id,
                'sub_id' => $subcat->id
            ];

            $products->where('subcat_id', $subcat->id);

        } else if ($slug == 'daily-needs') {
            $meta = [
                'name' => 'Daily Needs',
                'slug' => $slug,
                'cat_id' => 0
            ];

            $products->where('daily_needs', true);

        }  else if ($slug == 'all') {
            $meta = [
                'name' => 'All Products',
                'slug' => $slug,
                'cat_id' => 0
            ];

            $products->get();

        } else if (preg_match('/^search-(.+)$/', $slug, $matches)) {
            $search = $matches[1];
            $meta = [
                'name' => 'Seacrh',
                'slug' => $slug,
                'cat_id' => 0
            ];

            $products->where('slug', 'like', '%' . $search . '%')->get();
        } else {
            $cat = DB::table('categories')->where('category_slug', $slug)->first();

            $meta = [
                'name' => $cat->category_name,
                'slug' => $cat->category_slug,
                'cat_id' => $cat->id
            ];

            $products->where('cat_id', $cat->id);
        }

        $cats = DB::table('categories')->get();
        $subcats = DB::table('subcategories')->get();
        $products = $products->paginate(16);

        return view('frontend.all_products' , compact('products', 'meta', 'cats', 'subcats'));
    }
}
