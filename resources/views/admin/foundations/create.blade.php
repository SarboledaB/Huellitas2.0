@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @include('util.message')
            <div class="card">
                <div class="card-header">Agregar una fundación</div>
                    <div class="card-body">
                        @if($errors->any())
                            <ul id="errors">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ route('foundations.admin.save') }}">
                            @csrf
                            <input type="text" placeholder="Ingresa el nombre" name="name" value="{{ old('name') }}" />
                            <input type="email" placeholder="Ingresa el email" name="email" value="{{ old('email') }}" />
                            <input type="text" placeholder="Ingresa la descripción" name="description" value="{{ old('description') }}" />
                            <input type="submit" value="Send" />
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

