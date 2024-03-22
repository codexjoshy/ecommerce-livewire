<x-aside-dropdown title="User Management" key="user-mgt">
    <x-slot name="icon">
        <i class="fa fa-user"></i>
    </x-slot>
    <x-aside-link wire:navigate :href="route('admin.role.index')" title="View Roles">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
    <x-aside-link wire:navigate :href="route('admin.user.create')" title="Add User">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
    <x-aside-link wire:navigate :href="route('admin.user.index')" title="View Users">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
</x-aside-dropdown>
<x-aside-dropdown title="Category Management" key="category-mgt">
    <x-slot name="icon">
        <i class="fa fa-book"></i>
    </x-slot>
    <x-aside-link wire:navigate :href="route('category.create')" title="Add Category">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
    <x-aside-link wire:navigate :href="route('category.index')" title="View Category">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
</x-aside-dropdown>
<x-aside-dropdown title="Product Management" key="product-mgt">
    <x-slot name="icon">
        <i class="fa fa-shopping-cart"></i>
    </x-slot>
    <x-aside-link wire:navigate :href="route('admin.product.create')" title="Add Product">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
    <x-aside-link wire:navigate :href="route('admin.product.index')" title="View Product">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
</x-aside-dropdown>