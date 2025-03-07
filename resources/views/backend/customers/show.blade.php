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
                    <a href="{{ route('customers.index') }}"
                        class="hover:text-slate-900 dark:hover:text-white">Customers</a>
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
            {{ __('Customers details') }}
        </h2>
    </x-slot>


    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div class="md:col-span-1">
            <div class="w-full rounded bg-slate-50 shadow">
                <div class="w-full h-36 relative rounded-t">
                    <img src="{{ $customer->background_image }}" alt="customer background image"
                        class="w-full h-full object-cover object-center rounded-t">

                    <div
                        class="absolute bottom-0 translate-y-1/2 left-3 size-14 rounded-full overflow-hidden border-2 border-white">
                        <img src="{{ $customer->avatar }}" alt="customer avatar" class="w-full h-full object-cover">
                    </div>
                </div>

                <div class="pt-14 px-3">
                    <div class="flex items-center">
                        {{-- customer avatar --}}
                        <div class="">
                            <p class="font-medium">{{ $customer->name }}</p>
                            <p class="font-slate-500 text-sm">Joined
                                {{ \Carbon\Carbon::parse($customer->created_at)->diffForHumans() }}</p>
                        </div>

                        <div class="ms-auto flex items-center gap-2">
                            {{-- social links --}}
                            {{-- linkedin --}}
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5"
                                    fill="currentColor">
                                    <path
                                        d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                                </svg>
                            </button>

                            {{-- facebook --}}
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5"
                                    fill="currentColor">
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
                                </svg>
                            </button>

                            {{-- twitter --}}
                            <button type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5"
                                    fill="currentColor">
                                    <path
                                        d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z" />
                                </svg>
                            </button>
                        </div>

                    </div>

                    <div class="mt-5 border-t border-dashed border-slate-200 pt-5 flex items-center gap-5 pb-5">
                        {{-- send message --}}
                        <button type="button" class="rounded-md bg-orange-500 text-white px-5 py-2 text-sm">Send
                            Message</button>

                        {{-- edit customer --}}
                        <a href="{{ route('customers.edit', $customer->id) }}" type="button"
                            class="rounded-md bg-white p-2 text-sm shadow"><svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512" class="size-4" fill="currentColor">
                                <path
                                    d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                            </svg>
                        </a>

                    </div>
                </div>

            </div>

            {{-- customer details card --}}
            <div class="mt-5 rounded bg-slate-50 shadow">
                <div class=" p-3">
                    <p class="font-medium mb-3">Customer Details</p>
                    <div class="">
                        <span class="text-slate-500 me-3 text-sm">Name:</span>
                        <span class="text-sm">{{ $customer->name }}</span>
                    </div>
                    <div class="mt-1">
                        <span class="text-slate-500 me-3 text-sm">Email:</span>
                        <span class="text-sm">{{ $customer->email }}</span>
                    </div>
                    <div class="mt-1">
                        <span class="text-slate-500 me-3 text-sm">phone Number:</span>
                        <span class="text-sm">{{ $customer->phone_number }}</span>
                    </div>
                </div>

                <div class="p-3">
                    <p class="font-medium mb-3">Billing Infomation</p>

                    <div class="text-sm">
                        <span class="text-slate-500 me-3">Country:</span>
                        <span>{{ $customer->country }}</span>
                    </div>
                    <div class="text-sm">
                        <span class="text-slate-500 me-3">State:</span>
                        <span>{{ $customer->state }}</span>
                    </div>
                    <div class="text-sm">
                        <span class="text-slate-500 me-3">City:</span>
                        <span>{{ $customer->city }}</span>
                    </div>
                </div>
            </div>
        </div>


        <div class="md:col-span-2">

            {{-- highlights --}}
            <div class="w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-5">
                <div class="bg-slate-50 rounded p-3 shadow flex items-center">
                    <div>
                        <p class="font-medium">Total Orders</p>
                        <p class="text-sm text-slate-500 mt-3">{{ $customer->orders_count }}</p>
                    </div>
                    <div class="ms-auto bg-orange-100 p-1.5 rounded">
                        <svg viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                            class="size-8">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M17.5777 4.43152L15.5777 3.38197C13.8221 2.46066 12.9443 2 12 2C11.0557 2 10.1779 2.46066 8.42229 3.38197L8.10057 3.5508L17.0236 8.64967L21.0403 6.64132C20.3941 5.90949 19.3515 5.36234 17.5777 4.43152Z"
                                    fill="#f97316"></path>
                                <path
                                    d="M21.7484 7.96434L17.75 9.96353V13C17.75 13.4142 17.4142 13.75 17 13.75C16.5858 13.75 16.25 13.4142 16.25 13V10.7135L12.75 12.4635V21.904C13.4679 21.7252 14.2848 21.2965 15.5777 20.618L17.5777 19.5685C19.7294 18.4393 20.8052 17.8748 21.4026 16.8603C22 15.8458 22 14.5833 22 12.0585V11.9415C22 10.0489 22 8.86557 21.7484 7.96434Z"
                                    fill="#f97316"></path>
                                <path
                                    d="M11.25 21.904V12.4635L2.25164 7.96434C2 8.86557 2 10.0489 2 11.9415V12.0585C2 14.5833 2 15.8458 2.5974 16.8603C3.19479 17.8748 4.27062 18.4393 6.42228 19.5685L8.42229 20.618C9.71524 21.2965 10.5321 21.7252 11.25 21.904Z"
                                    fill="#f97316"></path>
                                <path
                                    d="M2.95969 6.64132L12 11.1615L15.4112 9.4559L6.52456 4.37785L6.42229 4.43152C4.64855 5.36234 3.6059 5.90949 2.95969 6.64132Z"
                                    fill="#f97316"></path>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="bg-slate-50 rounded p-3 shadow flex items-center">
                    <div>
                        <p class="font-medium">Total Expenses</p>
                        <p class="text-sm text-slate-500 mt-3">{{ $customer->orders_sum_total }}</p>
                    </div>
                    <div class="ms-auto p-1.5 bg-orange-100 rounded">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="size-8">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M12.052 1.25H11.948C11.0495 1.24997 10.3003 1.24995 9.70552 1.32991C9.07773 1.41432 8.51093 1.59999 8.05546 2.05546C7.59999 2.51093 7.41432 3.07773 7.32991 3.70552C7.27259 4.13189 7.25637 5.15147 7.25179 6.02566C5.22954 6.09171 4.01536 6.32778 3.17157 7.17157C2 8.34315 2 10.2288 2 14C2 17.7712 2 19.6569 3.17157 20.8284C4.34314 22 6.22876 22 9.99998 22H14C17.7712 22 19.6569 22 20.8284 20.8284C22 19.6569 22 17.7712 22 14C22 10.2288 22 8.34315 20.8284 7.17157C19.9846 6.32778 18.7705 6.09171 16.7482 6.02566C16.7436 5.15147 16.7274 4.13189 16.6701 3.70552C16.5857 3.07773 16.4 2.51093 15.9445 2.05546C15.4891 1.59999 14.9223 1.41432 14.2945 1.32991C13.6997 1.24995 12.9505 1.24997 12.052 1.25ZM15.2479 6.00188C15.2434 5.15523 15.229 4.24407 15.1835 3.9054C15.1214 3.44393 15.0142 3.24644 14.8839 3.11612C14.7536 2.9858 14.5561 2.87858 14.0946 2.81654C13.6116 2.7516 12.964 2.75 12 2.75C11.036 2.75 10.3884 2.7516 9.90539 2.81654C9.44393 2.87858 9.24644 2.9858 9.11612 3.11612C8.9858 3.24644 8.87858 3.44393 8.81654 3.9054C8.771 4.24407 8.75661 5.15523 8.75208 6.00188C9.1435 6 9.55885 6 10 6H14C14.4412 6 14.8565 6 15.2479 6.00188ZM12 9.25C12.4142 9.25 12.75 9.58579 12.75 10V10.0102C13.8388 10.2845 14.75 11.143 14.75 12.3333C14.75 12.7475 14.4142 13.0833 14 13.0833C13.5858 13.0833 13.25 12.7475 13.25 12.3333C13.25 11.9493 12.8242 11.4167 12 11.4167C11.1758 11.4167 10.75 11.9493 10.75 12.3333C10.75 12.7174 11.1758 13.25 12 13.25C13.3849 13.25 14.75 14.2098 14.75 15.6667C14.75 16.857 13.8388 17.7155 12.75 17.9898V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.9898C10.1612 17.7155 9.25 16.857 9.25 15.6667C9.25 15.2525 9.58579 14.9167 10 14.9167C10.4142 14.9167 10.75 15.2525 10.75 15.6667C10.75 16.0507 11.1758 16.5833 12 16.5833C12.8242 16.5833 13.25 16.0507 13.25 15.6667C13.25 15.2826 12.8242 14.75 12 14.75C10.6151 14.75 9.25 13.7903 9.25 12.3333C9.25 11.143 10.1612 10.2845 11.25 10.0102V10C11.25 9.58579 11.5858 9.25 12 9.25Z"
                                    fill="#f97316"></path>
                            </g>
                        </svg>
                    </div>
                </div>
                <div class="bg-slate-50 rounded p-3 shadow flex items-center">
                    <div>
                        <p class="font-medium">Last Order</p>
                        <p class="text-slate-500 mt-3 text-sm">
                            {{ $customer->order ? \Carbon\Carbon::parse($customer->order->created_at)->diffForHumans() : 'null' }}
                        </p>
                    </div>
                    <div class="ms-auto rounded p-1.5 bg-orange-100 text-orange-500">
                        <svg viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="size-8">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M207.960546,159.843246 L210.399107,161.251151 C210.637153,161.388586 210.71416,161.70086 210.580127,161.933013 C210.442056,162.172159 210.144067,162.258604 209.899107,162.117176 L207.419233,160.68542 C207.165323,160.8826 206.846372,161 206.5,161 C205.671573,161 205,160.328427 205,159.5 C205,158.846891 205.417404,158.291271 206,158.085353 L206,153.503423 C206,153.22539 206.231934,153 206.5,153 C206.776142,153 207,153.232903 207,153.503423 L207,158.085353 C207.582596,158.291271 208,158.846891 208,159.5 C208,159.6181 207.986351,159.733013 207.960546,159.843246 Z M206.5,169 C211.746705,169 216,164.746705 216,159.5 C216,154.253295 211.746705,150 206.5,150 C201.253295,150 197,154.253295 197,159.5 C197,164.746705 201.253295,169 206.5,169 Z"
                                    transform="translate(-197 -150)"></path>
                            </g>
                        </svg>
                    </div>
                </div>

            </div>

            {{-- customer orders --}}
            <div class="bg-slate-50 shadow rounded mt-5">
                <div class="p-3">
                    <p class="font-medium">Orders ({{ $customer->orders->count() }})</p>
                </div>
                <div class="overflow-hidden w-full overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-y border-slate-200">
                            <tr>
                                <th scope="col" class="p-4">Order Id</th>
                                <th scope="col" class="p-4">Total</th>
                                <th scope="col" class="p-4">Payment Status</th>
                                <th scope="col" class="p-4">Fulfilment Status</th>
                                <th scope="col" class="p-4">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($orders as $order)
                                <tr>
                                    <td class="p-4">{{ $order->order_id }}</td>
                                    <td class="p-4">{{ $order->total }}</td>
                                    <td class="p-4">
                                        <div @class([
                                            'text-xs px-2 py-0.5 rounded flex items-center gap-2 w-fit capitalize border',
                                            'bg-orange-100 text-orange-500 border-orange-500' =>
                                                $order->payment->status == 'unpaid',
                                            'bg-green-100 text-green-500 border-green-500' =>
                                                $order->payment->status == 'completed',
                                            'bg-red-100 text-red-500 border-red-500' =>
                                                $order->payment->status == 'failed',
                                            'bg-indigo-100 text-indigo-500 border-indigo-500' =>
                                                $order->payment->status == 'refunded',
                                        ])>
                                            <span x-show="">
                                                {{ $order->payment->status }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                                class="size-3" fill="currentColor">
                                                @if ($order->payment->status == 'unpaid')
                                                    <path
                                                        d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                                @elseif ($order->payment->status == 'completed')
                                                    <path
                                                        d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                                @elseif ($order->payment->status == 'failed')
                                                    <path
                                                        d="M96 64c0-17.7-14.3-32-32-32S32 46.3 32 64l0 256c0 17.7 14.3 32 32 32s32-14.3 32-32L96 64zM64 480a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                                @elseif ($order->payment->status == 'refunded')
                                                    <path
                                                        d="M125.7 160l50.3 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L48 224c-17.7 0-32-14.3-32-32L16 64c0-17.7 14.3-32 32-32s32 14.3 32 32l0 51.2L97.6 97.6c87.5-87.5 229.3-87.5 316.8 0s87.5 229.3 0 316.8s-229.3 87.5-316.8 0c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0c62.5 62.5 163.8 62.5 226.3 0s62.5-163.8 0-226.3s-163.8-62.5-226.3 0L125.7 160z" />
                                                @endif
                                            </svg>

                                        </div>
                                    </td>
                                    <td class="p-4">{{ $order->status }}</td>
                                    <td class="p-4">{{ $order->placed_on }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="p-3 border-t border-slate-200">
                        {{ $orders->appends(['orders_page' => request('orders_page')])->links() }}
                    </div>
                </div>
            </div>

            {{-- customer rating and reviews --}}
            <div class="bg-slate-50 shadow rounded mt-5">
                <div class="p-3">
                    <p class="font-medium">Reviews and Ratings ({{ $customer->reviews->count() }})</p>
                </div>
                <div class="overflow-hidden w-full overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="border-y border-slate-200">
                            <tr>
                                <th scope="col" class="p-4">Product</th>
                                <th scope="col" class="p-4">Rating</th>
                                <th scope="col" class="p-4">Review</th>
                                <th scope="col" class="p-4">Status</th>
                                <th scope="col" class="p-4">Date</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($reviews as $review)
                                <tr>
                                    <td class="p-4 whitespace-nowrap">
                                        <p class="w-40 truncate">
                                            {{ $review->product->name }}
                                        </p>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center gap-1 text-orange-500">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                    class="size-3" fill="currentColor">
                                                    @if ($i <= $review->rating)
                                                        <path
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                    @else
                                                        <path
                                                            d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                                    @endif
                                                </svg>
                                            @endfor

                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <p class="w-96 line-clamp-2">
                                            {{ $review->message }}
                                        </p>
                                    </td>
                                    <td class="p-4">{{ $review->status }}</td>
                                    <td class="p-4 whitespace-nowrap">{{ $review->date }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="p-3 border-t border-slate-200">
                        {{ $reviews->appends(['reviews_page' => request('reviews_page')])->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
