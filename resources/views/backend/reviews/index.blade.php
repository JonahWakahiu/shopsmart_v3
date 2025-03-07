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
                        <th scope="col" class="p-4">reviews</th>
                        <th scope="col" class="p-4">Parent</th>
                        <th scope="col" class="p-4">Products</th>
                        <th scope="col" class="p-4 whitespace-nowrap">Product Stock</th>
                        <th scope="col" class="p-4 ">Status</th>
                        <th scope="col" class="p-4">Date</th>
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
                            <td class="p-4">
                                <div class="flex w-max items-center gap-2">
                                    <img class="size-10 object-cover rounded" :src="review.image"
                                        alt="customer avatar" />
                                    <div class="flex flex-col">
                                        <span class="text-slate-900" x-text="review.name"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap" x-text="review.parent?.name"></td>
                            <td class="p-4" x-text="review.products_count"></td>
                            <td class="p-4" x-text="review.stock"></td>
                            <td class="p-4">
                                <div class="text-xs px-2 py-0.5 rounded flex items-center gap-2 w-fit capitalize border"
                                    :class="{
                                        'bg-red-100 text-red-500 border-red-500': review.status ==
                                            'inactive',
                                        'bg-green-100 text-green-500 border-green-500': review.status ==
                                            'active',
                                    
                                    }">
                                    <span x-text="review.status">
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3"
                                        fill="currentColor">
                                        <path x-cloak x-show="review.status == 'active'"
                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                        <path x-cloak x-show="review.status == 'inactive'"
                                            d="M96 64c0-17.7-14.3-32-32-32S32 46.3 32 64l0 256c0 17.7 14.3 32 32 32s32-14.3 32-32L96 64zM64 480a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                    </svg>
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    {{-- show review --}}
                                    <a :href="'{{ route('reviews.show', ':id') }}'.replace(':id', review.id)"
                                        type="button" class="bg-sky-100 text-sky-500 p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="size-4"
                                            fill="currentColor">
                                            <path
                                                d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z" />
                                        </svg>
                                    </a>

                                    {{-- edit review --}}
                                    <a :href="'{{ route('reviews.edit', ':id') }}'.replace(':id', review.id)"
                                        type="button" class="bg-indigo-100 text-indigo-500 p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                                            fill="currentColor">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                    </a>

                                    {{-- delete review --}}
                                    <button @click="deletereview(review)" type="button"
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

    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('reviews', () => ({
                    reviews: {},
                    checkAll: false,

                    // pagination
                    rowsPerPage: 10,
                    from: 1,
                    to: 10,
                    total: 0,
                    currentPage: 1,
                    totalPages: 1,

                    // filter
                    q: '',

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

                    async deletereview(review) {
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
