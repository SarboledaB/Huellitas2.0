@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="list-group">
            @foreach($data["products"] as $product)
                <a href="#" class="list-group-item list-group-item-actio">
                    <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$product->getName()}}</h5>
                    <small>3 days ago</small>
                    </div>
                    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                    <small>Donec id elit non mi porta.</small>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endsection