<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use CalvinChiulele\MPesaMz\Facades\MPesaMz;

class pagamentosController extends Controller
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
        // $request->msisdn corresponds to the customer phone number (e.g: 258840000000)
        // $reference corresponds to your M-Pesa TransactionReference
        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        // $thirdPartyReference corresponds to your M-Pesa ThirdPartyReference
        $payment = MPesaMz::payment('+258847361594', 1, 10, '101001020');

        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        $refund = MPesaMz::refund($payment->getTransactionID(), 1);

        // 100 corresponds to the amount of the payment. Please, do best pratices and not use magic numbers.
        $query = MPesaMz::query($refund->getTransactionID(), 1);

        dd($payment,$refund,$query);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
