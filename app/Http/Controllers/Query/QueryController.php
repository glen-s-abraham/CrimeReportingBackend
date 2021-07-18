<?php

namespace App\Http\Controllers\Query;

use App\Http\Controllers\ApiController;
use App\Models\Query;
use Illuminate\Http\Request;

class QueryController extends ApiController
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
        return $this->showCollectionAsResponse(Query::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query=null;
        if($request->has('query'))
        {
            $data=$request->only(['query']);
            $data['user_id']=2;//replace with auth()->user()->id
            $query=Query::create($data);
        }
        return $this->showModelAsResponse($query);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function show(Query $query)
    {
        return $this->showModelAsResponse($query);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Query $query)
    {
        $query->update($request->only(['query']));
        return $this->showModelAsResponse($query);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Query  $query
     * @return \Illuminate\Http\Response
     */
    public function destroy(Query $query)
    {
        $query->delete();
        return $this->showModelAsResponse($query);
    }
}
