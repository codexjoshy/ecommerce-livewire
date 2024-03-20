@props(['href', 'title' => ''])

@php
$active = $href === (url()->current()) ? 'active' : '' ;
$livewireAttributes = $attributes->whereStartsWith('wire');
$livewireAttributes = implode(" ",array_keys($livewireAttributes->getAttributes()));
@endphp






<a {{ $livewireAttributes }} {{ $attributes->whereDoesntStartWith('wire')->merge(['class' => "nav-link $active"]) }}
    href="{{ $href}}">
    <div class="nav-link-icon">
        {{ $icon ?? '' }}
    </div>
    {{ $title }}
</a>