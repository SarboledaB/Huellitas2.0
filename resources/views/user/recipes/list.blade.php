@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($data["recipes"] as $recipe)
            <div class="col">
                <div class="card" style="width: 18rem; margin-top: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $recipe["name"] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">$ {{ $recipe["price"] }}</h6>
                        <p class="card-text">{{ $recipe["description"] }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection