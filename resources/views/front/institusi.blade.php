<x-front-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                <div class="flex flex-col items-center h-auto rounded bg-gray-50 dark:bg-gray-800 p-4 max-h-fit overflow-y-auto">
                    <!-- Title -->
                    <div class="p-1 text-xl border-b text-gray-900 dark:text-white mb-4">
                        {{ __('INSTITUSI') }}
                    </div>
                    <!-- Cards Container -->
                    <div class="flex flex-col gap-4 w-full overflow-y-auto no-scrollbar">
                        @php
                            $institusi = \App\Models\Institusi::all();
                        @endphp
                        @foreach ($institusi as $item)
                            <a href="{{ route('institusi.home', $item->slug) }}"
                                class="flex items-start p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-100 dark:border-gray-700 dark:hover:bg-gray-200">
                                <!-- Image -->
                                <img class="w-24 h-24 object-cover rounded-lg mr-4"
                                    src="{{ $item->picture ? asset('assets/' . $item->picture) : asset('assets/default.jpg') }}"
                                    alt="{{ $item->name }}" />
                                <!-- Content -->
                                <div class="flex flex-col justify-between">
                                    <h5 class="text-xl font-bold tracking-tight text-gray-900">
                                        {{ $item->name }}
                                    </h5>
                                    <p class="text-gray-700 dark:text-gray-400">
                                        <strong>Telephone:</strong> {{ $item->phone ?? 'Not Available' }}
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-400">
                                        <strong>Address:</strong> {{ $item->address ?? 'Not Available' }}
                                    </p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
