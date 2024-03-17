@props(['title', 'amount', 'currency'])
@php
@endphp
<tr class="border-bottom">
    <td>
        <div class="font-weight-bold">{{ $title }}</div>
        {{ $slot }}
    </td>
    <td class="text-right font-weight-bold">{{ toCurrency($amount, $currency) }}</td>
</tr>
