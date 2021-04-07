@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @lang('aplication.donation') {{ $data["donations"]->getId() }} </div>

                    <div class="card-body">
                        <ul id="errors">
                        <li> @lang('aplication.donation_id_') {{ $data["donations"]->getId() }} </li>
                        <li> @lang('aplication.date_') {{ $data["donations"]->getdate() }} </li>
                        <li> @lang('aplication.payment_method_') {{ $data["donations"]->getPayment() }} </li>
                        <li> @lang('aplication.value_') {{ $data["donations"]->getValue() }} </li>
                        <li> @lang('aplication.user_id_') {{ $data["donations"]->getUserId() }} </li>
                        <br>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.donations.list', ['foundationId'=>$data["donations"]->getFoundationId()]) }}'">@lang('aplication.back')</button>    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection