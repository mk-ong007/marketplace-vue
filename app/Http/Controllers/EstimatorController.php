<?php

namespace App\Http\Controllers;

use App\Models\Estimator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EstimatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estimators =  Estimator::all();

        $estimatorsData = array();
        foreach ($estimators as $key => $value) {

            $tempArray = array(
                            'online' => $value['is_user_login'],
                            'active' => ($value['active']!=null)?$value['active']:0,
                            'required_validation' => 0,
                            'id' => $value['id'],
                            'full_name' => $value['first_name'].' '.$value['last_name'],
                            'email' => $value['email'],
                            'added_on' => $value['created_at'],
                        );

            array_push($estimatorsData, $tempArray);
        }

        return $estimatorsData;
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
        // print_r($request->all()); die;
        // $request->validate([
        //   'company_name' => 'required',
        //   'email' => 'required'
        // ]);
        $data = $request->all();
        $data['password'] = Hash::make(Str::random(8));
        $estimator = new Estimator($data);
        if($estimator->save()){
            return response()->json([
                'error' => false,
                'data' => $estimator
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => "Something went wrong!"
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estimator  $estimator
     * @return \Illuminate\Http\Response
     */
    public function show(Estimator $estimator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estimator  $estimator
     * @return \Illuminate\Http\Response
     */
    public function edit(Estimator $estimator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estimator  $estimator
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estimator $estimator)
    {
        $estimator->updateOrCreate(['id' => $request->get('id')], $request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estimator  $estimator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estimator $estimator)
    {
        //
    }
}
