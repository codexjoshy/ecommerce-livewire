@extends('layouts.frontend')

@section('content')
<section class="container section">
 <livewire:frontend.products.index :categories="$categories" />
</section>
@endsection