@extends('layouts.app')

<style>
#table-scroll {
  height:200px;
  overflow:auto;  
  margin-top:20px;
}
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
<script type="text/javascript">

var initialBalance, initialTotal;

$( document ).ready(function() {
    load();
    initialTotal = document.getElementById("paymentTotal").value;
    initialBalance = document.getElementById("paymentBalance").value;
});

  function load(){
    if (document.getElementById("paymentTotal").value.length == 0 || document.getElementById("paymentTotal").value == null){
        document.getElementById("paymentTotal").value = {{$payment->total}};
    }
    
    var paymentTotal = parseFloat({{$t}});
    var numInv = {{$loop}};
    var t, tot;

    for (let index = 0; index < numInv; index++) {
       tot = parseFloat(document.getElementById("TTotal" + index).value);
       paymentTotal -= tot;

       if(paymentTotal >= 0){
        $("#paymentBalance").val(paymentTotal.toFixed(2));
       }
    }
  }

  function calcPayment()
  {
    load();

    var difference = parseFloat(initialTotal) - parseFloat(initialBalance);
    var numInv = {{$loop}};
    var paymentTotal = {{$t}};
    var balance;
    var tt = parseFloat(document.getElementById("paymentTotal").value) + parseFloat(paymentTotal);
    
    for (let index = 0; index < numInv; index++) {
        var TTotal = parseFloat(document.getElementById("TTotal" + index).value);
        var minus = tt-TTotal;

        if (minus >= TTotal) {
            document.getElementById("c" + index).checked = true;
            document.getElementById("check" + index).value = 1;
            tt -= TTotal;
        } else {
            document.getElementById("c" + index).checked = false;
            document.getElementById("check" + index).value = 0;
        }
        
        document.getElementById("paymentBalance").value = tt.toFixed(2);
    }
    
  }

</script>

@section('content')
    {!! Form::open([ "action" => ["CpaymentController@update", $payment->id], "method" => "POST", "id" => "form1", "name" => "form1"]) !!}
        <table class="table">
            <thead>
            <tr>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Customer Name")}}
                        {{Form::text("custName", $payment->custName, [ "id" => "custName","class" => "form-control", "Placeholder" => "Name", "disabled"])}}
                        {{Form::hidden("cName", $payment->custName, [ "id" => "cName","class" => "form-control"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Date")}}
                        {{Form::date("paymentDate", $payment->paymentDate, ["class" => "form-control"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Payment Id")}}
                        {{Form::text("purchaseId", "OR-".strval($payment->purchaseId), ["disabled", "class" => "form-control"])}} 
                    </div>
                </th>
            </tr>   
            </thead>
        </table>
        
        <table class="table">
            <thead>
                <tr>
                    <th>
                        <div class="form-group">
                            {{Form::label("title", "Payment Description")}}
                            {{Form::text("paymentDest", $payment->paymentDest, ["class" => "form-control"])}}
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{Form::label("title", "Total")}}
                            {{Form::text("paymentTotal", $payment->total, ["id" => "paymentTotal", "class" => "form-control", "onkeyup" => "calcPayment()"])}}
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{Form::label("title", "Balance")}}
                            {{Form::text("paymentBalance", "", ["id" => "paymentBalance", "class" => "form-control", "disabled"])}}
                        </div>
                    </th>
                </tr> 
            </thead>
        </table>

        <div id="table-scroll">
            <table class="table">
                <thead>
                    <tr>
                        <th>Invoice Id</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($invoice); $i++)
                    <tr> 
                        <td>INV-{{$invoice[$i]->invId}}</td>
                        <td>RM {{$invoice[$i]->total}}</td> 
                        {{Form::hidden("TTotal", $invoice[$i]->total, ["class" => "form-control", "id" => "TTotal".$i])}}
                        @if ($invoice[$i]->payment == 0)
                            <td>{{Form::checkbox('c'.$i, '0',false , ["id" => "c".$i])}}</td>
                                {{Form::hidden('check'.$i, '0' , ["id" => "check".$i])}}
                        @else
                            <td>{{Form::checkbox('c'.$i, '1',true , ["id" => "c".$i])}}</td>
                                {{Form::hidden('check'.$i, '1' , ["id" => "check".$i])}}    
                        @endif
                    </tr>
                    {{Form::hidden('count', $i+1 , ["id" => "count"])}}
                    @endfor
                </tbody>
            </table>
          </div>

          {{Form::hidden("_method", "PUT")}}
          {{Form::Submit("Update", ["class" => "btn btn-primary", "id"=>"btnSubmit"])}}
    {!! Form::close() !!}
@endsection