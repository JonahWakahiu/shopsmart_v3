<x-guest-layout>
    <div x-data="productDetails" class="space-y-5">

        <div class="bg-white rounded shadow-sm p-3 flex flex-wrap max-md:gap-5 relative">
            {{-- cart loading icon --}}

            <div x-show="loading" x-cloak class="absolute inset-0 grid place-items-center bg-white/80 z-10 opacity-50">
                <svg class="size-14 animate-spin" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 213.333 213.333" xml:space="preserve"
                    fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path style="fill:#2D50A7;"
                            d="M203.636,101.818h-38.788c-5.355,0-9.697,4.342-9.697,9.697s4.342,9.697,9.697,9.697h38.788 c5.355,0,9.697-4.342,9.697-9.697S208.992,101.818,203.636,101.818z">
                        </path>
                        <path style="fill:#73A1FB;"
                            d="M48.485,101.818H9.697c-5.355,0-9.697,4.342-9.697,9.697s4.342,9.697,9.697,9.697h38.788 c5.355,0,9.697-4.342,9.697-9.697S53.84,101.818,48.485,101.818z">
                        </path>
                        <path style="fill:#355EC9;"
                            d="M168.378,36.09l-27.428,27.428c-3.787,3.786-3.787,9.926,0,13.713 c1.893,1.894,4.375,2.841,6.856,2.841c2.482,0,4.964-0.946,6.857-2.841l27.428-27.428c3.787-3.786,3.787-9.926,0-13.713 C178.305,32.303,172.165,32.303,168.378,36.09z">
                        </path>
                        <g>
                            <path style="fill:#C4D9FD;"
                                d="M106.667,169.697c-5.355,0-9.697,4.342-9.697,9.697v19.394c0,5.355,4.342,9.697,9.697,9.697 c5.355,0,9.697-4.342,9.697-9.697v-19.394C116.364,174.039,112.022,169.697,106.667,169.697z">
                            </path>
                            <path style="fill:#C4D9FD;"
                                d="M58.669,145.799l-27.427,27.428c-3.787,3.787-3.787,9.926,0,13.713 c1.893,1.893,4.375,2.84,6.857,2.84c2.482,0,4.964-0.947,6.856-2.84l27.427-27.428c3.787-3.787,3.787-9.926,0-13.713 C68.596,142.012,62.456,142.012,58.669,145.799z">
                            </path>
                        </g>
                        <path style="fill:#3D6DEB;"
                            d="M106.667,4.848c-5.355,0-9.697,4.342-9.697,9.697v38.788c0,5.355,4.342,9.697,9.697,9.697 c5.355,0,9.697-4.342,9.697-9.697V14.545C116.364,9.19,112.022,4.848,106.667,4.848z">
                        </path>
                        <path style="fill:#5286FA;"
                            d="M44.956,36.09c-3.786-3.787-9.926-3.787-13.713,0c-3.787,3.787-3.787,9.926,0,13.713l27.427,27.428 c1.893,1.894,4.375,2.841,6.857,2.841c2.481,0,4.964-0.947,6.856-2.841c3.787-3.786,3.787-9.926,0-13.713L44.956,36.09z">
                        </path>
                    </g>
                </svg>
            </div>
            <div class="w-full md:w-4/12">
                <div class="swiper mySwiper2 h-96">
                    <div class="swiper-wrapper h-full">
                        <template x-for="image in product.images" :key="image.id">
                            <div class="swiper-slide h-full">
                                <img :src="image.url" alt="product.name" class="w-full h-full" />
                            </div>
                        </template>
                    </div>

                </div>
                <div thumbsSlider="" class="swiper mySwiper mt-2">
                    <div class="swiper-wrapper">
                        <template x-for="image in product.images" :key="image.id">
                            <div class="swiper-slide cursor-pointer opacity-40">
                                <img :src="image.url" alt="product.name" />
                            </div>
                        </template>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-8/12 md:ps-7 ">
                <p class="text-lg font-medium capitalize" x-text="product.name"></p>
                <div class="px-5 py-2 bg-slate-100 rounded mt-2">
                    <template x-if="variation">
                        <div>
                            <template x-if="variation.discount">
                                <div class="flex items-baseline gap-3">
                                    <span class="text-lg font-medium text-red-500" x-text="variation.sale_price"></span>
                                    <span class="line-through text-sm" x-text="variation.price"></span>
                                    <span class="text-red-500 leading-none px-5 py-1 bg-red-100 rounded"
                                        x-text="variation.discount"></span>
                                </div>
                            </template>

                            <template x-if="!variation.discount">
                                <span class="text-red-500 font-medium text-lg" x-text="variation.price"></span>
                            </template>
                        </div>
                    </template>

                    <template x-if="!variation">
                        <div>
                            <template x-if="product.discount">
                                <div class="flex items-baseline gap-3">
                                    <span class="text-lg font-medium text-red-500" x-text="product.sale_price"></span>
                                    <span class="line-through text-sm" x-text="product.price"></span>
                                    <span class="text-red-500 leading-none px-5 py-1 bg-red-100 rounded"
                                        x-text="product.discount"></span>
                                </div>
                            </template>

                            <template x-if="!product.discount">
                                <span class="text-red-500 font-medium text-lg" x-text="product.price"></span>
                            </template>
                        </div>
                    </template>
                    <span class="font-semibold text-lg"></span>
                </div>

                <div class="border-b border-slate-200 my-3"></div>

                <div class="mt-2" x-text="product.short_description">

                </div>

                <p x-text="product.type === 'variable' ? 'true' : 'false'"></p>
                <template x-if="product.type == 'variable'">
                    <div class="space-y-3">
                        <template x-for="(values, name) in product.attributes" :key="name">
                            <div class="flex items-center">
                                <div class="w-1/4">
                                    <span class="capitalize" x-text="name"></span>
                                </div>

                                <div class="w-3/4 flex items-center flex-wrap gap-3">
                                    <template x-for="(value, i) in values" :key="i">
                                        <div>
                                            <input type="radio" :name="name" :id="name + '-' + value"
                                                :value="value" class="hidden peer"
                                                x-model="variationAttributes[name]" @change="editProduct">
                                            <label :for="name + '-' + value"
                                                class="bg-slate-100 border border-slate-200 rounded leading-none text-sm py-1  px-5 cursor-pointer peer-checked:border-orange-500 peer-checked:shadow-inner peer-checked:shadow-orange-500">
                                                <span class="capitalize" x-text="value"></span>
                                            </label>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>



                <div class="flex items-center mt-5">
                    <div class="w-1/4">
                        <span>Quantity</span>
                    </div>
                    <div class="w-3/4">
                        <div class="flex items-center gap-1">
                            <button @click="decreaseQuantity" type="button"
                                class="bg-slate-100 border border-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-dash size-6"
                                    viewBox="0 0 16 16">
                                    <path d=" M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8" />
                                </svg>
                            </button>
                            <div class="bg-slate-100 px-2 py-[1px]" x-text="quantity"></div>
                            <button @click="increaseQuantity" type="button"
                                class="bg-slate-100 border border-slate-200">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-plus size-6"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-5 mt-3">
                    <button @click="addToCart" type="button"
                        class="bg-gradient-to-r from-orange-400 to-red-500 text-white px-5 py-1.5 text-sm rounded font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                        </svg>
                        <span>Add to Cart</span>
                    </button>

                    <button type="button"
                        class="bg-gradient-to-r from-orange-400 to-red-500 text-white px-5 py-1.5 text-sm rounded font-medium flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg>
                        <span>Add to Wishlist</span>
                    </button>
                </div>
            </div>

        </div>

        <div class="bg-white rounded shadow-sm">
            <div class="border-b border-slate-200 flex items-center">
                <button @click="selectedTab = 'description'" type="button" class="px-5 py-2 text-sm font-medium"
                    :class="selectedTab == 'description' && 'bg-red-500 text-white'">Description</button>
                <button @click="selectedTab = 'reviews'" type="button" class="px-5 py-2 text-sm font-medium"
                    :class="selectedTab == 'reviews' && 'bg-red-500 text-white'">Reviews</button>
                <button @click="selectedTab = 'recommend'" type="button" class="px-5 py-2 text-sm font-medium"
                    :class="selectedTab == 'recommend' && 'bg-red-500 text-white'">Recommend</button>
            </div>
            <div class="p-5">
                <div x-cloak x-show="selectedTab == 'description'">
                    <div x-text="product.description"></div>
                </div>
                <div x-cloak x-show="selectedTab == 'reviews'"></div>
                <div x-cloak x-show="selectedTab == 'recommend'"></div>
            </div>
        </div>

    </div>

    <x-products-card class="mt-5" />
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('productDetails', () => ({
                    product: @json($product_details['product']),
                    quantity: 1,
                    selectedTab: 'description',
                    variation: @json($product_details['variation']),
                    variationAttributes: @json($product_details['variation']?->attributes),
                    loading: false,

                    decreaseQuantity() {
                        if (this.quantity > 1) {
                            this.quantity--;
                        }
                    },

                    increaseQuantity() {
                        this.quantity++;
                    },

                    async editProduct() {
                        try {
                            const response = await axios.get(
                                `{{ route('customer.product.listing.edit', ':id') }}`.replace(':id',
                                    this.product.id), {
                                    params: {
                                        attributes: this.variationAttributes
                                    }
                                }
                            );

                            if (response.status === 200) {
                                console.log(response);
                                this.product = response.data.product;
                                this.variation = response.data.variation;
                                this.variationAttributes = response.data.variation
                                    .attributes;
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async addToCart() {
                        try {
                            this.loading = true;
                            const response = await axios.post(
                                `{{ route('customer.cart.store') }}`, {
                                    product_id: this.product.id,
                                    quantity: this.quantity,
                                    attributes: this.variationAttributes
                                }
                            );

                            if (response.status === 200) {
                                console.log(response);
                                this.loading = false;
                            }
                        } catch (error) {
                            console.log(error);
                            this.loading = false;
                        }
                    },

                    init() {
                        var swiper = new Swiper('.mySwiper', {
                            slidesPerView: 4,
                            spaceBetween: 10,
                            freeMode: true,
                            watchSlidesVisibility: true,
                            watchSlidesProgress: true,
                        });

                        var swiper2 = new Swiper('.mySwiper2', {
                            spaceBetween: 10,
                            thumbs: {
                                swiper: swiper,
                            },
                        });

                    }
                }))
            })
        </script>
    @endpush
</x-guest-layout>
