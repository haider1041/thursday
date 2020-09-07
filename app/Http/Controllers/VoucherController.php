<?php

namespace App\Http\Controllers;

use App\Voucher;
use App\User;
use App\Brand;
use App\Http\Requests\VoucherRequest;


use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = ($request->get('show')) ? $request->get('show') : 10;
        $vouchers = Voucher::orderBy('redeemed')->orderBy('expiry', 'DESC')->paginate($paginate);


        return view('vouchers.index', ['vouchers' => $vouchers,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = 'cashbinuser';
        $brands = Brand::all();
        $users = User::all();
        return view('vouchers.create', ['brands' => $brands, 'users' => $users,]);
    }


    public function store(VoucherRequest $request)
    {
        $voucher = new Voucher();
        $voucher->couponcode = request('couponcode');
        $voucher->user_id = request('user');
        $voucher->brand_id = request('brand');
        $voucher->discount = request('discount');
        $voucher->expiry = request('expiry');
        $voucher->redeemed = 'No';
        $voucher->save();
        emotify('success', 'Your voucher has been saved.');
        return redirect()->route('vouchers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(voucher $voucher)
    {
        $users = User::all();
        $brands = Brand::all();

        return view('vouchers.edit', ['vouchers' => $voucher, 'users' => $users, 'brands' => $brands,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(VoucherRequest $request, Voucher $voucher)
    {


        error_log($request->expiry);

        $vouchers = Voucher::find($voucher->id);
        $vouchers->couponcode = $request->couponcode;
        $vouchers->brand_id = $request->brand;
        $vouchers->user_id = $request->user;
        $vouchers->discount = $request->discount;
        $vouchers->expiry = $request->expiry;
        $vouchers->redeemed = $request->redeemed;

        $vouchers->save();

        error_log('accccccccccc');

        emotify('success', 'Your voucher has been updated.');
        return redirect()->route('vouchers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        error_log($id);
        $voucher = Voucher::find($id);
        $voucher->delete();
        emotify('success', 'Your voucher has been deleted.');


        return redirect('/vouchers');
    }
}
