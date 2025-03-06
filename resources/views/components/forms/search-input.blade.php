@props(['disabled' => false])



<!-- search  -->
<div class="relative flex flex-col gap-1 text-on-surface dark:text-on-surface-dark">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke="currentColor" fill="none" stroke-width="2"
        class="absolute left-2 top-1/2 size-5 -translate-y-1/2" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round"
            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
    </svg>
    <input type="search"
        {{ $attributes->merge(['class' => 'w-full outline-none border border-slate-200  rounded px-2 py-1.5 pl-9 text-sm disabled:cursor-not-allowed disabled:opacity-75']) }} />
</div>
