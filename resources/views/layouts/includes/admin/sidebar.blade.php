@php
    $links = [
        [
            'name' => 'Dashboard',
            'icon' => 'fa-solid fa-gauge',
            'route' => route('admin.dashboard'),
            'active' => request()->routeIs('admin.dashboard'),
        ],
        [
            'header' => 'Administrar Paginas',
        ],
        [
            'name' => 'Gestión',
            'icon' => 'fa-solid fa-cogs',
            'route' => '#',
            'active' => false,
            'submenu' => [
                [
                    'name' => 'Usuarios',
                    'route' => '#usuarios',
                ],
                [
                    'name' => 'Reportes',
                    'route' => '#reportes',
                ],
                [
                    'name' => 'Configuración',
                    'route' => '#configuracion',
                ],
            ]
        ],
    ];
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @foreach ($links as $link)
                @if (isset($link['header']))
                    <li class="px-2 py-2 text-xs font-semibold text-gray-400 uppercase">
                        <span>{{ $link['header'] }}</span>
                    </li>
                @elseif (isset($link['submenu']))
                    <li x-data="{ open: false }">
                        <button type="button"
                            @click="open = !open"
                            class="flex items-center w-full p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group"
                            :class="{ 'bg-teal-500 text-white': open }">
                            <span class="w-6 h-6 inline-flex items-center p-2">
                                <i class="{{ $link['icon'] }}"
                                   :style="open ? 'color: #fff;' : 'color: #63E6BE;'"></i>
                            </span>
                            <span class="ms-3 flex-1 text-left">{{ $link['name'] }}</span>
                            <svg class="w-3 h-3 ml-auto transition-transform duration-200"
                                 :class="{ 'rotate-180': open }"
                                 fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 4 4 4-4" />
                            </svg>
                        </button>
                        <ul x-show="open" class="py-2 space-y-2 pl-8" x-cloak>
                            @foreach ($link['submenu'] as $sublink)
                                <li>
                                    <a href="{{ $sublink['route'] }}"
                                        class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                        {{ $sublink['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @else
                    <li>
                        <a href="{{ $link['route'] }}" @class([
                            'flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group',
                            'bg-teal-500 text-white' => $link['active'],
                        ])>
                            <span class="w-6 h-6 inline-flex items-center p-2">
                                <i class="{{ $link['icon'] }}"
                                    style="color: {{ $link['active'] ? '#fff' : '#63E6BE' }};"></i>
                            </span>
                            <span class="ms-3">{{ $link['name'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>