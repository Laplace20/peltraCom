<x-landingPageLayout>
    <x-slot:title>Legalitas - Peltra</x-slot>

    <!-- Header dekoratif tipis -->
    <x-slot:header>
         <div class="h-2 bg-gray-900"></div>
    </x-slot:header>

    <div class="py-16 bg-gray-50 min-h-screen" x-data="{ openPreview: false, imgList: [], currentIndex: 0 }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Judul Halaman -->
            <div class="text-center mb-16">
                <span class="text-indigo-600 font-semibold uppercase tracking-wider text-sm">Dokumen Resmi</span>
                <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight">Legalitas & Sertifikat</h1>
            </div>
            <div 
                x-data="{ shown: false }" x-intersect.threshold.20="shown = true" 
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'"
                class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 p-8 md:p-12 transition-all duration-1000 ease-out opacity-0 translate-y-20 mb-20"
            >
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <!-- Area Gambar Sertifikat BUP -->
                    <div class="order-2 md:order-1 relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg blur opacity-25 group-hover:opacity-100 transition duration-1000"></div>
                        <div class="relative bg-white ring-1 ring-gray-900/5 rounded-lg flex items-top justify-start p-2">
                            <img src="{{ asset('images/legalitas.png') }}" alt="Sertifikat Legalitas Peltra" class="w-full h-auto rounded shadow-sm transform group-hover:scale-[1.01] transition duration-500">
                        </div>
                        <p class="mt-4 text-center text-sm text-gray-400 italic">Bukti Peresmian Pelabuhan</p>
                    </div>

                    <!-- Keterangan Sertifikat BUP -->
                    <div class="order-1 md:order-2 space-y-6">
                        <h3 class="text-2xl font-bold text-gray-900">Landasan Kepercayaan Publik</h3>
                        <p class="text-gray-600 leading-relaxed text-lg text-justify">
                            Peresmian Terminal PDS (Operator BUP PT PELABUHAN LEMBAR SEJAHTERA) di Kecamatan Lembar pada 16 Desember 2020 oleh Gubernur Nusa Tenggara Barat, Dr. H. Zulkieflimansyah, menjadi bukti nyata kesiapan kami dalam melayani distribusi logistik nasional. Prasasti ini bukan sekadar simbol, melainkan landasan hukum dan komitmen PT Pelabuhan Lembar Sejahtera dalam menjalankan operasional pelabuhan yang resmi, aman, dan diakui oleh negara.
                        </p>
                        
                    </div>
                </div>
            </div>

            <!-- PEMBATAS / JUDUL GALERI -->
            <div class="flex items-center mb-8">
                <div class="h-1 w-12 bg-indigo-600 mr-4"></div>
                <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Izin & Dokumentasi Pendukung</h2>
            </div>

            <!-- GRID GALERI LEGALITAS (DINAMIS) -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($legalities as $doc)
                    <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300">
                        <!-- Preview Image Area -->
                        <div class="relative h-64 overflow-hidden bg-gray-200 flex items-center justify-center">
                            @php
                                $ext = strtolower(pathinfo($doc->file_path, PATHINFO_EXTENSION));
                                $isPdf = in_array($ext, ['pdf']);
                            @endphp

                            @if($isPdf)
                                <div class="flex flex-col items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                    <span class="text-xs font-semibold uppercase tracking-wider">Dokumen PDF</span>
                                </div>
                            @else
                                <img src="{{ asset('storage/' . $doc->file_path) }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     alt="{{ $doc->title }}">
                            @endif

                            <!-- Overlay Hover -->
                            <div class="absolute inset-0 bg-gray-900/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                @php
                                    $galleryImages = collect([]);
                                    
                                    // Only add main file if it's an image
                                    if (!$isPdf) {
                                        $galleryImages->push(asset('storage/' . $doc->file_path));
                                    }
                                    
                                    // Handle extra images
                                    $extraImages = $doc->images;
                                    if (is_string($extraImages)) {
                                        $extraImages = json_decode($extraImages, true);
                                    }
                                    
                                    if(is_array($extraImages)) {
                                        foreach($extraImages as $img) {
                                            $galleryImages->push(asset('storage/' . $img));
                                        }
                                    }
                                @endphp
                                
                                @if($galleryImages->isNotEmpty())
                                    <button @click="imgList = {{ $galleryImages->toJson() }}; currentIndex = 0; openPreview = true" 
                                            class="bg-white text-gray-900 px-4 py-2 rounded-full font-bold text-sm shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        Lihat Bukti Visual
                                    </button>
                                @else
                                    <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank"
                                       class="bg-white text-gray-900 px-4 py-2 rounded-full font-bold text-sm shadow-lg transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                        Unduh Dokumen
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Keterangan -->
                        <div class="p-6">
                            <h3 class="font-bold text-gray-900 text-lg mb-1 leading-snug">{{ $doc->title }}</h3>
                            <p class="text-sm text-gray-400 italic">
                                @if(count($galleryImages) > 1)
                                    {{ count($galleryImages) }} Gambar Tersedia
                                @else
                                    Terverifikasi oleh Manajemen
                                @endif
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 bg-white rounded-2xl border-2 border-dashed border-gray-200">
                        <p class="text-gray-400 italic">Belum ada bukti legalitas tambahan yang diunggah.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- MODAL PREVIEW GAMBAR (Lightbox) -->
        <div 
            x-show="openPreview" 
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-gray-950/90 backdrop-blur-md"
            style="display: none;"
            @keydown.escape.window="openPreview = false"
            @click="openPreview = false"
        >
            <!-- Tombol Close -->
            <button @click="openPreview = false" class="absolute top-6 right-6 text-white hover:text-gray-300 z-[1000] focus:outline-none transition-colors">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <!-- Navigation Buttons -->
            <button x-show="imgList.length > 1" @click.stop="currentIndex = (currentIndex === 0) ? imgList.length - 1 : currentIndex - 1" 
                    class="absolute left-4 md:left-8 top-1/2 -translate-y-1/2 text-white hover:text-indigo-400 z-[1000] focus:outline-none transition-colors p-2 bg-black/20 hover:bg-black/40 rounded-full backdrop-blur-sm">
                <svg class="w-10 h-10 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            
            <button x-show="imgList.length > 1" @click.stop="currentIndex = (currentIndex === imgList.length - 1) ? 0 : currentIndex + 1" 
                    class="absolute right-4 md:right-8 top-1/2 -translate-y-1/2 text-white hover:text-indigo-400 z-[1000] focus:outline-none transition-colors p-2 bg-black/20 hover:bg-black/40 rounded-full backdrop-blur-sm">
                <svg class="w-10 h-10 md:w-12 md:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>

            <!-- Image Container -->
            <div class="max-w-6xl w-full h-full flex flex-col items-center justify-center relative" @click.stop>
                <div class="relative w-full h-full flex items-center justify-center">
                    <img :src="imgList[currentIndex]" 
                         class="max-w-full max-h-[85vh] rounded-lg shadow-2xl object-contain border-4 border-white/10">
                </div>
                
                <!-- Indicators -->
                <div class="mt-6 flex space-x-2 bg-black/20 backdrop-blur-sm px-4 py-2 rounded-full" x-show="imgList.length > 1">
                    <template x-for="(img, index) in imgList" :key="index">
                        <button @click="currentIndex = index" 
                                :class="currentIndex === index ? 'bg-white w-3 h-3' : 'bg-gray-500 w-2 h-2 hover:bg-gray-400'"
                                class="rounded-full transition-all duration-300 focus:outline-none"></button>
                    </template>
                </div>
                
                <p class="mt-4 text-gray-400 text-sm italic tracking-wide">
                    <span x-text="currentIndex + 1"></span> / <span x-text="imgList.length"></span> &mdash; Pratinjau Bukti Visual
                </p>
            </div>
        </div>
    </div>
</x-landingPageLayout>