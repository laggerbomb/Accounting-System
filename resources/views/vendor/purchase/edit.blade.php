
@extends('layouts.app')

@section('content')

<script type="text/javascript">
  $(document).ready(function(){
    var count = <?php echo count($purchaseInvoice) - 1; ?>;
    //

    // Append table with add row form on add new button click
      $(".add-new").click(function(){
      count++;
      alert(count);
      var index = $("table tbody tr:last-child").index();
          var row = '<tr>' +
            '<th><input type = "text" name="productName[' + count +'] " class="form-control" placeholder="Name"></input></th>' +
            '<th><input type = "text" name="productWeight[' + count +'] " class="form-control" placeholder="kg"></input></th>' +
            '<th><input type = "number" name="productQty[' + count +'] " class="form-control" placeholder="box" min="1"></input></th>' +
            '<th><input type = "text" name="productCost[' + count +'] " class="form-control" placeholder="RM"></input></th>' +
            '<th><input type = "text" name="productMkg[' + count +'] " class="form-control" placeholder="-Kg" value="0"></input></th>' +
            '<th><input type = "text" name="productRemarks[' + count +'] " class="form-control" placeholder="Remarks" value="-"></input></th>' +
            '<th><input type = "text" name="productTotal[' + count +'] " class="form-control" placeholder="kg"></input></th>' +
            '<th>' +
              '<a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>' +
            '</th>' +
          '</tr>';
        $("tbody").append(row);		
      });
    
    // Delete row on delete button click
    $(document).on("click", ".delete", function(){
          count--;
          $(this).parents("tr").remove();
      });
  });

  function calcGrantTotal()
  {
    var count = <?php echo count($purchaseInvoice) - 1; ?>;
    var index;
    for(index = 0; index <= count; index++)
    {
      var weight = document.getElementById("productWeight[" + index + "]").value;
      var quantity = document.getElementById("productQty[" + index + "]").value;
      var cost = document.getElementById("productCost[" + index + "]").value;
      var productMkg = document.getElementById("productMkg[" + index + "]").value;
      document.getElementById("productTotal[" + index + "]").value = ((weight*quantity-productMkg)*cost).toFixed(2);
    }
  }
  window.onload = calcGrantTotal;

</script>

{!! Form::open(["action" => ["VpurchaseInvoiceController@update", $invoice->id], "method" => "POST", "id" => "form1", "name" => "form1"]) !!}
    <table class="table">
        <thead>
        <tr>
            <th>
                <div class="form-group">
                    {{Form::label("title", "Vendor Name")}}
                    {{Form::text("vendorName", $company->companyName, ["id" => "vendorName", "class" => "form-control", "Placeholder" => "Name"])}}
                </div>
            </th>
            <th>
            
            
                    {{Form::label("title", "Date")}}
                    {{Form::date("date", $invoice->date, ["class" => "form-control"])}}
                </div>
            </th>
            <th>
                <div class="form-group">
                    {{Form::label("title", "Inv Id")}}
                    {{Form::text("invId", "INV-".strval($invoice->invId), ["disabled", "class" => "form-control"])}} 
                    {{ Form::hidden('inv', $invoice->invId) }}
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
          @for ($i = 0; $i < count($purchaseInvoice); $i++)
            <tr>
                <th>{{Form::text("productName[".$i."]", $purchaseInvoice[$i]->productName, ["class" => "form-control", "Placeholder" => "Name"])}}</th>
                <th>{{Form::text("productWeight[".$i."]", $purchaseInvoice[$i]->productWeight, ["id"=>"productWeight[$i]", "class" => "form-control", "Placeholder" => "kg"])}}</th>
                <th>{{Form::number("productQty[".$i."]", $purchaseInvoice[$i]->productQty, ["id"=>"productQty[$i]", "class" => "form-control", "Placeholder" => "box", "min" => "1"])}}</th>
                <th>{{Form::text("productCost[".$i."]", $purchaseInvoice[$i]->productCost, ["id"=>"productCost[$i]", "class" => "form-control", "Placeholder" => "RM"])}}</th>
                <th>{{Form::text("productMkg[".$i."]", $purchaseInvoice[$i]->productMkg, ["id"=>"productMkg[$i]", "class" => "form-control", "Placeholder" => "-Kg"])}}</th>
                <th>{{Form::text("productRemarks[".$i."]", $purchaseInvoice[$i]->productRemarks, ["class" => "form-control", "Placeholder" => "Remarks"])}}</th>
                <th>{{Form::text("productTotal[".$i."]", "", ["id"=>"productTotal[$i]", "class" => "form-control"])}}</th>
                @if ($i == 0)
                    <th><button type="button" class="btn btn-info add-new">Add</button></th>
                @else
                    <th><a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a></th>
                @endif
                
            </tr>
          @endfor
      </tbody>
    </table>

    {{Form::hidden("_method", "PUT")}}
    {{Form::Submit("Update", ["class" => "btn btn-primary", "id"=>"btnSubmit"])}}

{!! Form::close() !!}
@endsection

