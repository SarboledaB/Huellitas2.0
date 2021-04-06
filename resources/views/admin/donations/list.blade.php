@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">List of donations</div>

                    <div class="card-body">
                        <ul id="errors">
                        @foreach($data["donations"] as $donations)
                            <a href=" {{route('admin.donations.show', ['id'=>$donations->getId()]) }} "><li>{{ $donations->getId() }} - {{ $donations->getPayment() }} : {{ $donations->getValue() }}</li></a>
                        @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
