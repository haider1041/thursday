<?php

namespace App\Http\Controllers;

use App\collection;
use App\user;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = ($request->get('show')) ? $request->get('show') : 15;
        $collections = Collection::orderBy('date')->paginate($paginate);
        $users=User::all();
        foreach($collections as $collection)
        {
            foreach($users as $user)
            {
            if($collection->user_id==$user->id)
            {
            $collection->user_id=$user->name;
            }
        }
        }
        

        return view('collection.index',['collections'=>$collections,]);
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
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(collection $collection)
    {
        //
    }
}