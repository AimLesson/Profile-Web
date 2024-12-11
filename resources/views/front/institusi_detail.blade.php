<x-front-layout>
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">
                {{-- Carousel Section --}}
                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel Wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        @php
                            $beritacarousel = $beritas->take(5); // Display first 5 related Berita
                        @endphp

                        @foreach ($beritacarousel as $berita)
                            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                <img src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('assets/default.jpg') }}"
                                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                                    alt="{{ $berita->judul }}">
                                <div
                                    class="absolute bottom-0 left-0 bg-black bg-opacity-50 text-white text-md px-4 py-2 rounded">
                                    {{ $berita->judul }}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Slider Indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @foreach ($beritacarousel as $index => $berita)
                            <button type="button" class="w-3 h-3 rounded-full" aria-current="false"
                                data-carousel-slide-to="{{ $index }}"></button>
                        @endforeach
                    </div>

                    <!-- Slider Controls -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span
                            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>

                {{-- Content Section --}}
                <div class="mt-4">
                    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
                        <div class="flex items-center justify-center h-24 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                            <div class="p-6 text-gray-100 text-3xl">
                                {{ __('SENAT MAHASISWA 2024') }}
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                            {{-- Berita Section --}}
                            <div
                                class="flex flex-wrap justify-center h-auto max-h-fit rounded bg-gray-50 dark:bg-gray-800 p-4 col-span-1 md:col-span-2">
                                <div class="p-1 text-xl border-b text-gray-900 text-white mb-4">
                                    {{ __('BERITA SENAT MAHASISWA') }}
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    @foreach ($beritas as $berita)
                                        <div
                                            class="max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-100 dark:border-gray-700">
                                            <a href="{{ route('berita.show', $berita->id) }}">
                                                <img class="w-full h-48 object-cover rounded-t-lg"
                                                    src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('assets/default.jpg') }}"
                                                    alt="{{ $berita->judul }}" />
                                            </a>
                                            <div class="p-5">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                                    {{ $berita->judul }}
                                                </h5>
                                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                                    {{ Str::limit($berita->deskripsi, 100, '...') }}
                                                </p>
                                                <a href="{{ route('berita.show', $berita->id) }}"
                                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800">
                                                    Read more
                                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            {{-- Agenda Section --}}
                            <div
                                class="flex flex-col items-center h-auto rounded bg-gray-50 dark:bg-gray-800 p-4 max-h-fit overflow-y-auto">
                                <div class="p-1 text-xl border-b text-gray-900 dark:text-white mb-4">
                                    {{ __('AGENDA SENAT MAHASISWA') }}
                                </div>
                                <div class="flex flex-col gap-4 w-full overflow-y-auto no-scrollbar">
                                    @php
                                        $agenda = $beritas->take(10); // Using $beritas for demonstration
                                    @endphp
                                    @foreach ($agenda as $berita)
                                        <a href="{{ route('berita.show', $berita->id) }}"
                                            class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-100">
                                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                                {{ $berita->judul }}</h5>
                                            <p class="font-normal text-gray-700 dark:text-gray-400">
                                                {{ Str::limit($berita->deskripsi, 100, '...') }}
                                            </p>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-front-layout>
