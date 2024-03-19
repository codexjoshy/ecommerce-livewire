<div>
    @if(session('error'))
    <x-base.alert type="danger" title="Error" icon="fa-times" class="no-print">
        {{ session('error') }}

    </x-base.alert>
    @endif
    @if(session('success'))
    <x-base.alert type="primary" title="Success" icon="fa-check" class="no-print">
        {{ session('success') }}
    </x-base.alert>
    @endif
    <form autocomplete="on" wire:submit.prevent='createUser'>

        @include('components.users.form')

        <x-base.form-group class=" text-center">
            <x-base.button class="btn-primary">
                Create
            </x-base.button>
        </x-base.form-group>
    </form>
</div>