<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles & Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .login-logo {
                width: 160px;
                max-width: 100%;
                margin: 0 auto;
                display: block;
            }

            #page-title {
                font-weight: 600;
                font-size: 1.875rem;
                text-align: center;
            }

            @media (min-width: 640px) {
                #page-title {
                    font-size: 2.25rem;
                }
            }

            .title-logo-wrapper {
                margin-bottom: 6rem;
            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 py-10">
            <div class="flex flex-col items-center title-logo-wrapper space-y-4">
                <h1 id="page-title">Page Spinner</h1>
                <img src="{{ asset('images/client-logo.png') }}" alt="Client Logo" class="login-logo">
            </div>

            <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>