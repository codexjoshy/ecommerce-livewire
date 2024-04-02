<section id="smart-watches" class="product-store padding-large position-relative">
    @push('css')
    <style>
        /* Product View */
        .product-view .product-name {
            font-size: 24px;
            color: #2874f0;
        }

        .product-view .product-name .label-stock {
            font-size: 13px;
            padding: 4px 13px;
            border-radius: 5px;
            color: #fff;
            box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
            float: right;
        }

        .product-view .product-path {
            font-size: 13px;
            font-weight: 500;
            color: #252525;
            margin-bottom: 16px;
        }

        .product-view .selling-price {
            font-size: 26px;
            color: #000;
            font-weight: 600;
            margin-right: 8px;
        }

        .product-view .original-price {
            font-size: 18px;
            color: #937979;
            font-weight: 400;
            text-decoration: line-through;
        }

        .product-view .btn1 {
            border: 1px solid;
            margin-right: 3px;
            border-radius: 0px;
            font-size: 14px;
            margin-top: 10px;
        }

        .product-view .btn1:hover {
            background-color: #2874f0;
            color: #fff;
        }

        .product-view .input-quantity {
            border: 1px solid #000;
            margin-right: 3px;
            font-size: 12px;
            margin-top: 10px;
            width: 58px;
            outline: none;
            text-align: center;
        }
    </style>
    @endpush
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            @if(session('error'))
            <div class="alert alert-danger alert-dismissable">
                {{ session('error') }}

            </div>
            @endif
            @if(session('success'))
            <div class="alert alert-success alert-dismissable">
                {{ session('success') }}
            </div>
            @endif
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        <img src="{{ $product->image_url }}" class="w-100" alt="Img">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                            <label class="label-stock bg-success">In Stock</label>
                        </h4>
                        <hr>
                        <p class="product-path">
                            <a href="{{ route('frontend.product.index') }}">Products</a> / <a>{{ $product->name }}</a>
                        </p>
                        <div>
                            <span class="selling-price">${{ $price }}</span>
                            {{-- <span class="original-price">$499</span> --}}
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrement"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model.defer='productCount' value="" class="input-quantity" />
                                <span class="btn btn1" wire:click="increment"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button wire:click="$emit('addToCart',{{ $product->id }})" class="btn btn-primary">
                                <i class="fa fa-shopping-cart"></i>Add To Cart
                            </button>
                            @if ($wishList)
                            <span wire:loading.attr="disabled" wire:click="removeFromWishList({{ $product->id }})"
                                class="btn btn-danger">
                                <span wire:loading.remove>
                                    <i class="fa fa-heart"></i> Remove from Wishlist
                                </span>
                                <strong wire:loading
                                    wire:target="removeFromWishList({{ $product->id }})">Removing...</strong>
                            </span>
                            @else
                            <span wire:click="addToWishList({{ $product->id }})" class="btn btn-primary"> <i
                                    class="fa fa-heart"></i> Add To Wishlist
                            </span>
                            @endif
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                                {{$product->description}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>