@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card mb-3">
                    <img class="card-img-top" src="{{ $data["petItem"]->getImage() }}" alt="..">
                    <div class="card-body">
                        <h5 class="card-title">{{ $data["petItem"]->getName()}}</h5>
                        <p class="card-text"><small class="text-muted">${{ $data["petItem"]->getValue()}}</small></p>
                        <p class="card-text">{{ $data["petItem"]->getDetails() }}</p>
                        <a class="btn btn-primary " href="{{ route('user.cart.add', ['id' => $data["petItem"]->getId()]) }}" role="button">add</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection