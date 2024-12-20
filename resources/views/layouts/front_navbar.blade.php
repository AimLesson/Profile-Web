<nav class="bg-gray-900 border-gray-700">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('assets/logo.png') }}" class="h-11" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Senat Mahasiswa</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 mt-4 border border-gray-700 rounded-lg bg-gray-800 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-gray-900">
                <li>
                    <a href="/" class="block py-2 px-3 rounded md:p-0 {{ request()->is('/') ? 'text-blue-500 bg-blue-500 md:bg-transparent' : 'text-gray-400 hover:text-blue-500' }}">Home</a>
                </li>
                <li>
                    <a href="/about" class="block py-2 px-3 rounded md:p-0 {{ request()->is('about') ? 'text-blue-500 bg-blue-500 md:bg-transparent' : 'text-gray-400 hover:text-blue-500' }}">About</a>
                </li>
                <li>
                    <a href="/institusi" class="block py-2 px-3 rounded md:p-0 {{ request()->is('institusi') ? 'text-blue-500 bg-blue-500 md:bg-transparent' : 'text-gray-400 hover:text-blue-500' }}">Institusi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
