@extends('layouts.app')
@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12 padding">
        <div class="card">
            <div class="card-header p-4">
                <div class="float-right">
                    {{$data["order"]->getCreatedAt()}}
                </div>
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h5 class="mb-3">To:</h5>
                        <h3 class="text-dark mb-1"> {{$data["user"]->getFirstName()}} {{$data["user"]->getLastName()}}</h3>
                        <div>{{$data["user"]->getEmail()}}</div>
                    </div>
                </div>
                <div class="table-responsive-sm">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="center">#</th>
                                <th>@lang('petItem.item')</th>
                                <th>@lang('general.details')</th>
                                <th class="right">@lang('general.value')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data["products"] as $key => $petItem)
                            <tr>
                                <td class="center">{{$key + 1 }}</td>
                                <td class="left strong">{{$petItem->getName()}}</td>
                                <td class="left">{{$petItem->getDetails()}}</td>
                                <td class="right">$ {{$petItem->getValue()}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-sm-5">
                    </div>
                    <div class="col-lg-4 col-sm-5 ml-auto">
                        <table class="table table-clear">
                            <tbody>
                                <tr>
                                    <td class="left">
                                        <strong class="text-dark">@lang('general.total')</strong>
                                    </td>
                                    <td class="right">
                                        <strong class="text-dark">$ {{$data["order"]->getTotal()}}</strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-white">
            </div>
        </div>
    </div>
</section>
@endsection