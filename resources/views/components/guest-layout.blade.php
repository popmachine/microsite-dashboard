<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Page Spinner</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Styles and Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        h1#page-title {
            font-size: 4rem;
            font-weight: 800;
            color: #98c93c;
            font-family: 'Figtree', sans-serif;
            text-align: center;
        }

        .login-logo {
            max-width: 200px;
            height: auto;
        }

        @media (min-width: 640px) {
            h1#page-title {
                font-size: 5rem;
            }

            .login-logo {
                max-width: 220px;
            }
        }

        .title-logo-wrapper {
            margin-bottom: 6rem; /* Reduced from 8rem */
        }
    </style>
</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100 px-4 py-10">
        <!-- Title & Logo -->
        <div class="flex flex-col items-center title-logo-wrapper space-y-4">
            <h1 id="page-title">PAGE SPINNER</h1>
            <img src="{{ asset('images/client-logo.png') }}" alt="Client Logo" class="login-logo">
        </div>

        <!-- Login Form -->
        <div class="w-full sm:max-w-md px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>
</html>