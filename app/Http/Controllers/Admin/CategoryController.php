<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
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
        $data = Category::all();
        return view("admin.category.main_category.index", compact('data'));
    }


    // Saves a new category in Category table
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:categories,category_name|max:32',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
            'created_at' => now()
        ]);

        $notification = array('message' => 'Category inserted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    // Updates a exiting category in Category table
    public function update(Request $request)
    {
        $cat = Category::find($request->id);

        $cat->update([
            'category_name' => $request->category_name,
            'category_slug' => Str::slug($request->category_name, '-'),
            'updated_at' => now()
        ]);

        $notification = array('message' => 'Category updated!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    // Fetch and send a category based on id
    public function fetch($id)
    {
        $data= Category::find($id);
        return response()->json($data);
    }


    // Deletes a category from the category table
    public function delete($id)
    {
        $cat = Category::find($id);
        $cat->delete();

        $notification = array('message' => 'Category deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}
