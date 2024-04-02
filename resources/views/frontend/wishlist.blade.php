@extends('layouts.frontend')

@section('content')
<div class="container  padding-xlarge">
 @auth
 <livewire:frontend.wishlist.index />
 @endauth

 @guest
 <div class="d-flex flex-column justify-content-center">
  <h2 class="text-center">You need to be sign in to view your wishlists </h2>
  <div class="text-center mt-5">

   <a href="{{ route('login') }}" class="btn btn-primary btn-xs">Sign in now</a>
  </div>

 </div>
 @endguest


</div>

@endsection