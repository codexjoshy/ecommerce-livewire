@extends('layouts.frontend')

@section('content')
<header id="header" class="site-header header-scrolled position-fixed text-black bg-light">
  <nav id="header-nav" class="navbar navbar-expand-lg px-3 mb-3">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html">
        <img src="{{ asset('assets/images/main-logo.png') }}" class="logo">
      </a>
      <button class="navbar-toggler d-flex d-lg-none order-3 p-2" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
        <svg class="navbar-icon">
          <use xlink:href="#navbar-icon"></use>
        </svg>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar" aria-labelledby="bdNavbarOffcanvasLabel">
        <div class="offcanvas-header px-4 pb-0">
          <a class="navbar-brand" href="index.html">
            <img src="{{ asset('assets/images/main-logo.png') }}" class="logo">
          </a>
          <button type="button" class="btn-close btn-close-black" data-bs-dismiss="offcanvas" aria-label="Close"
            data-bs-target="#bdNavbar"></button>
        </div>
        <div class="offcanvas-body">
          <ul id="navbar" class="navbar-nav text-uppercase justify-content-end align-items-center flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link me-4 active" href="#billboard">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="#company-services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="#mobile-products">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="#smart-watches">Watches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="#yearly-sale">Sale</a>
            </li>
            <li class="nav-item">
              <a class="nav-link me-4" href="#latest-blog">Blog</a>
            </li>

            <li class="nav-item">
              <div class="user-items ps-5">
                <ul class="d-flex justify-content-end list-unstyled">
                  <li class="search-item pe-3">
                    <a href="#" class="search-button">
                      <svg class="search">
                        <use xlink:href="#search"></use>
                      </svg>
                    </a>
                  </li>
                  <li class="pe-3">
                    <a href="#">
                      <svg class="user">
                        <use xlink:href="#user"></use>
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="cart.html">
                      <svg class="cart">
                        <use xlink:href="#cart"></use>
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
</header>
<section id="billboard" class="position-relative overflow-hidden bg-light-blue">
  <div class="swiper main-swiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide">
        <div class="container">
          <div class="row d-flex align-items-center">
            <div class="col-md-6">
              <div class="banner-content">
                <h1 class="display-2 text-uppercase text-dark pb-5">Discover Time's Finest Collection!</h1>
                <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
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
                <a href="shop.html" class="btn btn-medium btn-dark text-uppercase btn-rounded-none">Shop Product</a>
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
<section id="mobile-products" class="product-store position-relative padding-large no-padding-top">
  <div class="container">
    <div class="row">
      <div class="display-header d-flex justify-content-between pb-3">
        <h2 class="display-7 text-dark text-uppercase">Mobile Products</h2>
        <div class="btn-right">
          <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
        </div>
      </div>
      <div class="swiper product-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item1.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 10</a>
                </h3>
                <span class="item-price text-primary">$980</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item2.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 11</a>
                </h3>
                <span class="item-price text-primary">$1100</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item3.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 8</a>
                </h3>
                <span class="item-price text-primary">$780</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item4.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 13</a>
                </h3>
                <span class="item-price text-primary">$1500</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item5.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Iphone 12</a>
                </h3>
                <span class="item-price text-primary">$1300</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-pagination position-absolute text-center"></div>
</section>
<section id="smart-watches" class="product-store padding-large position-relative">
  <div class="container">
    <div class="row">
      <div class="display-header d-flex justify-content-between pb-3">
        <h2 class="display-7 text-dark text-uppercase">Smart Watches</h2>
        <div class="btn-right">
          <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
        </div>
      </div>
      <div class="swiper product-watch-swiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item6.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Pink watch</a>
                </h3>
                <span class="item-price text-primary">$870</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item7.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">Heavy watch</a>
                </h3>
                <span class="item-price text-primary">$680</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item8.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">spotted watch</a>
                </h3>
                <span class="item-price text-primary">$750</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="{{ asset('assets/images/product-item9.jpg') }}" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">black watch</a>
                </h3>
                <span class="item-price text-primary">$650</span>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-card position-relative">
              <div class="image-holder">
                <img src="images/product-item10.jpg" alt="product-item" class="img-fluid">
              </div>
              <div class="cart-concern position-absolute">
                <div class="cart-button d-flex">
                  <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline">
                      <use xlink:href="#cart-outline"></use>
                    </svg></a>
                </div>
              </div>
              <div class="card-detail d-flex justify-content-between pt-3">
                <h3 class="card-title text-uppercase">
                  <a href="#">black watch</a>
                </h3>
                <span class="item-price text-primary">$750</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="swiper-pagination position-absolute text-center"></div>
