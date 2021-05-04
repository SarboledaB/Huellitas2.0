@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">@lang('category.create_category')</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        <form class="form-group" method="POST" action="{{ route('admin.category.save') }}">
                            @csrf
                            <label>@lang('general.name')</label>
                            <input class="form-control" type="text" placeholder="Enter name" name="name" value="{{ old('name') }}" required />
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