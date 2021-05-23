@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">@lang('general.list_of_orders')</div>
                    <div class="card-body">
                        @if($errors->any())
                        <ul id="errors">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('general.status')</th>
                                    <th scope="col">@lang('general.total_cost')</th>
                                    <th scope="col">@lang('general.payment_method')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data["orders"] as $order)
                                <tr>
                                    <td scope="row"><a href="{{ route('user.order.show', ['id' => $order->getId()]) }}">{{ $order->getId() }}</a></td>
                                    <td>{{ $order->getStatus() }}</td>
                                    <td>{{ $order->getTotal() }}</td>
                                    <td>{{ $order->getPayment() }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection