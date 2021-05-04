@extends('layouts.app')



@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">@lang('foundation.foundation_new_data')</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.foundations.update') }}">
                            

                            @csrf

                            <input type="hidden" name="id" value="{{ $data['foundation']->getId() }}">

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">@lang('general.name')</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="{{ $data['foundation']->getName() }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">@lang('general.email')</label>

                                <div class="col-md-6">
                                    <input id="email" type="text" placeholder="{{ $data['foundation']->getEmail() }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">@lang('general.description')</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" placeholder="{{ $data['foundation']->getDescription() }}" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @lang('general.update')
                                    </button>
                                    <button type="button" class="btn btn-primary" onclick="window.location=
                                    '{{ URL::route('admin.foundations.show', ['id'=>$data['foundation']->getId()]) }} '">@lang('general.back')</button>
                                </div>
                            </div>  
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
