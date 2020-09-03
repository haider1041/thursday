<?php

namespace App\Http\Controllers;

use App\user_bin;
use App\user;


use Illuminate\Http\Request;

class UserBinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_bins = User_bin::all();
        $users=User::all();
        foreach($user_bins as $user_bin)
        {
            foreach($users as $user)
            {
            if($user_bin->user_id==$user->id)
            {
            $user_bin->user_id=$user->name;
            }
        }
        }
        

        return view('userbins',['user_bins'=>$user_bins,]);
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
     * @param  \App\user_bin  $user_bin
     * @return \Illuminate\Http\Response
     */
    public function show(user_bin $user_bin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\user_bin  $user_bin
     * @return \Illuminate\Http\Response
     */
    public function edit(user_bin $user_bin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user_bin  $user_bin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user_bin $user_bin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\user_bin  $user_bin
     * @return \Illuminate\Http\Response
     */
    public function destroy(user_bin $user_bin)
    {
        //
    }
}
