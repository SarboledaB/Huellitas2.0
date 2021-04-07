@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            @include('util.message')
                <div class="card">
                    <div class="card-header">@lang('aplication.donate')</div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('user.donations.save') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="payment" class="col-md-4 col-form-label text-md-right">{{ __('Payment method') }}</label>

                                <div class="col-md-6">
                                    <select required type="text" input id="payment" type="text" class="form-control @error('payment') is-invalid @enderror" name="payment" value="{{ old('payment') }}" required autocomplete="payment" autofocus>
                                        <option value="Debit" >@lang('aplication.debit')</option>
                                        <option value="Credit" >@lang('aplication.credit')</option>
                                    </select>
                                    @error('payment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>

                                <div class="col-md-6">
                                    <input id="value" type="number" class="form-control @error('value') is-invalid @enderror" name="value" value="{{ old('value') }}" required autocomplete="value" autofocus>

                                    @error('value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="foundation_id" input type="hidden" type="number" class="form-control @error('foundation_id') is-invalid @enderror" name="foundation_id" value="{{ $data['foundationId'] }}" required autocomplete="foundation_id" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="user_id" input type="hidden" type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ $data['userId'] }}" required autocomplete="user_id" autofocus>
                                </div>
                            </div>                        

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Donate') }}
                                    </button>
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