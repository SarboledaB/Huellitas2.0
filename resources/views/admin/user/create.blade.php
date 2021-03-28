@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('util.message')
            <div class="card">
                <div class="card-header">Create user</div>
                <div class="card-body">
                    @if($errors->any())
                    <ul id="errors">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif

                    <form class="form-group"method="POST" action="{{ route('admin.user.save') }}">
                        @csrf
                        <label >Username</label>
                        <input required class="form-control" type="text" placeholder="Enter username" name="username" value="{{ old('username') }}" />
                        <label >First Name</label>
                        <input required class="form-control" type="text" placeholder="Enter first name" name="firstName" value="{{ old('firstName') }}" />
                        <label >Last Name</label>
                        <input required class="form-control" type="text" placeholder="Enter last name" name="lastName" value="{{ old('lastName') }}" />
                        <label >Email address</label>
                        <input required class="form-control" type="email" placeholder="Enter email" name="email" value="{{ old('email') }}" />
                        <label >Password</label>
                        <input required class="form-control" type="password" placeholder="Password" name="password" value="{{ old('password') }}" />
                        <br>
                        <input class="btn btn-primary"type="submit" value="Send" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection