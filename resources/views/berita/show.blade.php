<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8">
                    {{-- Image --}}
                    @if ($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" 
                             alt="{{ $berita->judul }}" 
                             class="w-full h-64 object-cover rounded-lg mb-6">
                    @endif

                    {{-- Title --}}
                    <h1 class="text-4xl font-bold text-gray-900 mb-4">
                        {{ $berita->judul }}
                    </h1>

                    {{-- Meta Information --}}
                    <div class="flex items-center space-x-4 text-gray-600 mb-6">
                        <span class="text-sm">
                            <strong>Author:</strong> {{ $berita->author }}
                        </span>
                        <span class="text-sm">
                            <strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($berita->tanggal)->format('d M Y') }}
                        </span>
                    </div>

                    {{-- Content --}}
                    <div class="text-gray-700 leading-relaxed">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>

                    {{-- Back Button --}}
                    <div class="mt-8">
                        <a href="{{ route('berita.index') }}" 
                           class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Kembali ke Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
