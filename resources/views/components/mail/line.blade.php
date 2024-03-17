@props(['line' => ''])

<p style='font-size: 14px; margin-bottom:10px;'  {{ $attributes->merge(['class' => '']) }}>
 {{ $slot ?? $line }}

</p>
