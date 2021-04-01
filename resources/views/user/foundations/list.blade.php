@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            </br>
            </br>
            </br>
            <div class="card">
                <div class="card-header">Foundations</div>

                <div class="card-body">
                    <ul id="errors">
                    @foreach($data["foundations"] as $foundations)
                        <a href=" {{route('user.foundations.show', ['id'=>$foundations->getId()]) }} "><li>{{ $foundations->getName() }} : {{ $foundations->getDescription() }}</li></a>                  
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
