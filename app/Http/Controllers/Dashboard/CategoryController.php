<?php

namespace App\Http\Controllers\Dashboard;

use App\Categories\categories;
use App\Categories\cathandle;
use App\Categories\maincategory;
use App\Categories\subcategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MainCategoriesRequest;
use App\Http\Requests\subcategoriesRequest;
use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class CategoryController extends Controller
{

    public function index($type)
    {

        $categories = ['subcategory' => new subcategory(), 'maincategory' => new maincategory()];
        foreach ($categories as $key => $value) {
            if ($key == $type) {
                return cathandle::index($type, $value);
            }
        }

    }


    public function create($type)
    {
        $categories = ['subcategory' => new subcategory(), 'maincategory' => new maincategory()];
        foreach ($categories as $key => $value) {
            if ($key == $type) {
                return cathandle::create($type, $value);
            }
        }

    }


    public function store(Request $request, $type)
    {

        $categories = ['subcategory' => new subcategory(), 'maincategory' => new maincategory()];
        foreach ($categories as $key => $value) {
            if ($key == $type) {
                return cathandle::store($request, $type, $value);
            }
        }

    }

    public function edit($id, $type)
    {
        $categories = ['subcategory' => new subcategory(), 'maincategory' => new maincategory()];
        foreach ($categories as $key => $value) {
            if ($key == $type) {
                return cathandle::edit($id, $type, $value);
            }
        }
    }


    public function update(Request $request, $id, $type)
    {
        $categories = ['subcategory' => new subcategory(), 'maincategory' => new maincategory()];
        foreach ($categories as $key => $value) {
            if ($key == $type) {
                return cathandle::update($request, $id, $type, $value);
            }
        }

    }

    public function changeStatus($id, $type)
    {

        $category = Category::find($id);
        if (!$category)
            return redirect()->route('admin.categories', $type)->with(['error' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

        if ($category->is_active == 'غير مفعل') {
            $category->update([
                    'is_active' => 1
                ]
            );
            return redirect()->route('admin.categories', $type)->with('success', 'تم التفعيل بنجاج');

        } elseif ($category->is_active == 'مفعل') {

            $category->update([
                    'is_active' => 0
                ]
            );

            return redirect()->route('admin.categories', $type)->with('error', 'تم الغاء التفعيل ');
        }


    }


    public function destroy($id, $type)
    {
        $category = Category::find($id);
        if (!$category)
            return redirect()->route('admin.categories', $type)->with(['success' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);


        $category->delete();

        return redirect()->route('admin.categories', $type)->with('success', 'تم الحذف بنجاج');


    }
}
