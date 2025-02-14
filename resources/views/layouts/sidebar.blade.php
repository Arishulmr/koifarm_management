<aside class="w-auto md:w-64 bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 md:min-h-screen"
    x-data="{ isOpen: false }">
    <div class="flex items-center justify-between bg-white dark:bg-gray-900 p-4 h-16 shadow">
        <a href="#" class="flex items-center">
            <x-application-logo></x-application-logo>
            <span
                class="text-gray-700 dark:text-gray-300 text-xl font-semibold mx-2">Koisys</span>
        </a>
        <div class="flex md:hidden">
            <button type="button" @click="isOpen = !isOpen"
                class="text-gray-300 hover:text-gray-500 focus:outline-none focus:text-gray-500">
                <svg class="fill-current w-8" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="px-1 py-6 md:block" :class="isOpen ? 'block' : 'hidden'">
        <ul>
            @foreach (\App\Models\ItemMenu::whereNull('parent_id')->where('status', 'enabled')->get() as $menuItem)
                {{-- @can('r-' . $menuItem->permission . 's') --}}
                    @if ($menuItem->children->count())
                        <li x-data="{ open: false }" @click.away="open = false"
                            class="px-1 py-1 bg-white dark:bg-gray-900 rounded">
                            <x-responsive-nav-link @click="open = ! open">
                                {!! $menuItem->icon_menu !!}
                                <span
                                    class="px-2 flex-1 text-left text-gray-700 dark:text-gray-300">{{ $menuItem->title }}</span>
                                <svg x-show="!open" class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                                <svg x-show="open" class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 4 4 4-4" />
                                </svg>
                            </x-responsive-nav-link>

                            <ul x-show="open">
                                @foreach ($menuItem->children->where('status', 'enabled') as $child)
                                    <x-responsive-nav-link :href="route($child->url)" :active="request()->routeIs($child->url)">
                                        <span class="ml-4"> {!! $child->icon_menu !!}</span>
                                        <span class="px-2 text-gray-700 dark:text-gray-300">{{ $child->title }}</span>
                                    </x-responsive-nav-link>
                                @endforeach
                            </ul>
                        </li>
                    @else
                        <li class="px-1 py-1 bg-white dark:bg-gray-900 rounded">
                            <x-responsive-nav-link :href="route($menuItem->url)" :active="request()->routeIs($menuItem->url)">
                                {!! $menuItem->icon_menu !!}
                                <span class="px-2 text-gray-700 dark:text-gray-300">{{ $menuItem->title }}</span>
                            </x-responsive-nav-link>
                        </li>
                    @endif
                {{-- @endcan --}}
            @endforeach


        </ul>
        <div class="border-t border-gray-700 -mx-2 mt-2 md:hidden"></div>
        <div :class="{ 'block': open, 'hidden': !open }" class="md:hidden">

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    {{-- <x-responsive-nav-link :href="route('profile.edit')">
                        <i class="fi fi-sr-user-lock"></i>
                        <span class="px-2 text-gray-700 dark:text-gray-300">{{ __('Profile') }}</span>
                    </x-responsive-nav-link> --}}

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <i class="fi fi-sr-door-open"></i>
                            <span class="px-2 text-gray-700 dark:text-gray-300">{{ __('Log Out') }}</span>
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>
</aside>
