<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\NailsJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NailsJobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'NailsJobs' => array('NailsJob' => NailsJobs::select('id','price','image','name','description', 'master_point_id')->where('status', 1)->whereHas('masterPoint', function ($query) {
                $query->where('status', 1);
            })->whereHas('masterPoint.master', function ($query) {
                $query->where('status', 1);
            })->with([
                'masterPoint' => function($query) {
                    $query->select('id','latitude','longitude','address', 'master_id', 'image');
                   },
                'favorite' => function($query) {
                    $query->select('id', 'user_id', 'nails_jobs_id')->where('user_id', Auth::user()->id);
                   },
                ])->paginate(15)),
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NailsJobs  $nailsJobs
     * @return \Illuminate\Http\Response
     */
    public function show(NailsJobs $nailsJobs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NailsJobs  $nailsJobs
     * @return \Illuminate\Http\Response
     */
    public function edit(NailsJobs $nailsJobs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NailsJobs  $nailsJobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NailsJobs $nailsJobs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NailsJobs  $nailsJobs
     * @return \Illuminate\Http\Response
     */
    public function destroy(NailsJobs $nailsJobs)
    {
        //
    }
}
