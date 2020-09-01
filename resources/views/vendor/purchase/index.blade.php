@extends('layouts.app')

@section('content')
    <h1>Purchase invoice main page</h1>
    <h3><a href="/vendor/purchase/create">Create Purchase Invoice Now</a></h3>

    @if (count($purchase) > 0)
        <table class="table table-striped">
            <tr>
                <th>Purchase Invoice Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($purchase as $purchase)
            <tr>
                <th>INV-{{$purchase ->invId}}</th>
                <th><a href="/vendor/purchase/{{$purchase->id}}/edit" class="btn btn-default">Edit</a></th>
                <th>
                    {!! Form::open(["action" => ["VpurchaseInvoiceController@destroy", $purchase->id], "method" => "POST", "class" => "pull-right"]) !!}
                        {{Form::hidden("_method", 'DELETE')}}
                        {{Form::submit("Delete", ["class" => "btn btn-danger"])}}
                    {!! Form::close() !!}
                </th>
            </tr>
            @endforeach
        </table>
    @else
        <p>Your have no purchase invoice created</p>
    @endif
@endsection

