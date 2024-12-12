<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class SettingsController extends Controller
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

    // SEO Section

    // Creates seo update view
    public function create_seo()
    {
        $data = DB::table('seos')->first();

        // dd($data);
        return view('admin.settings.seo', compact('data'));
    }

    // updates seo settings
    public function update_seo(Request $request)
    {
        $id = $request->id;

        $seo = DB::table('seos');

        $data = [];
        $data['meta_title'] = $request->meta_title;
        $data['meta_tag'] = $request->meta_tag;
        $data['meta_discription'] = $request->meta_discription;
        $data['meta_keyword'] = $request->meta_keyword;

        if ($id != 0) {
            $data['updated_at'] = now();
            $seo->where('id', $id)->update($data);
        } else {
            $data['created_at'] = now();
            $seo->insert($data);
        }

        $notification = ['message' => 'SEO updated!', 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    //SMTP Section

    // Creates smtp view
    public function create_smtp()
    {
        $data = DB::table('smtp')->first();

        // dd($data);
        return view('admin.settings.smtp', compact('data'));
    }

    // updates smtp settings
    public function update_smtp(Request $request)
    {
        $id = $request->id;

        $smtp = DB::table('smtp');

        $data = [];
        $data['mailer'] = $request->mailer;
        $data['host'] = $request->host;
        $data['port'] = $request->port;
        $data['username'] = $request->username;
        $data['password'] = $request->password;

        if ($id != 0) {
            $data['updated_at'] = now();
            $smtp->where('id', $id)->update($data);
        } else {
            $data['created_at'] = now();
            $smtp->insert($data);
        }

        $notification = ['message' => 'SMTP updated!', 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }

    //Website settings section

    // Creates settings view
    public function setting_view()
    {
        $data = DB::table('settings')->first();

        // dd($data);
        return view('admin.settings.settings', compact('data'));
    }

    // updates settings
    public function setting_update(Request $request)
    {
        $id = $request->id;

        $settings = DB::table('settings');
        $manager = new ImageManager(new Driver);

        $data = [];
        $data['phone_one'] = $request->phone_one;
        $data['phone_two'] = $request->phone_two;
        $data['main_mail'] = $request->main_mail;
        $data['support_mail'] = $request->support_mail;
        $data['address'] = $request->address;

        $data['facebook'] = $request->facebook;
        $data['instagram'] = $request->instagram;
        $data['twitter'] = $request->twitter;
        $data['linkedin'] = $request->linkedin;
        $data['youtube'] = $request->youtube;

        if ($request->logo) {
            $logo = $request->logo;
            $logo_name = 'brand_logo.'.$logo->getClientOriginalExtension();

            $image = $manager->read($logo);
            $image->resize(400, 400);
            $image->save('images/brand/'.$logo_name);

            $data['logo'] = 'images/brand/'.$logo_name;
        }

        if ($request->favicon) {
            $favicon = $request->favicon;
            $favicon_name = 'favicon.'.$favicon->getClientOriginalExtension();

            $image = $manager->read($favicon);
            $image->resize(400, 400);
            $image->save('images/brand/'.$favicon_name);

            $data['favicon'] = 'images/brand/'.$favicon_name;
        }

        if ($id != 0) {
            $data['updated_at'] = now();
            $settings->where('id', $id)->update($data);
        } else {
            $data['created_at'] = now();
            $settings->insert($data);
        }

        $notification = ['message' => 'Settings updated!', 'alert-type' => 'success'];

        return redirect()->back()->with($notification);
    }
}
