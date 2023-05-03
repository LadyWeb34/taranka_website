<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ProtoneMedia\Splade\Facades\Toast;
use App\Http\Requests\SettingStoreRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        return view('settings.index',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SettingStoreRequest $request, Setting $setting)
    {
        $setting->phone = $request->input('phone');
        $setting->adress = $request->input('adress');
        $setting->time = $request->input('time');
        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $filename = $image->getClientOriginalName();
            $image->storeAs('public', $filename);
            $setting->main_image = $filename;
        }
        $setting->save();
        Toast::title('Настройки были обновлены!');
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
