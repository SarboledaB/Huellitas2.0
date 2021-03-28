@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">Donar</div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('user.donations.save') }}">
                            @csrf
                            Seleccione un método de pago:  
                            <select required type="text" placeholder="Método de pago" name="payment" value="{{ old('payment') }}" >
                            <option value="Débito" >Débito</option>
                            <option value="Crédito">Crédito</option>
                            </select>
                            </br>
                            <!-- <input type="text" placeholder="Método de pago" name="payment" value="{{ old('payment') }}" /> -->
                            Ingrese un valor:  
                            <input type="integer" placeholder="Valor" name="value" value="{{ old('value') }}" /> 
                            <input type="hidden" value="{{ $data['foundationId'] }}" name="foundation_id"/>
                            </br>
                            <input type="submit" value="Send" />
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

