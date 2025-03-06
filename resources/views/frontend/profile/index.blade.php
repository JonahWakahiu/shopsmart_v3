<x-customer-layout>
    <div class="">
        <div class="w-full h-64 relative">
            <img src="{{ asset('images/profile-background.jpg') }}" alt="background image"
                class="w-full h-full object-cover object-center">

            <div
                class="absolute bottom-0 translate-y-1/2 size-20 rounded-full left-7 overflow-hidden border-2 border-white">
                <img src="{{ $user->avatar }}" alt="user avatar" class="w-full h-full object-cover object-center">
            </div>
        </div>

        <div class="pt-14 px-7">
            <div class="flex items-center">
                <div class="">
                    <p class="font-medium">{{ $user->name }}</p>
                    <p class="text-sm text-slate-500">{{ $user->email }}</p>
                </div>

                <div class="ms-auto space-y-1">
                    @php
                        $created_at = \Carbon\Carbon::parse($user->created_at);
                        $difference = $created_at->diffForHumans();
                    @endphp
                    <p class="font-medium text-sm">Joined {{ $difference }}</p>
                    <div class="flex items-center gap-2">
                        <button type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5"
                                fill="currentColor">
                                <path
                                    d="M416 32H31.9C14.3 32 0 46.5 0 64.3v383.4C0 465.5 14.3 480 31.9 480H416c17.6 0 32-14.5 32-32.3V64.3c0-17.8-14.4-32.3-32-32.3zM135.4 416H69V202.2h66.5V416zm-33.2-243c-21.3 0-38.5-17.3-38.5-38.5S80.9 96 102.2 96c21.2 0 38.5 17.3 38.5 38.5 0 21.3-17.2 38.5-38.5 38.5zm282.1 243h-66.4V312c0-24.8-.5-56.7-34.5-56.7-34.6 0-39.9 27-39.9 54.9V416h-66.4V202.2h63.7v29.2h.9c8.9-16.8 30.6-34.5 62.9-34.5 67.2 0 79.7 44.3 79.7 101.9V416z" />
                            </svg>
                        </button>
                        <button type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5"
                                fill="currentColor">
                                <path
                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64h98.2V334.2H109.4V256h52.8V222.3c0-87.1 39.4-127.5 125-127.5c16.2 0 44.2 3.2 55.7 6.4V172c-6-.6-16.5-1-29.6-1c-42 0-58.2 15.9-58.2 57.2V256h83.6l-14.4 78.2H255V480H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z" />
                            </svg>
                        </button>
                        <button type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-5"
                                fill="currentColor">
                                <path
                                    d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-5 border-t border-dashed border-slate-200 pt-5 flex items-center justify-between">
                <div>
                    <p class="text-sm text-slate-500">Total spent</p>
                    <p class="font-medium">{{ $user->orders_sum_total }}</p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Last Order</p>
                    <p class="font-medium">
                        {{ $user->order ? \Carbon\Carbon::parse($user->order->created_at)->diffForHumans() : 'null' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-slate-500">Total Orders</p>
                    <p class="font-medium">{{ $user->orders_count }}</p>
                </div>
            </div>
        </div>

    </div>
</x-customer-layout>
