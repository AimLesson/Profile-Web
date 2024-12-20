<x-front-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                {{-- About Section --}}
                <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg">
                    <div class="text-xl border-b text-gray-900 dark:text-white mb-4">
                        {{ __('ABOUT US') }}
                    </div>
                    @php
                        $about = \App\Models\About::first(); // Fetch the first About record
                    @endphp
                    @if ($about)
                        <div class="flex flex-col md:flex-row gap-6">
                            @if ($about->image)
                                <div class="w-full md:w-1/3">
                                    <img src="{{ $about->image ? asset('assets/' . $about->image) : asset('assets/default.jpg') }}"
                                        alt="{{ $about->title }}"
                                        class="w-full h-auto rounded-lg object-cover">
                                </div>
                            @endif
                            <div class="w-full md:w-2/3">
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                                    {{ $about->title }}
                                </h3>
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                                    {{ $about->description }}
                                </p>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-700 dark:text-gray-300">{{ __('No about information available.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
