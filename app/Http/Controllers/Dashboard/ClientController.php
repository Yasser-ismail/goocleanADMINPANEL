<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\City;
use App\Models\Client;
use App\Http\Filters\ClientFilter;
use App\Http\Requests\ClientRequest;
use App\Http\Controllers\Controller;
use App\Traits\AjaxFunctions;

class ClientController extends Controller
{
    use AjaxFunctions;
    /**
     * Display a listing of the resource.
     *
     * @param \App\Http\Filters\ClientFilter $filter
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(ClientFilter $filter)
    {
        $this->authorize('viewAny', Client::class);

        $clients = Client::filter($filter)->latest()->paginate();

        return view('dashboard.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create()
    {
        $this->authorize('create', Client::class);
        $cities = City::all();

        return view('dashboard.clients.create', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\ClientRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(ClientRequest $request)
    {
        $this->authorize('create', Client::class);

        Client::create($request->all());

        flash(trans('clients.messages.created'));

        return redirect()->route('dashboard.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Client $client)
    {
        $this->authorize('view', $client);

        return view('dashboard.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Client $client)
    {
        $this->authorize('update', $client);
        $cities = City::all();

        return view('dashboard.clients.edit', compact('client', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(ClientRequest $request, Client $client)
    {
        $this->authorize('update', $client);

        $client->update($request->all());

        flash(trans('clients.messages.updated'));

        return redirect()->route('dashboard.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Client $client
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Client $client)
    {
        $this->authorize('delete', $client);

        $client->delete();

        flash(trans('clients.messages.deleted'));

        return redirect()->route('dashboard.clients.index');
    }

}
