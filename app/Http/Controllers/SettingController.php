<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class SettingController extends Controller
{

    public function edit(Setting $setting)
    {

        $setting = Setting::first();
        
        return view('admin.setting.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        

        $this->validate($request, [
            'name' => 'required',
            'copyright' => 'required',
        ]);
        $setting = Setting::first();
        $setting->update($request->all());

       if($request->hasFile('site_logo')){
            $image = $request->site_logo;
            $image_new_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('storage/setting/', $image_new_name);
            $setting->site_logo = '/storage/setting/' . $image_new_name;
            $setting->save();
        }


        Toastr::success('Site Information Updated', 'Success', ["positionClass" => "toast-top-right"]);

         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
