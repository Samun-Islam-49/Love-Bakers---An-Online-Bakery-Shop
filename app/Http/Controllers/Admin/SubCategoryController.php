<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    // Fetches all data from Category table and send to view
    public function index()
    {
        $data = DB::table('subcategories')->leftJoin('categories', 'subcategories.cat_id', 'categories.id')->select('subcategories.*', 'categories.category_name')->get();

        $cat_data = DB::table('categories')->get();

        return view("admin.category.sub_category.index", compact('data', 'cat_data'));
    }


    // Saves a new category in Category table
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subcat_name' => 'required|unique:subcategories,subcat_name|max:32',

        ]);

        Subcategory::insert([
            'subcat_name' => $request->subcat_name,
            'subcat_slug' => Str::slug($request->subcat_name, '-'),
            'cat_id' => $request->cat_id,
            'created_at' => now()
        ]);

        $notification = array('message' => 'SubCategory inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    // Updates a exiting category in Category table
    public function update(Request $request)
    {
        $cat = Subcategory::find($request->id);

        $cat->update([
            'subcat_name' => $request->subcat_name,
            'subcat_slug' => Str::slug($request->subcat_name, '-'),
            'cat_id' => $request->cat_id,
            'updated_at' => now()
        ]);

        $notification = array('message' => 'SubCategory updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    // Fetch and send a category based on id
    public function fetch($id)
    {
        $data= Subcategory::find($id);
        return response()->json($data);
    }


    // Deletes a category from the category table
    public function delete($id)
    {
        $cat = Subcategory::find($id);
        $cat->delete();

        $notification = array('message' => 'SubCategory deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
