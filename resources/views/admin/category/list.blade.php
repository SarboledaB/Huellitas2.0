@extends('layouts.app')

@section("title", $data["title"])

@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            @include('util.message')
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["categories"] as $category)
                    <tr>
                        <td>{{ $category->getId() }}</td>
                        <td>{{ $category->getName() }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.category.delete', [$category->getId()]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">delete</button>
                            </form>
                            <button type="button" class="btn btn-secondary">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection