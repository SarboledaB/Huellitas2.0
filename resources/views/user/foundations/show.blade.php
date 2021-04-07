@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            </br>
            </br>
            </br>
            <div class="card">
                <div class="card-header">{{ $data["foundation"]->getName() }}</div>

                <div class="card-body">
                    <ul id="errors">
                    <li> Name: {{ $data["foundation"]->getName() }} </li>
                    <li> E-Mail: {{ $data["foundation"]->getEmail() }} </li>
                    <li> Description: {{ $data["foundation"]->getDescription() }} </li>   
                    <br>
                    <button type="button" class="btn btn-primary" onclick="window.location=
                    '{{ URL::route('user.donations.create', ['id'=>$data["foundation"]->getId()]) }}'">Donate</button>                                     
                    </ul>
                    
                </div>
            </div>
            <button type="button" class="btn btn-primary" onclick="window.location=
            '{{ URL::route('user.foundations.list') }}'">Back</button>
        </div>
    </div>
</div>
@endsection