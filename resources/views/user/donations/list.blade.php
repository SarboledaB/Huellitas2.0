@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('general.date')</th>
                        <th scope="col">@lang('foundation.foundation_id')</th>
                        <th scope="col">@lang('general.payment_method')</th>
                        <th scope="col">@lang('general.value')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["donations"] as $donation)
                    <tr>
                        <td>{{ $donation->getDate() }}</td>
                        <td>{{ $donation->getFoundationId() }}</td>
                        <td>{{ $donation->getPayment() }}</td>
                        <td>{{ $donation->getValue() }}</td>
                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="window.location=
                '{{ URL::route('user.foundations.list') }}'">@lang('general.back')</button>             
        </div>
    </div>
    
</section>    
@endsection