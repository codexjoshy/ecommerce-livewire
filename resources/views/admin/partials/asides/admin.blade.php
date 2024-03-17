<x-aside-dropdown title="Leave Application" key="leave-application">
    <x-slot name="icon">
        <i class="fa fa-book"></i>
    </x-slot>
    <x-aside-link :href="route('leave.apply.create')" title="My Leave Application">
        <x-slot name="icon">
            <i class="fa fa-edit"></i>
        </x-slot>
    </x-aside-link>
</x-aside-dropdown>