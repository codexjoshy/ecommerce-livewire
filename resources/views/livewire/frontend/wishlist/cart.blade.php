<div>
    @push('css')
    <style>
        /* Cart or Wishlist */
        .shopping-cart .cart-header {
            padding: 10px;
        }

        .shopping-cart .cart-header h4 {
            font-size: 18px;
            margin-bottom: 0px;
        }

        .shopping-cart .cart-item a {
            text-decoration: none;
        }

        .shopping-cart .cart-item {
            background-color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
            padding: 10px 10px;
            margin-top: 10px;
        }

        .shopping-cart .cart-item .product-name {
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;
            cursor: pointer;
        }

        .shopping-cart .cart-item .price {
            font-size: 16px;
            font-weight: 600;
            padding: 4px 2px;
        }

        .shopping-cart .btn1 {
            border: 1px solid;
            margin-right: 3px;
            border-radius: 0px;
            font-size: 10px;
        }

        .shopping-cart .btn1:hover {
            background-color: #2874f0;
            color: #fff;
        }

        .shopping-cart .input-quantity {
            border: 1px solid #000;
            margin-right: 3px;
            font-size: 12px;
            width: 40%;
            outline: none;
            text-align: center;
        }
    </style>
    @endpush

    @foreach ($wishlists as $wishlist)
    @php
    $product = optional($wishlist)->product ?? $wishlist; // for guest users
    if ($product) {
    $totalPrice += ($product->price * ($wishlist->quantity??1));
    }
    @endphp
    <div class="cart-item">
        <div class="row">
            <div class="col-md-6 my-auto">
                <a href="">
                    <label class="product-name">
                        <img src="{{ $product->image_url }}" style="width: 50px; height: 50px" alt="">
                        {{ $product->name }}
                    </label>
                </a>
            </div>
            <div class="col-md-2 my-auto">
                <label class="price">${{ $productService->formatPrice(($product->price *($wishlist->quantity??1)) ) }}
                </label>
            </div>
            <div class="col-md-2 col-7 my-auto">
                <div class="quantity">
                    <div class="input-group">
                        <button wire:click="decrement({{ $wishlist->id }})" class="btn btn1"><i
                                class="fa fa-minus"></i></button>
                        <input type="number" readonly value="{{ $wishlist->quantity ??  1 }}" class="input-quantity" />

                        <span wire:click="increment({{ $wishlist->id }})" class="btn btn1"><i
                                class="fa fa-plus"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-5 my-auto">
                <div class="remove">
                    <button href="" wire:click="removeCart({{ $wishlist->product_id }})" class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i> Remove
                    </button>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    <div class="cart-item">
        <div class="row">
            <div class="col-md-6 my-auto">
                <label class="product-name"> Total Amount Payable </label>
                </a>
            </div>
            <div class="col-md-2 my-auto">
                <label class="price">${{ $productService->formatPrice(($totalPrice)) }}
                </label>
            </div>
            {{-- <div class="col-md-2\ col-7 my-auto">
                <div class="quantity">
                    <div class="input-group">

                        <input type="number" readonly value="{{ $wishlists->sum('quantity') }}"
                            class="input-quantity" />


                    </div>
                </div>
            </div> --}}
            <div class="col-md-2 col-5 my-auto">
                <div class="">
                    <a href="" class="btn btn-primary btn-sm">
                        <i class="fa fa-shopping-cart"></i> Proceed to Checkout
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- more --}}
    <section id="instagram" class="padding-large overflow-hidden no-padding-top">
        <div class="container">
            <div class="row">
                <div class="display-header text-uppercase text-dark text-center p-5 ">
                    <h2 class="display-7">People also Viewed</h2>
                </div>
                <div class="d-flex flex-wrap">
                    @foreach ($mostViewed as $viewed)
                    <div>

                        <div class="instagram-item pe-2 flex-column">
                            <a wire:click="$emit('addToCart',{{ $viewed->id }})" class="image-link position-relative">
                                <img src="{{ $viewed->image_url }}" alt="{{ $viewed->name }}" class="insta-image">
                                <div class="icon-overlay position-absolute d-flex justify-content-center">
                                    <i class="fa fa-3x fa-shopping-cart text-info"></i>
                                    <strong class="text-info font-bolder">Add to cart</strong>
                                </div>
                            </a>
                        </div>
                        <div class="card-detail d-flex justify-content-around align-items-baseline pt-3">
                            <h3 class="card-title" style="font-size: medium">
                                <a
                                    href="{{ route('frontend.product.show', [$product->category->slug, $product->id]) }}">{{
                                    $viewed->name }}</a>
                            </h3>
                            <span class="item-price text-primary">${{ ($viewed->formatted_price) }}</span>
                        </div>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
</div>