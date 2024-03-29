<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} - @yield('title')</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="{{ asset('assets/admin/css/styles.css') }}" rel="stylesheet" />
        {{--
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/main.css') }}" rel="stylesheet" /> --}}
        <style>
            @media print {
                .no-print {
                    display: none !important;
                }
            }
        </style>
        @livewireStyles
        @stack('css')
    </head>

    <body class="nav-fixed">
        <div class="overlay"></div>
        <!-- Navbar -->
        @include('admin.partials.nav')
        <!-- Sidebar -->
        <div id="layoutSidenav">
            @include('admin.partials.aside')
            <div id="layoutSidenav_content">
                <main>
                    <!-- Main content-->
                    <div class="container mt-4">
                        <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
                            {{-- <div class="bg-red"> --}}
                                <h1 class="mb-5">@yield('banner')</h1>
                                {{--
                            </div> --}}
                            <div>
                                <span class="font-weight-500 text-primary">
                                    For any issues or complaint kindly reach out to us on :
                                    <u>
                                        <a href="tel:{{ config('app.supportPhone') }}">{{ config('app.supportPhone')
                                            }}</a>
                                    </u>
                                </span>
                            </div>
                            {{-- @if(auth()->user()->latestApplication()) --}}
                            <div>
                                <span class="font-weight-500 text-primary">
                                    {{-- @canany(['student', 'member'])

                                    Current Balance
                                    {{ toCurrency(auth()->user()->balance()??0, auth()->user()->currency()) }}
                                    @endcanany --}}
                                </span>
                            </div>
                            {{-- @endif --}}

                        </div>
                        <!-- Header -->
                        @yield('header')

                        @if(session('success'))
                        <x-base.alert type="primary" title="Success" icon="fa-check" class="no-print">
                            {{ session('success') }}
                        </x-base.alert>
                        @endif

                        @if(session('error'))
                        <x-base.alert type="danger" title="Error" icon="fa-times" class="no-print">
                            {{ session('error') }}

                        </x-base.alert>
                        @endif
                        @if(session('errors'))
                        <x-base.alert type="danger" title="Errors" icon="fa-times">
                            <ul>
                                @foreach(session('errors') as $error)
                                <li>{{ $error }}</li>

                                @endforeach
                            </ul>
                        </x-base.alert>
                        @endif

                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

        <script src="{{ asset('assets/admin/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/admin/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/main.js') }}"></script>
        <script src="{{ asset('assets/admin/js/app.js') }}"></script>
        <script>
            function turnOnOverlay() {
            $('.overlay').css('display', 'block');
        }

        function turnOffOverlay() {
            $('.overlay').css('display', 'none');
        }
        </script>
        @stack('scripts')
        @livewireScripts
    </body>

</html>