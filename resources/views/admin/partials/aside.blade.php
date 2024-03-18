<div id="layoutSidenav_nav" class="no-print">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="side-nav">
                <div class="sidenav-menu-heading">Home</div>
                <x-aside-link :href="route('home')" title="Dashboard">
                    <x-slot name="icon">
                        <i class="fa fa-home"></i>
                    </x-slot>
                </x-aside-link>
                @can('admin')
                    @include('admin.partials.asides.admin')
                @endcan


            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">
                    {{-- {{ auth()->user()->staff->authority ?? '' }} --}}
                </div>
            </div>
        </div>
    </nav>
</div>
