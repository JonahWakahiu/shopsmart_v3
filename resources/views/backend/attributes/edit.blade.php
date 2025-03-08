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
                    <a href="{{ route('attributes.index') }}"
                        class="hover:text-slate-900 dark:hover:text-white">Attributes</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                        stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex items-center gap-1 font-bold text-slate-900 dark:text-white" aria-current="page">
                    Edit</li>
            </ol>
        </nav>

        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ 'Product ' . $attribute->name }}
        </h2>

        <p class="mt-3 text-sm text-slate-500">Note: Deleting a term will remove it from all products and variations to
            which it has been assigned.
            Recreating a term will not automatically assign it back to products</p>
    </x-slot>


    <div x-data="attributeValues" class="rounded bg-slate-50 shadow">
        <div class="flex items-center p-3">
            {{-- search input --}}
            <x-forms.search-input x-model="q" />

            <div class="ms-auto">
                <button @click="openModal" type="button"
                    class="px-5 py-2 text-sm bg-indigo-500 text-white rounded flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 shrink-0"
                        fill="currentColor">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                    <span>New attribute</span>
                </button>
            </div>
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
                        <th scope="col" class="p-4">Preview</th>
                        <th scope="col" class="p-4">Name</th>
                        <th scope="col" class="p-4">Description</th>
                        <th scope="col" class="p-4">Slug</th>
                        <th scope="col" class="p-4">Count</th>
                        <th scope="col" class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <template x-for="attributeValue in attributeValues" :key="attributeValue.id">
                        <tr>
                            <td class="p-4">
                                <label :for="attributeValue.id"
                                    class="flex items-center text-on-surface dark:text-on-surface-dark ">
                                    <x-forms.checkbox ::id="attributeValue.id" ::checked="checkAll" />
                                </label>
                            </td>
                            <td class="p-4">
                                <template x-if="attribute.watch_type == 'color' && attributeValue.value">
                                    <div class="size-10 rounded border border-slate-200"
                                        :style="'background-color: ' + attributeValue.value">
                                    </div>
                                </template>
                            </td>
                            <td class="p-4" x-text="attributeValue.name"></td>
                            <td class="p-4" x-text="attributeValue.description"></td>
                            <td class="p-4" x-text="attributeValue.slug"></td>
                            <td class="p-4"></td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    {{-- edit attribute --}}
                                    <button @click="openEditModal(attributeValue)" type="button"
                                        class="bg-indigo-100 text-indigo-500 p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                                            fill="currentColor">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                    </button>

                                    {{-- delete attribute --}}
                                    <button @click="deleteattribute(attributeValue)" type="button"
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

                    <template x-if="attributeValues.length == 0">
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
                <x-forms.select-input x-model="rowsPerPage" id="rowPerPage" @change="attributeValuesList">
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

        {{-- new attribute value modal --}}
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

                <div class="">
                    <p class="text-xl font-medium">Add new <span x-text="attribute.name"></span></p>
                </div>

                <form @submit.prevent="newAttributeValue($event)">
                    @csrf
                    <div>
                        <x-forms.input-label value="Name" />
                        <x-forms.text-input class="w-full" name="name" />
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label value="Slug" />
                        <x-forms.text-input class=" w-full" name="slug" />
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label value="Description" />
                        <x-forms.textarea class=" w-full" name="description" />
                    </div>


                    <div class="mt-4" x-cloak x-show="attribute.watch_type == 'color'">
                        <x-forms.input-label value="Color" />
                        <x-forms.text-input class="" name="value" class="w-full h-10 px-1 py-1"
                            type="color" />
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

        {{-- update attribute value modal --}}
        <div x-cloak x-show="editModalIsOpen" x-transition.opacity.duration.200ms
            x-trap.inert.noscroll="editModalIsOpen" x-on:keydown.esc.window="closeEditModal"
            x-on:click.self="closeEditModal"
            class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8">
            <!-- Modal Dialog -->
            <div x-show="editModalIsOpen"
                x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
                x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                class="flex max-w-lg w-[24rem] flex-col gap-4 relative rounded border border-slate-200 bg-white text-slate-600 p-5"
                x-data="{ watch_shape: '' }">

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
                    <p class="text-xl font-medium">Edit <span x-text="selectedAttributeValue.name"></span></p>
                </div>

                <form @submit.prevent="updateAttributeValue($event)">
                    @csrf
                    @method('put')

                    <div>
                        <x-forms.input-label value="Name" />
                        <x-forms.text-input class="w-full" name="name" x-model="selectedAttributeValue.name" />
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label value="Slug" />
                        <x-forms.text-input class=" w-full" name="slug" x-model="selectedAttributeValue.slug" />
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label value="Description" />
                        <x-forms.textarea class=" w-full" name="description"
                            x-model="selectedAttributeValue.description" />
                    </div>


                    <div class="mt-4" x-cloak x-show="attribute.watch_type == 'color'">
                        <x-forms.input-label value="Color" />
                        <x-forms.text-input class="" name="value" class="w-full h-10 px-1 py-1"
                            type="color" x-model="selectedAttributeValue.value" />
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

                Alpine.data('attributeValues', () => ({
                    attribute: {},
                    attributeValues: {},
                    selectedAttributeValue: {},
                    checkAll: false,
                    modalIsOpen: false,
                    editModalIsOpen: false,
                    errors: {},

                    // pagination
                    rowsPerPage: 10,
                    from: 1,
                    to: 10,
                    total: 0,
                    currentPage: 1,
                    totalPages: 1,
                    checked: 0,

                    // filter
                    q: '',

                    openModal() {
                        this.modalIsOpen = true;
                    },

                    closeModal() {
                        this.modalIsOpen = false;
                    },

                    openEditModal(attributeValue) {
                        this.selectedAttributeValue = attributeValue;
                        this.editModalIsOpen = true;
                    },

                    closeEditModal() {
                        this.editModalIsOpen = false;
                        this.selectedAttributeValue = {};
                    },

                    async attributeValuesList() {
                        try {
                            const response = await axios.get(
                                `{{ route('attributes.values.index', ':id') }}`.replace(':id', this
                                    .attribute.id), {
                                    params: {
                                        rowsPerPage: this.rowsPerPage,
                                        page: this.currentPage,

                                        q: this.q,

                                    }
                                });

                            if (response.status === 200) {
                                this.attributeValues = response.data.data;
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
                            this.attributeValuesList();
                        }
                    },

                    nextPage() {
                        if (this.currentPage < this.totalPages) {
                            this.currentPage++;
                            this.attributeValuesList();
                        }
                    },

                    goToPage(page) {
                        this.currentPage = page;
                        this.attributeValuesList();
                    },


                    async newAttributeValue(event) {
                        try {
                            this.errors = {};
                            const formData = new FormData(event.target);

                            const response = await axios.post(
                                `{{ route('attributes.values.store', ':attributeId') }}`.replace(
                                    ':attributeId', this.attribute.id),
                                formData);

                            if (response.status == 200) {
                                event.target.reset();
                                this.closeModal();
                                this.attributeValuesList();
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async updateAttributeValue(event) {
                        try {
                            this.errors = {};
                            const formData = new FormData(event.target);

                            const response = await axios.post(
                                `{{ route('attributes.values.update', ['attribute' => ':attributeId', 'value' => ':valueId']) }}`
                                .replace(
                                    ':attributeId', this.attribute.id).replace(
                                    ':valueId', this.selectedAttributeValue.id),
                                formData);

                            if (response.status == 200) {
                                event.target.reset();
                                this.closeEditModal();
                                this.attributeValuesList();
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    init() {
                        this.attribute = @json($attribute);
                        this.attributeValues = @json($values).data;
                        this.from = @json($values).from;
                        this.to = @json($values).to;
                        this.total = @json($values).total;
                        this.currentPage = @json($values).current_page;
                        this.totalPages = @json($values).last_page;


                        this.$watch('q', () => {
                            this.attributeValuesList();
                        });
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
