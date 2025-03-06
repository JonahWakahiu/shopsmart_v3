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
                    Edit</li>
            </ol>
        </nav>

        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div x-data="editCustomer">
        <form @submit.prevent="updateCustomer($event)">

            <p class="text-xl font-semibold mb-5">Account Information</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-3">
                <div>
                    <x-forms.input-label for="name">Name <span class="text-red-500">*</span></x-forms.input-label>
                    <x-forms.text-input class="w-full" id="name" name="name" x-model="customer.name" />
                </div>

                <div>
                    <x-forms.input-label for="email">Email Address <span
                            class="text-red-500">*</span></x-forms.input-label>
                    <x-forms.text-input class="w-full" id="email" name="email" x-model="customer.email" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-3 mt-3">
                <div>
                    <x-forms.input-label for="phone_number">Phone Number <span
                            class="text-red-500">*</span></x-forms.input-label>
                    <x-forms.text-input class="w-full" id="phone_number" name="phone_number"
                        x-model="customer.phone_number" />
                </div>
            </div>

            <div class="border-b border-slate-200 my-5"></div>

            <p class="text-xl font-semibold mb-5">Billing Information</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-3">
                <div>
                    <div x-data="combobox" class="flex w-full flex-col"
                        x-on:keydown="handleKeydownOnOptions($event)"
                        x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                        <x-forms.input-label for="country">Country</x-forms.input-label>
                        <div class="relative">
                            <!-- trigger button  -->
                            <button type="button"
                                class="inline-flex w-full items-center justify-between gap-2 border border-slate-200 rounded px-4 py-2 text-sm font-medium tracking-wide text-slate-600 transition hover:opacity-75"
                                role="combobox" aria-controls="countriesList" aria-haspopup="listbox"
                                x-on:click="isOpen = ! isOpen" x-on:keydown.down.prevent="openedWithKeyboard = true"
                                x-on:keydown.enter.prevent="openedWithKeyboard = true"
                                x-on:keydown.space.prevent="openedWithKeyboard = true"
                                x-bind:aria-expanded="isOpen || openedWithKeyboard"
                                x-bind:aria-label="selectedOption ? selectedOption.value : 'Please Select'">
                                <span class="text-sm font-normal"
                                    x-text="selectedOption ? selectedOption.value : 'Please Select'"></span>
                                <!-- Chevron  -->
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor"class="size-5" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>

                            <!-- Hidden Input To Grab The Selected Value  -->
                            <input id="country" name="country" autocomplete="off" x-ref="hiddenTextField"
                                hidden="" />
                            <div x-show="isOpen || openedWithKeyboard" id="countriesList"
                                class="absolute left-0 top-11 z-10 w-full overflow-hidden rounded-sm border border-slate-300 bg-slate-50"
                                role="listbox" aria-label="countries list"
                                x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                                x-on:keydown.down.prevent="$focus.wrap().next()"
                                x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition
                                x-trap="openedWithKeyboard">

                                <!-- Search  -->
                                <div class="relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor"
                                        fill="none" stroke-width="1.5"
                                        class="absolute left-4 top-1/2 size-5 -translate-y-1/2 text-slate-600/50"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                                    </svg>
                                    <input type="text"
                                        class="border-0 w-full border-b border-b-slate-300 py-2.5 pl-11 pr-4 text-sm text-slate-600"
                                        name="searchField" aria-label="Search"
                                        x-on:input="getFilteredOptions($el.value)" x-ref="searchField"
                                        placeholder="Search" />
                                </div>

                                <!-- Options  -->
                                <ul class="flex max-h-44 flex-col overflow-y-auto">
                                    <li class="hidden px-4 py-2 text-sm text-slate-600" x-ref="noResultsMessage">
                                        <span>No matches found</span>
                                    </li>
                                    <template x-for="(item, index) in options" x-bind:key="item.value">
                                        <li class="combobox-option inline-flex justify-between gap-6 bg-slate-50 px-4 py-2 text-sm text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 focus-visible:bg-slate-900/5 focus-visible:text-slate-900"
                                            role="option" x-on:click="setSelectedOption(item)"
                                            x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index"
                                            tabindex="0">
                                            <div class="flex items-center gap-2">
                                                <!-- Flag image  -->
                                                <img class="w-5 h-3.5"
                                                    x-bind:src="'https://flagcdn.com/' + item.iso + '.svg'"
                                                    alt="" aria-hidden="true" />
                                                <!-- Country name  -->
                                                <span x-bind:class="selectedOption == item ? 'font-bold' : null"
                                                    x-text="item.label"></span>
                                                <!-- Screen reader 'selected' indicator  -->
                                                <span class="sr-only"
                                                    x-text="selectedOption == item ? 'selected' : null"></span>
                                            </div>
                                            <!-- Checkmark  -->
                                            <svg x-cloak x-show="selectedOption == item"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                stroke="currentColor" fill="none" stroke-width="2" class="size-4"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 12.75 6 6 9-13.5">
                                            </svg>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <x-forms.input-label for="state">State <span
                            class="text-red-500">*</span></x-forms.input-label>
                    <x-forms.text-input class="w-full" id="state" name="state" x-model="customer.state" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-3 mt-3">
                <div>
                    <x-forms.input-label for="city">City <span class="text-red-500">*</span></x-forms.input-label>
                    <x-forms.text-input class="w-full" id="city" name="city" x-model="customer.city" />
                </div>
                <div>
                    <x-forms.input-label for="zip_code">Zip code <span
                            class="text-red-500">*</span></x-forms.input-label>
                    <x-forms.text-input class="w-full" id="zip_code" name="zip_code" x-model="customer.zip_code" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-5 gap-y-3 mt-3">
                <div>
                    <x-forms.input-label for="address">Address <span
                            class="text-red-500">*</span></x-forms.input-label>
                    <x-forms.text-input class="w-full" id="address" name="address" x-model="customer.address" />
                </div>
            </div>
            <div class="border-b border-slate-200 my-5"></div>
            <div class="flex items-center justify-end gap-5">
                <button @click="deleteCustomer" type="button"
                    class="bg-red-100 rounded px-5 py-2 text-sm font-medium text-red-500">Delete Customer</button>
                <button type="reset"
                    class="px-5 rounded py-2 text-sm font-medium border border-slate-200">Cancel</button>
                <button type="submit" class="px-5 rounded py-2 text-sm font-medium bg-indigo-500 text-white">Add
                    Customer</button>
            </div>
        </form>


    </div>



    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {

                Alpine.data('combobox', (comboboxData = {
                    allOptions: @json($countries).allOptions,
                    selectedCountry: @json($customer->country)
                }, ) => ({
                    options: comboboxData.allOptions,
                    isOpen: false,
                    openedWithKeyboard: false,
                    selectedOption: null,

                    setSelectedOption(option) {
                        this.selectedOption = option
                        this.isOpen = false
                        this.openedWithKeyboard = false
                        this.$refs.hiddenTextField.value = option.value
                    },

                    getFilteredOptions(query) {
                        this.options = comboboxData.allOptions.filter((option) =>
                            option.label.toLowerCase().includes(query.toLowerCase()),
                        )
                        if (this.options.length === 0) {
                            this.$refs.noResultsMessage.classList.remove('hidden')
                        } else {
                            this.$refs.noResultsMessage.classList.add('hidden')
                        }
                    },

                    // if the customer presses backspace or the alpha-numeric keys, focus on the search field
                    handleKeydownOnOptions(event) {
                        if ((event.keyCode >= 65 && event.keyCode <= 90) || (event.keyCode >= 48 && event
                                .keyCode <= 57) || event.keyCode === 8) {
                            this.$refs.searchField.focus()
                        }
                    },

                    init() {
                        this.selectedOption = this.options.find(option => option.value === comboboxData
                            .selectedCountry) || null;

                        // Set the hidden input field value if a match is found
                        if (this.selectedOption) {
                            this.$refs.hiddenTextField.value = this.selectedOption.value;
                        }
                    }

                }));

                Alpine.data('editCustomer', () => ({
                    customer: @js($customer),

                    async updateCustomer(event) {
                        try {
                            const formData = new FormData(event.target);
                            const response = await axios.post('{{ route('customers.store') }}',
                                formData);

                            if (response.status == 200) {
                                event.target.reset();
                            }
                        } catch (error) {
                            console.log();
                        }
                    },

                    async deleteCustomer() {
                        try {
                            if (confirm('Are you sure?')) {
                                const response = await axios.delete(
                                    `{{ route('customers.destroy', ':id') }}`.replace(':id',
                                        this.customer.id));

                                if (response.status == 200) {
                                    window.location.href = "{{ route('customers.index') }}";
                                }
                            }

                        } catch (error) {
                            console.log(error);
                        }
                    },
                }));
            })
        </script>
    @endpush

</x-app-layout>
