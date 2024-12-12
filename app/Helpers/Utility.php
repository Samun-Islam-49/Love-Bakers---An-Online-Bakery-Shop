<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Utility
{

    public static function calculateWeight($weight)
    {
        return ($weight >= 1000) ? $weight/1000 : $weight;
    }

    public static function calculateWeightString($weight)
    {
        return ($weight >= 1000) ? ($weight/1000).' kg' : $weight.' gm';
    }

    public static function view_counter()
    {
        $seos = DB::table('seos')->where('id', 1);
        $seo = $seos->first();

        $view = $seo->views + 1;

        $seos->update(['views' => $view]);
    }
}
