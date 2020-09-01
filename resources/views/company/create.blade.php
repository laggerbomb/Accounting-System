@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
    {!! Form::open(["action" => "CompanyController@store", "method" => "POST", "id" => "form1", "name" => "form1"]) !!}
        <table class="table">
            <thead>
            <tr>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Company Code")}}
                        {{Form::text("companyCode", "", ["class" => "form-control", "Placeholder" => "Company Code"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Company Name")}}
                        {{Form::text("custName", "", ["class" => "form-control", "Placeholder" => "Company Name"])}}
                    </div>
                </th>
            </tr> 
            <tr>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Company Email")}}
                        {{Form::email("custEmail", "", ["class" => "form-control", "Placeholder" => "Company Email"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Company Address")}}
                        {{Form::text("custAddress", "", ["class" => "form-control", "Placeholder" => "Company Address"])}}
                    </div>
                </th>
            </tr> 
            <tr>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Company Postcode")}}
                        {{Form::number("custPostcode", "", ["class" => "form-control", "Placeholder" => "Company Postcode"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Company State")}}
                        {{Form::select('custState', [
                                                        'Johor' => 'Johor', 
                                                        'Kedah' => 'Kedah',
                                                        'Kelantan' => 'Kelantan',
                                                        'Kuala Lumpur' => 'Kuala Lumpur',
                                                        'Labuan' => 'Labuan',
                                                        'Malacca' => 'Malacca',
                                                        'Negeri Sembilan' => 'Negeri Sembilan',
                                                        'Pahang' => 'Pahang',
                                                        'Penang' => 'Penang',
                                                        'Perak' => 'Perak',
                                                        'Perlis' => 'Perlis',
                                                        'Putrajaya' => 'Putrajaya',
                                                        'Sabah' => 'Sabah',
                                                        'Sarawak' => 'Sarawak',
                                                        'Selangor' => 'Selangor',
                                                        'Terengganu' => 'Terengganu'
                                                    ], 
                                                    'Pahang', ["class"=>"custom-select"])}}
                    </div>
                </th>
            </tr>  
            <tr>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Hp 1")}}
                        {{Form::number("hp1", "", ["class" => "form-control", "Placeholder" => "Handphone 1"])}}
                    </div>
                </th>
                <th>
                    <div class="form-group">
                        {{Form::label("title", "Hp 2")}}
                        {{Form::number("hp2", "", ["class" => "form-control", "Placeholder" => "Handphone 2"])}}
                    </div>
                </th>
            </tr> 
            <tr>
                <th colspan="2">
                    {{Form::label("title", "Type")}}
                    {{Form::select('type', ['Customer' => 'Customer', 'Supplier' => 'Supplier',], 'Customer', ["class"=>"custom-select"])}}
                </th>
            </tr>
            </thead>
        </table>
       
        {{Form::Submit("Submit", ["class" => "btn btn-primary", "id"=>"btnSubmit"])}}
    {!! Form::close() !!}
@endsection