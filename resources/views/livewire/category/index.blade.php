<div class="col-12">
    <x-base.card title="Category">
        <x-slot name='action'>
            <a class="btn  btn-primary" href="{{ route('category.create') }}">Create</a>
        </x-slot>

        <x-base.table>
            <x-slot name="thead">
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>status</th>
                <th>Number of Products</th>
                <th>Actions</th>
            </x-slot>

            <x-slot name="tbody">
                @foreach($categories as $category)
                <tr>
                    <td>{{ ucfirst($category->title) }}</td>
                    <td>{{ $category->description }}</td>
                    <td>
                        <div style="width:32px; height: 32px;">
                            <img src="{{ $category->image_url }}"
                                style="width: 100%; height:100%; object-fit: contain;" />
                        </div>
                    </td>
                    <td>{{ $category->category_status }}</td>
                    <td>
                        <a href='{{route("category.show", $category->id)}}' style="text-decoration: underline"
                            class="text-underline">
                            {{$category->products_count }}
                        </a>

                    </td>
                    <td class="d-flex gap-5">
                        <a href="{{ route('category.edit', $category->id) }}"
                            class="btn btn-datatable btn-icon btn-transparent-dark btn-primary mr-2"
                            data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>

                        <x-base.form method="post" :action="route('category.destroy', $category->id)">
                            @method('delete')
                            <button type="submit"
                                class="btn btn-datatable btn-icon btn-transparent-dark btn-danger mr-2"
                                data-toggle="tooltip" data-placement="bottom" title="Edit" data-original-title="dELETE">
                                <i class="fa fa-trash"></i>
                            </button>
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
</div>