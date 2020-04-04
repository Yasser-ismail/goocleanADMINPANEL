<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Filters\SettingFilter;
use App\Http\Requests\SettingRequest;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\SettingFilter $filter
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(SettingFilter $filter)
    {
        $this->authorize('viewAny', Setting::class);

        $settings = Setting::filter($filter)->latest()->paginate();

        return view('dashboard.settings.index', compact('settings'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Setting $setting)
    {
        $this->authorize('update', $setting);

        return view('dashboard.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Setting $setting
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(SettingRequest $request, Setting $setting)
    {
        $this->authorize('update', $setting);

        $setting->update($request->all());

        flash(trans('settings.messages.updated'));

        return redirect()->route('dashboard.settings.index');
    }
}