</section>
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
        <figure class="instagram-item pe-2">
          <a href="https://templatesjungle.com/" class="image-link position-relative">
            <img src="{{ asset('assets/images/insta-item1.jpg') }}" alt="instagram" class="insta-image">
            <div class="icon-overlay position-absolute d-flex justify-content-center">
              <svg class="instagram">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class="instagram-item pe-2">
          <a href="https://templatesjungle.com/" class="image-link position-relative">
            <img src="{{ asset('assets/images/insta-item2.jpg') }}" alt="instagram" class="insta-image">
            <div class="icon-overlay position-absolute d-flex justify-content-center">
              <svg class="instagram">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class="instagram-item pe-2">
          <a href="https://templatesjungle.com/" class="image-link position-relative">
            <img src="{{ asset('assets/images/insta-item3.jpg') }}" alt="instagram" class="insta-image">
            <div class="icon-overlay position-absolute d-flex justify-content-center">
              <svg class="instagram">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class="instagram-item pe-2">
          <a href="https://templatesjungle.com/" class="image-link position-relative">
            <img src="{{ asset('assets/images/insta-item4.jpg') }}" alt="instagram" class="insta-image">
            <div class="icon-overlay position-absolute d-flex justify-content-center">
              <svg class="instagram">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
        <figure class="instagram-item pe-2">
          <a href="https://templatesjungle.com/" class="image-link position-relative">
            <img src="{{ asset('assets/images/insta-item5.jpg') }}" alt="instagram" class="insta-image">
            <div class="icon-overlay position-absolute d-flex justify-content-center">
              <svg class="instagram">
                <use xlink:href="#instagram"></use>
              </svg>
            </div>
          </a>
        </figure>
      </div>
    </div>
  </div>
</section>
{{-- <section id="latest-blog" class="padding-large">
  <div class="container">
    <div class="row">
      <div class="display-header d-flex justify-content-between pb-3">
        <h2 class="display-7 text-dark text-uppercase">Trending</h2>
        <div class="btn-right">
        </div>
      </div>
      <div class="post-grid d-flex flex-wrap justify-content-between">
        <div class="col-lg-4 col-sm-12">
          <div class="card border-none me-3">
            <div class="card-image">
              <img src="{{ asset('assets/images/post-item1.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>
          <div class="card-body text-uppercase">
            <div class="card-meta text-muted">
              <span class="meta-date">feb 22, 2023</span>
              <span class="meta-category">- Gadgets</span>
            </div>
            <h3 class="card-title">
              <a href="#">Get some cool gadgets in 2023</a>
            </h3>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="card border-none me-3">
            <div class="card-image">
              <img src="{{ asset('assets/images/post-item2.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>
          <div class="card-body text-uppercase">
            <div class="card-meta text-muted">
              <span class="meta-date">feb 25, 2023</span>
              <span class="meta-category">- Technology</span>
            </div>
            <h3 class="card-title">
              <a href="#">Technology Hack You Won't Get</a>
            </h3>
          </div>
        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="card border-none me-3">
            <div class="card-image">
              <img src="{{ asset('assets/images/post-item3.jpg') }}" alt="" class="img-fluid">
            </div>
          </div>
          <div class="card-body text-uppercase">
            <div class="card-meta text-muted">
              <span class="meta-date">feb 22, 2023</span>
              <span class="meta-category">- Camera</span>
            </div>
            <h3 class="card-title">
              <a href="#">Top 10 Small Camera In The World</a>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> --}}
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
            <h2 class="display-7 text-uppercase text-light">Subscribe Us Now</h2>
            <p>Get latest news, updates and deals directly mailed to your inbox.</p>
          </div>
        </div>
        <div class="col-md-5 col-sm-12">
          <form class="subscription-form validate">
            <div class="input-group flex-wrap">
              <input class="form-control btn-rounded-none" type="email" name="EMAIL"
                placeholder="Your email address here" required="">
              <button class="btn btn-medium btn-primary text-uppercase btn-rounded-none" type="submit"
                name="subscribe">Subscribe</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection