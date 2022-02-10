<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GeneralSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, User $user)
    {
        return (Auth::user());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // echo asset(basename($request->file('picture')->store('public/pictures/users'))); die;
        // print_r($request->all()); die;
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'email' => 'required|unique:users,email,'.$request->id,
            'new_password' => 'sometimes|required',
            're_new_password' => 'sometimes|required|same:new_password',
            'picture' => 'sometimes|required'
        ]);

        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors()->first()
            ]);
        }

        $updateData  = ['email' => $request->email];         
        if($request->has('new_password')){
            $updateData['password'] = Hash::make($request->new_password);
        }
        if($request->has('picture')){
            $picture = $request->file('picture')->store('public/pictures/users');
            $updateData['picture'] = basename($picture);
        }

        $response = $user->updateOrCreate(['id' => $request->id], $updateData);
        return response()->json([
                'error' => false,
                'message' => 'Account details updated successfully.',
                'data' => $response 
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
