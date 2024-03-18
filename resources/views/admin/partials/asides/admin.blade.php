<x-aside-dropdown title="Category Management" key="leave-application">
    <x-slot name="icon">
        <i class="fa fa-book"></i>
    </x-slot>
    <x-aside-link :href="route('category.index')" title="Product Category">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
</x-aside-dropdown>
