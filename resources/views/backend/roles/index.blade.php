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
                    <a href="#" class="hover:text-slate-900 dark:hover:text-white">Roles</a>
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
            {{ __('Roles') }}
        </h2>
    </x-slot>


    <div class="mt-10 grid grid-cols-1 sm:grid-2 md:grid-cols-3 gap-5" x-data="roles">
        <template x-for="role in roles" :key="role.id">
            <div class="w-full bg-slate-50 rounded px-5 py-7 tracking-wide shadow">
                <div class="flex items-center justify-between">
                    <p class="text-slate-500">Total <span x-text="role.users_count"></span> users
                    </p>

                    {{-- <p x-text="role.users[0]?.avatar"></p> --}}
                    <div class="flex items-center -space-x-3">
                        <template x-for="(user, index) in role.users?.slice(0,4)">
                            <div>
                                <template x-if="index < 3 || role.users_count <= 4">
                                    <div
                                        class="size-8 rounded-full border border-slate-100 overflow-hidden relative hover:z-10 cursor-pointer">
                                        <img :src="user.avatar" alt="user.name" class="object-cover">
                                    </div>
                                </template>

                                <template x-if="index === 3 && role.users_count >= 4">
                                    <div
                                        class="size-8 rounded-full border text-xs border-slate-100 overflow-hidden flex items-center justify-center tracking-wide bg-violet-600 text-white relative cursor-pointer">
                                        + <span x-text="role.users_count - 3"></span>
                                    </div>
                                </template>
                            </div>
                        </template>
                    </div>

                </div>

                <p x-text="role.name" class="mt-3 font-medium capitalize"></p>
                <div class="flex items-center justify-between mt-2">
                    <a href="" class="text-indigo-500">Edit Role</a>

                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-copy" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1z" />
                    </svg>
                </div>
            </div>
        </template>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('roles', () => ({
                    roles: @json($roles)
                }))
            })
        </script>
    @endpush

</x-app-layout>
