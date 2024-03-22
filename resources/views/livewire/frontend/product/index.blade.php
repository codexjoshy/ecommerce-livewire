<div id="products">
    @forelse ($categories as $category)
    <section id="smart-watches" class="product-store padding-large position-relative">
        <div class="container">
            <div class="row">
                <div class="display-header d-flex justify-content-between pb-3">
                    <h2 class="display-7 text-dark text-uppercase">{{ $category->title }}</h2>
                    <div class="btn-right">
                        {{-- <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a> --}}
                    </div>
                </div>
                <div class="swiper product-swiper">
                    <div class="swiper-wrapper">
                        @foreach ($category->products as $product)
                        <div class="swiper-slide">
                            <div class="product-card position-relative">
                                <div class="image-holder">
                                    <img src="{{ $product->image_url }}" alt="product-item" class="img-fluid">
                                </div>
                                <div class="cart-concern position-absolute">
                                    <div class="cart-button d-flex">
                                        <a href="#" class="btn btn-medium btn-black">Add to Cart<svg
                                                class="cart-outline">
                                                <use xlink:href="#cart-outline"></use>
                                            </svg></a>
                                    </div>
                                </div>
                                <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                                    <h3 class="card-title text-uppercase">
                                        <a href="{{ route('frontend.product.show', [$category->slug, $product->id]) }}">{{
                                            $product->name }}</a>
                                    </h3>
                                    <span class="item-price text-primary">${{ $product->price }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination position-absolute text-center"></div>
    </section>
    @empty

    @endforelse
</div>