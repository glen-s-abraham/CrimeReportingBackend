<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Models\User;
use App\Http\Requests\PoliceUserStoreRequest;
use App\Http\Requests\PoliceUserUpdateRequest;
use Illuminate\Support\Facades\Hash;

class PoliceUserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'store','update'
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PoliceUserStoreRequest $request)
    {
        $this->authorize('create',User::class);
        $data=$request->only(['name','email','password','mobile','station_id']);
        $data['role_id']=2;
        $data['password']=Hash::make($request->password);
        $user=User::create($data);
        return $this->showModelAsResponse($user);
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(PoliceUserUpdateRequest $request, User $policeUser)
    {
        $this->authorize('update',$policeUser);
        $policeUser->update($request->only(['name','email','mobile','station_id']));
        return $this->showModelAsResponse($policeUser);
    }
}
