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
                <div x-cloak x-show="selectedTab == 'reviews'">
                    <div class="grid grid-cols-5 divide-x divide-slate-200 py-7">
                        <div class="col-span-1 justify-self-center">
                            <div class="font-semibold text-3xl">
                                <span class="text-6xl text-red-500" x-text="product.reviews_avg_rating"></span>
                                <span>/</span>
                                <span>5</span>
                            </div>

                            <div class="flex items-center text-red-500 mt-2 gap-1">
                                <template x-for="i in 5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6"
                                        fill="currentColor">
                                        <path x-show="i <= product.reviews_avg_rating"
                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        <path x-show="i > product.reviews_avg_rating"
                                            d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                    </svg>
                                </template>
                            </div>
                            <p class="mt-2 text-slate-400 font-medium text-lg"
                                x-text="'('+product.reviews_count + ' ratings)'"></p>
                        </div>

                        <div class="col-span-4 space-y-2 px-5">
                            {{-- 5 star --}}
                            <div class="flex items-center gap-7">
                                <div class="shrink-0 flex items-center text-red-600 gap-1">
                                    <template x-for="i in 5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6"
                                            fill="currentColor">
                                            <path
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                    </template>
                                </div>

                                <div class="flex-1">
                                    <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                        <div class="absolute inset-0 bg-red-600"
                                            :style="{
                                                width: product.reviews.filter(review => review.rating === 5).length *
                                                    100 /
                                                    product.reviews_count + '%'
                                            }">
                                        </div>
                                    </div>
                                </div>

                                <div class="shrink-0 min-w-16">
                                    <span x-text="product.reviews.filter(review => review.rating == 5).length"></span>
                                </div>
                            </div>

                            {{-- 4 star --}}
                            <div class="flex items-center gap-7">
                                <div class="shrink-0 flex items-center text-red-600 gap-1">
                                    <template x-for="i in 5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6"
                                            fill="currentColor">
                                            <path x-cloak x-show="i <= 4"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            <path x-cloak x-show="i > 4"
                                                d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                        </svg>
                                    </template>
                                </div>

                                <div class="flex-1">
                                    <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                        <div class="absolute inset-0 bg-red-600"
                                            :style="{
                                                width: product.reviews.filter(review => review.rating === 4).length *
                                                    100 /
                                                    product.reviews_count + '%'
                                            }">
                                        </div>
                                    </div>
                                </div>

                                <div class="shrink-0 min-w-16">
                                    <span x-text="product.reviews.filter(review => review.rating === 4).length"></span>
                                </div>
                            </div>


                            {{-- 3 star --}}
                            <div class="flex items-center gap-7">
                                <div class="shrink-0 flex items-center text-red-600 gap-1">
                                    <template x-for="i in 5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6"
                                            fill="currentColor">
                                            <path x-cloak x-show="i <= 3"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            <path x-cloak x-show="i > 3"
                                                d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                        </svg>
                                    </template>
                                </div>

                                <div class="flex-1">
                                    <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                        <div class="absolute inset-0 bg-red-600"
                                            :style="{
                                                width: product.reviews.filter(review => review.rating === 3).length *
                                                    100 /
                                                    product.reviews_count + '%'
                                            }">
                                        </div>
                                    </div>
                                </div>

                                <div class="shrink-0 min-w-16">
                                    <span x-text="product.reviews.filter(review => review.rating === 3).length"></span>
                                </div>
                            </div>

                            {{-- 2 star --}}
                            <div class="flex items-center gap-7">
                                <div class="shrink-0 flex items-center text-red-600 gap-1">
                                    <template x-for="i in 5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6"
                                            fill="currentColor">
                                            <path x-cloak x-show="i <= 2"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            <path x-cloak x-show="i > 2"
                                                d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                        </svg>
                                    </template>
                                </div>

                                <div class="flex-1">
                                    <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                        <div class="absolute inset-0 bg-red-600"
                                            :style="{
                                                width: product.reviews.filter(review => review.rating === 2).length *
                                                    100 /
                                                    product.reviews_count + '%'
                                            }">
                                        </div>
                                    </div>
                                </div>

                                <div class="shrink-0 min-w-16">
                                    <span x-text="product.reviews.filter(review => review.rating == 2).length"></span>
                                </div>
                            </div>

                            {{-- 1 star --}}
                            <div class="flex items-center gap-7">
                                <div class="shrink-0 flex items-center text-red-600 gap-1">
                                    <template x-for="i in 5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-6"
                                            fill="currentColor">
                                            <path x-cloak x-show="i <= 1"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            <path x-cloak x-show="i > 1"
                                                d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                        </svg>
                                    </template>
                                </div>

                                <div class="flex-1">
                                    <div class="rounded-full w-full bg-slate-200 h-4 relative overflow-hidden">
                                        <div class="absolute inset-0 bg-red-600"
                                            :style="{
                                                width: product.reviews.filter(review => review.rating === 1).length *
                                                    100 /
                                                    product.reviews_count + '%'
                                            }">
                                        </div>
                                    </div>
                                </div>

                                <div class="shrink-0 min-w-16">
                                    <span x-text="product.reviews.filter(review => review.rating == 1).length"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- reviews details --}}
                    <div class="mt-10">
                        <div class="py-3 flex items-center gap-5 justify-end">
                            <div>
                                <x-forms.select-input name="" x-model="rating" @change="productReviews">
                                    <option value="" selected>All Stars</option>
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Stars</option>
                                </x-forms.select-input>
                            </div>
                        </div>

                        <div class=" divide-y divide-slate-200">
                            <template x-for="(review, index) in reviews" :key="index">
                                <div class="p-5 flex items-start">
                                    <div class="shrink-0 me-5">
                                        <img :src="review.user.avatar" alt="user avatar"
                                            class="size-12 rounded-full object-cover object-center">
                                    </div>

                                    <div class="w-full">
                                        <div class="flex items-center">
                                            <div>
                                                <p x-text="review.user.name"></p>
                                                <p class="text-sm text-slate-500" x-text="review.date"></p>
                                            </div>

                                            <div class="ms-auto flex items-center gap-1 text-orange-500">
                                                <template x-for="i in 5">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                        class="size-5" fill="currentColor">
                                                        <path x-cloak x-show="i <= review.rating"
                                                            d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                        <path x-cloak x-show="i > review.rating"
                                                            d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />
                                                    </svg>
                                                </template>
                                            </div>
                                        </div>

                                        <div class="mt-5">
                                            <div class="text-sm" x-text="review.message"></div>
                                        </div>
                                    </div>

                                </div>


                            </template>

                        </div>

                        <div class="flex items-center gap-2 p-4 border-t border-slate-300">
                            <div class="text-sm">
                                <span>Showing</span>
                                <span x-text="from"></span>
                                <span>to</span>
                                <span x-text="to"></span>
                                <span>of</span>
                                <span x-text="total"></span>
                                <span>results</span>
                            </div>

                            {{-- pagination --}}
                            <nav aria-label="pagination" class="ms-auto shrink-0 text-sm">
                                <ul class="flex shrink-0 items-center gap-2">
                                    <li>
                                        <button @click="goToPage(1)" class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                class="bi bi-chevron-double-left size-4" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                                                <path fill-rule="evenodd"
                                                    d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                                            </svg>
                                        </button>
                                    </li>
                                    <!-- prev button -->
                                    <li>
                                        <button @click="prevPage" type="button"
                                            class="flex items-center rounded-md p-1 hover:text-primary"
                                            aria-label="previous page">
                                            Previous
                                        </button>
                                    </li>

                                    <template x-if="currentPage > 4">
                                        <li>
                                            <a href="#" class="flex size-6 items-center justify-center"
                                                aria-label="more pages">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true"
                                                    stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            </a>
                                        </li>
                                    </template>

                                    <template x-for="page in visiblePages" :key="page">
                                        <li>
                                            <button type="button" @click="goToPage(page)"
                                                class="flex size-6 items-center justify-center rounded-md p-1 "
                                                :class="{ 'bg-indigo-600 text-white': currentPage === page }"
                                                aria-current="page" aria-label="page 2" x-text="page"></button>
                                        </li>
                                    </template>

                                    <template x-if="currentPage < totalPages - 3">
                                        <li>
                                            <button type="button"
                                                class="flex size-6 items-center justify-center rounded-md p-1"
                                                aria-label="more pages">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" aria-hidden="true"
                                                    stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                                </svg>
                                            </button>
                                        </li>
                                    </template>

                                    <li>
                                        <button @click="nextPage" type="button"
                                            class="flex items-center rounded-md p-1" aria-label="next page">
                                            Next
                                        </button>
                                    </li>

                                    <li>
                                        <button class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" @click="goToPage(totalPages)"
                                                fill="currentColor" class="bi bi-chevron-double-right size-4"
                                                viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708" />
                                                <path fill-rule="evenodd"
                                                    d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                        </button>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <div x-cloak x-show="selectedTab == 'recommend'"></div>
    </div>


    <x-products-card class="mt-5" />
    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('productDetails', () => ({
                    product: @json($product_details['product']),
                    reviews: @json($product_details['reviews']).data,
                    quantity: 1,
                    selectedTab: 'description',
                    variation: @json($product_details['variation']),
                    variationAttributes: @json($product_details['variation']?->attributes),
                    loading: false,

                    from: 1,
                    to: 10,
                    total: 0,
                    currentPage: 1,
                    totalPages: 1,

                    // filter
                    rating: '',

                    async productReviews() {
                        try {
                            const response = await axios.get(
                                `{{ route('customer.product.reviews', ':productId') }}`.replace(
                                    ':productId', this.product.id), {
                                    params: {
                                        page: this.currentPage,

                                        rating: this.rating,

                                    }
                                });

                            if (response.status === 200) {
                                console.log(response);
                                this.reviews = response.data.data;
                                this.from = response.data.from;
                                this.to = response.data.to;
                                this.total = response.data.total;
                                this.currentPage = response.data.current_page;
                                this.totalPages = response.data.last_page;
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    visiblePages() {
                        const pages = [];
                        const delta = 1;
                        const start = Math.max(1, this.currentPage - delta);
                        const end = Math.min(this.totalPages, this.currentPage + delta);

                        for (let i = start; i <= end; i++) {
                            pages.push(i);
                        }
                        return pages;
                    },

                    prevPage() {
                        if (this.currentPage > 1) {
                            this.currentPage--;
                            this.productReviews();
                        }
                    },

                    nextPage() {
                        if (this.currentPage < this.totalPages) {
                            this.currentPage++;
                            this.productReviews();
                        }
                    },

                    goToPage(page) {
                        this.currentPage = page;
                        this.productReviews();
                    },


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

                        this.reviews = @json($product_details['reviews']).data;
                        this.from = @json($product_details['reviews']).from;
                        this.to = @json($product_details['reviews']).to;
                        this.total = @json($product_details['reviews']).total;
                        this.currentPage = @json($product_details['reviews']).current_page;
                        this.totalPages = @json($product_details['reviews']).last_page;

                    }
                }))
            })
        </script>
    @endpush
</x-guest-layout>
