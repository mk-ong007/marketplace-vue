<?php

namespace App\Http\Controllers;

use App\Models\AdminActivities;
use Illuminate\Http\Request;

class AdminActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = AdminActivities::orderBy('created_at', 'DESC')->latest()->get()->unique('watch_id');

        $activitiesData = array();
        foreach ($activities as $key => $value) {
            $tempArray = array();

            if($value['admin_group'] == 'staff'){
                $who = '(U)';
            }elseif ($value['admin_group'] == 'seller') {
                $who = '(S)';
            }elseif ($value['admin_group'] == 'estimator') {
                $who = '(E)';
            }else{
                $who = '(Admin)';
            }

            $tempArray['Who']      = $who;
            $tempArray['From']     = $value['admin_group'];
            $tempArray['Id']       = $value['user2_id'];
            $tempArray['Message']  = $value['message'];
            $tempArray['WatchId'] = $value['watch_id'];
            $tempArray['Received'] = date('F d, Y h:i A', strtotime($value['created_at']));

            array_push($activitiesData, $tempArray);
        }

        return $activitiesData;
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
     * @param  \App\Models\AdminActivities  $adminActivities
     * @return \Illuminate\Http\Response
     */
    public function show(AdminActivities $adminActivities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminActivities  $adminActivities
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminActivities $adminActivities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AdminActivities  $adminActivities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminActivities $adminActivities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminActivities  $adminActivities
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminActivities $adminActivities)
    {
        //
    }
}
