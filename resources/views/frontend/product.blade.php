@extends('frontend.index')
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url({{asset('frontend/assets/images/background/8.jpg')}})">
        <div class="auto-container">
            <div class="content">
                <h3 style="color: #fff;">All <span>Products</span></h3>
                <ul class="page-breadcrumb">
                    <li><a href="{{route('frontend.home')}}">Home</a></li>
                    <li>All Product</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- products Section Ten -->
    <section class="products-section-ten style-two">
        <div class="auto-container">
            <!-- Sec Title -->

            <div class="row clearfix" style="margin-top: 10px;">
                @foreach($product_info as $product)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            <img src="{{ asset($product->product_image) }}" class="card-img-top" alt="{{ $product->product_name }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title"><a href="{{route('frontend.products-details',$product->slug)}}">{{ $product->product_name }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection
