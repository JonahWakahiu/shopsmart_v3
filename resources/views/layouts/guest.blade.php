<x-main-layout>
    <nav class="flex items-center py-4">
        {{-- logo --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3 text-orange-500 font-semibold text-xl">
            <img src="{{ asset('images/basket.svg') }}" alt="application logo" class="size-5 object-cover object-center">
            <span>Shopsmart</span>
        </a>

        <div class="ms-auto flex items-center gap-5">
            <a href="{{ route('customer.cart.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                </svg>
            </a>

            <button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                </svg>
            </button>

            {{-- user dropdown --}}
            <div x-data="{ showDropdown: false }" class="flex items-center justify-center relative">
                <button type="button" @click="showDropdown = ! showDropdown">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                </button>

                <div @click.outside="showDropdown = false" x-cloak x-transition x-show="showDropdown"
                    class="absolute top-full mt-5 -right-3 min-w-60 z-10">
                    {{-- pointer --}}
                    <div class="absolute bg-white size-5 right-3 rotate-45 top-0 -translate-y-1/2">
                    </div>

                    <div class="w-full bg-white rounded shadow">
                        @guest
                            <div class="flex items-center flex-col py-5">
                                <img src="{{ asset('images/user-profile.svg') }}" alt="avatar place-holder"
                                    class="size-12 object-cover object-center rounded-full">

                                <p class="text-sm mt-1 font-medium">Welcome to Shopsmart</p>
                            </div>
                        @endguest

                        @auth
                            <div class="flex items-center flex-col py-5">
                                <img src="{{ auth()->user()->avatar }}" alt="avatar place-holder"
                                    class="size-12 object-cover object-center rounded-full">

                                <p class="text-sm mt-1 font-medium">{{ auth()->user()->name }}</p>
                            </div>
                        @endguest

                        <div>
                            <a href=""
                                class="w-full flex items-center gap-3 px-5 py-2 text-sm hover:bg-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-4">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                                <span>Profile</span>
                            </a>
                            <a href="{{ route('customer.orders.index') }}"
                                class="w-full flex items-center gap-3 px-5 py-2 text-sm hover:bg-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                    class="bi bi-box-seam size-4" viewBox="0 0 16 16">
                                    <path
                                        d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                                </svg>
                                <span>Orders</span>
                            </a>

                            <a href=""
                                class="w-full flex items-center gap-3 px-5 py-2 text-sm hover:bg-slate-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-heart size-4"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                </svg>
                                <span>Wishlist</span>
                            </a>
                        </div>

                        <div class="px-3 py-3 border-t border-slate-200">
                            <a href="{{ route('login') }}"
                                class="w-full rounded bg-slate-100 border border-slate-200 py-2 text-sm flex items-center justify-center gap-2 hover:bg-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                                </svg>
                                <span>Sign In</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="min-h-screen">
        {{ $slot }}
    </section>

    {{-- footer --}}
    <footer></footer>
</x-main-layout>
