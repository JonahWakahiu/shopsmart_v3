@props(['title', 'subtitle' => ''])

<x-main-layout>
    <main class="min-h-screen grid place-items-center">
        <div class="w-full max-w-md rounded bg-white shadow-md p-7">

            <div class="flex flex-col items-center">

                {{-- icon --}}
                <a href="{{ route('home') }}">
                    <img src="{{ asset('images/basket.svg') }}" alt="icon" class="size-10 object-cover object-center">
                </a>

                {{-- title --}}
                @if ($title)
                    <p class="text-xl font-semibold mt-3 mb-1">{{ $title }}</p>
                @endif

                {{-- subtitle --}}
                @if ($subtitle)
                    <p class="text-sm text-slate-500">{{ $subtitle }}</p>
                @endif
            </div>

            <div class="mt-5">
                {{ $slot }}
            </div>
        </div>
    </main>
</x-main-layout>
