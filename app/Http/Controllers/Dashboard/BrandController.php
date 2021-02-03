<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{

    public function index()
    {
        $Brands = Brand::orderBy('id', 'DESC')->paginate(10)->all();
        return view('dashboard.brands.index', compact('Brands'));
    }

    public function create()
    {
        return view('dashboard.brands.create');

    }

    public function update(Request $request, $id)
    {


        if ($request->has('is_active')) {

            $request->request->add(['is_active' => 1]);
        } else {
            $request->request->add(['is_active' => 0]);
        }
        $Brand = Brand::find($id);
        if (!$Brand)
            return redirect()->route('admin.brands')->with(['success' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

        $request->validate([
            'name' => 'required|string',
            'photo' => 'required_without:id|mimes:jpg,png,jpeg',
        ]);
        DB::beginTransaction();
        if ($request->has('photo')) {
            $filename = uploadImage($request->photo);
            Brand::where('id', $id)->update(
                [
                    'photo' => $filename
                ]
            );
            // to be done  Storage::delete($Brand->file);
        }
        $Brand->update([$request->except('_token','id','photo')]);

        //save translations
        $Brand->name = $request->name;
        $Brand->save();
        DB::commit();

        return redirect()->route('admin.brands')->with('success', 'تم التعدبل بنجاج');


    }

    function store(Request $request)
    {

        if ($request->has('is_active')) {

            $request->request->add(['is_active' => 1]);
        } else {
            $request->request->add(['is_active' => 0]);
        }

        $request->validate([
            'name' => 'required|string',

        ]);
        $path = "";
        if ($request->has('photo')) {
            $path = uploadImage($request->photo);

        }

        $Brand = Brand::create([
            'is_active' => $request->is_active,
            'photo' => $path
        ]);

        $Brand->name = $request->name;
        $Brand->save();

        return redirect()->route('admin.brands')->with(['success' => 'تم أضافة الماركة بنجاح']);
    }

    public
    function edit(Request $request, $id)
    {
        $Brand = Brand::find($id);
        if (!$Brand)
            return redirect()->route('admin.brands')->with(['error' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

        return view('dashboard.brands.edit', compact('Brand'));
    }


    public
    function destroy($id)
    {

        try {

            $Brand = Brand::orderBy('id', 'DESC')->find($id);
            if (!$Brand)
                return redirect()->route('admin.brands')->with(['error' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

            $Brand->delete();


            return redirect()->route('admin.brands')->with('success', 'تم الحذف بنجاج');
        } catch (\Exception $exception) {


            return redirect()->back()->with('error', 'حدث خطأ ما يرجي المحاولة مرة أخري');
        }

    }


}
