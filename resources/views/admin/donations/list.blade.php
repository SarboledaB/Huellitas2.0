@extends('layouts.app')


@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('aplication.donation_id')</th>
                        <th scope="col">@lang('aplication.date')</th>
                        <th scope="col">@lang('aplication.payment_method')</th>
                        <th scope="col">@lang('aplication.value')</th>
                        <th scope="col">@lang('aplication.foundation_id')</th>
                        <th scope="col">@lang('aplication.user_id')</th>
                        <th scope="col">@lang('aplication.action')</th>
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
                        '{{ URL::route('admin.donations.show', ['id'=>$donation->getId()]) }} '">@lang('aplication.see_more')</button></td>                                                                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</section>    
@endsection


