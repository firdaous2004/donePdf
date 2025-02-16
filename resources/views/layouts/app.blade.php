<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">

        <nav class="bg-gray-800 p-4">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="{{ url('/') }}" class="text-white text-lg font-semibold flex items-center space-x-2">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8">
                    <span>Laravel Tasks</span>
                </a>

                <div class="flex space-x-4">
                    <a href="{{ route('tasks.create') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">New Task</a>
                    <a href="{{ route('tasks.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Tasks</a>
                    <a href="{{ route('categories.index') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Categories</a>
                    <a href="{{ url('/') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Home</a>

                    @auth
                        <!-- Show logout button if the user is authenticated -->
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Logout</button>
                        </form>
                    @else
                        <!-- Show login button if the user is not authenticated -->
                        <a href="{{ route('login') }}" class="text-white hover:bg-gray-700 px-3 py-2 rounded-md text-sm font-medium">Login</a>
                    @endauth
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
