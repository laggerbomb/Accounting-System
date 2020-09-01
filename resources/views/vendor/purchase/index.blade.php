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
            
        </table>
    @else
        <p>Your have no purchase invoice created</p>
    @endif
@endsection