@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Foundation ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-Mail</th>  
                        <th scope="col">Action</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["foundations"] as $foundation)
                    <tr>
                        <td>{{ $foundation->getId() }}</td>
                        <td>{{ $foundation->getName() }}</td>
                        <td>{{ $foundation->getEmail() }}</td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.foundations.show', ['id'=>$foundation->getId()]) }} '">See more</button></td>                                                                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</section>    
@endsection

