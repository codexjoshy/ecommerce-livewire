@props(['transaction'])

@php
    $currency = ($transaction->currency === 'dollar') ? 'USD' : 'NGN';
@endphp

<x-base.button type="button" class="btn-primary" onClick="makePayment()">
    <i class="icon icon-wallet"></i> Pay Online
</x-base.button>

@push('scripts')
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
    function makePayment() {
        FlutterwaveCheckout({
            public_key: "{{ config('services.rave.public') }}",
            tx_ref: "{{ $transaction->reference }}",
            amount: "{{ $transaction->amount }}",
            currency: "{{ $currency }}",
            country:'NG',
            redirect_url:  "{{ route('payment.verify') }}",
            meta: {
                consumer_id: "{{ auth()->id() }}",
                consumer_mac: "92a3-912ba-1192a",
            },
            customer: {
                email: "{{ auth()->user()->email }}",
                phone_number: "{{ auth()->user()->phone }}",
                name: "{{ auth()->user()->name }}",
            },
            // callback: function (data) {
            //     console.log(data);
            // },
            onclose: function() {
                // close modal
                console.log('Modal closed');
            },
        });
    }
</script>
@endpush
