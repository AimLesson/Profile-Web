<x-front-layout>
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
                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}"
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
                    <div class="text-gray-700 leading-relaxed mb-6">
                        {!! nl2br(e($berita->konten)) !!}
                    </div>

                    {{-- Embed YouTube Video --}}
                    @if ($berita->embedYT)
                        @php
                            // Extract the src attribute from the iframe tag
                            $embedUrl = null;
                            if (preg_match('/src="([^"]+)"/', $berita->embedYT, $matches)) {
                                $embedUrl = $matches[1]; // The first capture group is the URL
                            }
                        @endphp

                        @if ($embedUrl)
                            <div class="mb-6">
                                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Tonton Video</h2>
                                <div class="relative w-full" style="padding-top: 56.25%;"> {{-- Maintain 16:9 ratio --}}
                                    <iframe src="{{ $embedUrl }}" title="YouTube video player"
                                        sandbox="allow-same-origin allow-scripts allow-presentation allow-popups"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                                        class="absolute top-0 left-0 w-full h-full rounded-lg">
                                    </iframe>

                                </div>
                            </div>
                        @else
                            <p class="text-red-500">Invalid YouTube embed code.</p>
                        @endif
                    @endif



                    {{-- Back Button --}}
                    <div class="mt-8">
                        <a href="{{ auth()->check() ? route('berita.index') : url('/') }}"
                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Kembali ke Berita
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-front-layout>
