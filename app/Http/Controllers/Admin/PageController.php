<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PageController extends Controller
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


    public function index()
    {
        $data = DB::table('pages')->get();
        return view('admin.settings.page_management.index', compact('data'));
    }


    public function create()
    {
        return view('admin.settings.page_management.create');
    }

    public function edit($id)
    {
        $data = DB::table('pages')->where('id', $id)->first();
        // dd($data);
        return view('admin.settings.page_management.edit', compact('data'));
    }

    public function store(Request $request)
    {
        $data = [];
        $data['page_name'] = $request->page_name;
        $data['page_title'] = $request->page_title;
        $data['page_position'] = $request->page_position;
        $data['page_description'] = $request->page_description;
        $data['page_slug'] = Str::slug($request->page_name.' '.round(microtime(true) * 1000), '-');

        $data['created_at'] = now();

        DB::table('pages')->insert($data);

        $notification = array('message' => 'Page Created!', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }


    public function delete($id)
    {
        DB::table('pages')->delete($id);

        $notification = array('message' => 'Page Deleted!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    public function update(Request $request)
    {
        $data = [];
        $data['page_name'] = $request->page_name;
        $data['page_title'] = $request->page_title;
        $data['page_position'] = $request->page_position;
        $data['page_description'] = $request->page_description;
        $data['page_slug'] = Str::slug($request->page_name.' '.round(microtime(true) * 1000), '-');

        $data['updated_at'] = now();

        DB::table('pages')->where('id', $request->page_id)->update($data);

        $notification = array('message' => 'Page Updated!', 'alert-type' => 'success');
        return redirect()->route('page.index')->with($notification);
    }
}
