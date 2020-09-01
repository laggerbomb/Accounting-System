<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cpayment;
use App\Company;
use App\User;

use DB;

class CpaymentController extends Controller
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
        $payment = DB::table('payment')->where('user_id', $user_id)->get();

        return view("/customer.payment.index")->with("payment", $payment);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request()->has("r")) {
            $name =  request()->r;
        } 
        
        $user_id = auth()->user()->id;
        $payment = DB::table('payment')->where('user_id', $user_id)
                                       ->where('custName', $name)
                                       ->get();

        $invoice = DB::table('invoice')->where('user_id', $user_id)
                                       ->where('custName', $name)
                                       ->get();

        $value = strval(count($payment) +1);
        $loop = strval(count($invoice));
        
        if (count($payment) > 0) {
            $t = 0;
            foreach ($payment as $payment) {
                $t += $payment->total;
            }
        }
                                      
        $data = array(
            "paymentId" => "OR-".$value,
            "payment" => $payment,
            "invoice" => $invoice,
            "t" => $t,
            "loop" => $loop,
            "cust" => $name
        );

        return view("/customer.payment.create")->with($data);
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
        $payment = DB::table('payment')->where('user_id', $user_id)->get();
        $paymentId = count($payment) +1;

        $cust = DB::table('company')->where('user_id', $user_id)
                                    ->where('custName', $request->input("cName"))
                                    ->first();

        
        $post = new Cpayment;
        $post->purchaseId = $paymentId;
        $post->paymentDate = $request->input("paymentDate");
        $post->paymentDest = $request->input("paymentDest");
        $post->total = $request->input("paymentTotal");
        $post->custId = $cust->custId;
        $post->custName = $request->input("cName");
        $post->user_id = auth()->user()->id;
        $post->save();

        $invoice = DB::table('invoice')->where('user_id', $user_id)
                                       ->where('custName', $request->input("cName"))
                                       ->get();
        
        for ($i=0; $i < count($invoice); $i++) { 
            if ($request->input("c".$i) == 1){
                DB::table('invoice')->where('id', $invoice[$i]->id)
                                    ->update([
                                        'payment' => 1
                                    ]);
            }
        }

        return redirect("/customer/payment/")->with("success", "Payment Created");
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
        $payment =  DB::table('payment')->where('id', $id)
                                        ->first();

        $user_id = auth()->user()->id;
        
        $cust = DB::table('company')->where('user_id', $user_id)
                                    ->where('custId', $payment->custId)
                                    ->first();

        $p = DB::table('payment')->where('user_id', $user_id)
                                 ->where('custName', $payment->custName)
                                 ->get();

        if (count($p) > 0) {
            $t = 0;
            foreach ($p as $p) {
                $t += $p->total;
            }
        }
        
        $invoice = DB::table('invoice')->where('user_id', $user_id)
                                       ->where('custName', $payment->custName)
                                       ->get();
        
        $loop = strval(count($invoice));
        

        $data = array(
            "cust" => $cust->custName,
            "payment" => $payment,
            "invoice" => $invoice,
            "loop" => $loop,
            "t" => $t
        );

        
        return view("/customer/payment.edit")->with($data);
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
        $user_id = auth()->user()->id;
        $payment = DB::table('payment')->where('user_id', $user_id)->get();
        $paymentId = count($payment) +1;

        $cust = DB::table('company')->where('user_id', $user_id)
                                    ->where('custName', $request->input("cName"))
                                    ->first();

        DB::table('payment')
              ->where('id', $id)
              ->update(['paymentDate' => $request->input("paymentDate"),
                        'paymentDest' => $request->input("paymentDest"),
                        'total' => $request->input("paymentTotal"),
                        'custId' => $cust->custId,
                        'custName' => $cust->custName
              ]);
        
        $invoice = DB::table('invoice')->where('user_id', $user_id)
                                       ->where('custName', $cust->custName)
                                       ->get();
        
        for ($i=0; $i < $request->input("count"); $i++) { 
            echo $request->input("c".$i);
            
            if ($request->input("c".$i) == 0) {
                echo "A";
                DB::table('invoice')->where('id', $invoice[$i]->id)
                                    ->update(['payment' => 0]);
            } else {
                echo "B";
                DB::table('invoice')->where('id', $invoice[$i]->id)
                                    ->update(['payment' => 1]);
            }
        }
        
        return redirect("/customer/payment/")->with("success", "Payment Updated");
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
