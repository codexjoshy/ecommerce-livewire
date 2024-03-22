@extends('layouts.frontend')

@section('content')
<section class="container section">
 <livewire:frontend.product.show :category="$category" :product="$product" />
</section>
@endsection