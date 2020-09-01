<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CstatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("/customer/statement.index");
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
        /*$invoice = DB::table('invoice')->where('user_id', auth()->user()->id)
                                       ->whereBetween('invDate', array($request->dateStart, $request->dateEnd))
                                       ->get();

                                       
        for ($i=0; $i<count($invoice); $i++)
        {
            $orderInvoice[$i] = DB::table('invoice')->where('user_id', auth()->user()->id)
                                                    ->where("invId", (int)$invoice[$i]->invId)
                                                    ->first();
        }
        

        $payment = DB::table('payment')->where('user_id', auth()->user()->id)
                                       ->whereBetween('paymentDate', array($request->dateStart, $request->dateEnd))
                                       ->get();
        */

        $payment = DB::select("select *
                               from invoice join payment
                               on(invoice.user_id=payment.user_id)");
        echo $payment;
        //$data = array(
        //    "invoice" => $invoice,
        //    "orderInvoice" => $orderInvoice
        //);

        //return view("/customer/statement.view")->with($data);
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
