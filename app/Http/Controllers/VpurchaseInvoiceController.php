<?php

namespace App\Http\Controllers;
use App\Vinvoice;
use App\purchaseDetails;
use Illuminate\Http\Request;

use DB;

class VpurchaseInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $purchase = DB::table('purchaseInvoice')->where('user_id', $user_id)->get();

        return view("/vendor.purchase.index")->with("purchase", $purchase);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = auth()->user()->id;
        $invoice = DB::table('purchaseinvoice')->where('user_id', $user_id)->get();

        $data = array(
            "inv" => "INV-".strval(count($invoice) +1),
            "invoice" => $invoice
        );

        return view("/vendor/purchase.create")->with($data);
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
        $company = DB::table('company')->where('companyName', $request->input('vendorName'))->first();
        
        $post = new Vinvoice;
        $post->vendorId = $company->companyCode;
        //$post->vendorId = $request->input("vendorName");
        $post->date = $request->input("invDate");
        $post->invId = $inv;
        $post->payment = 0;
        $post->user_id = auth()->user()->id;
        $post->total = $request->input("total");
        $post->save();
        
        for($count = 0; $count < count($request->productName); $count++)
        {
            DB::table('purchasedetails')->insert([
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
        
        return redirect("/vendor/purchase")->with("success", "Invoice Created");    }

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
        $invoice = Vinvoice::find($id);
        $company = DB::table('company')->where('companyCode', $invoice->custId)->first();
        $purchaseInvoice = DB::table('purchasedetails')->where('user_id', $invoice->user_id)
                                                 ->where('invId', $invoice->invId)
                                                 ->get();

        $data = array(
            "invoice" => $invoice,
            "purchaseInvoice" => $purchaseInvoice,
            "company" => $company
        ); 

        return view("/vendor/purchase.edit")->with($data);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Vinvoice::find($id);
        $post->vendorId = $request->input("vendorId");
        $post->date = $request->input("date");
        $post->save();

        DB::table('purchasedetails')
            ->where('invId', '=', $request->input("inv"))
            ->where('user_id', '=', auth()->user()->id)
            ->delete();
        
        for($count = 0; $count < count($request->productName); $count++)
        {
            DB::table('purchasedetails')
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
        
        return redirect("/vendor/purchase/")->with("success", "Invoice Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $invoice = Vinvoice::find($id);

        DB::table('purchasedetails')->where('invId', '=', $invoice->invId)->delete();
        $invoice->delete();

        return redirect("/vendor/purchase/")->with("success", "Invoice Deleted");
    }
}
