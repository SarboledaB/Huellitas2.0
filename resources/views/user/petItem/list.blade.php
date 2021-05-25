@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<section class="page-section portfolio">
  @foreach($data["categories"] as $category)
  <div class="container">
    <!-- Portfolio Section Heading-->
    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{$category->getName()}}</h2>
    <!-- Icon Divider-->
    <div class="divider-custom">
      <div class="divider-custom-line"></div>
      <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
      <div class="divider-custom-line"></div>
    </div>
      <div id="carouselExampleControls-{{$category->getName()}}" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          @foreach($category->pet_items as $key => $petItem)
            @if( $key === 0)
              <div class="carousel-item active">
                <div class="card mb-3">
                  <img class="card-img-top" src="{{ $petItem->getImage() }}" alt="Card image cap" height="250">
                  <div class="card-body">
                    <h5 class="card-title">{{$petItem->getName()}}</h5>
                    <p class="card-text">{{$petItem->getDetails()}}</p>
                    <p class="card-text"><small class="text-muted">{{$petItem->getValue()}}</small></p>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('user.petItem.show', ['id' => $petItem->getId()]) }}" role="button">@lang('general.see_more')</a>
                  </div>
                </div>
              </div>
            @else
              <div class="carousel-item">
                <div class="card mb-3">
                  <img class="card-img-top" src="{{ $petItem->getImage() }}" alt="Card image cap" height="250">
                  <div class="card-body">
                    <h5 class="card-title">{{$petItem->getName()}}</h5>
                    <p class="card-text">{{$petItem->getDetails()}}</p>
                    <p class="card-text"><small class="text-muted">{{$petItem->getValue()}}</small></p>
                    <a class="btn btn-primary btn-lg btn-block" href="{{ route('user.petItem.show', ['id' => $petItem->getId()]) }}" role="button">@lang('general.see_more')</a>
                  </div>
                </div>
              </div>
            @endif
          @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls-{{$category->getName()}}" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">@lang('general.previous')</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls-{{$category->getName()}}" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">@lang('general.next')</span>
        </a>
      </div>
  </div>
  </div>
  @endforeach
</section>
@endsection