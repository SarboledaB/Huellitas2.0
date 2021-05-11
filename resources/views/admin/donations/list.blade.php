@extends('layouts.app')


@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('donation.donation_id')</th>
                        <th scope="col">@lang('general.date')</th>
                        <th scope="col">@lang('general.payment_method')</th>
                        <th scope="col">@lang('general.value')</th>
                        <th scope="col">@lang('foundation.foundation_id')</th>
                        <th scope="col">@lang('general.user_id')</th>
                        <th scope="col">@lang('general.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["donations"] as $donation)
                    <tr>
                        <td>{{ $donation->getId() }}</td>
                        <td>{{ $donation->getDate() }}</td>
                        <td>{{ $donation->getPayment() }}</td>
                        <td>{{ $donation->getValue() }}</td>
                        <td>{{ $donation->getFoundationId() }}</td>
                        <td>{{ $donation->getUserId() }}</td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.donations.show', ['id'=>$donation->getId()]) }} '">@lang('general.see_more')</button></td>                                                                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</section>    
@endsection


