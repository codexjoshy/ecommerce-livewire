<div>
    {{-- <section id="smart-watches" class="product-store  position-relative"> --}}
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="display-header d-flex justify-content-between pb-3">
                        <h2 class="display-7 text-dark text-uppercase">Wishlists</h2>
                        <div class="btn-right">
                            <a href="{{ route('frontend.product.index') }}"
                                class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
                        </div>
                    </div>
                    <x-product.list :products="$products" />
                </div>
            </div>
        </div>
        {{--
    </section> --}}
</div>