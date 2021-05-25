@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @lang('donation.donation') {{ $data["donations"]->getId() }} </div>

                    <div class="card-body">
                        <ul id="errors">
                        <li> @lang('donation.donation_id_') {{ $data["donations"]->getId() }} </li>
                        <li> @lang('general.date_') {{ $data["donations"]->getdate() }} </li>
                        <li> @lang('general.payment_method_') {{ $data["donations"]->getPayment() }} </li>
                        <li> @lang('general.value_') {{ $data["donations"]->getValue() }} </li>
                        <li> @lang('general.user_id_') {{ $data["donations"]->getUserId() }} </li>
                        <br>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.donations.list', ['foundationId'=>$data["donations"]->getFoundationId()]) }}'">@lang('general.back')</button>    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection