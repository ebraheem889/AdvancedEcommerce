<?php


namespace App\Categories;


use App\Http\Requests\Requests\subcategoriesRequest;
use App\Models\Category;
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class subcategory implements categories
{

    public function index($type)
    {
        $SubCategories = Category::orderBy('id', 'DESC')->where('parent_id', '!=', null)->get();
        return view('dashboard.subcategories.index', compact('SubCategories'));

    }

    public function create($type)
    {
        $categories = Category::all();
        return view('dashboard.subcategories.create', compact('categories'));

    }

    public function update($request, $id, $type)
    {

        if ($request->has('is_active')) {

            $request->request->add(['is_active' => 1]);
        } else {
            $request->request->add(['is_active' => 0]);
        }
        $category = Category::find($id);
        if (!$category)
            return redirect()->route('admin.categories', $type)->with(['success' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

        $request->validate([
            'slug' => 'required|string',
            'name' => 'required|string',
            'parent_id' => 'required|exists:categories,id',
        ]);
        $category->update([
            'slug' => $request->slug,
            'is_active' => $request->is_active,
            'parent_id' => $request->parent_id
        ]);

        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories', $type)->with('success', 'تم التعدبل بنجاج');

    }


    public function store($request, $type)
    {

        if ($request->has('is_active')) {

            $request->request->add(['is_active' => 1]);
        } else {
            $request->request->add(['is_active' => 0]);
        }

        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string|unique:categories,slug',
            'parent_id' => 'required|numeric'
        ]);

        DB::beginTransaction();
        $category = Category::create([
            'slug' => $request->slug,
            'is_active' => $request->is_active,
            'parent_id' => $request->parent_id
        ]);

        $category->name = $request->name;
        $category->save();

        DB::commit();
        return redirect()->route('admin.categories', $type)->with(['success' => 'تم أضافة القسم بنجاح']);


    }

    public function edit($id, $type)
    {

        $category = Category::find($id);
        $categories = Category::all();
        if (!$category)
            return redirect()->route('admin.categories', $type)->with(['error' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

        return view('dashboard.subcategories.edit', compact('category', 'categories'));


    }

}
