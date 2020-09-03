<?php

namespace App\Http\Controllers;

use App\Brand_location;
use App\Area;
use App\Brand;
use Illuminate\Http\Request;

class BrandLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        $paginate = ($request->get('show')) ? $request->get('show') : 10;
        $brand_locations = Brand_location::orderBy('id', 'DESC')->paginate($paginate);

        
        $areas=Area::all();
        foreach($brand_locations as $brand_location)
        {
            foreach($areas as $area)
            {
            if($brand_location->area_id==$area->id)
            {
            $brand_location->area_id=$area->name;
            }
        }
        }

        $brands=Brand::all();
        foreach($brand_locations as $brand_location)
        {
            foreach($brands as $brand)
            {
            if($brand_location->brand_id==$brand->id)
            {
            $brand_location->brand_id=$brand->name;
            }
        }
        }

        return view('brand_locations.index',['brand_locations'=>$brand_locations,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $areas=Area::all();
       $brands=Brand::all();

        return view('brand_locations.create',['areas'=>$areas,'brands'=>$brands,]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
         $brand_locations=new Brand_location();
        $brand_locations->area_id=request('area');
        $brand_locations->brand_id=request('brand');
        $brand_locations->longitude=request('longitude');
        $brand_locations->latitude=request('latitude');
         $brand_locations->save();
         emotify('success', 'Your area has been saved.');
        return redirect()->route('brand_locations.index');    }

    /**
     * Display the specified resource.
     *
     * @param  \App\brand_location  $brand_location
     * @return \Illuminate\Http\Response
     */
    public function show(brand_location $brand_location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\brand_location  $brand_location
     * @return \Illuminate\Http\Response
     */
    public function edit(brand_location $brand_location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\brand_location  $brand_location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, brand_location $brand_location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\brand_location  $brand_location
     * @return \Illuminate\Http\Response
     */
  public function destroy($id)
    {
        error_log($id);
        $brand_location = Brand_location::find($id);
        $brand_location->delete();
        emotify('success', 'Your area has been deleted.');


        return redirect('/brand_locations');
    }
}