<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded bg-indigo-500 px-5 py-2 text-sm font-medium text-white hover:bg-indigo-500/90']) }}>
    {{ $slot }}</button>
