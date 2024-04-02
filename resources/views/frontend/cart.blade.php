@extends('layouts.frontend')

@section('content')
<div class="container  padding-xlarge">
  <div class="display-header d-flex justify-content-between pb-3">
    <h2 class="display-7 text-dark text-uppercase">My Cart</h2>
    <div class="btn-right">
      <a href="{{ route('frontend.product.index') }}" class="btn btn-medium btn-normal text-uppercase">Continue
        Shopping</a>
    </div>
  </div>
  <div class="py-3 py-md-5 bg-light">
    <div class="container">

      <div class="row">
        <div class="col-md-12">
          <div class="shopping-cart">

            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
              <div class="row">
                <div class="col-md-6">
                  <h4>Products</h4>
                </div>
                <div class="col-md-2">
                  <h4>Price</h4>
                </div>
                <div class="col-md-2">
                  <h4>Quantity</h4>
                </div>
                <div class="col-md-2">
                  <h4>Remove</h4>
                </div>
              </div>
            </div>
            <livewire:frontend.wishlist.cart />


          </div>
        </div>
      </div>

    </div>
  </div>
</div>

@endsection