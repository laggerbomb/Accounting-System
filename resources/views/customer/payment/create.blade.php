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
$( document ).ready(function() {
    load();
});

  function load(){
    if (document.getElementById("paymentTotal").value.length == 0 || document.getElementById("paymentTotal").value == null){
        document.getElementById("paymentTotal").value = 0;
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

    var numInv = {{$loop}};
    var paymentTotal = {{$t}};
    var tt = parseFloat(document.getElementById("paymentTotal").value) + parseFloat(paymentTotal);
    
    for (let index = 0; index < numInv; index++) {
        var TTotal = parseFloat(document.getElementById("TTotal" + index).value);

        if (tt - TTotal >= 0) {
            document.getElementById("check" + index).checked = true;
            document.getElementById("c" + index).value = 1;
            tt -= TTotal;
        } else {
            document.getElementById("check" + index).checked = false;
            document.getElementById("c" + index).value = 0;
        }
    }
    document.getElementById("paymentBalance").value = tt.toFixed(2);
  }

</script>

@section('content')
    {!! Form::open(["action" => "CpaymentController@store", "method" => "POST", "id" => "form1", "name" => "form1"]) !!}
        <table class="table">
            <thead>
            <tr>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Customer Name")}}
                        {{Form::text("custName", $cust, [ "id" => "custName","class" => "form-control", "Placeholder" => "Name", "disabled"])}}
                        {{Form::hidden("cName", $cust, [ "id" => "cName","class" => "form-control"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Date")}}
                        {{Form::date("paymentDate", \Carbon\Carbon::now(), ["class" => "form-control"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Payment Id")}}
                        {{Form::text("purchaseId", $paymentId, ["disabled", "class" => "form-control"])}} 
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
                            {{Form::text("paymentDest", "", ["class" => "form-control"])}}
                        </div>
                    </th>
                    <th>
                        <div class="form-group">
                            {{Form::label("title", "Total")}}
                            {{Form::text("paymentTotal", "", ["id" => "paymentTotal", "class" => "form-control", "onkeyup" => "calcPayment()"])}}
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
                            <td>{{Form::checkbox('status'.$i, '0',false , ["id" => "check".$i, "disabled"])}}</td>
                                {{Form::hidden('c'.$i, '0' , ["id" => "c".$i])}}
                        @else
                            <td>{{Form::checkbox('status'.$i, '1',true , ["id" => "check".$i, "disabled"])}}</td>
                                {{Form::hidden('c'.$i, '1' , ["id" => "c".$i])}}
                        @endif
                        
                    </tr>
                    @endfor
                </tbody>
            </table>
          </div>

        {{Form::Submit("Submit", ["class" => "btn btn-primary", "id"=>"btnSubmit"])}}
    {!! Form::close() !!}
@endsection