<x-customer-layout>
    <div x-data="orders">
        <div class="py-3 px-5 border-b border-slate-200">
            <p class="text-xl font-medium">Orders</p>
        </div>

        <template x-if="ongoingOrderItems.length > 0 || cancelledOrderItems.length > 0">
            <div class="p-5">
                <div class="border-b">
                    <button @click="selectedTab = 'ongoing'" type="button"
                        class="px-3 py-2 uppercase border-b-2 font-medium text-sm border-transparent"
                        :class="selectedTab == 'ongoing' && 'text-orange-500 border-b-orange-500'">Ongoing/delivered
                        <span x-show="ongoingOrderItems.length > 0" x-text="'(' + ongoingOrderItems.length  +')'"></span>
                    </button>
                    <button @click="selectedTab = 'cancelled'" type="button"
                        class="px-3 py-2 uppercase border-b-2 font-medium text-sm border-transparent"
                        :class="selectedTab == 'cancelled' && 'text-orange-500 border-b-orange-500'">cancelled/returned
                        <span x-show="cancelledOrderItems.length > 0"
                            x-text="'(' + cancelledOrderItems.length  +')'"></span> </button>
                </div>

                <div class="pt-5">
                    <div x-cloak x-show="selectedTab == 'ongoing'">
                        <div class="space-y-5 pe-5 max-h-[65vh] overflow-y-auto overflow-">
                            <template x-for="item in ongoingOrderItems" :key="item.id">
                                <div class="border border-slate-200 rounded p-3 flex gap-5 w-full">
                                    <div class="shrink-0">
                                        <div class="size-16 rounded overflow-hidden">
                                            <img :src="item.product.image" alt="product image"
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                    </div>

                                    <div class="flex-1 max-w-[638px] space-y-1">
                                        <p class="capitalize truncate" x-text="item.product.name"></p>
                                        <p class="text-xs text-slate-500" x-text="'Order ' + item.order.order_id"></p>

                                        {{-- item attributes --}}
                                        <template x-if="item.variation">
                                            <div class="flex items-center gap-5">
                                                <template x-for="(value, name) in item.variation.attributes"
                                                    :key="name">
                                                    <div class="flex items-center gap-2 text-sm">
                                                        <span class="capitalize" x-text="name+':'"></span>
                                                        <span class="text-slate-500" x-text="value"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>


                                        <div class="flex items-center gap-3">
                                            <div class="group relative">
                                                <button type="button"
                                                    class="text-xs px-3 rounded py-1 font-medium capitalize"
                                                    :class="{
                                                        'bg-green-100 text-green-500': item.status ==
                                                            'delivered',
                                                        'bg-indigo-100 text-indigo-500': item.status ==
                                                            'shipped',
                                                        'bg-orange-100 text-orange-500': item.status ==
                                                            'pending',
                                                        'bg-red-100 text-red-500': item.status == 'cancelled'
                                                    }">
                                                    <span x-text="item.status"></span>
                                                    </but>

                                                    {{-- tooltip --}}
                                                    <div
                                                        class="bg-black text-white absolute bottom-full left-1/2 z-20 mb-3 -translate-x-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3 text-sm opacity-0 group-hover:opacity-100">
                                                        <span
                                                            class="bg-black absolute bottom-[-3px] left-1/2 -z-10 h-2 w-2 -translate-x-1/2 rotate-45"></span>
                                                        Order status
                                                    </div>
                                            </div>

                                            <div class="group relative">
                                                <button type="button"
                                                    class="text-xs px-3 rounded py-1 font-medium capitalize"
                                                    :class="{
                                                        'bg-green-100 text-green-500': item.order.payment.status ==
                                                            'completed',
                                                        'bg-indigo-100 text-indigo-500': item.order.payment.status ==
                                                            'refunded',
                                                        'bg-orange-100 text-orange-500': item.order.payment.status ==
                                                            'unpaid',
                                                        'bg-red-100 text-red-500': item.order.payment.status == 'failed'
                                                    }">
                                                    <span x-text="item.order.payment.status"></span>
                                                </button>

                                                {{-- tooltip --}}
                                                <div
                                                    class="bg-black text-white absolute bottom-full left-1/2 z-20 mb-3 -translate-x-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3 text-sm opacity-0 group-hover:opacity-100">
                                                    <span
                                                        class="bg-black absolute bottom-[-3px] left-1/2 -z-10 h-2 w-2 -translate-x-1/2 rotate-45"></span>
                                                    Payment status
                                                </div>
                                            </div>
                                        </div>

                                        <p class="text-xs text-slate-500"
                                            x-text="'On ' +item.order.formatted_created_at">
                                        </p>
                                    </div>

                                    <div class="ms-auto w-20 shrink-0">
                                        <a href="" class="text-indigo-500 underline text-sm">See details</a>
                                    </div>
                                </div>
                            </template>
                        </div>

                    </div>

                    <div x-cloak x-show="selectedTab == 'cancelled'">
                        <div class="space-y-5 pe-5 max-h-[65vh] overflow-y-auto overflow-">
                            <template x-for="item in cancelledOrderItems" :key="item.id">
                                <div class="border border-slate-200 rounded p-3 flex gap-5 w-full">
                                    <div class="shrink-0">
                                        <div class="size-16 rounded overflow-hidden">
                                            <img :src="item.product.image" alt="product image"
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                    </div>

                                    <div class="flex-1 max-w-[638px] space-y-1">
                                        <p class="capitalize truncate" x-text="item.product.name"></p>
                                        <p class="text-xs text-slate-500" x-text="'Order ' + item.order.order_id"></p>

                                        {{-- item attributes --}}
                                        <template x-if="item.variation">
                                            <div class="flex items-center gap-5">
                                                <template x-for="(value, name) in item.variation.attributes"
                                                    :key="name">
                                                    <div class="flex items-center gap-2 text-sm">
                                                        <span class="capitalize" x-text="name+':'"></span>
                                                        <span class="text-slate-500" x-text="value"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </template>


                                        <div class="flex items-center gap-3">
                                            <div class="group relative">
                                                <button type="button"
                                                    class="text-xs px-3 rounded py-1 font-medium capitalize"
                                                    :class="{
                                                        'bg-green-100 text-green-500': item.status ==
                                                            'delivered',
                                                        'bg-indigo-100 text-indigo-500': item.status ==
                                                            'shipped',
                                                        'bg-orange-100 text-orange-500': item.status ==
                                                            'pending',
                                                        'bg-red-100 text-red-500': item.status == 'cancelled'
                                                    }">
                                                    <span x-text="item.status"></span>
                                                    </but>

                                                    {{-- tooltip --}}
                                                    <div
                                                        class="bg-black text-white absolute bottom-full left-1/2 z-20 mb-3 -translate-x-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3 text-sm opacity-0 group-hover:opacity-100">
                                                        <span
                                                            class="bg-black absolute bottom-[-3px] left-1/2 -z-10 h-2 w-2 -translate-x-1/2 rotate-45"></span>
                                                        Order status
                                                    </div>
                                            </div>

                                            <div class="group relative">
                                                <button type="button"
                                                    class="text-xs px-3 rounded py-1 font-medium capitalize"
                                                    :class="{
                                                        'bg-green-100 text-green-500': item.order.payment.status ==
                                                            'completed',
                                                        'bg-indigo-100 text-indigo-500': item.order.payment.status ==
                                                            'refunded',
                                                        'bg-orange-100 text-orange-500': item.order.payment.status ==
                                                            'unpaid',
                                                        'bg-red-100 text-red-500': item.order.payment.status == 'failed'
                                                    }">
                                                    <span x-text="item.order.payment.status"></span>
                                                </button>

                                                {{-- tooltip --}}
                                                <div
                                                    class="bg-black text-white absolute bottom-full left-1/2 z-20 mb-3 -translate-x-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3 text-sm opacity-0 group-hover:opacity-100">
                                                    <span
                                                        class="bg-black absolute bottom-[-3px] left-1/2 -z-10 h-2 w-2 -translate-x-1/2 rotate-45"></span>
                                                    Payment status
                                                </div>
                                            </div>
                                        </div>

                                        <p class="text-xs text-slate-500"
                                            x-text="'On ' +item.order.formatted_created_at">
                                        </p>
                                    </div>

                                    <div class="ms-auto w-20 shrink-0">
                                        <a href="" class="text-indigo-500 underline text-sm">See details</a>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

            </div>
        </template>

        <template x-if="ongoingOrderItems.length < 1 && cancelledOrderItems.length < 1">
            <div class="min-h-[65vh] grid place-items-center py-6">
                <div class="w-full max-w-sm flex flex-col items-center text-center">
                    <svg viewBox="0 0 1024 1024" class="icon size-14" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M660 103.2l-149.6 76 2.4 1.6-2.4-1.6-157.6-80.8L32 289.6l148.8 85.6v354.4l329.6-175.2 324.8 175.2V375.2L992 284.8z"
                                fill="#FFFFFF"></path>
                            <path
                                d="M180.8 737.6c-1.6 0-3.2 0-4-0.8-2.4-1.6-4-4-4-7.2V379.2L28 296c-2.4-0.8-4-4-4-6.4s1.6-5.6 4-7.2l320.8-191.2c2.4-1.6 5.6-1.6 8 0l154.4 79.2L656 96c2.4-1.6 4.8-0.8 7.2 0l332 181.6c2.4 1.6 4 4 4 7.2s-1.6 5.6-4 7.2l-152.8 88v350.4c0 3.2-1.6 5.6-4 7.2-2.4 1.6-5.6 1.6-8 0l-320-174.4-325.6 173.6c-1.6 0.8-2.4 0.8-4 0.8zM48 289.6L184.8 368c2.4 1.6 4 4 4 7.2v341.6l317.6-169.6c2.4-1.6 5.6-1.6 7.2 0l312.8 169.6V375.2c0-3.2 1.6-5.6 4-7.2L976 284.8 659.2 112.8 520 183.2c0 0.8-0.8 0.8-0.8 1.6-2.4 4-7.2 4.8-11.2 2.4l-1.6-1.6h-0.8l-152.8-78.4L48 289.6z"
                                fill="#6A576D"></path>
                            <path d="M510.4 179.2l324.8 196v354.4L510.4 554.4z" fill="#121519"></path>
                            <path d="M510.4 179.2L180.8 375.2v354.4l329.6-175.2z" fill="#121519"></path>
                            <path
                                d="M835.2 737.6c-1.6 0-2.4 0-4-0.8l-324.8-176c-2.4-1.6-4-4-4-7.2V179.2c0-3.2 1.6-5.6 4-7.2 2.4-1.6 5.6-1.6 8 0L839.2 368c2.4 1.6 4 4 4 7.2v355.2c0 3.2-1.6 5.6-4 7.2h-4zM518.4 549.6l308.8 167.2V379.2L518.4 193.6v356z"
                                fill="#6A576D"></path>
                            <path
                                d="M180.8 737.6c-1.6 0-3.2 0-4-0.8-2.4-1.6-4-4-4-7.2V375.2c0-3.2 1.6-5.6 4-7.2l329.6-196c2.4-1.6 5.6-1.6 8 0 2.4 1.6 4 4 4 7.2v375.2c0 3.2-1.6 5.6-4 7.2l-329.6 176h-4z m8-358.4v337.6l313.6-167.2V193.6L188.8 379.2z"
                                fill="#6A576D"></path>
                            <path d="M510.4 550.4L372 496 180.8 374.4v355.2l329.6 196 324.8-196V374.4L688.8 483.2z"
                                fill="#D6AB7F"></path>
                            <path
                                d="M510.4 933.6c-1.6 0-3.2 0-4-0.8L176.8 736.8c-2.4-1.6-4-4-4-7.2V374.4c0-3.2 1.6-5.6 4-7.2 2.4-1.6 5.6-1.6 8 0L376 488.8l135.2 53.6 174.4-66.4L830.4 368c2.4-1.6 5.6-2.4 8-0.8 2.4 1.6 4 4 4 7.2v355.2c0 3.2-1.6 5.6-4 7.2l-324.8 196s-1.6 0.8-3.2 0.8z m-321.6-208l321.6 191.2 316.8-191.2V390.4L693.6 489.6c-0.8 0.8-1.6 0.8-1.6 0.8l-178.4 68c-1.6 0.8-4 0.8-5.6 0L369.6 504c-0.8 0-0.8-0.8-1.6-0.8L188.8 389.6v336z"
                                fill="#6A576D"></path>
                            <path d="M510.4 925.6l324.8-196V374.4L665.6 495.2l-155.2 55.2z" fill="#121519"></path>
                            <path
                                d="M510.4 933.6c-1.6 0-2.4 0-4-0.8-2.4-1.6-4-4-4-7.2V550.4c0-3.2 2.4-6.4 5.6-7.2L662.4 488l168-120c2.4-1.6 5.6-1.6 8-0.8 2.4 1.6 4 4 4 7.2v355.2c0 3.2-1.6 5.6-4 7.2l-324.8 196s-1.6 0.8-3.2 0.8z m8-377.6v355.2l308.8-185.6V390.4L670.4 501.6c-0.8 0.8-1.6 0.8-1.6 0.8l-150.4 53.6z"
                                fill="#6A576D"></path>
                            <path d="M252.8 604l257.6 145.6V550.4l-147.2-49.6-182.4-126.4z" fill="#121519"></path>
                            <path d="M32 460l148.8-85.6 329.6 176L352 640.8z" fill="#FFFFFF"></path>
                            <path d="M659.2 693.6l176-90.4V375.2L692 480.8l-179.2 68-2.4 1.6z" fill="#121519"></path>
                            <path d="M510.4 550.4l148.8 85.6L992 464.8l-156.8-89.6z" fill="#FFFFFF"></path>
                            <path
                                d="M352 648.8c-1.6 0-2.4 0-4-0.8l-320-180.8c-2.4-1.6-4-4-4-7.2s1.6-5.6 4-7.2L176.8 368c2.4-1.6 5.6-1.6 8 0l329.6 176c2.4 1.6 4 4 4 7.2s-1.6 5.6-4 7.2L356 648c-0.8 0.8-2.4 0.8-4 0.8zM48 460L352 632l141.6-80.8L180.8 384 48 460z"
                                fill="#6A576D"></path>
                            <path
                                d="M659.2 644c-1.6 0-2.4 0-4-0.8L506.4 557.6c-2.4-1.6-4-4-4-7.2s1.6-5.6 4-7.2l324.8-176c2.4-1.6 5.6-1.6 8 0l156.8 90.4c2.4 1.6 4 4 4 7.2s-1.6 5.6-4 7.2L663.2 643.2c-1.6 0.8-2.4 0.8-4 0.8zM527.2 550.4l132.8 76L976 464l-141.6-80-307.2 166.4z"
                                fill="#6A576D"></path>
                        </g>
                    </svg>

                    <p class="font-medium mt-3 mb-2">No Orders Yet!</p>

                    <p class="text-sm text-slate-500">You haven’t placed any orders yet! 🛒 Start exploring our amazing
                        products and place your first order today. Need help? Check out our best deals!</p>

                    <a href="{{ route('home') }}"
                        class="mt-4 bg-gradient-to-tr from-orange-400 to-red-500 text-white text-sm font-medium py-2 px-5 rounded">Continue
                        shopping</a>
                </div>
            </div>
        </template>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('orders', () => ({
                    selectedTab: 'ongoing',
                    ongoingOrderItems: {},
                    cancelledOrderItems: {},

                    init() {
                        this.ongoingOrderItems = @json($ongoingOrderItems);
                        this.cancelledOrderItems = @json($cancelledOrderItems);

                    }

                }))
            })
        </script>
    @endpush
</x-customer-layout>
