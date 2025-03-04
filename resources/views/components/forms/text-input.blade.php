@props(['disabled' => false])


<input @disabled($disabled) {{$attributes->merge(['class' => 'py-2 px-3 rounded outline-none text-sm border ring-1 border-slate-200 ring-transparent hover:border-indigo-500 hover:ring-indigo-500 focus:border-indigo-500 focus:ring-indigo-500 disabled:opacity-0'])}} />
