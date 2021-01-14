<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{

    public function editShippingMethods($type)
    {


        if ($type === 'free') {

            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();
        } elseif ($type === 'outer') {
            $shippingMethod = Setting::where('key', 'outer_label')->first();

        } elseif ($type === 'inner') {
            $shippingMethod = Setting::where('key', 'local_label')->first();
        }//end of if

        return view('dashboard.settings.shippings.edit' ,compact('shippingMethod'));

    }// end of shipping method


    public function UpdateShippingMethods( ShippingsRequest $request, $id){

        try {
            $setting = Setting::find($id);
            DB::beginTransaction();
            $setting->update([
                'plain_value' => $request->plain_value,
            ]);
            $setting->translations[0]->value = $request->value;
            $setting->save();
            DB::commit();
            return redirect()->back()->with('success' ,'تم التعديل بنجاح');
        }catch (\Exception $exception){
            DB::rollBack();
            return redirect()->back()->with('error' ,'حدث خطأ ما يرجي المحاولة مرة أخري');
        }

    }// end of Update Shipping Method


}
