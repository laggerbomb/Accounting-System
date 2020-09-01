<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cinvoice;
use App\CorderInvoice;
use App\User;

use DB;

class CinvoiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $invoice = DB::table('invoice')->where('user_id', $user_id)->get();

        return view("/customer.invoice.index")->with("invoice", $invoice);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $invoice = DB::table('invoice')->where('user_id', $user_id)->get();

        $data = array(
            "inv" => "INV-".strval(count($invoice) +1),
            "invoice" => $invoice
        );

        return view("/customer/invoice.create")->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;
        $invoice = DB::table('invoice')->where('user_id', $user_id)->get();
        $inv = count($invoice) +1;
        
        $post = new Cinvoice;
        $post->custName = $request->input("custName");
        $post->invDate = $request->input("invDate");
        $post->invId = $inv;
        $post->payment = 0;
        $post->user_id = auth()->user()->id;
        $post->total = $request->input("total");
        $post->save();
        
        for($count = 0; $count < count($request->productName); $count++)
        {
            DB::table('orderinvoice')->insert([
                'productName' => $request->productName[$count], 
                'productWeight' => $request->productWeight[$count],
                "productQty" => $request->productQty[$count],
                "productCost" => $request->productCost[$count],
                "productMkg" => $request->productMkg[$count],
                "productRemarks" => $request->productRemarks[$count],
                "invId" => $inv,
                "user_id" => auth()->user()->id
            ]);
        }
        
        return redirect("/customer/invoice/")->with("success", "Invoice Created");
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
        $invoice = Cinvoice::find($id);
        $orderInvoice = DB::table('orderInvoice')->where('user_id', $invoice->user_id)
                                                 ->where('invId', $invoice->invId)
                                                 ->get();

        $data = array(
            "invoice" => $invoice,
            "orderInvoice" => $orderInvoice
        ); 

        return view("/customer/invoice.edit")->with($data);
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
        
        $post = Cinvoice::find($id);
        $post->custName = $request->input("custName");
        $post->invDate = $request->input("invDate");
        $post->save();

        DB::table('orderInvoice')
            ->where('invId', '=', $request->input("inv"))
            ->where('user_id', '=', auth()->user()->id)
            ->delete();
        
        for($count = 0; $count < count($request->productName); $count++)
        {
            DB::table('orderinvoice')
            ->insert([
                'productName' => $request->productName[$count], 
                'productWeight' => $request->productWeight[$count],
                "productQty" => $request->productQty[$count],
                "productCost" => $request->productCost[$count],
                "productMkg" => $request->productMkg[$count],
                "productRemarks" => $request->productRemarks[$count],
                "invId" => $request->input("inv"),
                "user_id" => auth()->user()->id
            ]);
        }
        
        return redirect("/customer/invoice/")->with("success", "Invoice Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Cinvoice::find($id);

        DB::table('orderInvoice')->where('invId', '=', $invoice->invId)->delete();
        $invoice->delete();

        return redirect("/customer/invoice/")->with("success", "Invoice Deleted");
    }
}
