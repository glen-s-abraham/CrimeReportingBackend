<?php

namespace App\Http\Controllers\Complaint;

use App\Http\Controllers\ApiController;
use App\Models\Complaint;
use App\Models\User;
use App\Http\Requests\ComplaintStoreRequest;
use App\Http\Requests\ComplaintUpdateRequest;
use Illuminate\Support\Facades\Storage;
class ComplaintController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->only([
            'show','store','update','destroy'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->showCollectionAsResponse(Complaint::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComplaintStoreRequest $request)
    {
        $this->authorize('create',Complaint::class);
        $data=$request->only(['subject','body','place','district_id','priority']);
        $data['user_id']=auth()->user()->id;
        $data['status']='submitted';
        if($request->hasFile('file'))
        {
            $data['file']=$request->file('file')->store('files');
        }
        $complaint=Complaint::create($data);
        return $this->showModelAsResponse($complaint);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        $this->authorize('view',$complaint);
        return $this->showModelAsResponse($complaint);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(ComplaintUpdateRequest $request, Complaint $complaint)
    {
        $this->authorize('update',$complaint);
        $complaint->update($request->only([
            'subject','body','place','district_id','priority',
        ]));
        if($request->hasFile('file'))
        {
            if($complaint->has('file'))
            {
                Storage::delete($complaint->file);
            }
            $complaint->file=$request->file('file')->store('files');
            $complaint->save();
        }
        return $this->showModelAsResponse($complaint);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Complaint $complaint)
    {
        $this->authorize('delete',$complaint);
        $complaint->delete();
        return $this->showModelAsResponse($complaint);
    }
}
