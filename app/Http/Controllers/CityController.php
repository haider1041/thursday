<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;


class CityController extends Controller
{

    public function index(Request $request)
    {

        $paginate = ($request->get('show')) ? $request->get('show') : 10;
        $cities = City::orderBy('id', 'DESC')->paginate($paginate);
        return view('city.index',['cities'=>$cities,]);
    }


    public function create()
    {
        return view('city.create');
    }


    public function store(Request $request)
    {
        City::create($request->all());
        emotify('success', 'Your city has been saved.');
        return redirect()->route('cities.index');
    }


    public function show(city $city)
    {
        //
    }


    public function edit(city $city)
    {

        return view('city.edit',['cities'=>$city]);

        
    }


    public function update(Request $request, City $city)
    {
        

        
        $cities=City::find($city->id);
        $cities->name=$request->name;
        $cities->save();
        
        error_log('accccccccccc');

        emotify('success', 'Your neenenenenenebrand has been saved.');
        return redirect()->route('cities.index');
    }


    public function destroy($id)
    {


        error_log($id);
        $city = City::find($id);
        $city->delete();
        emotify('success', 'Your city has been deleted.');


        return redirect('/cities');
        

    }
}