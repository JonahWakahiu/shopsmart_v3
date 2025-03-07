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
                    <a href="{{ route('categories.index') }}"
                        class="hover:text-slate-900 dark:hover:text-white">Categories</a>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" aria-hidden="true"
                        stroke-width="2" stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                    </svg>
                </li>
                <li class="flex items-center gap-1 font-bold text-slate-900 dark:text-white" aria-current="page">
                    Create</li>
            </ol>
        </nav>

        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Create Category') }}
        </h2>
    </x-slot>

    <div class="bg-slate-50 rounded p-5">
        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <div>
                    <x-forms.input-label value="Name" for="name" />
                    <x-forms.text-input name="name" id="name" class="w-full" />
                    <x-forms.input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-forms.input-label value="Slug" for="slug" />
                    <x-forms.text-input name="slug" id="slug" class="w-full" />
                    <x-forms.input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-3">

                <div x-data="combobox" class="w-full flex flex-col"
                    x-on:keydown="highlightFirstMatchingOption($event.key)"
                    x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false">
                    <label for="industry" class="w-fit pl-0.5 text-sm text-slate-600">Parent Category</label>
                    <div class="relative">

                        <!-- trigger button  -->
                        <button type="button" role="combobox"
                            class="inline-flex w-full items-center justify-between gap-2 whitespace-nowrap bg-white border-slate-200 px-4 py-2 text-sm font-medium capitalize tracking-wide text-slate-600 transition hover:opacity-75 rounded border"
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
                        <input id="parent_category" name="parent_category" type="text" x-ref="hiddenTextField"
                            hidden />
                        <ul x-cloak x-show="isOpen || openedWithKeyboard" id="industriesList"
                            class="absolute z-10 left-0 top-11 flex max-h-44 w-full flex-col overflow-hidden overflow-y-auto border-slate-300 bg-slate-50 py-1.5 rounded-sm border"
                            role="listbox" aria-label="industries list"
                            x-on:click.outside="isOpen = false, openedWithKeyboard = false"
                            x-on:keydown.down.prevent="$focus.wrap().next()"
                            x-on:keydown.up.prevent="$focus.wrap().previous()" x-transition x-trap="openedWithKeyboard">
                            <template x-for="(item, index) in options" x-bind:key="item.id">
                                <li class="combobox-option inline-flex justify-between gap-6 bg-slate-50 px-4 py-2 text-sm text-slate-600 hover:bg-slate-900/5 hover:text-slate-900 focus-visible:bg-slate-900/5 focus-visible:text-slate-900 focus-visible:outline-hidden"
                                    role="option" x-on:click="setSelectedOption(item)"
                                    x-on:keydown.enter="setSelectedOption(item)" x-bind:id="'option-' + index"
                                    tabindex="0">
                                    <!-- Label  -->
                                    <span x-bind:class="selectedOption == item ? 'font-bold' : null"
                                        x-text="item.name"></span>
                                    <!-- Screen reader 'selected' indicator  -->
                                    <span class="sr-only" x-text="selectedOption == item ? 'selected' : null"></span>
                                    <!-- Checkmark  -->
                                    <svg x-cloak x-show="selectedOption == item" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
                                        class="size-4" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <x-forms.input-error :messages="$errors->get('parent_category')" class="mt-2" />
                </div>

                <div>
                    <x-forms.input-label value="Image" for="image" />
                    <x-forms.file-input name="image" id="image" />
                    <x-forms.input-error :messages="$errors->get('image')" class="mt-2" />
                </div>
            </div>

            <div class="mt-3">

                <x-forms.input-label class="flex items-center gap-3 w-fit">
                    <x-forms.checkbox name="active" value="1" ::checked="true" />
                    Active
                </x-forms.input-label>
                <x-forms.input-error :messages="$errors->get('active')" class="mt-2" />

            </div>

            <div class="mt-5 flex items-center gap-5">
                <button type="submit" class="px-5 py-2 rounded bg-indigo-500 text-white text-sm font-medium">Add
                    Category</button>

                <button type="reset"
                    class="px-5 py-2 rounded font-medium text-sm border border-slate-200">Clear</button>
            </div>
        </form>

    </div>



    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
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
                }))
            })
        </script>
    @endpush
</x-app-layout>
