<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Company;
use App\Models\Workinghour;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Filters\WorkinghourFilter;
use App\Http\Requests\WorkinghourRequest;
use App\Http\Controllers\Controller;
use App\Traits\AjaxFunctions;

class WorkinghourController extends Controller
{
    use AjaxFunctions;
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\WorkinghourFilter $filter
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(WorkinghourFilter $filter)
    {
        $this->authorize('viewAny', Workinghour::class);

        $workinghours = Workinghour::filter($filter)->latest()->paginate();

        return view('dashboard.workinghours.index', compact('workinghours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Workinghour::class);
        $companies = Company::all();

        return view('dashboard.workinghours.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\WorkinghourRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(WorkinghourRequest $request)
    {
        $this->authorize('create', Workinghour::class);

        Workinghour::create($request->all());

        flash(trans('workinghours.messages.created'));

        return redirect()->route('dashboard.workinghours.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Workinghour $workinghour
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Workinghour $workinghour)
    {
        $this->authorize('view', $workinghour);

        return view('dashboard.workinghours.show', compact('workinghour'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Workinghour $workinghour
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Workinghour $workinghour)
    {
        $this->authorize('update', $workinghour);
        $companies = Company::all();

        return view('dashboard.workinghours.edit', compact('workinghour', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Workinghour $workinghour
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(WorkinghourRequest $request, Workinghour $workinghour)
    {
        $this->authorize('update', $workinghour);
        if ($workinghour->appoientments()->count() === 0) {
            $workinghour->update($request->all());
            flash(trans('workinghours.messages.updated'));
        } else {
            flash(trans('workinghours.messages.un-updated'));
        }


        return redirect()->route('dashboard.workinghours.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Workinghour $workinghour
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Workinghour $workinghour)
    {
        $this->authorize('delete', $workinghour);
        if ($workinghour->appoientments()->count() === 0) {
            $workinghour->delete();
            flash(trans('workinghours.messages.deleted'));
        } else {
            flash(trans('workinghours.messages.un-deleted'));
        }

        return redirect()->route('dashboard.workinghours.index');
    }

}
