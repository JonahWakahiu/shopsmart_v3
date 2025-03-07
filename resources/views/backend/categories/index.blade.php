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
                    <a href="#" class="hover:text-slate-900 dark:hover:text-white">Categories</a>
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
            {{ __('Categories') }}
        </h2>
    </x-slot>


    <div x-data="categories" class="rounded bg-slate-50 shadow">
        <div class="flex items-center p-3">
            {{-- search input --}}
            <x-forms.search-input x-model="q" />

            <div class="ms-auto">
                <a href="{{ route('categories.create') }}"
                    class="px-5 py-2 text-sm bg-indigo-500 text-white rounded flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="size-4 shrink-0"
                        fill="currentColor">
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z" />
                    </svg>
                    <span>New Category</span>
                </a>
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
                        <th scope="col" class="p-4">Categories</th>
                        <th scope="col" class="p-4">Parent</th>
                        <th scope="col" class="p-4">Products</th>
                        <th scope="col" class="p-4 whitespace-nowrap">Product Stock</th>
                        <th scope="col" class="p-4 ">Status</th>
                        <th scope="col" class="p-4">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    <template x-for="category in categories" :key="category.id">
                        <tr>
                            <td class="p-4">
                                <label :for="category.id"
                                    class="flex items-center text-on-surface dark:text-on-surface-dark ">
                                    <x-forms.checkbox ::id="category.id" ::checked="checkAll" />
                                </label>
                            </td>
                            <td class="p-4">
                                <div class="flex w-max items-center gap-2">
                                    <img class="size-10 object-cover rounded" :src="category.image"
                                        alt="customer avatar" />
                                    <div class="flex flex-col">
                                        <span class="text-slate-900" x-text="category.name"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 whitespace-nowrap" x-text="category.parent?.name"></td>
                            <td class="p-4" x-text="category.products_count"></td>
                            <td class="p-4" x-text="category.stock"></td>
                            <td class="p-4">
                                <div class="text-xs px-2 py-0.5 rounded flex items-center gap-2 w-fit capitalize border"
                                    :class="{
                                        'bg-red-100 text-red-500 border-red-500': !category.active,
                                        'bg-green-100 text-green-500 border-green-500': category.active,
                                    
                                    }">
                                    <span x-text="category.active ? 'active' : 'inactive'">
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-3"
                                        fill="currentColor">
                                        <path x-cloak x-show="category.active"
                                            d="M438.6 105.4c12.5 12.5 12.5 32.8 0 45.3l-256 256c-12.5 12.5-32.8 12.5-45.3 0l-128-128c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0L160 338.7 393.4 105.4c12.5-12.5 32.8-12.5 45.3 0z" />
                                        <path x-cloak x-show="!category.active"
                                            d="M96 64c0-17.7-14.3-32-32-32S32 46.3 32 64l0 256c0 17.7 14.3 32 32 32s32-14.3 32-32L96 64zM64 480a40 40 0 1 0 0-80 40 40 0 1 0 0 80z" />
                                    </svg>
                                </div>
                            </td>

                            <td class="p-4">
                                <div class="flex items-center gap-2">

                                    {{-- edit category --}}
                                    <button @click="openModal(category)" type="button"
                                        class="bg-indigo-100 text-indigo-500 p-1 rounded">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="size-4"
                                            fill="currentColor">
                                            <path
                                                d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z" />
                                        </svg>
                                        </>

                                        {{-- delete category --}}
                                        <button @click="deleteCategory(category)" type="button"
                                            class="bg-red-100 text-red-500 p-1 rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                                class="size-4" fill="currentColor">
                                                <path
                                                    d="M170.5 51.6L151.5 80l145 0-19-28.4c-1.5-2.2-4-3.6-6.7-3.6l-93.7 0c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80 368 80l48 0 8 0c13.3 0 24 10.7 24 24s-10.7 24-24 24l-8 0 0 304c0 44.2-35.8 80-80 80l-224 0c-44.2 0-80-35.8-80-80l0-304-8 0c-13.3 0-24-10.7-24-24S10.7 80 24 80l8 0 48 0 13.8 0 36.7-55.1C140.9 9.4 158.4 0 177.1 0l93.7 0c18.7 0 36.2 9.4 46.6 24.9zM80 128l0 304c0 17.7 14.3 32 32 32l224 0c17.7 0 32-14.3 32-32l0-304L80 128zm80 64l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0l0 208c0 8.8-7.2 16-16 16s-16-7.2-16-16l0-208c0-8.8 7.2-16 16-16s16 7.2 16 16z" />
                                            </svg>
                                        </button>
                                </div>
                            </td>
                        </tr>
                    </template>

                    <template x-if="categories.length == 0">
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
                <x-forms.select-input x-model="rowsPerPage" id="rowPerPage" @change="categoriesList">
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
                class="flex max-w-lg flex-col gap-4 relative rounded border border-slate-200 bg-white text-slate-600 p-5">

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
                    <p class="text-xl font-medium">Edit <span x-text="$store.selectedCategory.name"></span></p>
                </div>

                <form @submit.prevent="updateCategory($event)">
                    @csrf
                    @method('PATCH')

                    <div class="mt-4">
                        <x-forms.input-label value="Name" />
                        <x-forms.text-input class="w-full" name="name" x-model="$store.selectedCategory.name" />
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label value="Slug" />
                        <x-forms.text-input class=" w-[24rem]" name="slug"
                            x-model="$store.selectedCategory.slug" />
                    </div>

                    <div x-data="combobox" class="w-full flex flex-col gap-1 mt-3"
                        x-on:keydown="highlightFirstMatchingOption($event.key)"
                        x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                        <label for="parent_category" class="w-fit pl-0.5 text-sm text-slate-600 ">Parent
                            Category</label>
                        <div class="relative">

                            <!-- trigger button  -->
                            <button type="button" role="combobox"
                                class="inline-flex w-full items-center justify-between gap-2 whitespace-nowrap border-slate-200 px-4 py-2 text-sm font-medium capitalize tracking-wide text-slate-600 transition hover:opacity-75 rounded border"
                                aria-haspopup="listbox" aria-controls="industriesList" x-on:click="isOpen = ! isOpen"
                                x-on:keydown.down.prevent="openedWithKeyboard = true"
                                x-on:keydown.enter.prevent="openedWithKeyboard = true"
                                x-on:keydown.space.prevent="openedWithKeyboard = true"
                                x-bind:aria-label="selectedOption ? selectedOption.value : 'Please Select'"
                                x-bind:aria-expanded="isOpen || openedWithKeyboard">
                                <span class="text-sm font-normal"
                                    x-text="selectedOption ? selectedOption.name : 'Please Select'"></span>
                                <!-- Chevron  -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="size-5">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- hidden input to grab the selected value  -->
                            <input id="parent_category" name="parent_category" type="text"
                                x-ref="hiddenTextField" hidden />
                            <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList"
                                class="absolute z-10 left-0 top-11 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto border-slate-300 bg-slate-50 py-1.5 dark:border-slate-700 dark:bg-slate-900 rounded-sm border"
                                role="listbox" aria-label="industries list"
                                x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                                x-on:keydown.down.prevent="$focus.wrap().next()"
                                x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition
                                x-trap="openedWithKeyboard">
                                <template x-for="(item, index) in filteredOptions" x-bind:key="item.id">
                                    <li class="combobox-option inline-flex justify-between gap-6 bg-slate-50 px-4 py-2 text-sm text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 focus-visible:bg-slate-900/5 focus-visible:text-slate-900 focus-visible:outline-hidden dark:bg-slate-900 dark:text-slate-300 dark:hover:bg-slate-50/5 dark:hover:text-white dark:focus-visible:bg-slate-50/10 dark:focus-visible:text-white"
                                        role="option" x-on:click="setSelectedOption(item)"
                                        x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index"
                                        tabindex="0">
                                        <!-- Label  -->
                                        <span x-bind:class="selectedOption == item ? 'font-bold' : null"
                                            x-text="item.name"></span>
                                        <!-- Screen reader 'selected' indicator  -->
                                        <span class="sr-only"
                                            x-text="selectedOption == item ? 'selected' : null"></span>
                                        <!-- Checkmark  -->
                                        <svg x-cloak x-show="selectedOption == item"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            stroke="currentColor" fill="none" stroke-width="2" class="size-4"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                    </li>
                                </template>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-4">
                        <x-forms.input-label class="flex items-center gap-3 w-fit">
                            <x-forms.checkbox name="active" value="1"
                                x-model="$store.selectedCategory.active" />
                            Active
                        </x-forms.input-label>
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
                Alpine.store('selectedCategory', {});

                Alpine.data('combobox', (comboboxData = {
                    options: @json($allCategories),
                }, ) => ({
                    options: comboboxData.options,
                    isOpen: false,
                    openedWithKeyboard: false,
                    selectedOption: null,

                    setSelectedOption(option) {
                        this.selectedOption = option
                        this.isOpen = false
                        this.openedWithKeyboard = false
                        this.$refs.hiddenTextField.value = option.name
                    },

                    highlightFirstMatchingOption(pressedKey) {
                        const option = this.options.find((item) =>
                            item.label.toLowerCase().startsWith(pressedKey.toLowerCase()),
                        )
                        if (option) {
                            const index = this.options.indexOf(option)
                            const allOptions = document.querySelectorAll('.combobox-option')
                            if (allOptions[index]) {
                                allOptions[index].focus()
                            }
                        }
                    },

                    // Computed property to filter categories (so we don't modify `options`)
                    get filteredOptions() {
                        if (!Alpine.store('selectedCategory')?.name) {
                            return this.options; // No selection yet, return all options
                        }

                        return this.options.filter(option => option.name !== Alpine.store(
                            'selectedCategory').name);
                    },

                    init() {
                        this.$watch('$store.selectedCategory', (value) => {
                            if (!value?.name) return; // Ignore if selectedCategory is not set

                            // Find parent category from the filtered list
                            this.selectedOption = this.filteredOptions.find(option => option
                                .name === value?.parent?.name);

                            // If a valid parent is found, update the hidden input
                            if (this.selectedOption) {
                                this.$refs.hiddenTextField.value = this.selectedOption.name;
                            }
                        });
                    }
                }));

                Alpine.data('categories', () => ({
                    categories: {},
                    checkAll: false,
                    modalIsOpen: false,
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

                    openModal(category) {
                        this.modalIsOpen = true;
                        this.$store.selectedCategory = category;
                    },

                    closeModal() {
                        this.modalIsOpen = false;
                    },

                    async categoriesList() {
                        try {
                            const response = await axios.get('{{ route('categories.list') }}', {
                                params: {
                                    rowsPerPage: this.rowsPerPage,
                                    page: this.currentPage,

                                    q: this.q,

                                }
                            });

                            if (response.status === 200) {
                                this.categories = response.data.data;
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
                            this.categoriesList();
                        }
                    },

                    nextPage() {
                        if (this.currentPage < this.totalPages) {
                            this.currentPage++;
                            this.categoriesList();
                        }
                    },

                    goToPage(page) {
                        this.currentPage = page;
                        this.categoriesList();
                    },

                    async deleteCategory(category) {
                        try {
                            if (confirm('Are you sure?')) {
                                const response = await axios.delete(
                                    `{{ route('categories.destroy', ':id') }}`.replace(':id',
                                        category.id));

                                if (response.status == 200) {
                                    this.categoriesList();
                                }
                            }

                        } catch (error) {
                            console.log(error);
                        }
                    },

                    async updateCategory(event) {
                        try {
                            this.errors = {};
                            const formData = new FormData(event.target);
                            const activeCheckbox = event.target.querySelector('[name="active"]');

                            formData.set('active', activeCheckbox.checked ? 1 : 0);

                            const response = await axios.post(
                                `{{ route('categories.update', ':id') }}`.replace(':id', this.$store
                                    .selectedCategory.id),
                                formData, );

                            if (response.status == 200) {
                                event.target.reset();
                                this.closeModal();
                                this.categoriesList();
                            }
                        } catch (error) {
                            console.log(error);
                        }
                    },

                    init() {
                        this.categories = @json($categories).data;
                        this.from = @json($categories).from;
                        this.to = @json($categories).to;
                        this.total = @json($categories).total;
                        this.currentPage = @json($categories).current_page;
                        this.totalPages = @json($categories).last_page;


                        this.$watch('q', () => {
                            this.categoriesList();
                        });

                        this.$watch('modalIsOpen', (value) => {
                            if (value == false) {
                                this.$store.selectedCategory = {};
                                this.errors = {};
                            }
                        })
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
