<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Drivers\Gd\Driver;

class ProductController extends Controller
{

    // Auth for construtor
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    // New Product Create Page View
    public function create()
    {
        $cat = DB::table('categories')->get();
        return view('admin.product.create', compact('cat'));
    }


    // Autometically generates product code based on category or subcategory
    public function getProductCode(Request $request)
    {
        $cat_id = $request->category_id;
        $subcat_id = $request->subcategory_id;

        // Log::info('Category ID:', ['category_id' => $cat_id]);
        // Log::info('Subcategory ID:', ['subcategory_id' => $subcat_id]);

        $products = DB::table('products');

        // Retrieve products by subcategory or category if subcategory is not specified
        if ($subcat_id != 0) {
            $data = $products->where('subcat_id', $subcat_id);
        } else {
            $data = $products->where('cat_id', $cat_id)->whereNull('subcat_id');
        }

        // Order by code descending to get the latest product code
        $data = $data->orderBy('code', 'desc');
        $code = $data->first();

        // Log::info('Code data:', (array) $code);



        // Handle the case where there is no existing code in the table
        if ($code === null) {
            // Attempt to retrieve the subcategory name from the database
            $subcategory = DB::table('subcategories')
                ->where('id', $subcat_id)
                ->first();

            if ($subcategory) {
                // Format the subcategory name if found
                $formattedName = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $subcategory->subcat_name));
                $productCode = $formattedName . '-01';
            } else {
                // If subcategory not found, fallback to category name
                $category = DB::table('categories')
                    ->where('id', $cat_id)
                    ->first();

                if ($category) {
                    // Format the category name if found
                    $formattedName = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $category->category_name));
                    $productCode = $formattedName . '-01';
                } else {
                    // If neither subcategory nor category is found, use a generic default code
                    $productCode = 'error-new';
                }
            }
        } else {
            // Increment the code number after the dash
            if (preg_match('/(.*-)(\d+)$/', $code->code, $matches)) {
                $textPart = $matches[1];
                $numberPart = $matches[2];

                // Increment and zero-pad the numeric part
                $incrementedNumber = str_pad($numberPart + 1, strlen($numberPart), '0', STR_PAD_LEFT);

                $productCode = $textPart . $incrementedNumber;
            } else {
                // Fallback in case the format doesn't match (set default or append '-01')
                $productCode = 'error-gen';
            }
        }

        return response()->json(['product_code' => $productCode]);
    }


    // Store new product
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|unique:products,name',
            'product_code' => 'required|unique:products,code|max:25',
            'category' => 'required',
            'subcategory' => 'required',
            'product_image' => 'required',
        ]);

        $product = DB::table('products');
        $manager = new ImageManager(new Driver);

        $slug = Str::slug($request->product_name, '-');
        $pr_code = $request->product_code;

        $data = [
            'cat_id' => $request->category,
            'name' => $request->product_name,
            'slug' => $slug,
            'code' => $request->product_code,
            'tags' => $request->tags,
            'short_discription' => $request->short_description,
            'ingredients' => $request->ingredients,
            'discription' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
            'delivery_type' => $request->has('delivery_type') ? 1 : 0,
            'unit_type' => $request->has('unit_type') ? 1 : 0,
            'daily_needs' => $request->has('daily_needs') ? 1 : 0,
            'sale_type' => $request->sale_type,
            'sale_discount' => $request->sale_discount,
            'admin_id' => Auth::id(),
            'created_at' => now()
        ];

        if($request->subcategory != 0)
        {
            $data['subcat_id'] = $request->subcategory;
        }

        //Sell Weight and price
        $sell_weight = $request->input('sell_weight');
        $sell_price = $request->input('sell_price');

        if (count($sell_weight) !== count($sell_price)) {
            return redirect()->back()->withErrors(['price_weight' => 'Sell weight and sell price must have the same number of entries.']);
        }

        $data['sell_price'] = json_encode($sell_price);
        $data['sell_weight'] = json_encode($sell_weight);


        // Creating Folder
        $path = public_path('images/products/'.$pr_code);
        if (!File::exists($path)) {
            File::makeDirectory($path, 0755, true);
        }

        // single thumbnail
        if ($request->product_image) {
            $thumbnail = $request->product_image;
            $photoname = $pr_code . '.webp';

            $image = $manager->read($thumbnail);
            $image->resize(600, 600);
            $image = $image->toWebp(100);
            $image->save('images/products/'.$pr_code.'/'.$photoname);

            $data['thumbnail'] = $photoname;
        }

        // Additional images
        $images = array();
        if ($request->additional_images) {
            foreach ($request->file('additional_images') as $key => $image) {
                $imageName = uniqid() . '.webp';

                $image = $manager->read($image);
                $image->resize(600, 600);
                $image = $image->toWebp(100);
                $image->save('images/products/'.$pr_code.'/'.$imageName);

                array_push($images, $imageName);
            }

        }

        $data['images'] = json_encode($images);

        $product->insert($data);

        $notification = ['message' => 'New Product Added!', 'alert-type' => 'success'];
        return redirect()->route('product.index')->with($notification);
    }


    // Product Management Page View
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $imgurl = '/images/products/';

            $query=DB::table('products')
                ->leftJoin('categories', 'products.cat_id', 'categories.id')
                ->leftJoin('subcategories', 'products.subcat_id', 'subcategories.id');

            // Category Filter
            if ($request->cat_id != -1) {
                $query->where('products.cat_id',   $request->cat_id);
            }

            // Status filter
            if ($request->status != -1) {
                 $query->where('products.status', $request->status);
            }

            // Daily Needs filter
            if ($request->daily_needs != -1) {
                 $query->where('products.daily_needs', $request->daily_needs);
            }

            // Delivery Type filter
            if ($request->delivery_type != -1) {
                 $query->where('products.delivery_type', operator: $request->delivery_type);
            }

            $data = $query->select('products.*', 'categories.category_name', 'subcategories.subcat_name')
                ->get();


            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('thumbnail', function($row) use($imgurl){
                    return '<img src="'.$imgurl.$row->code.'/'.$row->thumbnail.'" height="30" width="30">';
                })
                ->editColumn('status', function($row){
                    $statusIcon = $row->status == 1
                        ? '<i class="fa-solid fa-circle-check btn btn-success status-toggle" data-id="'.$row->id.'" data-type="status" data-status="1"></i>'
                        : '<i class="fa-solid fa-circle-xmark btn btn-danger status-toggle" data-id="'.$row->id.'" data-type="status" data-status="0"></i>';
                    return $statusIcon;
                })
                ->editColumn('daily_needs', function($row){
                    $dailyNeedsIcon = $row->daily_needs == 1
                        ? '<i class="fa-solid fa-circle-check btn btn-success status-toggle" data-id="'.$row->id.'" data-type="daily_needs" data-status="1"></i>'
                        : '<i class="fa-solid fa-circle-xmark btn btn-danger status-toggle" data-id="'.$row->id.'" data-type="daily_needs" data-status="0"></i>';
                    return $dailyNeedsIcon;
                })
                ->editColumn('delivery_type', function($row){
                    $deliveryTypeIcon = $row->delivery_type == 1
                        ? '<i class="fa-solid fa-gauge-high btn btn-success status-toggle" data-id="'.$row->id.'" data-type="delivery_type" data-status="1"></i>'
                        : '<i class="fa-solid fa-gauge btn btn-primary status-toggle" data-id="'.$row->id.'" data-type="delivery_type" data-status="0"></i>';
                    return $deliveryTypeIcon;
                })
                ->editColumn('sell_price', function($row){
                    $arr = json_decode($row->sell_price, true);
                    $options = '';

                    // Loop through each sell_price item to generate options
                    foreach($arr as $item) {
                        $options .= '<option>' . htmlspecialchars($item) . '</option>';
                    }

                    // Wrap options in a select element
                    $format = '<select>' . $options . '</select>';

                    return $format;
                })
                ->editColumn('sell_weight', function($row){
                    $arr = json_decode($row->sell_weight, true);
                    $options = '';

                    // Loop through each sell_weight item to generate options
                    foreach($arr as $item) {
                        $options .= '<option>' . htmlspecialchars($item) . '</option>';
                    }

                    // Wrap options in a select element
                    $format = '<select>' . $options . '</select>';

                    return $format;
                })
                ->addColumn('action', function($row) {
                    $actionbtn = '
                    <a href="'.route('product.edit', ['id' => $row->id]).'" class="btn btn-info btn-sm edit"><i class="fas fa-edit"></i></a>
                    <a href="#" class="btn btn-primary btn-sm view"><i class="fas fa-eye"></i></a>
                    <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-danger btn-sm delete"><i class="fas fa-trash"></i></a>';

                    return $actionbtn;
                })

                ->rawColumns(['action', 'category_name', 'subcat_name', 'status', 'thumbnail', 'daily_needs', 'delivery_type','sell_price','sell_weight'])
                ->make(true);
        }

        $category = Category::get();
        return view('admin.product.index' , compact('category'));
    }


    //Fetch Subcategories
    public function getSubcategories($id)
    {
        $subcategories = DB::table('subcategories')->where('cat_id', $id)->get();
        return response()->json($subcategories);
    }


    // Toggles status, daily needs and delivery type
    public function toggleStatus(Request $request)
    {
        $product = Product::find($request->id);
        $message = '';
        $on = 'Active';
        $off = 'Inactive';

        if ($product) {
            switch ($request->type) {
                case 'status':
                    $product->status = $request->status;
                    $message = 'Status';
                    break;
                case 'daily_needs':
                    $product->daily_needs = $request->status;
                    $message = 'Daily Needs';
                    break;
                case 'delivery_type':
                    $product->delivery_type = $request->status;
                    $message = 'Delivery Type';
                    $on = 'Fast';
                    $off = 'Normal';
                    break;
            }

            $product->save();

            return response()->json([
                'success' => true,
                'alert_type' => 'success',
                'message' => $message . ' of '.$product->name.' updated to ' . ($request->status ? $on : $off)
            ]);
        }

        return response()->json([
            'success' => false,
            'alert_type' => 'error',
            'message' => 'Failed to update product ' . $message
        ]);
    }


    // Deletes the product
    public function delete($id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->delete();

            $folderPath = public_path('images/products/'.$product->code);

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            return response()->json([
                'success' => true,
                'alert_type' => 'success',
                'message' => 'Product deleted successfully.'
            ]);
        }

        return response()->json([
            'success' => false,
            'alert_type' => 'error',
            'message' => 'Product not found or failed to delete.'
        ]);
    }


    // Product Edit View
    public function edit($id)
    {
        $data = DB::table('products')->where('id', $id)->first();
        $cat = DB::table('categories')->get();
        $sub_cat = DB::table('subcategories')->where('cat_id', $data->cat_id)->get();
        return view('admin.product.edit', compact('data', 'cat', 'sub_cat'));
    }


    // Update product
    public function update(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'subcategory' => 'required',
        ]);

        $product = DB::table('products');
        $manager = new ImageManager(new Driver);

        $slug = Str::slug($request->product_name, '-');
        $pr_code = $request->product_code;

        $data = [
            'cat_id' => $request->category,
            'name' => $request->product_name,
            'slug' => $slug,
            'code' => $request->product_code,
            'tags' => $request->tags,
            'short_discription' => $request->short_description,
            'ingredients' => $request->ingredients,
            'discription' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
            'delivery_type' => $request->has('delivery_type') ? 1 : 0,
            'unit_type' => $request->has('unit_type') ? 1 : 0,
            'daily_needs' => $request->has('daily_needs') ? 1 : 0,
            'sale_type' => $request->sale_type,
            'sale_discount' => $request->sale_discount,
            'admin_id' => Auth::id(),
            'updated_at' => now()
        ];

        if($request->subcategory != 0)
        {
            $data['subcat_id'] = $request->subcategory;
        }

        //Sell Weight and price
        $sell_weight = $request->input('sell_weight');
        $sell_price = $request->input('sell_price');

        if (count($sell_weight) !== count($sell_price)) {
            return redirect()->back()->withErrors(['price_weight' => 'Sell weight and sell price must have the same number of entries.']);
        }

        $data['sell_price'] = json_encode($sell_price);
        $data['sell_weight'] = json_encode($sell_weight);


        if(!$request->has( 'product_image') && !$request->has('prev_thumbnail'))
        {
            return redirect()->back()->withErrors(['product_image' => 'Product image is required.']);
        }


        $prev_data = $product->where('id', $request->product_id)->first();
        $images = json_decode($prev_data->images, true);

        if($request->prev_code != $pr_code)
        {
            if(!$request->has( 'product_image'))
            {
                return redirect()->back()->withErrors(['product_image' => 'Product code is changed, upload new images.']);
            }

            // Creating Folder
            $path = public_path('images/products/'.$pr_code);
            if (!File::exists($path)) {
                File::makeDirectory($path, 0755, true);
            }

            $folderPath = public_path('images/products/' . $request->prev_code);

            if (File::exists($folderPath)) {
                File::deleteDirectory($folderPath);
            }

            $images = [];
        }
        else
        {
            if ($request->has('delete_files')) {
                foreach($request->input('delete_files') as $file) {
                    $filePath = public_path('images/products/' . $pr_code . '/' . $file);

                    if (File::exists($filePath)) {
                        File::delete($filePath);
                    }
                }

                $images = array_values(array_diff($images, $request->delete_files));
            }
        }


        // single thumbnail
        if ($request->product_image) {
            $thumbnail = $request->product_image;
            $photoname = $pr_code . '.webp';

            $image = $manager->read($thumbnail);
            $image->resize(600, 600);
            $image = $image->toWebp(100);
            $image->save('images/products/'.$pr_code.'/'.$photoname);

            $data['thumbnail'] = $photoname;
        }


        // Additional images
        if ($request->additional_images) {
            foreach ($request->file('additional_images') as $key => $image) {
                $imageName = uniqid() . '.webp';

                $image = $manager->read($image);
                $image->resize(600, 600);
                $image = $image->toWebp(100);
                $image->save('images/products/'.$pr_code.'/'.$imageName);

                array_push($images, $imageName);
            }
        }

        $data['images'] = json_encode($images);


        $product->where('id', $request->product_id)->update($data);

        $notification = ['message' => 'Product Updated!', 'alert-type' => 'success'];
        return redirect()->route('product.index')->with($notification);
    }
}
