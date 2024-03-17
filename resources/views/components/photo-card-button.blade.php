@props(['registration', 'centres'])
@if ($registration->deferment)
<div class="row justify-content-center">
    <div class="col-md-2">
        <x-base.form :action="route('exams.undefer', $registration->id)" spoof="DELETE">
            <x-base.button class="btn-success">Undefer</x-base.button>
        </x-base.form>
    </div>
</div>
@else
@if ($registration->seat_number && $registration->centre_id && $registration->course_combination)
<div class="row justify-content-center">
    <div class="col-md-2">
        <x-base.form :action="route('exams.defer', $registration->id)">
            <x-base.button class="btn-danger">Defer</x-base.button>
        </x-base.form>
    </div>
    <div class="col-md-2">
        <x-modal-button class="btn-primary" key="changeVenueModal">
            Change Venue
        </x-modal-button>
        <x-modal title="Change Venue" key="changeVenueModal" data-backdrop="static">
            <x-base.form :action="route('exams.change-centre', $registration->id)">
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
    </div>
    <div class="col-md-2">
        <a href="{{ route('exams.change-course.create', $registration) }}" class="btn btn-info">Change
            Course</a>
    </div>
    {{-- <div class="col-md-2">
        <x-base.button class="btn-danger">Withdraw</x-base.button>
    </div> --}}
</div>
@endif
<div class="row mb-4">
    <div class="col-sm-12">
        @error('centre')
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
</div>
@endif
