<!-- resources/views/components/navbar.blade.php -->
<nav x-data="{ open: false, tentangOpen: false, tentangMobileOpen: false }" class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="flex-shrink-0 flex items-center">
                    <img src="{{ asset('images/navLogoFixed.png') }}" alt="Logo Peltra" class="h-20 w-20 object-scale-down">
                </a>
            </div>

            <!-- Menu Desktop -->
            <div class="hidden sm:ml-6 sm:flex sm:items-center sm:space-x-8">
                <a href="{{ route('LandingPage') }}" class="{{ request()->routeIs('LandingPage') ? 'text-gray-900 border-indigo-500' : 'text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Beranda</a>
                
                <!-- Dropdown Tentang Kami -->
                <div class="relative h-full flex items-center" @mouseenter="tentangOpen = true" @mouseleave="tentangOpen = false">
                    <button class="{{ request()->is('tentang-kami*') || request()->is('terminal-data') || request()->is('lokasi-layout') || request()->is('legalitas') || request()->is('fasilitas') || request()->is('csr*') ? 'text-gray-900 border-indigo-500' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out h-full">
                        <span>Tentang Kami</span>
                        <svg class="ml-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                            <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                        </svg>
                    </button>

                    <!-- Dropdown Content -->
                    <div x-show="tentangOpen" 
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="absolute top-16 left-0 w-64 bg-white border border-gray-100 shadow-lg rounded-b-md py-2 z-50">
                        <a href="/visi-misi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">Visi & Misi</a>
                        <a href="/legalitas" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">Legalitas</a>
                        <a href="{{ route('csr.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50 hover:text-indigo-700">CSR Activities</a>
                    </div>
                </div>

                <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'text-gray-900 border-indigo-500' : 'text-gray-500 hover:text-gray-700 hover:border-gray-300 border-transparent' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium transition duration-150 ease-in-out">Berita</a>   
            </div>

            <!-- Tombol Mobile Menu (Hamburger) -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Buka menu utama</span>
                    <svg :class="{'hidden': open, 'block': !open }" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg :class="{'block': open, 'hidden': !open }" class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div x-show="open" class="sm:hidden bg-white border-b border-gray-100">
        <div class="pt-2 pb-3 space-y-1">
            <a href="{{ route('LandingPage') }}" class="{{ request()->routeIs('LandingPage') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Beranda</a>
            
            <!-- Menu Tentang Kami Mobile (Accordion) -->
            <div>
                <button @click="tentangMobileOpen = !tentangMobileOpen" class="w-full flex justify-between items-center border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700 pl-3 pr-4 py-2 border-l-4 text-base font-medium">
                    <span>Tentang Kami</span>
                    <svg :class="{'rotate-180': tentangMobileOpen}" class="h-4 w-4 transform transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="tentangMobileOpen" class="bg-gray-50 pl-6">
                    <a href="/visi-misi" class="block py-2 text-sm text-gray-600 hover:text-indigo-600">Visi & Misi</a>
                    <a href="/legalitas" class="block py-2 text-sm text-gray-600 hover:text-indigo-600">Legalitas</a>
                    <a href="{{ route('csr.index') }}" class="block py-2 text-sm text-gray-600 hover:text-indigo-600">CSR Activities</a>
                </div>
            </div>

            <a href="{{ route('news.index') }}" class="{{ request()->routeIs('news.*') ? 'bg-indigo-50 border-indigo-500 text-indigo-700' : 'border-transparent text-gray-500 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-700' }} block pl-3 pr-4 py-2 border-l-4 text-base font-medium">Berita</a>
        </div>
    </div>
</nav>