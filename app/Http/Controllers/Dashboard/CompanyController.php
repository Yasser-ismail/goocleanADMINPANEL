<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Company;
use App\Models\Service;
use App\Http\Filters\CompanyFilter;
use App\Http\Requests\CompanyRequest;
use App\Http\Controllers\Controller;
use App\Traits\AjaxFunctions;

class CompanyController extends Controller
{
    use AjaxFunctions;
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\CompanyFilter $filter
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(CompanyFilter $filter)
    {
        $this->authorize('viewAny', Company::class);

        $companies = Company::filter($filter)->latest()->paginate();

        return view('dashboard.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Company::class);
        $cities = City::all();
        $services = Service::all();

        return view('dashboard.companies.create', compact('cities', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CompanyRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(CompanyRequest $request)
    {
        $this->authorize('create', Company::class);

        $company = Company::create($request->except('service_id', 'city_id'));

        if (isset($request->service_id) && !empty($request->service_id)) {
            $company->services()->sync($request->service_id);
        }

        if (isset($request->city_id) && !empty($request->city_id)) {
            $company->cities()->sync($request->city_id);
        }

        flash(trans('companies.messages.created'));

        return redirect()->route('dashboard.companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Company $company)
    {
        $this->authorize('view', $company);
        $cities = City::all();
        $services = Service::all();

        return view('dashboard.companies.show', compact('company', 'cities', 'services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Company $company)
    {
        $this->authorize('update', $company);
        $cities = City::all();
        $services = Service::all();

        return view('dashboard.companies.edit', compact('company', 'cities', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $this->authorize('update', $company);

        $company->update($request->except('service_id', 'city_id'));
        if (isset($request->service_id) && !empty($request->service_id)) {
            $company->services()->sync($request->service_id);
        }

        if (isset($request->city_id) && !empty($request->city_id)) {
            $company->cities()->sync($request->city_id);
        }

        flash(trans('companies.messages.updated'));

        return redirect()->route('dashboard.companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Company $company
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Company $company)
    {
        $this->authorize('delete', $company);

        if ($company->services) {
            $company->services()->detach();
        }

        if ($company->cities) {
            $company->cities()->detach();
        }

        $company->delete();

        flash(trans('companies.messages.deleted'));

        return redirect()->route('dashboard.companies.index');
    }

}
