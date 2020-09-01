@extends('layouts.app')

@section('content')
    {!! Form::open(["action" => "CstatementController@store", "method" => "POST", "id" => "form1", "name" => "form1"]) !!}
    
        {!!Form::label('Date Start: ', 'Date Start');!!}
        {!!Form::date('dateStart', \Carbon\Carbon::now())!!}
        {!!Form::label('Date End: ', 'Date End');!!}
        {!!Form::date('dateEnd', \Carbon\Carbon::now())!!}

        {{Form::Submit("Submit", ["class" => "btn btn-primary", "id"=>"btnSubmit"])}}
    {!! Form::close() !!}
@endsection