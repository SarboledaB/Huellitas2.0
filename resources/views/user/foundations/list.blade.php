@extends('layouts.app')



@section('content')
<section class="page-section portfolio">
    <div class="row p-5">
        <div class="col-md-12">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">@lang('aplication.name')</th>
                        <th scope="col">@lang('aplication.description')</th>  
                        <th scope="col">@lang('aplication.action')</th>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($data["foundations"] as $foundation)
                    <tr>
                        <td>{{ $foundation->getName() }}</td>
                        <td>{{ $foundation->getDescription() }}</td>
                        <td><button type="button" class="btn btn-primary" onclick="window.location=
                        '{{ URL::route('user.foundations.show', ['id'=>$foundation->getId()]) }} '">@lang('aplication.see_more')</button></td>                                                                    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" onclick="window.location=
                '{{ URL::route('user.donations.list') }}'">@lang('aplication.my_donations')</button>   
        </div>
    </div>
    
</section>    
@endsection
