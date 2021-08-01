<?php

namespace App\Http\Controllers\Feedback;

use App\Http\Controllers\ApiController;
use App\Models\FeedBack;
use App\Policies\FeedBackPolicy;
use Illuminate\Http\Request;

class FeedbackController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'index','store','show','update','destroy'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',FeedBack::class);
        return $this->showCollectionAsResponse(FeedBack::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $feedback=null;
        if($request->has('feedback'))
        {
            $data=$request->only(['feedback']);
            $data['user_id']=2;//change to auth()->user()->id on addition of auth middleware
            $feedback=FeedBack::create($data);
        }
        return $this->showModelAsResponse($feedback);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function show(FeedBack $feedback)
    {
        $this->authorize('view',$feedback);
        error_log($feedback);
       return $this->showModelAsResponse($feedback); 
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FeedBack $feedback)
    {
        $this->authorize('update',$feedback);
        $feedback->update($request->only(['feedback']));
        return $this->showModelAsResponse($feedback);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FeedBack  $feedBack
     * @return \Illuminate\Http\Response
     */
    public function destroy(FeedBack $feedback)
    {
        $this->authorize('delete',$feedback);
        $feedback->delete();
        return $this->showModelAsResponse($feedback);
    }
}
