@props(['disabled' => false])

<select @disabled($disabled)
    {{ $attributes->merge(['class' => 'text-sm py-1.5 outline-none border border-slate-300 rounded ring-1 ring-transparent hover:border-violet-600 hover:ring-violet-600  focus:border-violet-600 focus:ring-violet-600 placeholder:opacity-60']) }}>
    {{ $slot }}</select>
