
@extends('layouts.app')

@section('content')

<script type="text/javascript">
  $(document).ready(function(){
    var count = 0;
    // Append table with add row form on add new button click
      $(".add-new").click(function(){
      count++;
      $("#rowNum").val(count);
          var row = '<tr>' +
            '<th><input type = "text" name="productName[' + count +'] " id="productName[' + count +']" class="form-control" placeholder="Name"></input></th>' +
            '<th><input type = "text" name="productWeight[' + count +']" id="productWeight[' + count +']" class="form-control" placeholder="kg" onkeyup="calcGrantTotal('+ count +');"></input></th>' +
            '<th><input type = "number" name="productQty[' + count +']" id="productQty[' + count +']" class="form-control" placeholder="box" min="1" onkeyup="calcGrantTotal('+ count +');"></input></th>' +
            '<th><input type = "text" name="productCost[' + count +']" id="productCost[' + count +']" class="form-control" placeholder="RM" onkeyup="calcGrantTotal('+ count +');"></input></th>' +
            '<th><input type = "text" name="productMkg[' + count +']" id="productMkg[' + count +']" class="form-control" placeholder="-Kg" value="0" onkeyup="calcGrantTotal('+ count +');"></input></th>' +
            '<th><input type = "text" name="productRemarks[' + count +']" id="productRemarks[' + count +']" class="form-control" placeholder="Remarks" value="-"></input></th>' +
            '<th><input disabled type = "text" name="productTotal[' + count +']" id="productTotal[' + count +']" class="form-control"></input></th>' +
            '<th>' +
              '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>' +
            '</th>' +
          '</tr>';
        $("tbody").append(row);		
      });
    
    // Delete row on delete button click
    $(document).on("click", ".delete", function(){
          count--;
          $("#rowNum").val(count);
          $(this).parents("tr").remove();
      });
    
    $("#rowNum").val(count);

  });

  //Auto generate grant total
  function calcGrantTotal(index)
  {
    var grantTotal = 0;

    var weight = document.getElementById("productWeight[" + index + "]").value;
    var quantity = document.getElementById("productQty[" + index + "]").value;
    var cost = document.getElementById("productCost[" + index + "]").value;
    var productMkg = document.getElementById("productMkg[" + index + "]").value;
    document.getElementById("productTotal[" + index + "]").value = ((weight*quantity-productMkg)*cost).toFixed(2);

    for(var x = 0; x <= document.getElementById("rowNum").value; x++)
    {
      grantTotal += parseInt(document.getElementById("productTotal[" + x + "]").value);
    }
    
    document.getElementById("grantTotal").innerHTML = grantTotal.toFixed(2);
    document.getElementById("total").value = grantTotal.toFixed(2);
  }

</script>

{!! Form::open(["action" => "VpurchaseInvoiceController@store", "method" => "POST", "id" => "form1", "name" => "form1"]) !!}
    <table class="table">
        <thead>
        <tr>
            <th>
                <div class="form-group">
                    {{Form::label("title", "Vendor Name")}}
                    {{Form::text("vendorName", "", ["id" => "vendorName", "class" => "form-control", "Placeholder" => "Name"])}}
                </div>
            </th>
            <th>
                <div class="form-group">
                    {{Form::label("title", "Date")}}
                    {{Form::date("invDate", \Carbon\Carbon::now(), ["class" => "form-control"])}}
                </div>
            </th>
            <th>
                <div class="form-group">
                    {{Form::label("title", "Inv Id")}}
                    {{Form::text("invId", $inv, ["disabled", "class" => "form-control"])}} 
                </div>
            </th>
        </tr>    
        </thead>
    </table>

    <table class="table table-bordered">
      <thead>
          <tr>
              <th>Product</th>
              <th>Weight</th>
              <th>Quantity</th>
              <th>Cost</th>
              <th>-Kg</th>
              <th>Remarks</th>
              <th>Total</th>
              <th>Actions</th>
          </tr>
      </thead>

      <tbody>
          <tr>
            <th>{{Form::text("productName[0]", "", ["class" => "form-control", "Placeholder" => "Name"])}}</th>
            <th>{{Form::text("productWeight[0]", "", ["id" => "productWeight[0]", "class" => "form-control", "Placeholder" => "kg", "onkeyup" => "calcGrantTotal(0)"])}}</th>
            <th>{{Form::number("productQty[0]", "", ["id" => "productQty[0]","class" => "form-control", "Placeholder" => "box", "min" => "1", "onkeyup" => "calcGrantTotal(0)"])}}</th>
            <th>{{Form::text("productCost[0]", "", ["id" => "productCost[0]","class" => "form-control", "Placeholder" => "RM", "onkeyup" => "calcGrantTotal(0)"])}}</th>
            <th>{{Form::text("productMkg[0]", "0", ["id" => "productMkg[0]","class" => "form-control", "Placeholder" => "-Kg", "onkeyup" => "calcGrantTotal(0)"])}}</th>
            <th>{{Form::text("productRemarks[0]", "-", ["class" => "form-control", "Placeholder" => "Remarks"])}}</th>
            <th>{{Form::text("productTotal[0]", "", ["disabled" ,"id" => "productTotal[0]", "class" => "form-control"])}}</th>
            <th><button type="button" class="btn btn-info add-new">Add</button></th>
          </tr>
      </tbody>
    </table>
    
    <h2 class="pull-right">Grand Total is <strong><h2><p id="grantTotal"></p></h2></strong></h2>

    {{Form::hidden("rowNum", "", ["id" => "rowNum"])}}
    {{Form::hidden("total", "", ["id" => "total"])}}

    {{Form::Submit("Submit", ["class" => "btn btn-primary", "id"=>"btnSubmit"])}}

{!! Form::close() !!}
@endsection

