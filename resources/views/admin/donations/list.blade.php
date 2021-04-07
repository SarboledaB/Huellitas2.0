@extends('layouts.app')

@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">DonationID</th>
                        <th scope="col">Date</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Value</th>
                        <th scope="col">FoundationID</th>
                        <th scope="col">UserID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["donations"] as $donation)
                    <tr>
                        <td>{{ $donation->getId() }}</td>
                        <td>{{ $donation->getDate() }}</td>
                        <td>{{ $donation->getPayment() }}</td>
                        <td>{{ $donation->getValue() }}</td>
                        <td>{{ $donation->getFoundationId() }}</td>
                        <td>{{ $donation->getUserId() }}</td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('admin.donations.show', ['id'=>$donation->getId()]) }} '">See more</button></td>                                                                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
</section>    
@endsection


