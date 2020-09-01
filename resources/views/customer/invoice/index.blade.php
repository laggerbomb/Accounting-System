@extends('layouts.app')

@section('content')
    <h1>Invoice main page</h1>
    <h3><a href="/customer/invoice/create">Create Invoice Now</a></h3>

    @if (count($invoice) > 0)
        <table class="table table-striped">
            <tr>
                <th>Invoice Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($invoice as $invoice)
            <tr>
                <th>INV-{{$invoice->invId}}</th>
                <th><a href="/customer/invoice/{{$invoice->id}}/edit" class="btn btn-default">Edit</a></th>
                <th>
                    {!! Form::open(["action" => ["CinvoiceController@destroy", $invoice->id], "method" => "POST", "class" => "pull-right"]) !!}
                        {{Form::hidden("_method", 'DELETE')}}
                        {{Form::submit("Delete", ["class" => "btn btn-danger"])}}
                    {!! Form::close() !!}
                </th>
            </tr>
            @endforeach
        </table>
    @else
        <p>Your have no invoice created</p>
    @endif
@endsection