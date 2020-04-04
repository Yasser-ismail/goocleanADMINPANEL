<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Filters\ServiceFilter;
use App\Http\Requests\ServiceRequest;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\ServiceFilter $filter
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(ServiceFilter $filter)
    {
        $this->authorize('viewAny', Service::class);

        $services = Service::filter($filter)->latest()->paginate();

        return view('dashboard.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Service::class);

        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ServiceRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ServiceRequest $request)
    {
        $this->authorize('create', Service::class);

        $input = $request->except('image');
        $image = getImagePath($request);
        $input['image'] = $image;

        Service::create($input);

        flash(trans('services.messages.created'));

        return redirect()->route('dashboard.services.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Service $service)
    {
        $this->authorize('view', $service);

        return view('dashboard.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Service $service)
    {
        $this->authorize('update', $service);

        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ServiceRequest $request, Service $service)
    {
        $this->authorize('update', $service);

        if ($request->has('image')) {
            $input = $request->except('image');
            $image = getImagePath($request);
            $input['image'] = $image;
            $service->update($input);
        }

        $service->update($request->except('image'));

        flash(trans('services.messages.updated'));

        return redirect()->route('dashboard.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Service $service
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Service $service)
    {
        $this->authorize('delete', $service);

        deletePic($service->image);

        $service->delete();

        flash(trans('services.messages.deleted'));

        return redirect()->route('dashboard.services.index');
    }
}
