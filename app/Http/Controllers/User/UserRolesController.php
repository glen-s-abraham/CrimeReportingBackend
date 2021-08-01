<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRolesController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'index','show','store','update','destroy'
        ]);

        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',UserRole::class);
        return $this->showCollectionAsResponse(UserRole::all());
    }    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create',UserRole::class);
        $userRole=null;
        if($request->has('name'))
        {
            $userRole=UserRole::create($request->only(['name']));
        }
        return $this->showModelAsResponse($userRole);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserRole $userRole)
    {
        $this->authorize('view',UserRole::class);
        return $this->showModelAsResponse($userRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserRole $userRole)
    {
        $this->authorize('update',UserRole::class);
        $userRole->update($request->only(['name']));
        return $this->showModelAsResponse($userRole);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRole  $userRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $userRole)
    {
        $this->authorize('delete',UserRole::class);
        $userRole->delete();
        return $this->showModelAsResponse($userRole);
    }
}
