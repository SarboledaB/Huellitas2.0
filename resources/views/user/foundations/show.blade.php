@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido a Huellitas</div>

                <div class="card-body">
                    Fundación
                    <ul id="errors">
                    <li> {{ $data["foundation"]->getName() }} </li>
                    <li> {{ $data["foundation"]->getEmail() }} </li>
                    <li> {{ $data["foundation"]->getDescription() }} </li>   
                    <br>
                    <button type="button" onclick="window.location=
                    '{{ URL::route('user.donations.create', ['id'=>$data["foundation"]->getId()]) }}'">Donar</button>                                     
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection