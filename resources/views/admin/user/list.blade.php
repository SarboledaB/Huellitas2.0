@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('util.message')
                <div class="card">
                    <div class="card-header">List of Users</div>
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
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data["users"] as $user)
                                <tr>
                                    @if($loop->iteration <= 2) <td scope="row"><a href="{{ route('admin.user.show', ['id' => $user->getId()]) }}"><b>{{ $user->getId() }}</b></a></td>
                                        @else
                                        <td scope="row"><a href="{{ route('admin.user.show', ['id' => $user->getId()]) }}">{{ $user->getId() }}</a></td>
                                        @endif
                                        <td>{{ $user->getUsername() }}</td>
                                        <td>{{ $user->getEmail() }}</td>
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