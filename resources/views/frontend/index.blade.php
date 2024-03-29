@extends('layouts.frontend')

@section('content')

<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
  <div class="swiper main-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6">
              <div class="banner-content">
                <h1 class="display-2 text-uppercase text-dark pb-5">Discover Time's Finest Collection!</h1>
                <a href="{{ route('frontend.product.index') }}" style="z-index: 10000;"
                  class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
              </div>
            </div>
            <div class="col-md-5">
              <div class="image-holder">
                <img src="{{ asset('assets/images/banner-image.png' ) }}" alt="banner">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="container">
          <div class="row d-flex flex-wrap align-items-center">
            <div class="col-md-6">
              <div class="banner-content">
                <h1 class="display-2 text-uppercase text-dark pb-5">Technology Hack You Won't Get</h1>
                <a href="{{ route('frontend.product.index') }}"
                  class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
              </div>
            </div>
            <div class="col-md-5">
              <div class="image-holder">
                <img src="{{ asset('assets/images/post-item1.jpg') }}" alt="banner">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-icon swiper-arrow swiper-arrow-prev">
    <svg class="chevron-left">
      <use xlink:href="#chevron-left" />
    </svg>
  </div>
  <div class="swiper-icon swiper-arrow swiper-arrow-next">
    <svg class="chevron-right">
      <use xlink:href="#chevron-right" />
    </svg>
  </div>
</section>
<section id="company-services" class="padding-large">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="cart-outline">
              <use xlink:href="#cart-outline" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Free delivery</h3>
            <p>Experience hassle-free shopping with Free Delivery on every order!.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="quality">
              <use xlink:href="#quality" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Quality guarantee</h3>

            <p>Shop with confidence knowing our Quality Guarantee ensures satisfaction.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="price-tag">
              <use xlink:href="#price-tag" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">Daily offers</h3>

            <p>Discover Daily Offers for unbeatable savings on your favorite products.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 pb-3">
        <div class="icon-box d-flex">
          <div class="icon-box-icon pe-3 pb-3">
            <svg class="shield-plus">
              <use xlink:href="#shield-plus" />
            </svg>
          </div>
          <div class="icon-box-content">
            <h3 class="card-title text-uppercase text-dark">100% secure payment</h3>
            <p>Enjoy peace of mind with 100% Secure Payment options at checkout.</p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@livewire('frontend.product.index', ['categories' => $categories])

<section id="yearly-sale" class="bg-light-blue overflow-hidden mt-5 padding-xlarge"
  style="background-image: url('{{ asset('assets/images/single-image1.png') }}');background-position: right; background-repeat: no-repeat;">
  <div class="row d-flex flex-wrap align-items-center">
    <div class="col-md-6 col-sm-12">
      <div class="text-content offset-4 padding-medium">
        <h3>10% off</h3>
        <h2 class="display-2 pb-5 text-uppercase text-dark">Offer of the Month</h2>
        <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Sale</a>
      </div>
    </div>
    <div class="col-md-6 col-sm-12">

    </div>
  </div>
</section>
<section id="instagram" class="padding-large overflow-hidden no-padding-top">
  <div class="container">
    <div class="row">
      <div class="display-header text-uppercase text-dark text-center p-5 ">
        <h2 class="display-7">Most Viewed</h2>
      </div>
      <div class="d-flex flex-wrap">
        @foreach ($mostViewed as $viewed)
        <figure class="instagram-item pe-2">
          <a href="https://templatesjungle.com/" class="image-link position-relative">
            <img src="{{ $viewed->image_url }}" alt="{{ $viewed->name }}" class="insta-image">
            <div class="icon-overlay position-absolute d-flex justify-content-center">
              <svg class="instagram">
                <use xlink:href="#linkedin"></use>
              </svg>
            </div>
          </a>
        </figure>
        @endforeach

      </div>
    </div>
  </div>
</section>

<section id="testimonials" class="position-relative">
  <div class="container">
    <div class="row">
      <div class="review-content position-relative">
        <div class="swiper-icon swiper-arrow swiper-arrow-prev position-absolute d-flex align-items-center">
          <svg class="chevron-left">
            <use xlink:href="#chevron-left" />
          </svg>
        </div>
        <div class="swiper testimonial-swiper">
          <div class="quotation text-center">
            <svg class="quote">
              <use xlink:href="#quote" />
            </svg>
          </div>
          <div class="swiper-wrapper">
            <div class="swiper-slide text-center d-flex justify-content-center">
              <div class="review-item col-md-10">
                <i class="icon icon-review"></i>
                <blockquote>“Absolutely love my new watch from this e-store! The quality is outstanding and the price
                  was unbeatable. Will definitely
                  be shopping here again!”</blockquote>
                <div class="rating">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-half">
                    <use xlink:href="#star-half"></use>
                  </svg>
                  <svg class="star star-empty">
                    <use xlink:href="#star-empty"></use>
                  </svg>
                </div>
                <div class="author-detail">
                  <div class="name text-dark text-uppercase pt-2">Victor</div>
                </div>
              </div>
            </div>
            <div class="swiper-slide text-center d-flex justify-content-center">
              <div class="review-item col-md-10">
                <i class="icon icon-review"></i>
                <blockquote>“I ordered a gadget from this e-store and was pleasantly surprised by how quickly it
                  arrived. The product exceeded my
                  expectations and the customer service was top-notch. Highly recommend!”
                </blockquote>
                <div class="rating">
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-fill">
                    <use xlink:href="#star-fill"></use>
                  </svg>
                  <svg class="star star-half">
                    <use xlink:href="#star-half"></use>
                  </svg>
                  <svg class="star star-empty">
                    <use xlink:href="#star-empty"></use>
                  </svg>
                </div>
                <div class="author-detail">
                  <div class="name text-dark text-uppercase pt-2">Jennie</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-icon swiper-arrow swiper-arrow-next position-absolute d-flex align-items-center">
          <svg class="chevron-right">
            <use xlink:href="#chevron-right" />
          </svg>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-pagination"></div>
</section>
<section id="subscribe" class="container-grid padding-large position-relative overflow-hidden">
  <div class="container">
    <div class="row">
      <div class="subscribe-content bg-dark d-flex flex-wrap justify-content-center align-items-center padding-medium">
        <div class="col-md-6 col-sm-12">
          <div class="display-header pe-3">
            <h2 class="display-7 text-uppercase text-light">Get in touch</h2>
            <p>Lets take your business to the next level! I'm just a message away 🥂</p>
          </div>
        </div>
        <div class="col-md-5 col-sm-12">
          <form class="subscription-form validate">
            <div class="form-group">
              <textarea class="form-control" rows="3" placeholder="Type your message"></textarea>
            </div>
            <div class="input-group flex-wrap">
              <input class="form-control btn-rounded-none" type="email" name="EMAIL"
                placeholder="Your email address here" required="">
              <button class="btn btn-medium btn-primary text-uppercase btn-rounded-none" type="submit"
                name="subscribe">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
@push('scripts')
<script type="text/javascript" src="{{ asset('assets/js/script.js') }}"></script>
@endpush