<x-aside-dropdown title="User Management" key="user-mgt">
    <x-slot name="icon">
        <i class="fa fa-user"></i>
    </x-slot>
    <x-aside-link :href="route('admin.user.create')" title="Add User">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
    <x-aside-link :href="route('admin.user.index')" title="View Users">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
</x-aside-dropdown>
<x-aside-dropdown title="Category Management" key="category-mgt">
    <x-slot name="icon">
        <i class="fa fa-book"></i>
    </x-slot>
    <x-aside-link :href="route('category.create')" title="Add Category">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
    <x-aside-link :href="route('category.index')" title="View Category">
        <x-slot name="icon">
            <i class="fa fa-shop"></i>
        </x-slot>
    </x-aside-link>
</x-aside-dropdown>