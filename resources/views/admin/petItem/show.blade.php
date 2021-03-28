@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">
                        {{ $data["petItem"]->getName()}}
                        <h6 class="text-muted">Rating: {{ $data["petItem"]->getRating() }}</h6>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Value: {{ $data["petItem"]->getValue()}}</h6>
                        <b>Details:</b> {{ $data["petItem"]->getDetails() }}<br />
                        <br />
                        <form method="POST" action="{{ route(admin.petItem.delete', ['id' => $data["petItem"]->getId()]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-lg btn-block">delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection