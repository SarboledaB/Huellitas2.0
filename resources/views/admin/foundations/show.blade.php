@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $data["foundation"]->getName() }} </div>

                    <div class="card-body">
                        <ul id="errors">
                        <li> Foundation ID: {{ $data["foundation"]->getId() }} </li>
                        <li> Name: {{ $data["foundation"]->getName() }} </li>
                        <li> E-Mail: {{ $data["foundation"]->getEmail() }} </li>
                        <li> Description: {{ $data["foundation"]->getDescription() }} </li>   
                        <br>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.foundations.delete', ['id'=>$data["foundation"]->getId()]) }}'">Delete</button>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.foundations.updateform', ['id'=>$data["foundation"]->getId()]) }}'">Update</button>
                        <button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.donations.list', ['foundationId'=>$data["foundation"]->getId()]) }}'">See donations</button>                                                                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection