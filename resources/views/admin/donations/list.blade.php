@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido a Huellitas</div>

                <div class="card-body">
                    Lista de donaciones
                    <ul id="errors">
                    @foreach($data["donations"] as $donations)
                        <a href=" {{route('admin.donations.show', ['id'=>$donations->getId()]) }} "><li>{{ $donations->getId() }} - {{ $donations->getPayment() }} : {{ $donations->getValue() }}</li></a>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
