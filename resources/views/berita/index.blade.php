<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Berita Senat Mahasiswa') }}
            </h2>
            {{-- Tambah Berita Button --}}
            <a href="{{ route('berita.create') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-900 text-white font-semibold text-sm rounded-lg hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Tambah Berita
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid grid-cols-4 gap-4 p-4">
                    {{-- Loop through each berita --}}
                    @forelse ($beritas as $berita)
                        <div
                            class="max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-100 dark:border-gray-700">
                            {{-- Gambar --}}
                            <a href="#">
                                <img class="w-full h-48 object-cover rounded-t-lg"
                                    src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('assets/default.jpg') }}"
                                    alt="{{ $berita->judul }}" />
                            </a>
                            <div class="p-5">
                                {{-- Title --}}
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">
                                        {{ $berita->judul }}
                                    </h5>
                                </a>
                                {{-- Tanggal --}}
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                                </p>
                                {{-- Deskripsi --}}
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    {{ Str::limit($berita->deskripsi, 100, '...') }}
                                </p>

                                {{-- Read more --}}
                                <a href="{{ route('berita.show', $berita->id) }}"
                                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @empty
                        <p class="text-gray-500 col-span-4 text-center">No berita found.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
