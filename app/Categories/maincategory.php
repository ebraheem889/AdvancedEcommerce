<?php


namespace App\Categories;


use App\Http\Requests\MainCategoriesRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class maincategory implements categories
{

    public  function index($type)
    {
        $Categories = Category::orderBy('id','DESC')->where('parent_id', '=', null)->get();
        return view('dashboard.categories.index', compact('Categories'));
    }

    public  function create($type)
    {
        return view('dashboard.categories.create');

    }

    public  function update($request, $id, $type)
    {
        try {

            if ($request->has('is_active')) {

                $request->request->add(['is_active' => 1]);
            } else {
                $request->request->add(['is_active' => 0]);
            }
            $category = Category::find($id);
            if (!$category)
                return redirect()->route('admin.categories', $type)->with(['success' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

            $request->validate([
                'slug' =>'required|string',
                'name' =>'required|string',
            ]);
            $category->update([
                'slug' => $request->slug,
                'is_active' => $request->is_active,
            ]);

            $category->name = $request->name;
            $category->save();
            return redirect()->route('admin.categories', $type)->with('success', 'تم التعدبل بنجاج');
        } catch (\Exception $exception) {


            return redirect()->back()->with('error', 'حدث خطأ ما يرجي المحاولة مرة أخري');
        }


    }


    public  function store( $request , $type)
    {

        if ($request->has('is_active')) {

            $request->request->add(['is_active' => 1]);
        } else {
            $request->request->add(['is_active' => 0]);
        }

        $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string'
        ]);

        DB::beginTransaction();
        $category = Category::create([
            'slug' => $request->slug,
            'is_active' => $request->is_active,
        ]);

        $category->name = $request->name;
        $category->save();

        DB::commit();
        return redirect()->route('admin.categories', $type)->with(['success' => 'تم أضافة القسم بنجاح']);
    }

    public  function edit($id, $type)
    {
        $category = Category::orderBy('id', 'DESC')->find($id);
        if (!$category)
            return redirect()->route('admin.categories', $type)->with(['error' => 'حدث خطأ ما برجاء المحاولة مرة أخري']);

        return view('dashboard.categories.edit', compact('category'));
    }


}
