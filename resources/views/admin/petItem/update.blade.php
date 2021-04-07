@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">@lang('aplication.create_product')</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form class="form-group" method="POST" action="{{ route('admin.petItem.update') }}" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="id" value="{{ $data['petItem']->getId() }}">
                            <label>@lang('aplication.name')</label>
                            <input class="form-control" type="text" placeholder="{{ $data['petItem']->getName() }}" name="name" value="{{ old('name') }}" required />
                            <br>
                            <label>@lang('aplication.details')</label>
                            <input class="form-control" type="text" placeholder="{{ $data['petItem']->getDetails() }}" name="details" value="{{ old('details') }}" required />
                            <br>
                            <label>@lang('aplication.value')</label>
                            <input class="form-control" type="number" min="0" placeholder="{{ $data['petItem']->getValue() }}" name="value" value="{{ old('value') }}" required />
                            <br>
                            <label>@lang('aplication.rating')</label>
                            <input class="form-control" type="number" min="0" placeholder="{{ $data['petItem']->getRating() }}" name="rating" value="{{ old('rating') }}" required />
                            <br>
                            <label>@lang('aplication.category')</label>
                            <select class="form-select form-control" name="category_id" value="{{ $data['petItem']->getCategory() }}" required>
                                <option value="0">Undefined</option>
                                @foreach($data["categories"] as $category)
                                <option value="{{$category->getId()}}">{{ $category->getName() }}</option>
                                @endforeach
                            </select>
                            <br>
                            <input class="btn btn-primary btn-lg btn-block" type="submit" value="Send" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection