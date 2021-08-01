<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\ApiController;
use App\Models\District;
use App\Policies\DistrictPolicy;
use Illuminate\Http\Request;

class DistrictController extends ApiController
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
        
        return $this->showCollectionAsResponse(District::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',District::class);
        $district=null;
        if($request->has('name'))
        {
            $district=District::create($request->only(['name']));
        }
        return $this->showModelAsResponse($district);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(District $district)
    {
        return $this->showModelAsResponse($district);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, District $district)
    {
        $this->authorize('update',District::class);
        $district->update($request->only(['name']));
        return $this->showModelAsResponse($district);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district)
    {
        $this->authorize('delete',District::class);
        $district->delete();
        return $this->showModelAsResponse($district);
    }
}
