<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Validation errors --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-bold mb-2">Judul:</label>
                        <input type="text" id="judul" name="judul" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                               value="{{ old('judul', $berita->judul) }}" required>
                    </div>

                    {{-- Konten --}}
                    <div class="mb-4">
                        <label for="konten" class="block text-gray-700 font-bold mb-2">Konten:</label>
                        <textarea id="konten" name="konten" rows="5"
                                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                  required>{{ old('konten', $berita->konten) }}</textarea>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-4">
                        <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar (Optional):</label>
                        <input type="file" id="gambar" name="gambar" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @if ($berita->gambar)
                            <p class="mt-2 text-sm text-gray-600">Current Image:</p>
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="h-32 mt-2 rounded-lg">
                        @endif
                    </div>

                    {{-- Author --}}
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700 font-bold mb-2">Author:</label>
                        <input type="text" id="author" name="author" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                               value="{{ old('author', $berita->author) }}" required>
                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-4">
                        <label for="tanggal" class="block text-gray-700 font-bold mb-2">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal" 
                               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                               value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}" required>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Update Berita
                        </button>
                        <a href="{{ route('berita.index') }}" 
                           class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Kembali
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
