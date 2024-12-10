<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                {{-- Success message --}}
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

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

                <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Judul --}}
                    <div class="mb-4">
                        <label for="judul" class="block text-gray-700 font-bold mb-2">Judul:</label>
                        <input type="text" id="judul" name="judul"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('judul') }}" required>
                    </div>

                    {{-- Konten --}}
                    <div class="mb-4">
                        <label for="konten" class="block text-gray-700 font-bold mb-2">Konten:</label>
                        <textarea id="konten" name="konten" rows="5"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>{{ old('konten') }}</textarea>
                    </div>

                    {{-- Gambar --}}
                    <div class="mb-4">
                        <label for="gambar" class="block text-gray-700 font-bold mb-2">Gambar (Optional):</label>
                        <input type="file" id="gambar" name="gambar"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    {{-- Author --}}
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700 font-bold mb-2">Author:</label>
                        <input type="text" id="author" name="author"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('author') }}" required>
                    </div>

                    {{-- Tanggal --}}
                    <div class="mb-4">
                        <label for="tanggal" class="block text-gray-700 font-bold mb-2">Tanggal:</label>
                        <input type="date" id="tanggal" name="tanggal"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('tanggal') }}" required>
                    </div>

                    {{-- Embed YT --}}
                    <div class="mb-4">
                        <label for="embedYT" class="block text-gray-700 font-bold mb-2">Video Youtube:</label>
                        <input type="text" id="embedYT" name="embedYT"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            value="{{ old('embedYT') }}" required>
                    </div>

                    <div class="flex items-center justify-between">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Tambah Berita
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
