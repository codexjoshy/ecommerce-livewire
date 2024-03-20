<div class="col-12">
    @if(session('error'))
    <x-base.alert type="danger" title="Error" icon="fa-times" class="no-print">
        {{ session('error') }}

    </x-base.alert>
    @endif
    @if(session('deleted'))
    <x-base.alert type="primary" title="Success" icon="fa-check" class="no-print">
        {{ session('deleted') }}
    </x-base.alert>
    @endif
    <x-base.card title="Product">
        <x-slot name='action'>
            <x-modal-button key='create-product' class="btn  btn-primary">Create
            </x-modal-button>
        </x-slot>

        <x-base.table>
            <x-slot name="thead">
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Actions</th>
            </x-slot>

            <x-slot name="tbody">
                @foreach($products as $product)
                <tr wire:key="product-{{ $product->id }}">
                    <td>{{ ucfirst($product->name) }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <div style="width:32px; height: 32px;">
                            <img src="{{ $product->image_url }}"
                                style="width: 100%; height:100%; object-fit: contain;" />
                        </div>
                    </td>
                    <td>{{ $product->price }}</td>
                    <td class="w-full d-flex" style="justify-content: space-around">

                        <x-modal-button key="update-product" wire:key="productEdit-{{ $product->id }}"
                            wire:click="editProduct({{ $product->id }})" class="btn-info btn-xs btn">
                            <i class="fa fa-pencil"></i> Edit
                        </x-modal-button>

                        <x-base.form wire:submit.prevent='deleteProduct({{ $product->id }})'>
                            <x-base.button class="btn btn-xs btn-danger">
                                <i class="fa fa-trash"></i> Delete
                            </x-base.button>

                        </x-base.form>

                    </td>
                </tr>
                @endforeach
            </x-slot>
        </x-base.table>
        <div>
            {{-- {{ $categories->links() }} --}}
        </div>
    </x-base.card>
    {{-- update modal --}}
    <x-modal wire:ignore.self title="Update Product" key="update-product" data-backdrop="static"
        livewireClose='closeModal'>
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
        <form wire:submit.prevent="updateProduct">
            <div wire:loading>
                <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>
                @include('components.product.form', [ "btnTitle"=> "Update", "title"=> "Update User", 'categories'=>
                $categories])
                <x-base.form-group class="text-center">
                    <button type="submit" class="btn-primary btn">
                        Update
                    </button>
                </x-base.form-group>
            </div>
        </form>
    </x-modal>
    {{-- create modal --}}
    <x-modal wire:ignore.self title="Create" key="create-product" data-backdrop="static" livewireClose='closeModal'>
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
        <form wire:submit.prevent="createProduct" enctype="multipart/form-data">
            <div wire:loading>
                <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div wire:loading.remove>
                @include('components.product.form', [ "btnTitle"=> "Update", "title"=> "Create User", 'categories'=>
                $categories])
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
           $('#update-product').modal('hide');
           $('#create-product').modal('hide');
          })
    </script>
    @endpush
</div>