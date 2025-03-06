<x-guest-layout>
    <main class="min-h-[80svh] grid grid-cols-1 md:grid-cols-4 gap-5">
        <div class="col-span-1 bg-white rounded">
            <div class="flex items-center flex-col pt-5">
                <div class="size-14 rounded-full overflow-hidden">
                    <img src="{{ auth()->user()->avatar }}" alt="user avatar"
                        class="w-full h-full object-cover object-center">
                </div>

                <div class="mt-2">
                    <p class="text-sm font-medium text-center">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-slate-500 text-center">{{ auth()->user()->email }}</p>
                </div>
            </div>
            <div class="py-3">
                <a href="{{ route('customer.profile.index') }}" @class([
                    'flex items-center text-sm gap-3 py-2 px-3 hover:bg-slate-200',
                    'bg-slate-200' => request()->routeIs('customer.profile.*'),
                ])>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person" viewBox="0 0 16 16">
                        <path
                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                    </svg>
                    <span>My Account</span>
                </a>


                <a href="{{ route('customer.orders.index') }}" @class([
                    'flex items-center text-sm gap-3 py-2 px-3 hover:bg-slate-200',
                    'bg-slate-200' => request()->routeIs('customer.orders.*'),
                ])>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path
                            d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z" />
                    </svg>
                    <span>Orders</span>
                </a>


                <a href="" class="flex items-center text-sm gap-3 py-2 px-3 hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                    <span>Inbox</span>
                </a>

                <a href="{{ route('customer.reviews.index') }}" @class([
                    'flex items-center text-sm gap-3 py-2 px-3 hover:bg-slate-200',
                    'bg-slate-200' => request()->routeIs('customer.reviews.*'),
                ])>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-chat-dots" viewBox="0 0 16 16">
                        <path
                            d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0m4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0m3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2" />
                        <path
                            d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9 9 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.4 10.4 0 0 1-.524 2.318l-.003.011a11 11 0 0 1-.244.637c-.079.186.074.394.273.362a22 22 0 0 0 .693-.125m.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6-3.004 6-7 6a8 8 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a11 11 0 0 0 .398-2" />
                    </svg>
                    <span>Pending Reviews</span>
                </a>

                <a href="" class="flex items-center text-sm gap-3 py-2 px-3 hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-ticket" viewBox="0 0 16 16">
                        <path
                            d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5z" />
                    </svg>
                    Vouchers</a>
                <a href="" class="flex items-center text-sm gap-3 py-2 px-3 hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-heart" viewBox="0 0 16 16">
                        <path
                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                    </svg>
                    <span>Wishlist</span>
                </a>
            </div>
            <div class="border-y border-slate-200 py-3">
                <a href="{{ route('customer.account.index') }}" @class([
                    'py-2 px-3 text-sm hover:text-orange-500 block w-full',
                    'text-orange-500' => request()->routeIs('customer.account.*'),
                ])>Account Management</a>
                <a href="" class="py-2 px-3 text-sm hover:text-orange-500 block w-full">Payment Setting</a>
                <a href="" class="py-2 px-3 text-sm hover:text-orange-500 block w-full">Address Book</a>
                <a href="" class="py-2 px-3 text-sm hover:text-orange-500 block w-full">Newsletter
                    Preferences</a>
            </div>
            <div class="p-3">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="block w-full text-orange-500 text-sm font-medium ">Logout</>
                </form>
            </div>
        </div>


        <div class="col-span-3 bg-white rounded overflow-hidden">
            {{ $slot }}
        </div>
    </main>
</x-guest-layout>
