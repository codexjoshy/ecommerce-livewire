@props(['products'=> []])
@push('css')
<style>
  .section {
    min-height: 100vh;
  }

  .top {
    padding-top: 10%;
    padding-bottom: 20%;
  }
</style>
@endpush

<div class="swiper product-swiper">
  <div class="swiper-wrappers d-flex gap-5 flex-wrap" style="flex-wrap: wrap!important;">
    @foreach ($products as $product)
    <div class="swiper-slide " style="width:25%; margin-bottom:10%; align-items:center">
      <div class="product-card">
        <div class="image-holder">
          <img src="{{ $product->image_url }}" alt="product-item" class="img-fluid">
        </div>
        <div class="cart-concern ">
          <div class="cart-button d-flex">
            <button wire:click="$emit('addToCart',{{ $product->id }})" href="#" class="btn btn-medium btn-black">Add to
              Cart<svg class="cart-outline">
                <use xlink:href="#cart-outline"></use>
              </svg></button>
          </div>
        </div>
        <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
          <h3 class="card-title" style="font-size: medium">
            <a href="{{ route('frontend.product.show', [$product->category->slug, $product->id]) }}">{{
              $product->name }}</a>
          </h3>
          <span class="item-price text-primary">${{ ($product->formatted_price) }}</span>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>