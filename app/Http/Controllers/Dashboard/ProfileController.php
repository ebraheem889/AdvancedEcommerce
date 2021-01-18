<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function editprofile()
    {

        $admin = Admin::find(auth('admins')->user()->id);
        return view('dashboard.profile.edit', compact('admin'));

    } // end of edit profile

    public function Updateprofile(AdminProfileRequest $request, $id)
    {
        try {

            $admin = Admin::find($id);

            $request_data = $request->except(['password']);
            $request_data['password'] = bcrypt($request->password);

            DB::beginTransaction();

            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            if (isset($request->password)){
                $admin->update([
                    'password' => $request_data['password']
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'تم التعديل بنجاح');
        } catch (\Exception $exception) {

            DB::rollBack();
            return redirect()->back()->with('error', 'حدث خطأ ما يرجي المحاولة مرة أخري');
        }

    }// edn of update Profile
}
