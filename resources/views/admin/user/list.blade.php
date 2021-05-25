@extends('layouts.app')



@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">@lang('general.status')</th>
                        <th scope="col">@lang('general.total_cost')</th>
                        <th scope="col">@lang('general.payment_method')</th>
                        <th scope="col">@lang('general.total_cost')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["users"] as $user)
                    <tr>
                        <td scope="row"><a href="{{ route('admin.user.show', ['id' => $user->getId()]) }}">{{ $user->getId() }}</a></td>
                        <td>{{ $user->getUsername() }}</td>
                        <td>{{ $user->getFirstName() }}</td>
                        <td>{{ $user->getLastName() }}</td>
                        <td>{{ $user->getEmail() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>
@endsection