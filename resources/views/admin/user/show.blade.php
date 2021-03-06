@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $data["user"]->getUsername() }}</div>
                    <div class="card-body">
                        <b>@lang('general.id_')</b> {{ $data["user"]->getId() }}<br />
                        <b>@lang('general.username_')</b> {{ $data["user"]->getUsername() }}<br />
                        <b>@lang('general.first_name_')</b> {{ $data["user"]->getFirstName() }}<br />
                        <b>@lang('general.last_name_')</b> {{ $data["user"]->getLastName() }}<br />
                        <b>@lang('general.email_')</b> {{ $data["user"]->getEmail() }}<br />
                        <br>
                        <a class="btn btn-outline-danger" href="{{ route('admin.user.delete', ['id' => $data['user']['id']] ) }}">@lang('general.delete')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection