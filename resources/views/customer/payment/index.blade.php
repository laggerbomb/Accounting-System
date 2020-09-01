@extends('layouts.app')

@section('content')
    <h1>Payment main page</h1>
    <h3><a href="/customer/check">Create Payment Now</a></h3>

    @if (count($payment) > 0)
        <table class="table table-striped">
            <tr>
                <th>Payment Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($payment as $payment)
            <tr>
                <th>OR-{{$payment->purchaseId}}</th>
                <th><a href="/customer/payment/{{$payment->id}}/edit" class="btn btn-default">Edit</a></th>
                <th>
                    {!! Form::open(["action" => ["CpaymentController@destroy", $payment->id], "method" => "POST", "class" => "pull-right"]) !!}
                        {{Form::hidden("_method", 'DELETE')}}
                        {{Form::submit("Delete", ["class" => "btn btn-danger"])}}
                    {!! Form::close() !!}
                </th>
            </tr>
            @endforeach
        </table>
    @else
        <p>Your have no payment made</p>
    @endif

@endsection