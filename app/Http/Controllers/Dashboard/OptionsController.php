<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptionsRequest;
use App\Models\Option;
use App\Models\OptionTranslation;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use  App\Models\Attribute;
use Illuminate\Http\Request;

class OptionsController extends Controller
{
    public function index()
    {

        $options = Option::with(['attribute' => function ($attribute) {
            $attribute->select('id');
        }, 'product' => function ($product) {
            $product->select('id');
        }])->select('id', 'product_id', 'attribute_id', 'price')->paginate(10);

        return view('dashboard.options.index', compact('options'));
    } // end of index


    public function create()
    {


        $data = [];
        $data['products'] = Product::active()->select('id')->get();
        $data['attributes'] = Attribute::select('id')->get();

        return view('dashboard.options.create', $data);
    } // end of create

    public function store(OptionsRequest $request)
    {

        DB::beginTransaction();
        $option = Option::create([
            'attribute_id' => $request->attribute_id,
            'product_id' => $request->attribute_id,
            'price' => $request->price,
        ]);

        $option->name = $request->name;
        $option->save();
        DB::commit();
        return redirect()->route('admin.options');
    }
}
