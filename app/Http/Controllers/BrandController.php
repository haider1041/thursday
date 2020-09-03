<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Voucher;
use App\Brand_location;
use App\Area;
use App\User;

use Illuminate\Http\Request;


class BrandController extends Controller
{

    public function index(Request $request)
    {

        $paginate = ($request->get('show')) ? $request->get('show') : 10;
        $brands = Brand::orderBy('id', 'DESC')->paginate($paginate);
        return view('brand.index',['brands'=>$brands,]);
    }


    public function create()
    {
        return view('brand.create');
    }


    public function store(Request $request)
    {
        Brand::create($request->all());
        emotify('success', 'Your brand has been saved.');
        return redirect()->route('brands.index');
    }


    public function show(brand $brand,Request $request)
    {
        error_log($brand->id);


        $brand_locations=Brand_location::where('brand_id', '=', $brand->id)->paginate(10);

        
        $areas=Area::all();
        foreach($brand_locations as $brand_location)
        {
            foreach($areas as $area)
            {
            if($brand_location->area_id==$area->id)
            {
                        error_log($brand_location->id);

            $brand_location->area_id=$area->name;
            }
        }
        }

         $vouchers=Voucher::where('brand_id', '=', $brand->id)->paginate(10);


        $users=User::all();
        foreach($vouchers as $voucher)
        {
            foreach($users as $user)
            {
            if($voucher->user_id==$user->id)
            {
            $voucher->user_id=$user->name;
            }
        }
        
        }

        $brands=Brand::all();
        foreach($vouchers as $voucher)
        {
            foreach($brands as $brand)
            {
            if($voucher->brand_id==$brand->id)
            {
            $voucher->brand_id=$brand->name;
            }
        }
        
        }
    

        return view('brand.show',['brand_locations'=>$brand_locations,'vouchers'=>$vouchers]);
    }


    public function edit(brand $brand)
    {

        return view('brand.edit',['brands'=>$brand]);

        
    }


    public function update(Request $request, Brand $brand)
    {
        

        error_log($request->name);

        $brands=Brand::find($brand->id);
        $brands->name=$request->name;
        $brands->save();
        
        error_log('accccccccccc');

        emotify('success', 'Your neenenenenenebrand has been saved.');
        return redirect()->route('brands.index');
    }


    public function destroy($id)
    {


        error_log($id);
        $brand = Brand::find($id);
        $brand->delete();
        emotify('success', 'Your brand has been deleted.');


        return redirect('/brands');
        

    }
}