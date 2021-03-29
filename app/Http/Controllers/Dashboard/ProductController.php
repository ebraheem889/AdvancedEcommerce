<?php

namespace App\Http\Controllers\Dashboard;

use App\Categories\categories;
use App\Http\Controllers\Controller;
use App\Http\Requests\GeneralProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Images;
use App\Models\Product;
use App\Models\Tag;
use App\Rules\qtyValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use  App\Http\Requests\ProductImagesRequest;
use League\CommonMark\Inline\Element\Image;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::select('id', 'slug', 'price', 'is_active')->paginate(10);

        return view('dashboard.products.general.index', compact('products'));
    } // end of  index

    public function getprice($id)
    {

        return view('dashboard.products.price.create')->with('id', $id);
    } // end of get price

    public function saveProductPrice(Request $request)
    {


        try {


            $request->validate(
                [
                    'price' => 'required|min:0|numeric',
                    'product_id' => 'required|exists:products,id',
                    'special_price' => 'nullable|numeric',
                    'special_price_type' => 'required_with:special_price|in:fixed,percent',
                    'special_price_start' => 'required_with:special_price|date_format:Y-m-d',
                    'special_price_end' => 'required_with:special_price|date_format:Y-m-d'
                ]
            );

            // need to fix special price end and start in case there is no special price

            Product::where('id', $request->product_id)->update($request->except('_token', 'product_id'));
            return redirect()->route('admin.products')->with('success', 'تم التحديث بنحاج');
        } catch (\Exception $exception) {

            return redirect()->route('admin.products')->with(['error' => 'حدث حطأ ما برجاء المحاولة مرة أخري']);
        }
    } // end of saveProductPrice

    public function getstock($id)
    {

        return view('dashboard.products.stock.create')->with('id', $id);
    } // end of getStock

    public function savestock(Request $request)
    {


        $request->validate(
            [
                'sku' => 'required|min:3|max:10',
                'product_id' => 'required|exists:products,id',
                'manage_stock' => 'required|in:0,1',
                'in_stock' => 'required|in:0,1',
                //                  'qty'=>'required_if:manage_stock,==,1'
                'qty' => [new qtyValidation($request->manage_stock)]
            ]
        );


        Product::where('id', $request->product_id)->update($request->except('_token', 'product_id'));
        return redirect()->route('admin.products')->with('success', 'تم التحديث بنحاج');
    } // ednd of save stock


    public function addImages($product_id)
    {
        return view('dashboard.products.images.create')->with('id',$product_id);
    }

    //to save images to folder only
    public function saveProductImages(Request $request)
    {
        $file = $request->file('dzfile');
        $filename = uploadImage2('public', $file);
        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function saveProductImagesDB(ProductImagesRequest $request)
    {

             // save dropzone images
             if ($request->has('document') && count($request->document) > 0) {
                 foreach ($request->document as $image) {
                     Images::create([
                         'product_id' => $request->product_id,
                         'photo' => $image,
                     ]);
                 }
             }

             return redirect()->route('admin.products')->with(['success' => 'تم التحديث بنجاح']);

    }
    public function create()
    {

        $data = [];
        $data['brands'] = Brand::all();
        $data['categories'] = Category::all();
        $data['tags'] = Tag::all();
        return view('dashboard.products.general.create', compact('data'));
    } // end of create

    public function store(GeneralProductRequest $request)
    {

//        try {

            if ($request->has('is_active')) {

                $request->request->add(['is_active' => 1]);
            } else {
                $request->request->add(['is_active' => 0]);
            }

            DB::beginTransaction();

            $product = Product::create([
                'brand_id' => $request->brand_id,
                'slug' => $request->slug,
                'is_active' => $request->is_active,

            ]);

            $product->name = $request->name;
            $product->description = $request->description;
            $product->short_description = $request->short_description;
            $product->save();

            $product->categories()->attach($request->categories);
            $product->tags()->attach($request->tags);

            DB::commit();

            return redirect()->route('admin.products')->with(['success' => 'تم أضافة الماركة بنجاح']);
//        } catch (\Exception $exception) {
//
//            DB::rollBack();
//            return redirect()->route('admin.products')->with(['error' => 'حدث حطأ ما برجاء المحاولة مرة أخري']);
//        }
    } //end of store
}
