@props(['registration', 'centres', 'user', 'feeRepo'])
@php
["defer_fee"=>$defer, "exam_centre_change_fee"=>$changeCenter ] = $feeRepo->findByKeys([ 'defer_fee',
'exam_centre_change_fee']);
$currency = $user->currency();
$deferFee = $defer[$currency];
$changeCenterFee = $changeCenter[$currency];
@endphp
@if ($registration->seat_number)
@if ($registration->deferment)
<div class="row justify-content-center">
    <div class="col-md-2">
        @if ($user->balance() > $deferFee)
        <x-modal-button class="btn-success" key="undeferModal">
            Un Defer
        </x-modal-button>
        <x-modal title="Un Defer" key="undeferModal" data-backdrop="static">
            <x-base.form :action="route('admin.exams.undefer', $user->id)">

                <div class="form-group">
                    <x-base.button class="btn-success">Undefer</x-base.button>
                </div>
            </x-base.form>
        </x-modal>
        @else
        <span class="text-danger">Kindly Pay into user account in order to complete the process</span>
        <button class="btn btn-warning" disabled>Undefer</button>
        @endif

    </div>
</div>
@else
<div class="row justify-content-center">
    <div class="col-md-3">

        @if ($user->balance() >= $deferFee)
        <x-modal-button class="btn-warning" key="deferModal">
            Defer
        </x-modal-button>
        <x-modal title="Defer" key="deferModal" data-backdrop="static">
            <form action="{{ route('admin.exams.defer', $user->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <button class="btn btn-warning">Defer</button>
                </div>
            </form>

        </x-modal>
        @else
        <span class="text-danger">Kindly Pay into user account in order to complete the process</span>
        <button class="btn btn-warning" disabled>Defer</button>
        @endif

    </div>
    <div class="col-md-2">
        @if ($user->balance() >= $changeCenterFee)
        <div class="form-group">
            @error('centre')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <x-modal-button class="btn-primary" key="changeVenueModal">
            Change Venue
        </x-modal-button>
        <x-modal title="Change Venue" key="changeVenueModal" data-backdrop="static">
            <x-base.form :action="route('admin.exams.change-centre', $user->id)">

                <x-base.form-group label="Centre">
                    <x-base.select id="centre" name="centre">
                        <option value="">---</option>
                        @foreach ($centres as $centre)
                        @if($centre->id != $registration->centre_id)
                        <option value="{{ $centre->id }}">{{ $centre->name }}</option>
                        @endif
                        @endforeach
                    </x-base.select>
                </x-base.form-group>
                <button class="btn btn-primary">Change Centre</button>
            </x-base.form>
        </x-modal>
        @else
        <span class="text-danger">Kindly Pay into user account in order to complete the process</span>
        <button class="btn btn-warning" disabled>Change Venue</button>
        @endif

    </div>
    <div class="col-md-2">
        <a href="{{ route('exams.change-course.admin.create', [$user->id, $registration->id]) }}"
            class="btn btn-info">Change
            Course</a>

    </div>

</div>
@endif

@endif
{{-- <div class="col-md-2">
    <x-base.button class="btn-danger">Withdraw</x-base.button>
</div> --}}
