@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> Donation {{ $data["donations"]->getId() }} </div>

                    <div class="card-body">
                        <ul id="errors">
                        <li> {{ $data["donations"]->getPayment() }} </li>
                        <li> {{ $data["donations"]->getValue() }} </li>
                        <li> {{ $data["donations"]->getUserId() }} </li>
                        <br>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.donations.list', ['foundationId'=>$data["donations"]->getFoundationId()]) }}'">Back</button>    
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection