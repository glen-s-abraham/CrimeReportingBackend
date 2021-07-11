<?php

namespace App\Http\Controllers\District;

use App\Http\Controllers\ApiController;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends ApiController
{
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
        $district->delete();
        return $this->showModelAsResponse($district);
    }
}
