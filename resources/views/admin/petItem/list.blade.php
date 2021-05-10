@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section">
    <div class="row p-5">
        <div class="col-md-12">
            @include('util.message')
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">@lang('aplication.name')</th>
                        <th scope="col">@lang('aplication.value')</th>
                        <th scope="col">@lang('aplication.category')</th>
                        <th scope="col">@lang('aplication.actions')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["petItems"] as $petItem)
                    <tr>
                        <td>{{ $petItem->getName() }}</td>
                        <td>{{ $petItem->getValue() }}</td>
                        <td>{{ $petItem->getCategory() }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.petItem.delete', ['id' => $petItem->getId()]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">@lang('aplication.delete')</button>
                            </form>
                            <a class="btn btn-primary " href="{{ route('admin.petItem.updateform', ['id' => $petItem->getId()]) }}" role="button">@lang('aplication.edit')</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection