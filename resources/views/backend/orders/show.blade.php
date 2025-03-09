<x-app-layout>
    <x-slot name="header">
        <nav class="text-sm font-medium text-slate-600 dark:text-slate-300 mb-2" aria-label="breadcrumb">
            <ol class="flex flex-wrap items-center gap-1">
                <li class="flex items-center gap-1.5">
                    <a href="#" aira-label="home" class="hover:text-slate-900 dark:hover:text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true"
                            class="size-4">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M9.293 2.293a1 1 0 0 1 1.414 0l7 7A1 1 0 0 1 17 11h-1v6a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-6H3a1 1 0 0 1-.707-1.707l7-7Z" />
                        </svg>
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                        stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex items-center gap-1">
                    <a href="{{ route('orders.index') }}" class="hover:text-slate-900 dark:hover:text-white">Orders</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                        stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex items-center gap-1 font-bold text-slate-900 dark:text-white" aria-current="page">
                    Details</li>
            </ol>
        </nav>

        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-5" x-data="orderDetails">

        <div class="md:col-span-3 space-y-5">

            <div class="bg-slate-50 shadow rounded p-5">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="flex items-center gap-2">
                            <p class="text-sm text-slate-500" x-text="order.order_id"></p>

                            <div class="group relative inline-block">
                                <button class="px-3 py-1 text-sm border rounded capitalize text-white"
                                    :class="{
                                        ' bg-orange-500': order.latest_status.status == 'pending',
                                        ' bg-green-500': order.latest_status.status == 'delivered',
                                        ' bg-red-500': order.latest_status.status == 'cancelled',
                                        ' bg-indigo-500': order.latest_status.status == 'processing',
                                    }">
                                    <span x-text="order.latest_status.status"></span>

                                </button>
                                <button></button>
                                <div
                                    class="bg-indigo-500 absolute bottom-full left-1/2 z-20 mb-3 -translate-x-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3.5 text-sm text-white opacity-0 group-hover:opacity-100">
                                    <span
                                        class="bg-indigo-500 absolute bottom-[-3px] left-1/2 -z-10 h-2 w-2 -translate-x-1/2 rotate-45"></span>
                                    Order Status
                                </div>
                            </div>

                            <div class="group relative inline-block">
                                <button class="px-3 py-1 text-sm rounded border"
                                    :class="{
                                        'text-orange-500 border-orange-500': order.payment.status == 'unpaid',
                                        'text-green-500 border-green-500': order.payment.status == 'completed',
                                        'text-red-500 border-red-500': order.payment.status == 'failed',
                                        'text-indigo-500 border-indigo-500': order.payment.status == 'refunded',
                                    }">
                                    <span x-text="order.payment.status"></span>

                                </button>
                                <button></button>
                                <div
                                    class="bg-indigo-500 absolute bottom-full left-1/2 z-20 mb-3 -translate-x-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3.5 text-sm text-white opacity-0 group-hover:opacity-100">
                                    <span
                                        class="bg-indigo-500 absolute bottom-[-3px] left-1/2 -z-10 h-2 w-2 -translate-x-1/2 rotate-45"></span>
                                    Payment Status
                                </div>
                            </div>

                        </div>
                        <div class="mt-2 text-sm">
                            <span class="me-2 text-slate-500">Placed On:</span>
                            <span x-text="order.placed_on"></span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2">
                        <button
                            class="border border-slate-200 px-5 py-2 rounded text-sm text-slate-500 font-medium">Refund
                        </button>
                        <button type="button" @click="openModal"
                            class="bg-orange-500 text-white rounded px-5 py-2 text-sm font-medium">Edit
                            Order</button>


                    </div>
                </div>
            </div>

            <div class="bg-slate-50 shadow rounded">
                <div class="p-3 border-b border-slate-200">
                    <p>Products</p>
                </div>

                <div class="p-7">
                    <div class="overflow-hidden w-full overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="border-b border-slate-200 text-slate-800">
                                <tr>
                                    <th scope="col" class="p-4">
                                        <label for="checkAll"
                                            class="flex items-center text-on-surface dark:text-on-surface-dark ">
                                            <x-forms.checkbox id="checkAll" x-model="checkAll" />
                                        </label>
                                    </th>
                                    <th scope="col" class="p-4">Product</th>
                                    <th scope="col" class="p-4">Status</th>
                                    <th scope="col" class="p-4 ">Price</th>
                                    <th scope="col" class="p-4">Discount</th>
                                    <th scope="col" class="p-4">Qauntity</th>
                                    <th scope="col" class="p-4">Total</th>
                                    <th scope="col" class="p-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-200">
                                <template x-for="item in items" :key="item.id">
                                    <tr>
                                        <td class="p-4">
                                            <label :for="item.id"
                                                class="flex items-center text-on-surface dark:text-on-surface-dark ">
                                                <x-forms.checkbox ::id="item.id" ::checked="checkAll" />
                                            </label>
                                        </td>

                                        <td class="p-4">
                                            <div class="flex items-center">
                                                <div class="size-14 rounded overflow-hidden me-3">
                                                    <img :src="item.product.image" alt="items image"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div class="text-sm">
                                                    <p class="w-96 truncate capitalize" x-text="item.product.name">
                                                    </p>

                                                    <template x-if="item.variation">
                                                        <template x-for="(values, name) in items.variation?.attributes"
                                                            :key="name">
                                                            <div class="flex item-center gap-3 mt-1">
                                                                <p class="capitalize text-slate-500"
                                                                    x-text="name + ':'"></p>
                                                                <p x-text="values.join(', ')"></p>
                                                            </div>
                                                        </template>
                                                    </template>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-4">
                                            <div class="px-3 py-1 text-sm border rounded capitalize"
                                                :class="{
                                                    'text-orange-500 border-orange-500': item.latest_status.status ==
                                                        'pending',
                                                    'text-green-500 border-green-500': item.latest_status.status ==
                                                        'delivered',
                                                    'text-red-500 border-red-500': item.latest_status.status ==
                                                        'cancelled',
                                                    'text-indigo-500 border-indigo-500': item.latest_status.status ==
                                                        'shipped',
                                                }">
                                                <span x-text="item.latest_status.status"></span>
                                            </div>
                                        </td>
                                        <td class="p-4" x-text="item.price"></td>
                                        <td class="p-4" x-text="item.discount"></td>
                                        <td class="p-4" x-text="item.quantity"></td>
                                        <td class="p-4" x-text="item.total"></td>
                                        <td class="p-4" @click="openEditModal(item)">
                                            <button
                                                class="px-5 py-2 text-sm rounded text-white bg-indigo-500 hover:bg-indigo-500/90">Edit</button>
                                        </td>
                                    </tr>
                                </template>

                                <template x-if="items.length == 0">
                                    <tr>
                                        <td colspan="8" class="p-4">
                                            <p class="text-slate-500">No data available at the moment</p>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <div class="md:col-span-1 space-y-5">

            {{-- order summary --}}
            <div class="rounded bg-slate-50 shadow">
                <div class="px-5 py-2 font-semibold border-b border-slate-200">
                    <p>Order summary</p>
                </div>

                <div class="px-5 py-5 space-y-5 ">
                    {{-- order sub total --}}
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 shrink-0"
                                fill="currentColor">
                                <path
                                    d="M320 96L192 96 144.6 24.9C137.5 14.2 145.1 0 157.9 0L354.1 0c12.8 0 20.4 14.2 13.3 24.9L320 96zM192 128l128 0c3.8 2.5 8.1 5.3 13 8.4C389.7 172.7 512 250.9 512 416c0 53-43 96-96 96L96 512c-53 0-96-43-96-96C0 250.9 122.3 172.7 179 136.4c0 0 0 0 0 0s0 0 0 0c4.8-3.1 9.2-5.9 13-8.4zm84 88c0-11-9-20-20-20s-20 9-20 20l0 14c-7.6 1.7-15.2 4.4-22.2 8.5c-13.9 8.3-25.9 22.8-25.8 43.9c.1 20.3 12 33.1 24.7 40.7c11 6.6 24.7 10.8 35.6 14l1.7 .5c12.6 3.8 21.8 6.8 28 10.7c5.1 3.2 5.8 5.4 5.9 8.2c.1 5-1.8 8-5.9 10.5c-5 3.1-12.9 5-21.4 4.7c-11.1-.4-21.5-3.9-35.1-8.5c-2.3-.8-4.7-1.6-7.2-2.4c-10.5-3.5-21.8 2.2-25.3 12.6s2.2 21.8 12.6 25.3c1.9 .6 4 1.3 6.1 2.1c0 0 0 0 0 0s0 0 0 0c8.3 2.9 17.9 6.2 28.2 8.4l0 14.6c0 11 9 20 20 20s20-9 20-20l0-13.8c8-1.7 16-4.5 23.2-9c14.3-8.9 25.1-24.1 24.8-45c-.3-20.3-11.7-33.4-24.6-41.6c-11.5-7.2-25.9-11.6-37.1-15c0 0 0 0 0 0l-.7-.2c-12.8-3.9-21.9-6.7-28.3-10.5c-5.2-3.1-5.3-4.9-5.3-6.7c0-3.7 1.4-6.5 6.2-9.3c5.4-3.2 13.6-5.1 21.5-5c9.6 .1 20.2 2.2 31.2 5.2c10.7 2.8 21.6-3.5 24.5-14.2s-3.5-21.6-14.2-24.5c-6.5-1.7-13.7-3.4-21.1-4.7l0-13.9z" />
                            </svg>
                            <span>Sub Total:</span>
                        </div>

                        <p x-text="order.subtotal"></p>
                    </div>

                    {{-- order discount --}}
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4 shrink-0"
                                fill="currentColor">
                                <path
                                    d="M14 2.2C22.5-1.7 32.5-.3 39.6 5.8L80 40.4 120.4 5.8c9-7.7 22.3-7.7 31.2 0L192 40.4 232.4 5.8c9-7.7 22.3-7.7 31.2 0L304 40.4 344.4 5.8c7.1-6.1 17.1-7.5 25.6-3.6s14 12.4 14 21.8l0 464c0 9.4-5.5 17.9-14 21.8s-18.5 2.5-25.6-3.6L304 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L192 471.6l-40.4 34.6c-9 7.7-22.3 7.7-31.2 0L80 471.6 39.6 506.2c-7.1 6.1-17.1 7.5-25.6 3.6S0 497.4 0 488L0 24C0 14.6 5.5 6.1 14 2.2zM96 144c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 144zM80 352c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 336c-8.8 0-16 7.2-16 16zM96 240c-8.8 0-16 7.2-16 16s7.2 16 16 16l192 0c8.8 0 16-7.2 16-16s-7.2-16-16-16L96 240z" />
                            </svg>
                            <span>Discount:</span>
                        </div>

                        <p x-text="order.discount"></p>
                    </div>

                    {{-- order delivery charge --}}
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" class="size-4 shrink-0"
                                fill="currentColor">
                                <path
                                    d="M48 0C21.5 0 0 21.5 0 48L0 368c0 26.5 21.5 48 48 48l16 0c0 53 43 96 96 96s96-43 96-96l128 0c0 53 43 96 96 96s96-43 96-96l32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64 0-32 0-18.7c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7L416 96l0-48c0-26.5-21.5-48-48-48L48 0zM416 160l50.7 0L544 237.3l0 18.7-128 0 0-96zM112 416a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm368-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            <span>Delivery Charge:</span>
                        </div>

                        <p x-text="order.delivery_charge"></p>
                    </div>

                    {{-- order estimated tax --}}
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center gap-2 text-slate-500">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4 shrink-0"
                                fill="currentColor">
                                <path
                                    d="M64 0C46.3 0 32 14.3 32 32l0 64c0 17.7 14.3 32 32 32l80 0 0 32-57 0c-31.6 0-58.5 23.1-63.3 54.4L1.1 364.1C.4 368.8 0 373.6 0 378.4L0 448c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-69.6c0-4.8-.4-9.6-1.1-14.4L488.2 214.4C483.5 183.1 456.6 160 425 160l-217 0 0-32 80 0c17.7 0 32-14.3 32-32l0-64c0-17.7-14.3-32-32-32L64 0zM96 48l160 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L96 80c-8.8 0-16-7.2-16-16s7.2-16 16-16zM64 432c0-8.8 7.2-16 16-16l352 0c8.8 0 16 7.2 16 16s-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16zm48-168a24 24 0 1 1 0-48 24 24 0 1 1 0 48zm120-24a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM160 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM328 240a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM256 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48zM424 240a24 24 0 1 1 -48 0 24 24 0 1 1 48 0zM352 344a24 24 0 1 1 0-48 24 24 0 1 1 0 48z" />
                            </svg>
                            <span>Estimated Tax:</span>
                        </div>

                        <p x-text="order.tax"></p>
                    </div>
                </div>

                {{-- order total --}}
                <div class="bg-slate-100 px-5 py-2 space-y-2">
                    <div class="flex items-center justify-between font-semibold">
                        <p>Total</p>
                        <p x-text="order.total"></p>
                    </div>
                </div>
            </div>

            {{-- payment info --}}
            <div class="rounded bg-slate-50 shadow">
                <div class="px-5 py-2 font-semibold border-b border-slate-200">
                    <p>Payment Information</p>
                </div>

                <div class="px-5 py-5 space-y-2">
                    {{-- payment sub total --}}
                    <div class="text-sm">
                        <span class="me-3">Transaction ID:</span>
                        <span class="text-slate-500" x-text="order.payment.transaction_id"></span>
                    </div>
                    <div class="text-sm">
                        <span class="me-3">Card Holder Name:</span>
                        <span class="text-slate-500" x-text="order.payment.name"></span>
                    </div>
                </div>
            </div>

            {{-- Customer Details --}}
            <div class="rounded bg-slate-50 shadow">
                <div class="px-5 py-2 font-semibold border-b border-slate-200">
                    <p>Customer Details</p>
                </div>

                <div class="px-5 py-5 space-y-3">

                    <div class="flex items-center">
                        <div class="me-3">
                            <img :src="order.user.avatar" alt="user avatar" class="rounded size-10 object-center">
                        </div>

                        <div class="flex flex-col text-sm text-slate-500">
                            <p x-text="order.user.name"></p>
                            <p x-text="order.user.email"></p>
                        </div>
                    </div>

                    <div class="text-sm space-y-1">
                        <p class="font-medium">Contact Number</p>
                        <p class="text-slate-500" x-text="order.user.phone_number"></p>
                    </div>

                    <div class="text-sm space-y-2">
                        <p class="font-medium">Shipping Address</p>

                        <div class="text-sm text-slate-500">
                            <p x-text="order.user.country"></p>
                            <p x-text="order.user.city"></p>
                            <p x-text="order.user.state"></p>
                            <p x-text="order.user.zip_code"></p>
                            <p x-text="order.user.address"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        {{-- new attribute modal --}}
        <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
            x-on:keydown.esc.window="closeModal" x-on:click.self="closeModal"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8">
            <!-- Modal Dialog -->
            <div x-show="modalIsOpen"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="flex max-w-lg w-[24rem] flex-col gap-4 relative rounded border border-slate-200 bg-white text-slate-600 p-5"
                x-data="{ watch_shape: '' }">

                <button @click="closeModal"
                    class="absolute right-0 top-0 -translate-y-1/2 translate-x-1/2 bg-white shadow p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4"
                        fill="currentColor">
                        <path
                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                </button>
                <!-- Dialog Header -->

                @csrf
                <div class="">
                    <p class="text-xl font-medium">Update <span x-text="order.order_id"></span> </p>
                    <p class="text-sm text-slate-500 mt-2">Note that you can't mark an Order as completed if the
                        payment is not complete</p>
                </div>

                <form @submit.prevent="updateOrderStatus($event)">
                    @csrf
                    @method('put')

                    <div class="mt-4">
                        <x-forms.input-label value="Status" />
                        <x-forms.select-input class="w-full" name="status" x-model="order.latest_status.status">
                            <option value="" selected>Select</option>
                            <option value="pending">Pending</option>
                            <option value="processing">Processing</option>
                            <option x-cloak x-show="order.payment.status == 'completed'" value="delivered">Delivered
                            </option>
                            <option value="cancelled">Cancelled</option>
                        </x-forms.select-input>
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label value="Note" />
                        <x-forms.textarea class=" w-full" name="notes" />
                    </div>

                    <div class="mt-5 flex items-center gap-3">
                        <button type="submit" class="px-5 py-2 rounded bg-indigo-500 text-white text-sm">Save
                            Changes</button>

                        <button type="reset"
                            class="px-5 py-2 rounded border border-slate-200 text-sm bg-slate-50">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- edit modal --}}
        <div x-cloak x-show="editModalIsOpen" x-transition.opacity.duration.200ms
            x-trap.inert.noscroll="editModalIsOpen" x-on:keydown.esc.window="closeEditModal"
            x-on:click.self="closeEditModal"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8">
            <!-- Modal Dialog -->
            <div x-show="editModalIsOpen"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="flex max-w-lg w-[24rem] flex-col gap-4 relative rounded border border-slate-200 bg-white text-slate-600 p-5">

                <button @click="closeEditModal"
                    class="absolute right-0 top-0 -translate-y-1/2 translate-x-1/2 bg-white shadow p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4"
                        fill="currentColor">
                        <path
                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                </button>
                <!-- Dialog Header -->

                <div class="">
                    <p class="text-xl font-medium">Update </p>
                    <p class="text-sm text-slate-500 mt-2">Note that you can't mark an Item as completed if the
                        payment is not complete</p>
                </div>

                <form @submit.prevent="updateOrderItemStatus($event)">
                    @csrf
                    @method('put')

                    <div class="mt-4">
                        <x-forms.input-label value="Status" />
                        <x-forms.select-input class="w-full" name="status"
                            x-model="selectedOrderItem.latest_status.status">
                            <option value="" selected>Select</option>
                            <option value="pending">Pending</option>
                            <option value="shipped">shipped</option>
                            <option x-cloak x-show="order.payment.status == 'completed'" value="delivered">Delivered
                            </option>
                            <option value="cancelled">Cancelled</option>
                        </x-forms.select-input>
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label value="Note" />
                        <x-forms.textarea class=" w-full" name="notes" />
                    </div>

                    <div class="mt-5 flex items-center gap-3">
                        <button type="submit" class="px-5 py-2 rounded bg-indigo-500 text-white text-sm">Save
                            Changes</button>

                        <button type="reset"
                            class="px-5 py-2 rounded border border-slate-200 text-sm bg-slate-50">Reset</button>
                    </div>
                </form>
            </div>
        </div>

    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('orderDetails', () => ({
                    order: {},
                    items: {},
                    checkAll: false,
                    modalIsOpen: false,
                    editModalIsOpen: false,
                    selectedOrderItem: {},

                    openModal() {
                        this.modalIsOpen = true;
                    },

                    closeModal() {
                        this.modalIsOpen = false;
                    },

                    openEditModal(item) {
                        this.selectedOrderItem = item;
                        this.editModalIsOpen = true;
                    },

                    closeEditModal() {
                        this.selectedOrderItem = {};
                        this.editModalIsOpen = false;
                    },

                    async updateOrderStatus(event) {
                        try {
                            const formData = new FormData(event.target);

                            const response = await axios.post(`{{ route('orders.update', ':id') }}`
                                .replace(':id', this.order.id), formData);

                            if (response.status == 200) {
                                event.target.reset();
                                this.closeModal();
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },


                    async updateOrderItemStatus(event) {
                        try {
                            const formData = new FormData(event.target);

                            const response = await axios.post(`{{ route('items.update', ':id') }}`
                                .replace(':id', this.selectedOrderItem.id), formData);

                            if (response.status == 200) {
                                event.target.reset();
                                this.closeEditModal();
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    init() {
                        this.order = @json($order);
                        this.items = @json($order).items;
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
