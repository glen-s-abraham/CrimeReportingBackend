<?php

namespace App\Http\Controllers\Station;

use App\Http\Controllers\ApiController;
use App\Models\Station;
use App\Models\District;
use App\Http\Requests\StationStoreRequest;
use App\Http\Requests\StationUpdateRequest;

class StationController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'store','update','destroy'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showCollectionAsResponse(Station::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StationStoreRequest $request)
    {
        $this->authorize('create',Station::class);
        $station=Station::create($request->only(['name','place','district_id']));
        return $this->showModelAsResponse($station);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        return $this->showModelAsResponse($station);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(StationUpdateRequest $request, Station $station)
    {
        $this->authorize('update',Station::class);
        $station->update($request->only(['name','place','district_id']));
        return $this->showModelAsResponse($station);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        $this->authorize('delete',Station::class);
        $station->delete();
        return $this->showModelAsResponse($station);

    }
}
