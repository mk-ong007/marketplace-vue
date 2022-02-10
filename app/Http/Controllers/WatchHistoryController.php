<?php

namespace App\Http\Controllers;

use App\Models\WatchHistory;
use Illuminate\Http\Request;

class WatchHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $watchHistoryData = WatchHistory::all();

        $watchHistory = array();
        foreach ($watchHistoryData as $key => $value) {
            $tempArray = array(
                'id' => $value['id'],
                'brand' => $value['brand'],
                'collection' => $value['serial_no'],
                'model' => $value['model'],
                'serial' => $value['serial_no'],
                'addedBy' => 'User name',
                'askingEstimate' => $value['accepted_price'].'/'.$value['estimated_watch_price'],
                'addedOn' => date('m D Y', $value['created_on']),
                'status' => $value['watch_status'],
            );

            array_push($watchHistory, $tempArray);
        }

        return $watchHistory;
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
     * @param  \App\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function show(WatchHistory $watchHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(WatchHistory $watchHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WatchHistory $watchHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WatchHistory  $watchHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(WatchHistory $watchHistory)
    {
        //
    }
}
