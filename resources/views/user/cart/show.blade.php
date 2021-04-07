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
                    <small>{{$product->getValue()}}</small>
                    <form method="POST" action="{{ route('user.cart.delete', ['id' => $product->getId()]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">@lang('aplication.delete')</button>
                    </form>
                    </div>
                    <p class="mb-1">{{$product->getDetails()}}</p>
                </a>
            @endforeach
        </div>
        <br>
        <a class="btn btn-primary btn-lg btn-block" href="{{ route('user.cart.buy')}}" role="button">@lang('aplication.buy')</a>
    </div>
</section>
@endsection