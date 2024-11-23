<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body>
    <div x-data="{ sidebarOpen: false,darkMode: false }" class="flex h-screen bg-gray-200 font-roboto" :class="{'dark text-bodydark bg-boxdark-2': darkMode === true}">
        @auth('admin')
            @livewire('component.sidebar')
        @endauth
        <div class="flex-1 flex flex-col overflow-hidden">
            @auth('admin')
                {{-- Header --}}
                @livewire('component.header')
            @endauth
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">                
                    {{$slot}}                
            </main>
            @auth('admin')
                {{-- Footer --}}
                @livewire('component.footer')
            @endauth
        </div>
    </div>
    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>