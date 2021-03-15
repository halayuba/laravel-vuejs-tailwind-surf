@props(['route'])

@php
    $active = Request::routeIs($route) ?  'text-white bg-blue-500' : 'text-gray-700';
@endphp

<a href="{{ route($route) }}" class="{{ $active }} block p-2 rounded-sm hover:bg-gray-200">
    {{ $slot }}
</a>
