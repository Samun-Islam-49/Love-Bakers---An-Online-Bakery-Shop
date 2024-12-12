<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_id',
        'subcat_id',
        'name',
        'slug',
        'code',
        'tags',
        'sell_weight',
        'sell_price',
        'short_discription',
        'discription',
        'thumbnail',
        'images',
        'status',
        'sale_type',
        'sale_discount',
        'daily_needs',
        'delivery_type',
        'unit_type',
        'total_sells',
        'admin_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcat_id');
    }


    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
