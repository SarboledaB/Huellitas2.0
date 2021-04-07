@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4>{{$data["user"]->getUsername()}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('aplication.full_name')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$data["user"]->getFirstName()}} {{$data["user"]->getLastName()}}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">@lang('aplication.email')</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{$data["user"]->getEmail()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <!-- <th scope="col">ID</th> -->
                                    <th scope="col">@lang('aplication.id')</th>
                                    <th scope="col">@lang('aplication.date')</th>
                                    <th scope="col">@lang('aplication.total')</th>
                                    <th scope="col">@lang('aplication.actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data["orders"] as $key => $order)
                                <tr>
                                    <td>{{$order->getId()}}</td>
                                    <td>{{$order->getCreatedAt()}}</td>
                                    <td>{{$order->getTotal()}}</td>
                                    <td><a class="btn btn-primary " href="" role="button">@lang('aplication.show')</a></td>
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