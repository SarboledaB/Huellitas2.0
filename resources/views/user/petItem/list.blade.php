@extends('layouts.app')

@section("title", $data["title"])

@section('content')

<section class="page-section portfolio">
  <a href="{{ route('user.recipes.list') }}" class="btn btn-primary btn-circle" role="button" data-bs-toggle="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
      <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
    </svg></a>
  @include('util.message')
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