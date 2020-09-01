@extends('layouts.app')

@section('content')
    <h1>Payment check main page</h1>
    {!! Form::open(["action" => ["CheckCustIdController@store"], "method" => "POST"]) !!}
        {{Form::label("title", "Customer Name")}}
        {{Form::text("custName", "", ["class" => "form-control", "Placeholder" => "Customer Name"])}}
        {{Form::submit('Check!')}}
    {!! Form::close() !!}
@endsection