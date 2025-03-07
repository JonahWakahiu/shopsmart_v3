@props(['disabled' => false])

<input type="file" @disabled($disabled)
    {{ $attributes->merge(['class' => 'w-full overflow-clip rounded border border-slate-200 bg-surface-alt/50 text-sm file:mr-4 file:border-none file:bg-surface-alt file:px-4 file:py-2 file:font-medium file:text-medium file:text-sm disabled:cursor-not-allowed disabled:opacity-75']) }} />
