<div class='row top '>
    <div class='col-md-3'>

        <div class="flex flex-column position-fixed">
            <div class="card ">
                <div class="card-header">
                    <h2>Categories</h2>

                </div>
                <div class="card-body">
                    <form>
                        @foreach ($categories as $category)

                        <label wire:key="cat-{{ $category->id }}" class='d-block p-3 text-muted'>
                            <input wire:model="selectedCategory" type='checkbox' value='{{ $category->id }}' /> {{
                            $category->title }}
                        </label>
                        @endforeach
                    </form>

                </div>
            </div>
            <div class="card  mt-3">
                <div class="card-header">
                    <h2>Prices</h2>

                </div>
                <div class="card-body">
                    <label wire:key="price-{{ $category->id }}" class='d-block p-3 text-muted'>
                        <input name="price-input" wire:model="priceInput" type='radio' value='high-to-low' /> High to
                        Low
                    </label>
                    <label wire:key="price2-{{ $category->id }}" class='d-block p-3 text-muted'>
                        <input name="price-input" wire:model="priceInput" type='radio' value='low-to-high' /> Low to
                        High
                    </label>

                </div>
            </div>

        </div>
    </div>
    <div class='col-md-9'>
        <div class="display-header d-flex justify-content-between pb-3">
            <h2 class="display-7 text-dark text-uppercase">Products</h2>
            <div class="btn-right">
            </div>
        </div>
        <x-product.list :products="$products" />
        {{-- <div class="swiper product-swiper">
            <div class="swiper-wrappers d-flex justify-content-between flex-wrap" style="flex-wrap: wrap!important;">
                @foreach ($products as $product)
                <div class="swiper-slide " style="width:30%; margin-bottom:10%;">
                    <div class="product-card">
                        <div class="image-holder">
                            <img src="{{ $product->image_url }}" alt="product-item" class="img-fluid">
                        </div>
                        <div class="cart-concern ">
                            <div class="cart-button d-flex">
                                <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                                        <use xlink:href="#cart-outline"></use>
                                    </svg></a>
                            </div>
                        </div>
                        <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                            <h3 class="card-title">
                                <a href="{{ route('frontend.product.show', [$category->slug, $product->id]) }}">{{
                                    $product->name }}</a>
                            </h3>
                            <span class="item-price text-primary">${{ ($product->formatted_price) }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div> --}}

    </div>
</div>