@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $data["foundation"]->getName() }} </div>

                    <div class="card-body">
                        <ul id="errors">
                        <li> @lang('general.foundation_id_') {{ $data["foundation"]->getId() }} </li>
                        <li> @lang('general.name_') {{ $data["foundation"]->getName() }} </li>
                        <li> @lang('general.email_') {{ $data["foundation"]->getEmail() }} </li>
                        <li> @lang('general.description_') {{ $data["foundation"]->getDescription() }} </li>   
                        <br>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.foundations.delete', ['id'=>$data["foundation"]->getId()]) }}'">@lang('general.delete')</button>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.foundations.updateform', ['id'=>$data["foundation"]->getId()]) }}'">@lang('general.update')</button>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.donations.list', ['foundationId'=>$data["foundation"]->getId()]) }}'">@lang('donation.see_donations')</button>                                                                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection