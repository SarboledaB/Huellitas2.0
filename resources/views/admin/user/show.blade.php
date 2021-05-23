@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $data["user"]->getUsername() }}</div>
                <div class="card-body">
                    <b>Id:</b> {{ $data["user"]->getId() }}<br />
                    <b>Username:</b> {{ $data["user"]->getUsername() }}<br />
                    <b>First Name:</b> {{ $data["user"]->getFirstName() }}<br />
                    <b>Last Name:</b> {{ $data["user"]->getLastName() }}<br />
                    <b>Email:</b> {{ $data["user"]->getEmail() }}<br />
                    <b>Password:</b> {{ $data["user"]->getPassword() }}<br />
                    <br>
                    <a class="btn btn-outline-danger" href="{{ route('admin.user.delete', ['id' => $data['user']['id']] ) }}">@lang('general.delete')</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection