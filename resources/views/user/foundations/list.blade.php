@extends('layouts.app')



@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('general.name')</th>
                        <th scope="col">@lang('general.description')</th>  
                        <th scope="col">@lang('general.action')</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["foundations"] as $foundation)
                    <tr>
                        <td>{{ $foundation->getName() }}</td>
                        <td>{{ $foundation->getDescription() }}</td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('user.foundations.show', ['id'=>$foundation->getId()]) }} '">@lang('general.see_more')</button></td>                                                                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="window.location=
                '{{ URL::route('user.donations.list') }}'">@lang('donation.my_donations')</button>   
        </div>
    </div>
    
</section>    
@endsection
