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
                    <a href="#" class="hover:text-slate-900 dark:hover:text-white">Reviews</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                        stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex items-center gap-1 font-bold text-slate-900 dark:text-white" aria-current="page">
                    List</li>
            </ol>
        </nav>

        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Reviews') }}
        </h2>
    </x-slot>


    <div x-data="reviews" class="rounded bg-slate-50 shadow">
        <div class="flex items-center p-3">
            {{-- search input --}}
            <x-forms.search-input x-model="q" />

        </div>

        <div class="overflow-hidden w-full overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="border-y border-slate-200 text-slate-800">
                    <tr>
                        <th scope="col" class="p-4">
                            <label for="checkAll" class="flex items-center text-on-surface dark:text-on-surface-dark ">
                                <x-forms.checkbox id="checkAll" x-model="checkAll" />
                            </label>
                        </th>
                        <th scope="col" class="p-4">Review Id</th>
                        <th scope="col" class="p-4">Product</th>
                        <th scope="col" class="p-4">User</th>
                        <th scope="col" class="p-4">Rating</th>
                        <th scope="col" class="p-4">Review</th>
                        <th scope="col" class="p-4">Status</th>
                        <th scope="col" class="p-4 ">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <template x-for="review in reviews" :key="review.id">
                        <tr>
                            <td class="p-4">
                                <label :for="review.id"
                                    class="flex items-center text-on-surface dark:text-on-surface-dark ">
                                    <x-forms.checkbox ::id="review.id" ::checked="checkAll" />
                                </label>
                            </td>
                            <td class="p-4 whitespace-nowrap" x-text="review.review_id"></td>
                            <td class="p-4 min-w-60">
                                <p class="line-clamp-3" x-text="review.product.name"></p>
                            </td>

                            <td class="p-4">
                                <div class="flex w-max items-center gap-2">
                                    <img class="size-8 rounded-full object-cover" :src="review.user.avatar"
                                        alt="user avatar" />
                                    <div class="flex flex-col">
                                        <span class="text-slate-900" x-text="review.user.name"></span>
                                    </div>
                                </div>
                            </td>

                            <td class="p-4 whitespace-nowrap">
                                <div class="flex items-center gap-1">
                                    <template x-for="i in 5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="size-4 text-orange-500" fill="currentColor">
                                            <path x-show="i <= review.rating"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                            <path x-show="i > review.rating"
                                                d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z" />

                                        </svg>
                                    </template>
                                </div>
                            </td>
                            <td class="p-4 min-w-96">
                                <p class="line-clamp-3" x-text="review.message"></p>
                            </td>
                            <td class="p-4">
                                <div class="text-xs px-2 py-0.5 rounded flex items-center gap-2 w-fit capitalize border"
                                    :class="{
                                        'bg-indigo-100 text-indigo-500 border-indigo-500': review.status ==
                                            'pending',
                                        'bg-green-100 text-green-500 border-green-500': review.status ==
                                            'publish',
                                        'bg-red-100 text-red-500 border-red-500': review.status ==
                                            'cancel',
                                    }">
                                    <span
                                        x-text="review.status == 'publish' ? 'Published' : review.status == 'cancel' ? 'Cancelled' : 'Pending'">
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3"
                                        fill="currentColor">
                                        <path x-cloak x-show="review.status == 'pending'"
                                            d="M464 256A208 208 0 1 1 48 256a208 208 0 1 1 416 0zM0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM232 120l0 136c0 8 4 15.5 10.7 20l96 64c11 7.4 25.9 4.4 33.3-6.7s4.4-25.9-6.7-33.3L280 243.2 280 120c0-13.3-10.7-24-24-24s-24 10.7-24 24z" />
                                        <path x-cloak x-show="review.status == 'publish'"
                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                        <path x-cloak x-show="review.status == 'cancel'"
                                            d="M96 64c0-17.7-14.3-32-32-32S32 46.3 32 64l0 256c0 17.7 14.3 32 32 32s32-14.3 32-32L96 64zM64 480a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                    </svg>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap" x-text="review.date"></td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    {{-- edit review --}}
                                    <button @click="openModal(review)" type="button"
                                        class="bg-indigo-100 text-indigo-500 p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                                            fill="currentColor">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                    </button>

                                    {{-- delete review --}}
                                    <button @click="deleteReview(review)" type="button"
                                        class="bg-red-100 text-red-500 p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4"
                                            fill="currentColor">
                                            <path
                                                d="M170.5 51.6L151.5 80l145 0-19-28.4c-1.5-2.2-4-3.6-6.7-3.6l-93.7 0c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80 368 80l48 0 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 304c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80l0-304-8 0c-13.3 0-24-10.7-24-24S10.7 80 24 80l8 0 48 0 13.8 0 36.7-55.1C140.9 9.4 158.4 0 177.1 0l93.7 0c18.7 0 36.2 9.4 46.6 24.9zM80 128l0 304c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32l0-304L80 128zm80 64l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </template>

                    <template x-if="reviews.length == 0">
                        <tr>
                            <td colspan="8" class="p-4">
                                <p class="text-slate-500">No data available at the moment</p>
                            </td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>

        <div class="flex items-center gap-2 p-4 border-t border-slate-300">
            <x-forms.input-label for="rowsPerPage">Rows per page
                <x-forms.select-input x-model="rowsPerPage" id="rowPerPage" @change="reviewsList">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </x-forms.select-input>
            </x-forms.input-label>

            <div class="text-sm">
                <span x-text="from"></span>
                <span>-</span>
                <span x-text="to"></span>
                <span>items</span>
                <span x-text="total"></span>
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
                            class="flex items-center rounded-md p-1 hover:text-primary" aria-label="previous page">
                            Previous
                        </button>
                    </li>

                    <template x-if="currentPage > 4">
                        <li>
                            <a href="#" class="flex size-6 items-center justify-center"
                                aria-label="more pages">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" aria-hidden="true" stroke="currentColor" class="size-6">
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
                                :class="{ 'bg-indigo-600 text-white': currentPage === page }" aria-current="page"
                                aria-label="page 2" x-text="page"></button>
                        </li>
                    </template>

                    <template x-if="currentPage < totalPages - 3">
                        <li>
                            <button type="button" class="flex size-6 items-center justify-center rounded-md p-1"
                                aria-label="more pages">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" aria-hidden="true" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M6.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM12.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0ZM18.75 12a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                                </svg>
                            </button>
                        </li>
                    </template>

                    <li>
                        <button @click="nextPage" type="button" class="flex items-center rounded-md p-1"
                            aria-label="next page">
                            Next
                        </button>
                    </li>

                    <li>
                        <button class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" @click="goToPage(totalPages)" fill="currentColor"
                                class="bi bi-chevron-double-right size-4" viewBox="0 0 16 16">
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



        <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
            x-on:keydown.esc.window="closeModal" x-on:click.self="closeModal"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8">
            <!-- Modal Dialog -->
            <div x-show="modalIsOpen"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="flex max-w-lg w-96 flex-col gap-4 relative rounded border border-slate-200 bg-white text-slate-600 p-5">

                <button @click="closeModal"
                    class="absolute right-0 top-0 -translate-y-1/2 translate-x-1/2 bg-white shadow p-1 rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="size-4"
                        fill="currentColor">
                        <path
                            d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                    </svg>
                </button>
                <!-- Dialog Header -->

                <div class="mb-5">
                    <p class="text-xl font-medium">Edit: <span class="text-base text-slate-500"
                            x-text="selectedReview.review_id"></span> </span></p>
                </div>

                <form @submit.prevent="updateReview($event)">
                    @csrf
                    @method('PATCH')

                    <p class="text-sm text-slate-500">You're about to update this review status. Don't worry, changes
                        can always be adjusted later!</p>

                    <div class="mt-4">
                        <x-forms.input-label value="Review Status" for="status" class="mb-1" />
                        <x-forms.select-input name="status" id="status" class="w-full"
                            x-model="selectedReview.status">
                            <option value="pending">Pending</option>
                            <option value="publish">Publish</option>
                            <option value="cancel">Cancel</option>
                        </x-forms.select-input>
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
                Alpine.data('reviews', () => ({
                    reviews: {},
                    checkAll: false,
                    modalIsOpen: false,
                    selectedReview: {},

                    // pagination
                    rowsPerPage: 10,
                    from: 1,
                    to: 10,
                    total: 0,
                    currentPage: 1,
                    totalPages: 1,

                    // filter
                    q: '',

                    openModal(review) {
                        this.selectedReview = review;
                        this.modalIsOpen = true;
                    },

                    closeModal() {
                        this.modalIsOpen = false;
                        this.selectedReview = {};
                    },

                    async reviewsList() {
                        try {
                            const response = await axios.get('{{ route('reviews.list') }}', {
                                params: {
                                    rowsPerPage: this.rowsPerPage,
                                    page: this.currentPage,

                                    q: this.q,

                                }
                            });

                            if (response.status === 200) {
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
                            this.reviewsList();
                        }
                    },

                    nextPage() {
                        if (this.currentPage < this.totalPages) {
                            this.currentPage++;
                            this.reviewsList();
                        }
                    },

                    goToPage(page) {
                        this.currentPage = page;
                        this.reviewsList();
                    },

                    async deleteReview(review) {
                        try {
                            if (confirm('Are you sure?')) {
                                const response = await axios.delete(
                                    `{{ route('reviews.destroy', ':id') }}`.replace(':id',
                                        review.id));

                                if (response.status == 200) {
                                    this.reviewsList();
                                }
                            }

                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async updateReview(event) {
                        try {
                            const formData = new FormData(event.target);
                            const response = await axios.post(
                                `{{ route('reviews.update', ':id') }}`.replace(':id',
                                    this.selectedReview.id), formData);

                            if (response.status == 200) {
                                event.target.reset();
                                this.closeModal();
                                this.reviewsList();
                            }

                        } catch (error) {
                            console.log(error);
                        }
                    },

                    init() {
                        this.reviews = @json($reviews).data;
                        this.from = @json($reviews).from;
                        this.to = @json($reviews).to;
                        this.total = @json($reviews).total;
                        this.currentPage = @json($reviews).current_page;
                        this.totalPages = @json($reviews).last_page;


                        this.$watch('q', () => {
                            this.reviewsList();
                        });
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
