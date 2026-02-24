<x-landingPageLayout>
    <x-slot:title>Visi & Misi - Peltra</x-slot>
    <x-slot:header></x-slot:header>

    <div class="relative py-24 bg-white overflow-hidden min-h-screen">
        <!-- Decoration: Grid Pattern -->
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none">
            <svg class="h-full w-full" width="100%" height="100%" fill="none">
                <defs>
                    <pattern id="grid-pattern" x="0" y="0" width="40" height="40" patternUnits="userSpaceOnUse">
                        <path d="M0 40L40 0H20L0 20M40 40V20L20 40" stroke="currentColor" stroke-width="2" class="text-indigo-500"/>
                    </pattern>
                </defs>
                <rect width="100%" height="100%" fill="url(#grid-pattern)"/>
            </svg>
        </div>

        <!-- Decoration: Blob Gradients -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-indigo-50 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[600px] h-[600px] bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- PAGE HEADER -->
            <div 
                x-data="{ shown: false }"
                x-intersect.threshold.20="shown = true"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="text-center mb-20 transition-all duration-1000 ease-out opacity-0 translate-y-10"
            >
                <div class="inline-flex items-center justify-center p-2 bg-indigo-50 rounded-full mb-4">
                    <span class="px-4 py-1 text-indigo-700 text-xs font-bold uppercase tracking-widest">Tentang Kami</span>
                </div>
                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight mb-6">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-cyan-500">
                        Visi & Misi
                    </span>
                </h1>
                <div class="w-24 h-1.5 bg-gradient-to-r from-indigo-500 to-cyan-400 mx-auto rounded-full"></div>
            </div>

            <!-- VISI SECTION -->
            <div 
                x-data="{ shown: false }"
                x-intersect.threshold.20="shown = true"
                :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
                class="relative group mb-24 transition-all duration-1000 ease-out delay-200 opacity-0 scale-95"
            >
                <div class="absolute -inset-1 bg-gradient-to-r from-indigo-600 to-cyan-500 rounded-[2rem] blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200"></div>
                <div class="relative bg-white rounded-[2rem] overflow-hidden shadow-2xl">
                    <div class="grid lg:grid-cols-2">
                        <div class="relative h-64 lg:h-auto overflow-hidden">
                            <img class="absolute inset-0 w-full h-full object-cover transform hover:scale-105 transition duration-700 ease-out" src="{{ asset('images/kapal2.jpg') }}" alt="Visi Peltra">
                            <div class="absolute inset-0 bg-indigo-900/60 mix-blend-multiply"></div>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <h2 class="text-6xl font-black text-white/20 tracking-tighter uppercase">Vision</h2>
                            </div>
                        </div>
                        <div class="relative p-10 md:p-14 flex flex-col justify-center bg-indigo-900">
                            <!-- Decorative Quote Icon -->
                            <svg class="absolute top-10 left-10 w-16 h-16 text-indigo-700/50 transform -translate-x-4 -translate-y-4" fill="currentColor" viewBox="0 0 32 32">
                                <path d="M10 8v8h4c0 2.2-1.8 4-4 4v4c4.4 0 8-3.6 8-8V8h-8zm14 0v8h4c0 2.2-1.8 4-4 4v4c4.4 0 8-3.6 8-8V8h-8z"/>
                            </svg>
                            
                            <h2 class="text-3xl font-bold text-cyan-400 uppercase tracking-widest mb-8 relative z-10">Visi Kami</h2>
                            <blockquote class="relative z-10">
                                <p class="text-2xl md:text-3xl font-medium text-white leading-relaxed italic">
                                    "Menjadi Mitra Strategis Pemerintah, BUMN, SWASTA Dalam Melayani Masyarakat Pengguna Jasa Pelabuhan Lembar."
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MISI SECTION -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                
                <!-- Misi List -->
                <div 
                    x-data="{ shown: false }"
                    x-intersect.threshold.10="shown = true"
                    :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10'"
                    class="transition-all duration-1000 ease-out opacity-0 -translate-x-10"
                >
                    <h2 class="text-3xl font-bold text-gray-900 mb-10 flex items-center">
                        <span class="w-2 h-8 bg-indigo-600 rounded-full mr-4"></span>
                        Misi Utama
                    </h2>
                    <div class="space-y-8 relative">
                        <!-- Connection Line -->
                        <div class="absolute left-6 top-8 bottom-8 w-0.5 bg-indigo-100"></div>

                        <!-- Item 1 -->
                        <div 
                             x-data="{ shown: false }" x-intersect.threshold.50="shown = true" 
                             :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
                             class="relative flex group transition-all duration-700 ease-out delay-100 opacity-0 -translate-x-5"
                        >
                            <div class="flex-shrink-0 mr-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-2xl bg-white border-2 border-indigo-100 text-indigo-600 font-bold text-xl shadow-sm relative z-10 group-hover:border-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                    1
                                </div>
                            </div>
                            <div class="pt-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">Kesiapan</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    Memastikan kesiapan dermaga yang efektif yang memiliki standar kelayakan operasi.
                                </p>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div 
                             x-data="{ shown: false }" x-intersect.threshold.50="shown = true" 
                             :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
                             class="relative flex group transition-all duration-700 ease-out delay-200 opacity-0 -translate-x-5"
                        >
                            <div class="flex-shrink-0 mr-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-2xl bg-white border-2 border-indigo-100 text-indigo-600 font-bold text-xl shadow-sm relative z-10 group-hover:border-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                    2
                                </div>
                            </div>
                            <div class="pt-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">Layanan Terintegrasi</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    Menjadi pelabuhan nasional yang menawarkan layanan terintegrasi, mulai dari bongkar muat hingga penyimpanan dan distribusi, guna mendukung pertumbuhan ekonomi lokal dan nasional.
                                </p>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div 
                             x-data="{ shown: false }" x-intersect.threshold.50="shown = true" 
                             :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
                             class="relative flex group transition-all duration-700 ease-out delay-300"
                        >
                            <div class="flex-shrink-0 mr-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-2xl bg-white border-2 border-indigo-100 text-indigo-600 font-bold text-xl shadow-sm relative z-10 group-hover:border-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                    3
                                </div>
                            </div>
                            <div class="pt-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">SDM Profesional</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    Kami percaya bahwa sumber daya manusia adalah aset terpenting. Misi kami adalah untuk memastikan layanan terbaik bagi pelanggan.
                                </p>
                            </div>
                        </div>

                        <!-- Item 4 -->
                        <div 
                             x-data="{ shown: false }" x-intersect.threshold.50="shown = true" 
                             :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
                             class="relative flex group transition-all duration-700 ease-out delay-500"
                        >
                            <div class="flex-shrink-0 mr-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-2xl bg-white border-2 border-indigo-100 text-indigo-600 font-bold text-xl shadow-sm relative z-10 group-hover:border-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                    4
                                </div>
                            </div>
                            <div class="pt-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">Inovasi Teknologi</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    Memanfaatkan teknologi terbaru untuk meningkatkan efisiensi operasional pelabuhan, memastikan proses yang lebih cepat dan lebih aman bagi semua pengguna jasa.
                                </p>
                            </div>
                        </div>

                        <div 
                             x-data="{ shown: false }" x-intersect.threshold.50="shown = true" 
                             :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
                             class="relative flex group transition-all duration-700 ease-out delay-500"
                        >
                            <div class="flex-shrink-0 mr-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-2xl bg-white border-2 border-indigo-100 text-indigo-600 font-bold text-xl shadow-sm relative z-10 group-hover:border-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                    5
                                </div>
                            </div>
                            <div class="pt-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">Kemitraan Strategis</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    Kami berupaya membangun kemitraan strategis dengan berbagau pemangku kepentingan, termasuk pemerintah, perusahaan logistik dan komunitas lokal, untuk menciptakan ekosistem pelabuhan yang saling menguntungkan.
                                </p>
                            </div>
                        </div>

                        <div 
                             x-data="{ shown: false }" x-intersect.threshold.50="shown = true" 
                             :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
                             class="relative flex group transition-all duration-700 ease-out delay-500"
                        >
                            <div class="flex-shrink-0 mr-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-2xl bg-white border-2 border-indigo-100 text-indigo-600 font-bold text-xl shadow-sm relative z-10 group-hover:border-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                    6
                                </div>
                            </div>
                            <div class="pt-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">Keamanan dan Kepatuhan</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    Kami berkomitmen untuk menjaga standar keamanan tertinggi dan mematuhi semua regulasi yang berlaku, menjadikan pelabuhan kami sebagai tempat yang aman untuk semua kegiatan maritim.
                                </p>
                            </div>
                        </div>

                        <div 
                             x-data="{ shown: false }" x-intersect.threshold.50="shown = true" 
                             :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
                             class="relative flex group transition-all duration-700 ease-out delay-500"
                        >
                            <div class="flex-shrink-0 mr-6">
                                <div class="flex items-center justify-center h-12 w-12 rounded-2xl bg-white border-2 border-indigo-100 text-indigo-600 font-bold text-xl shadow-sm relative z-10 group-hover:border-indigo-600 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                    7
                                </div>
                            </div>
                            <div class="pt-2 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-all flex-1">
                                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-indigo-600 transition">Keberlanjutan</h3>
                                <p class="text-gray-600 leading-relaxed text-justify">
                                    Kami berkomitmen untuk mengoperasikan pelabuhan ramah lingkungan dengan prinsip keberlanjutan, meminimalkan dampak lingkungan, dan berkontribusi pada pengembangan komunitas di sekitar pelabuhan.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Core Values -->
                <div 
                    x-data="{ shown: false }"
                    x-intersect.threshold.20="shown = true"
                    :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-10'"
                    class="lg:sticky lg:top-24 transition-all duration-1000 ease-out delay-300 opacity-0 translate-x-10"
                >
                    <div class="bg-gradient-to-br from-indigo-900 to-blue-900 rounded-[2.5rem] p-10 text-white shadow-2xl relative overflow-hidden">
                        <!-- Decorative Circle -->
                        <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 bg-white opacity-5 rounded-full"></div>
                        <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-48 h-48 bg-cyan-400 opacity-10 rounded-full"></div>

                        <h3 class="text-3xl font-bold mb-2 relative z-10">Nilai-Nilai Inti</h3>

                        <div class="grid grid-cols-1 gap-4 relative z-10">
                            <!-- Integrity -->
                            <div class="group bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-5 hover:bg-white/20 transition duration-300">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-xl bg-cyan-500/20 text-cyan-300 flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                        <flux:icon name="shield-check" variant="mini" class="w-6 h-6" />
                                    </div>
                                    <div>
                                        <div class="font-bold text-lg">Integrity</div>
                                        <div class="text-indigo-200 text-sm">Kejujuran & Etika</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Safety -->
                            <div class="group bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-5 hover:bg-white/20 transition duration-300">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-xl bg-orange-500/20 text-orange-300 flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                        <flux:icon name="lifebuoy" variant="mini" class="w-6 h-6" />
                                    </div>
                                    <div>
                                        <div class="font-bold text-lg">Safety</div>
                                        <div class="text-indigo-200 text-sm">Utamakan Keselamatan</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Service -->
                            <div class="group bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-5 hover:bg-white/20 transition duration-300">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-xl bg-green-500/20 text-green-300 flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                        <flux:icon name="heart" variant="mini" class="w-6 h-6" />
                                    </div>
                                    <div>
                                        <div class="font-bold text-lg">Service</div>
                                        <div class="text-indigo-200 text-sm">Pelayanan Terbaik</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Teamwork -->
                            <div class="group bg-white/10 backdrop-blur-sm border border-white/10 rounded-2xl p-5 hover:bg-white/20 transition duration-300">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 rounded-xl bg-purple-500/20 text-purple-300 flex items-center justify-center mr-4 group-hover:scale-110 transition">
                                        <flux:icon name="users" variant="mini" class="w-6 h-6" />
                                    </div>
                                    <div>
                                        <div class="font-bold text-lg">Teamwork</div>
                                        <div class="text-indigo-200 text-sm">Kerjasama Tim</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-landingPageLayout>
