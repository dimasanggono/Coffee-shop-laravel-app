@extends('layouts.app')

@section('content')
<section class="header">
    <div class="container">
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel" data-aos="fade-left" data-aos-duration="120">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{url('frontend/images/bg_banner.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{url('frontend/images/banner2.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{url('frontend/images/bg_banner.jpg')}}" class="d-block w-100" alt="...">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="menu mt-5" id="product">
    <div class="container">
        <h2 class="text-center">Our <span class=text-warning> Menu </span></h2>
        <div class="row mt-2 button-group filter-button-group">
            <div class="col d-flex justify-content-center filter">
                <button class="btn btn-primary mx-1 text-dark" data-filter="*">All</button>
                <button class="btn btn-primary   mx-1 text-dark" data-filter=".Coffee">Coffee</button>
                <button class="btn btn-primary mx-1 text-dark" data-filter=".Noun-Coffee">Noun Coffee</button>
                <button class="btn btn-primary  mx-1 text-dark" data-filter=".Foods">Foods</button>
            </div>
        </div>
        <div class="row row-cols-1 row-cols-md-3" id="product-list">
            @foreach ($product as $item )
            <div class="col-md-6 col-lg-3 {{$item->category->name}}">
                <div class="product-item shadow">
                    <div class="product-img">
                        <img src="{{Storage::url($item->image)}}" class="img-fluid w-90 d-block mx-auto">
                    </div>
                    <div class="product-content text-center">
                        <span class="d-block product-name">{{$item->name_product}}</span>
                        @if($item->category->name == 'Coffee')
                        <span class="badge text-bg-danger">{{$item->category->name}}</span>
                        @elseif ($item->category->name == 'Noun-Coffee')
                        <span class="badge text-bg-primary">{{$item->category->name}}</span>
                        @else
                        <span class="badge text-bg-success">{{$item->category->name}}</span>
                        @endif

                        <span class="d-block">Rp.{{number_format($item->price)}}</span>
                        <div class="d-flex justify-content-center">
                            @auth
                            <button class="btn btn-sm btn-content" data-bs-toggle="modal" data-bs-target=".{{$item->name_product}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <form action="{{route('cart.add', $item->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-content"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
                            </form>
                            @else
                            <button class="btn btn-sm btn-content" data-bs-toggle="modal" data-bs-target=".{{$item->name_product}}"><i class="fa fa-eye" aria-hidden="true"></i></button>
                            <a href="{{route('login')}}" class="btn btn-sm btn-content"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Modal -->

    @foreach ($product as $item )
    <div class="modal fade {{$item->name_product}}" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Product</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{Storage::url($item->image)}}" alt="" class="img-fluid w-90 d-block mx-auto rounded">
                    <div class="modal-content text-center  mt-3">
                        <h3 class="d-block text-center">{{$item->name_product}}</h3>
                        <p>{!!$item->description!!}</p>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</section>
@endsection