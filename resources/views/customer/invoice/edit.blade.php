
@extends('layouts.app')

@section('content')

<script type="text/javascript">
  $(document).ready(function(){
    var count = <?php echo count($orderInvoice) - 1; ?>;
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

</script>

{!! Form::open(["action" => ["CinvoiceController@update", $invoice->id], "method" => "POST", "id" => "form1", "name" => "form1"]) !!}
    <table class="table">
        <thead>
        <tr>
            <th>
                <div class="form-group">
                    {{Form::label("title", "Customer Name")}}
                    {{Form::text("custName", $invoice->custName, ["id" => "custName", "class" => "form-control", "Placeholder" => "Name"])}}
                </div>
            </th>
            <th>
                <div class="form-group">
                    {{Form::label("title", "Date")}}
                    {{Form::date("invDate", $invoice->invDate, ["class" => "form-control"])}}
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
          @for ($i = 0; $i < count($orderInvoice); $i++)
            <tr>
                <th>{{Form::text("productName[".$i."]", $orderInvoice[$i]->productName, ["class" => "form-control", "Placeholder" => "Name"])}}</th>
                <th>{{Form::text("productWeight[".$i."]", $orderInvoice[$i]->productWeight, ["class" => "form-control", "Placeholder" => "kg"])}}</th>
                <th>{{Form::number("productQty[".$i."]", $orderInvoice[$i]->productQty, ["class" => "form-control", "Placeholder" => "box", "min" => "1"])}}</th>
                <th>{{Form::text("productCost[".$i."]", $orderInvoice[$i]->productCost, ["class" => "form-control", "Placeholder" => "RM"])}}</th>
                <th>{{Form::text("productMkg[".$i."]", $orderInvoice[$i]->productMkg, ["class" => "form-control", "Placeholder" => "-Kg"])}}</th>
                <th>{{Form::text("productRemarks[".$i."]", $orderInvoice[$i]->productRemarks, ["class" => "form-control", "Placeholder" => "Remarks"])}}</th>
                <th>{{Form::text("productTotal[".$i."]", "", ["class" => "form-control"])}}</th>
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
