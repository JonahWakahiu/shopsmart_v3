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
                            @role('admin')
                                <a href="{{ route('dashboard') }}"
                                    class="w-full flex items-center gap-3 px-5 py-2 text-sm hover:bg-slate-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                                        <path
                                            d="M6 1v3H1V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1zm14 12v3h-5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zM6 8v7H1V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1zm14-6v7h-5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1z" />
                                    </svg>
                                    <span>Dashboard</span>
                                </a>
                            @endrole

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
                            @guest
                                <a href="{{ route('login') }}"
                                    class="w-full rounded bg-slate-100 border border-slate-200 py-2 text-sm flex items-center justify-center gap-3 hover:bg-slate-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                                        fill="currentColor">
                                        <path
                                            d="M352 96l64 0c17.7 0 32 14.3 32 32l0 256c0 17.7-14.3 32-32 32l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l64 0c53 0 96-43 96-96l0-256c0-53-43-96-96-96l-64 0c-17.7 0-32 14.3-32 32s14.3 32 32 32zm-9.4 182.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L242.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                                    </svg>
                                    <span>Sign In</span>
                                </a>
                            @endguest

                            @auth
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf

                                    <button type="submit"
                                        class="w-full rounded bg-slate-100 border border-slate-200 py-2 text-sm flex items-center justify-center gap-3 hover:bg-slate-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                                            fill="currentColor" stroke-width="1">
                                            <path
                                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                                        </svg>
                                        <span>Sign out</span>
                                    </button>
                                </form>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="min-h-screen">
        {{ $slot }}
    </section>


    <!-- footer -->
    <footer class="mt-10">
        <div class="container mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 rounded-md bg-indigo-100 p-3">
            <div class="p-5">
                <div class="flex items-center gap-2 text-2xl font-bold text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6"
                        fill="currentColor">
                        <path
                            d="M253.3 35.1c6.1-11.8 1.5-26.3-10.2-32.4s-26.3-1.5-32.4 10.2L117.6 192 32 192c-17.7 0-32 14.3-32 32s14.3 32 32 32L83.9 463.5C91 492 116.6 512 146 512L430 512c29.4 0 55-20 62.1-48.5L544 256c17.7 0 32-14.3 32-32s-14.3-32-32-32l-85.6 0L365.3 12.9C359.2 1.2 344.7-3.4 332.9 2.7s-16.3 20.6-10.2 32.4L404.3 192l-232.6 0L253.3 35.1zM192 304l0 96c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-96c0-8.8 7.2-16 16-16s16 7.2 16 16zm96-16c8.8 0 16 7.2 16 16l0 96c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-96c0-8.8 7.2-16 16-16zm128 16l0 96c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-96c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                    </svg>
                    <span>Shopsmart</span>
                </div>

                <p class="mt-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt, repellat?</p>

                <div class="mt-3 flex items-center gap-2">
                    <button type="button" class="grid place-items-center text-green-500 bg-white rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-5"
                            fill="currentColor">
                            <path
                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z" />
                        </svg>
                    </button>
                    <button type="button" class="grid place-items-center text-green-500 bg-white rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5"
                            fill="currentColor">
                            <path
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z" />
                        </svg></button>
                    <button type="button" class="grid place-items-center text-green-500 bg-white rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-5"
                            fill="currentColor">
                            <path
                                d="M549.7 124.1c-6.3-23.7-24.8-42.3-48.3-48.6C458.8 64 288 64 288 64S117.2 64 74.6 75.5c-23.5 6.3-42 24.9-48.3 48.6-11.4 42.9-11.4 132.3-11.4 132.3s0 89.4 11.4 132.3c6.3 23.7 24.8 41.5 48.3 47.8C117.2 448 288 448 288 448s170.8 0 213.4-11.5c23.5-6.3 42-24.2 48.3-47.8 11.4-42.9 11.4-132.3 11.4-132.3s0-89.4-11.4-132.3zm-317.5 213.5V175.2l142.7 81.2-142.7 81.2z" />
                        </svg></button>
                    <button type="button" class="grid place-items-center text-green-500 bg-white rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="size-5"
                            fill="currentColor">
                            <path
                                d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z" />
                        </svg></button>
                </div>
            </div>

            <div class="p-5">
                <p class="text-2xl font-bold">Categories</p>

                <div class="mt-5">
                    @foreach ($parentCategories as $category)
                        <p>{{ $category->name }}</p>
                        @if ($loop->index == 3)
                            @break
                        @endif
                    @endforeach
                </div>
            </div>

            <div class="p-5">
                <p class="text-2xl font-bold">Useful links</p>

                <div class="mt-5">
                    <p>Payment & tax</p>
                    <p>Terms of Use</p>
                    <p>My Account</p>
                    <p>Return policy</p>
                </div>

            </div>

            <div class="p-5">
                <p class="text-2xl font-bold">Newsletter</p>

                <div class="mt-5">
                    <p>Get 10% Discount with Email Newsletter</p>

                </div>
            </div>
    </footer>

    <footer>
        <div class="container mx-auto py-2">
            <p>Copyright © 2025 All rights reserved | This website is made with ❤️ by <a href="https://jonahdevs.co.ke"
                    class="text-indigo-600">Jonahdevs</a></p>
        </div>
    </footer>
</x-main-layout>
