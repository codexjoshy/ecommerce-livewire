@props(['transaction', 'removedCourseAmount', 'user'])
@php
$userProfile = $user->profile;
$balance = $user->balance() ?? 0;
@endphp
<div class="card invoice">
    <div class="card-header p-4 p-md-5 border-bottom-0 bg-gradient-primary-to-secondary text-white-50">
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-lg-auto mb-5 mb-lg-0 text-center text-lg-left">
                <!-- Invoice branding-->
                <img class="invoice-brand-img rounded-circle mb-4" src="{{ asset('images/ciin.png') }}" alt />
                <div class="h2 text-white mb-0">{{ config('app.name') }}</div>
                Chartered Insurance Institute of Nigeria
            </div>
            <div class="col-12 col-lg-auto text-center text-lg-right">
                <!-- Invoice details-->
                <div class="h3 text-white">Invoice</div>
                #{{ $transaction->reference }}
                <br />
                {{ now()->format('M d, Y') }}
            </div>
        </div>
    </div>
    <div class="card-body p-4 p-md-5">
        <!-- Invoice table-->
        @if ($userProfile)
        <div><span>Name: </span> {{ $userProfile->fullName }} ({{ $user->pin }})</div>
        @endif
        <div><span>Email</span> {{ $user->email }}</div>
        <div><span>Phone</span> {{ $user->phoneNumber }}</div>
        {{-- <div><span>Date</span> {{ $transaction->updated_at->format('jS, F Y') }}</div> --}}
        <div class="table-responsive">
            <table class="table table-borderless mb-0">
                <thead class="border-bottom">
                    <tr class="small text-uppercase text-muted">
                        {{ $thead ?? ''}}
                    </tr>
                </thead>
                <tbody>
                    {{ $tbody ?? '' }}
                    <tr>
                        <td class="text-right pb-0 " colspan="2">
                            @if ($transaction->item != 'wallet_crediting' && $balance >= $transaction->amount)
                            <x-base.form :action="route('pay.with.wallet.course', $transaction->id)"
                                enctype="multipart/form-data" autocomplete="off" class="d-inline">
                                <x-base.button type="submit" class="btn-primary">
                                    <i class="icon icon-wallet"></i> Pay From Wallet
                                </x-base.button>
                            </x-base.form>
                            @else
                            <strong><em class="text-danger">Insufficient balance</em></strong>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer p-4 p-lg-5 border-top-0">
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <!-- Invoice - sent to info-->
                <div class="small text-muted text-uppercase font-weight-700 mb-2">To</div>
                <div class="h6 mb-1">{{ config('app.name') }}</div>
                <div class="small">Lagos, Nigeria</div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <!-- Invoice - sent from info-->
                <div class="small text-muted text-uppercase font-weight-700 mb-2">From</div>
                <div class="h6 mb-0">{{ auth()->user()->name ?: 'Issuer #'.auth()->user()->id }}</div>
                <div class="small">{{ auth()->user()->email }}</div>
            </div>
            <div class="col-lg-6">
                <!-- Invoice - additional notes-->
                <div class="small text-muted text-uppercase font-weight-700 mb-2">Note</div>
                <div class="small mb-0"></div>
            </div>
        </div>
    </div>
</div>
