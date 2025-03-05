<x-customer-layout>
    <div x-data="orders">
        <div class="py-3 px-5 border-b border-slate-200">
            <p class="text-xl font-medium">Orders</p>
        </div>

        <div class="p-5">
            <div class="border-b">
                <button @click="selectedTab = 'ongoing'" type="button"
                    class="px-3 py-2 uppercase border-b-2 font-medium text-sm border-transparent"
                    :class="selectedTab == 'ongoing' && 'text-orange-500 border-b-orange-500'">Ongoing/delivered <span
                        x-show="ongoingOrderItems.length > 0" x-text="'(' + ongoingOrderItems.length  +')'"></span>
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

                                    <p class="text-xs text-slate-500" x-text="'On ' +item.order.formatted_created_at">
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

                                    <p class="text-xs text-slate-500" x-text="'On ' +item.order.formatted_created_at">
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
