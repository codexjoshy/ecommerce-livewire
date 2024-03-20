<div>
    <div wire:loading>
        <div class="spinner-border text-primary" role="status">
        </div>
        <span class="visually-hidden">Loading...</span>
    </div>
    <div wire:loading.remove>
        <x-base.table>
            <x-slot name="thead">
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
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
                    <td>${{ $product->price }}</td>
                </tr>
                @endforeach
            </x-slot>
        </x-base.table>
    </div>
</div>