<!-- resources/views/components/navbar.blade.php -->
<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0 flex items-center">
                    <span class="text-2xl font-bold text-indigo-600 tracking-tight">PELTRA</span>
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-8">
                <a href="/" class="text-gray-900 border-indigo-500 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Beranda</a>
                <a href="/tentang" class="text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium transition duration-150 ease-in-out">Tentang Kami</a>
                <a href="/berita" class="text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium transition duration-150 ease-in-out">Berita</a>
                <a href="/kontak" class="text-gray-500 hover:text-gray-700 hover:border-gray-300 inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium transition duration-150 ease-in-out">Kontak</a>
                
            </div>

            <!-- Tombol Mobile Menu (Hamburger) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500" aria-expanded="false">
                    <span class="sr-only">Buka menu utama</span>
                    <!-- Icon Hamburger -->
                    <svg :class="{'hidden': open, 'block': !open }" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon Close -->
                    <svg :class="{'block': open, 'hidden': !open }" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile (Muncul saat diklik) -->
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="sm:hidden bg-white border-b border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <a href="/" class="bg-indigo-50 border-indigo-500 text-indigo-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Beranda</a>
            <a href="/tentang" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Tentang Kami</a>
            <a href="/berita" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Berita</a>
            <a href="/kontak" class="border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Kontak</a>
        </div>
    </div>
</nav>