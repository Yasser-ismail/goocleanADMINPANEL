<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Appoientment;
use App\Models\Client;
use App\Http\Filters\AppoientmentFilter;
use App\Http\Requests\AppoientmentRequest;
use App\Http\Controllers\Controller;
use App\Traits\AjaxFunctions;


class AppoientmentController extends Controller
{
    use AjaxFunctions;

    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\AppoientmentFilter $filter
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(AppoientmentFilter $filter)
    {
        $this->authorize('viewAny', Appoientment::class);

        $appoientments = Appoientment::filter($filter)->latest()->paginate();

        return view('dashboard.appoientments.index', compact('appoientments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Appoientment::class);
        $clients = Client::all();

        return view('dashboard.appoientments.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\AppoientmentRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(AppoientmentRequest $request)
    {
        $this->authorize('create', Appoientment::class);
        $appoientment = Appoientment::create($request->except('service_id'));
        $appoientment->services()->sync($request->service_id);

        flash(trans('appoientments.messages.created'));

        return redirect()->route('dashboard.appoientments.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Appoientment $appoientment
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Appoientment $appoientment)
    {
        $this->authorize('view', $appoientment);

        return view('dashboard.appoientments.show', compact('appoientment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Appoientment $appoientment
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Appoientment $appoientment)
    {
        $this->authorize('update', $appoientment);

        return view('dashboard.appoientments.edit', compact('appoientment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Appoientment $appoientment
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(AppoientmentRequest $request, Appoientment $appoientment)
    {
        $this->authorize('update', $appoientment);
        if ($appoientment->time->id != $request->time_id) {
            $appoientment->time()->update(['reserved' => 0, 'appoientment_id' => null]);
        }

        $appoientment->update($request->except('service_id'));
        $appoientment->services()->sync($request->service_id);

        flash(trans('appoientments.messages.updated'));

        return redirect()->route('dashboard.appoientments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Appoientment $appoientment
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Appoientment $appoientment)
    {
        $this->authorize('delete', $appoientment);

        $appoientment->delete();

        flash(trans('appoientments.messages.deleted'));

        return redirect()->route('dashboard.appoientments.index');
    }

}
