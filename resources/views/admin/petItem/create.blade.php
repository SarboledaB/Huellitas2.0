@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">@lang('petItem.create_product')</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form class="form-group" method="POST" action="{{ route('admin.petItem.save') }}" enctype="multipart/form-data" >
                            @csrf
                            <label>@lang('general.name')</label>
                            <input class="form-control" type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" required />
                            <br>
                            <label>@lang('general.details')</label>
                            <input class="form-control" type="text" placeholder="Enter details" name="details" value="{{ old('details') }}" required />
                            <br>
                            <label>@lang('general.value')</label>
                            <input class="form-control" type="number" min="0" placeholder="Enter value" name="value" value="{{ old('value') }}" required />
                            <br>
                            <label>@lang('category.rating')</label>
                            <input class="form-control" type="number" min="0" placeholder="Enter rating" name="rating" value="{{ old('rating') }}" required />
                            <br>
                            <label>@lang('general.category')</label>
                            <select class="form-select form-control" name="category_id" value="{{ old('category_id') }}" required>
                                <option value="0">@lang('general.undefined')</option>
                                @foreach($data["categories"] as $category)
                                <option value="{{$category->getId()}}">{{ $category->getName() }}</option>
                                @endforeach
                            </select>
                            <br>
                            <div class="form-group">
                                <label>@lang('general.image')</label>
                                <input type="file" name="image"/>
                            </div>
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