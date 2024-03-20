<div class="row">
    <div class="col-12">
        <x-base.card title="Create Product">
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
            <form autocomplete="on" wire:submit.prevent='createProduct' enctype="multipart/form-data">

                @include('components.product.form', [ "btnTitle"=> "Update", "title"=> "Create User", 'categories'=>
                $categories])
                <x-base.form-group class=" text-center">
                    <x-base.button class="btn-primary">
                        Create
                    </x-base.button>
                </x-base.form-group>
            </form>
        </x-base.card>
    </div>
</div>