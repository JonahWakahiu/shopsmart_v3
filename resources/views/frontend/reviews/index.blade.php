<x-customer-layout>
    <div x-data="reviews">


        <div class="py-3 px-5 border-b border-slate-200">
            <p class="text-xl font-medium">Pending Reviews</p>
        </div>

        <template x-if="items.length > 0">
            <div class="p-5">
                <div class="space-y-5 pe-5 max-h-[65vh] overflow-y-auto overflow-">
                    <template x-for="item in items" :key="item.id">
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
                                        <button type="button" class="text-xs px-3 rounded py-1 font-medium capitalize"
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
                                        <button type="button" class="text-xs px-3 rounded py-1 font-medium capitalize"
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

                            <div class="ms-auto w-28 shrink-0">
                                <button @click="openModal(item)" class="text-indigo-500 underline text-sm">Write A
                                    Review</t>
                            </div>
                        </div>
                    </template>
                </div>

            </div>

            <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
                x-on:keydown.esc.window="closeModal" x-on:click.self="closeModal"
                class="fixed inset-0 z-30 grid place-items-center bg-black/20 backdrop-blur-md sm:items-center">

                {{-- modal dialog --}}
                <div x-show="modalIsOpen" x-data="{ currentVal: 3 }"
                    x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                    class="w-full max-w-md overflow-hidden rounded bg-white p-5 space-y-3">

                    <template x-if="errors">
                        <div class="flex rounded bg-red-100 p-2 items-center gap-3" x-data="{ show: true }" x-cloak
                            x-show="show">
                            <ul class="list-inside list-disc">
                                <template x-for="(error, i) in errors" :key="i">
                                    <li class="text-sm text-red-500" x-text="error">
                                    </li>
                                </template>
                            </ul>

                            <div class="shrink-0 ms-auto">
                                <button @click="show = false" type="button" class="bg-white p-1 rounded shadow">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </template>


                    <div class="text-center w-full max-w-64 mx-auto">
                        <p class="text-xl font-medium">We appreviate your feedback</p>
                        <p class="text-sm text-slate-500 mt-2">We are always looking for ways to improve your
                            experience.
                        </p>
                        <p class="text-sm text-slate-500">Please take a moment to evaluate and tell us what you think
                        </p>
                    </div>

                    <template x-if="modalItem">

                        <div class="flex items-center gap-4 bg-slate-100 p-2">
                            <div class="group relative shrink-0">
                                <button type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        class="bi bi-exclamation-octagon size-5" viewBox="0 0 16 16">
                                        <path
                                            d="M4.54.146A.5.5 0 0 1 4.893 0h6.214a.5.5 0 0 1 .353.146l4.394 4.394a.5.5 0 0 1 .146.353v6.214a.5.5 0 0 1-.146.353l-4.394 4.394a.5.5 0 0 1-.353.146H4.893a.5.5 0 0 1-.353-.146L.146 11.46A.5.5 0 0 1 0 11.107V4.893a.5.5 0 0 1 .146-.353zM5.1 1 1 5.1v5.8L5.1 15h5.8l4.1-4.1V5.1L10.9 1z" />
                                        <path
                                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z" />
                                    </svg>
                                </button>

                                {{-- tooltip --}}
                                <div
                                    class="bg-black absolute left-full top-1/2 -z-10 ml-3 -translate-y-1/2 whitespace-nowrap rounded-[5px] py-1.5 px-3.5 text-sm text-white opacity-0 group-hover:opacity-100 group-hover:z-20">
                                    <span
                                        class="bg-black absolute left-[-3px] top-1/2 -z-10 h-2 w-2 -translate-y-1/2 rotate-45"></span>
                                    Product name
                                </div>
                            </div>

                            <p class="text-sm text-slate-500 capitalize line-clamp-2" x-text="modalItem.product?.name">
                            </p>
                        </div>
                    </template>

                    {{-- rating --}}
                    <div class="space-y-1">
                        <p class="text-sm">Rating (<span x-text="currentVal"></span>/5)</p>
                        <div class="flex items-center gap-1">
                            <label for="oneStar" class="transition hover:scale-125 has-focus:scale-125">
                                <span class="sr-only">one star</span>
                                <input x-model="currentVal" id="oneStar" type="radio" class="sr-only" name="rating"
                                    value="1">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6"
                                    x-bind:class="currentVal > 0 ? 'text-orange-500' : 'text-slate-200'">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd">
                                </svg>
                            </label>

                            <label for="twoStars" class="transition hover:scale-125 has-focus:scale-125">
                                <span class="sr-only">two stars</span>
                                <input x-model="currentVal" id="twoStars" type="radio" class="sr-only"
                                    name="rating" value="2">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6"
                                    x-bind:class="currentVal > 1 ? 'text-orange-500' : 'text-slate-200'">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd">
                                </svg>
                            </label>

                            <label for="threeStars" class="transition hover:scale-125 has-focus:scale-125">
                                <span class="sr-only">three stars</span>
                                <input x-model="currentVal" id="threeStars" type="radio" class="sr-only"
                                    name="rating" value="3">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6"
                                    x-bind:class="currentVal > 2 ? 'text-orange-500' : 'text-slate-200'">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd">
                                </svg>
                            </label>

                            <label for="fourStars" class="transition hover:scale-125 has-focus:scale-125">
                                <span class="sr-only">four stars</span>
                                <input x-model="currentVal" id="fourStars" type="radio" class="sr-only"
                                    name="rating" value="4">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6"
                                    x-bind:class="currentVal > 3 ? 'text-orange-500' : 'text-slate-200'">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd">
                                </svg>
                            </label>

                            <label for="fiveStars" class="transition hover:scale-125 has-focus:scale-125">
                                <span class="sr-only">five stars</span>
                                <input x-model="currentVal" id="fiveStars" type="radio" class="sr-only"
                                    name="rating" value="5">
                                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" viewBox="0 0 24 24"
                                    fill="currentColor" class="size-6"
                                    x-bind:class="currentVal > 4 ? 'text-orange-500' : 'text-slate-200'">
                                    <path fill-rule="evenodd"
                                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                                        clip-rule="evenodd">
                                </svg>
                            </label>

                        </div>
                    </div>


                    {{-- end of rating --}}
                    <form @submit.prevent="addReview($el)" class="space-y-2">

                        <input type="hidden" name="rating" x-model="currentVal">
                        <input type="hidden" name="item_id" :value="modalItem.id">

                        <div class="space-y-1">
                            <x-forms.input-label value="Title" for="title" />
                            <x-forms.text-input class="w-full" id="title" name="title" />
                        </div>

                        <div class="space-y-1">
                            <x-forms.input-label for="message">Review <span class="text-red-500">*</span>
                            </x-forms.input-label>
                            <x-forms.textarea class="w-full" id="message" name="message" />
                        </div>

                        <div class="flex items-center justify-between ">
                            <button type="reset"
                                class="border border-slate-200 rounded px-5 py-2 text-sm font-medium bg-slate-100">Clear</button>
                            <button type="submit"
                                class="text-white px-5 py-2 text-sm bg-indigo-500 rounded font-medium">Post</button>
                        </div>
                    </form>
                </div>

            </div>
        </template>

        <template x-if="items.length < 1">
            <div class="min-h-[65vh] grid place-items-center py-6">
                <div class="w-full max-w-sm flex flex-col items-center text-center">
                    <svg viewBox="0 0 1024 1024" class="icon size-14" version="1.1"
                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path
                                d="M114.8 561.9l-0.8 92.6 151.1-92.6h291.3c39.4 0 71.3-32.6 71.3-72.9V206c0-40.3-31.9-72.9-71.3-72.9H114.8c-39.4 0-71.3 32.6-71.3 72.9v283c0 40.3 31.9 72.9 71.3 72.9z"
                                fill="#9ED5E4"></path>
                            <path
                                d="M114 669.1c-2.5 0-4.9-0.6-7.1-1.9-4.6-2.6-7.4-7.5-7.4-12.7l0.7-79.3C59.8 568.1 29 532.2 29 489V206c0-48.2 38.5-87.4 85.8-87.4h441.5c47.3 0 85.8 39.2 85.8 87.4v283c0 48.2-38.5 87.4-85.8 87.4H269.2l-147.6 90.5c-2.4 1.4-5 2.2-7.6 2.2z m0.8-521.5C83.5 147.6 58 173.8 58 206v283c0 32.2 25.5 58.4 56.9 58.4 3.9 0 7.6 1.5 10.3 4.3 2.7 2.7 4.2 6.5 4.2 10.3l-0.6 66.5 128.8-79c2.3-1.4 4.9-2.1 7.6-2.1h291.3c31.4 0 56.9-26.2 56.9-58.4V206c0-32.2-25.5-58.4-56.9-58.4H114.8z"
                                fill="#154B8B"></path>
                            <path
                                d="M890.1 773.1l1.1 117.4-195.6-117.4H318.4c-51 0-92.4-41.4-92.4-92.4V322.1c0-51 41.4-92.4 92.4-92.4h571.7c51 0 92.4 41.4 92.4 92.4v358.7c0 50.9-41.3 92.3-92.4 92.3z"
                                fill="#FAFCFC"></path>
                            <path
                                d="M891.2 905c-2.6 0-5.2-0.7-7.5-2.1L691.6 787.6H318.4c-58.9 0-106.9-47.9-106.9-106.9V322.1c0-58.9 47.9-106.9 106.9-106.9h571.7c58.9 0 106.9 47.9 106.9 106.9v358.7c0 54-40.2 98.7-92.2 105.9l1 103.8c0 5.2-2.7 10.1-7.3 12.7-2.3 1.1-4.8 1.8-7.3 1.8zM318.4 244.2c-42.9 0-77.9 34.9-77.9 77.9v358.7c0 42.9 34.9 77.9 77.9 77.9h377.2c2.6 0 5.2 0.7 7.5 2.1l173.5 104.1-0.8-91.5c0-3.9 1.5-7.6 4.2-10.3 2.7-2.7 6.4-4.3 10.3-4.3 42.9 0 77.9-34.9 77.9-77.9V322.1c0-42.9-34.9-77.9-77.9-77.9H318.4z"
                                fill="#154B8B"></path>
                            <path d="M376 499.8a47.3 44.8 0 1 0 94.6 0 47.3 44.8 0 1 0-94.6 0Z" fill="#144884"></path>
                            <path d="M557 499.8a47.3 44.8 0 1 0 94.6 0 47.3 44.8 0 1 0-94.6 0Z" fill="#144884"></path>
                            <path d="M737.9 499.8a47.3 44.8 0 1 0 94.6 0 47.3 44.8 0 1 0-94.6 0Z" fill="#144884">
                            </path>
                        </g>
                    </svg>

                    <p class="font-medium mt-3 mb-2">You have no orders waiting for feedback</p>

                    <p class="text-sm text-slate-500">After getting your products delivered, you will be able to rate
                        and review them. Your feedback
                        will be published on the product page to help all users get the best shopping experience!</p>

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
                Alpine.data('reviews', () => ({
                    items: {},
                    modalIsOpen: false,
                    modalItem: {},
                    errors: null,

                    openModal(item) {
                        if (!item) {
                            alert('Please select the product you want to add the review!');
                        }
                        this.modalIsOpen = true;
                        this.modalItem = item;
                    },

                    closeModal() {
                        this.modalIsOpen = false;
                        this.modalItem = {};
                    },

                    async addReview(el) {
                        try {
                            this.errors = null;
                            if (!this.modalItem) {
                                alert('Please select the product you want to add the review!');
                            }
                            const formData = new FormData(el);

                            const response = await axios.post('{{ route('customer.reviews.store') }}',
                                formData);

                            if (response.status == 200) {
                                this.closeModal();
                                this.getItems();
                            }
                        } catch (error) {
                            if (error && error.status == 422) {
                                this.errors = error.response.data.errors;
                                console.log(this.errors);
                            }
                            console.log(error);
                        }
                    },

                    async getItems() {
                        try {
                            const response = await axios.get('{{ route('customer.reviews.items') }}');

                            if (response.status == 200) {
                                this.items = response.data;
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    init() {
                        this.items = @json($items);
                    },
                }))
            })
        </script>
    @endpush
</x-customer-layout>
