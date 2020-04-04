<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use Illuminate\Http\Request;
use App\Http\Filters\CityFilter;
use App\Http\Requests\CityRequest;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\CityFilter $filter
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(CityFilter $filter)
    {
        $this->authorize('viewAny', City::class);

        $cities = City::filter($filter)->latest()->paginate();

        return view('dashboard.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', City::class);

        return view('dashboard.cities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CityRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CityRequest $request)
    {
        $this->authorize('create', City::class);

        City::create($request->all());

        flash(trans('cities.messages.created'));

        return redirect()->route('dashboard.cities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(City $city)
    {
        $this->authorize('view', $city);

        return view('dashboard.cities.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(City $city)
    {
        $this->authorize('update', $city);

        return view('dashboard.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(CityRequest $request, City $city)
    {
        $this->authorize('update', $city);

        $city->update($request->all());

        flash(trans('cities.messages.updated'));

        return redirect()->route('dashboard.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\City $city
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(City $city)
    {
        $this->authorize('delete', $city);

        $city->delete();

        flash(trans('cities.messages.deleted'));

        return redirect()->route('dashboard.cities.index');
    }
}
