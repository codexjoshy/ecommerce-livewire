<div>
    <x-base.card title="Roles">
        <x-slot name='action'>
            <x-modal-button key='create-role' class="btn  btn-primary">Create</x-modal-button>
        </x-slot>
        <x-base.table>
            <x-slot name="thead">
                <th>Name</th>
                <th>Number of Users</th>
                <th></th>
            </x-slot>

            <x-slot name="tbody">
                @foreach($roles as $role)
                <tr wire:key="item-{{ $role->id }}">
                    <td>{{ ucfirst($role->name) }}</td>
                    <td>{{ $role->users_count }}</td>
                </tr>
                @endforeach
            </x-slot>
        </x-base.table>
    </x-base.card>
    <x-modal wire:ignore.self title="Update" key="create-role" data-backdrop="static" livewireClose='closeModal'>
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
        <form wire:submit.prevent="createRole">
            <div wire:loading>
                <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>
                @include('components.users.role-form', [ "btnTitle"=> "Update", "title"=> "Update User"])
                <x-base.form-group class="text-center">
                    <button type="submit" class="btn-primary btn">
                        Create
                    </button>
                </x-base.form-group>
            </div>
        </form>
    </x-modal>
    @push('scripts')
    <script>
        window.addEventListener('close-modal', e=>{
           $('#create-role').modal('hide');
          })
    </script>
    @endpush
</div>