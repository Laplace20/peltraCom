<section class="relative bg-white py-20 overflow-hidden" x-data="{ shown: false }" x-intersect:enter="shown = true" x-intersect:leave="shown = false">
    
    <!-- Background Decoration similar to Header -->
    <div 
        class="absolute top-0 right-0 w-64 h-64 bg-indigo-50 rounded-bl-full opacity-50 transform translate-x-1/2 -translate-y-1/2 transition-transform duration-1000 ease-out"
        :class="shown ? 'translate-x-0 translate-y-0' : 'translate-x-full -translate-y-full'"
    ></div>
    
    <div 
        class="absolute bottom-0 left-0 w-96 h-96 bg-blue-50 rounded-tr-full opacity-50 transform -translate-x-1/2 translate-y-1/2 transition-transform duration-1000 delay-300 ease-out"
        :class="shown ? 'translate-x-0 translate-y-0' : '-translate-x-full translate-y-full'"
    ></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            
            <!-- Column 1: Image Composition -->
            <div class="relative order-2 lg:order-1">
                <div class="relative p-4">
                    <!-- Decorative Border/Frame -->
                    <div 
                        class="absolute inset-0 border-2 border-indigo-100 rounded-bl-[60px] rounded-tr-[60px] transform rotate-3 transition-all duration-700 delay-500"
                        :class="shown ? 'opacity-100 scale-100' : 'opacity-0 scale-95'"
                    ></div>
                    
                    <!-- Main Image with Clip Path -->
                    <div 
                        class="relative z-10 w-full h-[500px] bg-gray-200 overflow-hidden shadow-xl transform transition-all duration-1000 ease-out"
                        style="clip-path: polygon(10% 0, 100% 0, 100% 90%, 0% 100%, 0 10%); border-radius: 20px;"
                        :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-20'"
                    >
                        
                        <img src="{{ asset('images/kapalAboutus1.jpg') }}" alt="Kapal PELTRA" class="w-full h-full object-cover">
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                        
                        <!-- Floating Badge/Logo Area -->
                        <div class="absolute bottom-8 left-8 text-white">
                            <div class="flex items-center space-x-2">
                                <div class="h-10 w-1 bg-indigo-500"></div>
                                <div>
                                    <p class="font-bold text-lg tracking-wider">PELTRA</p>
                                    <p class="text-xs text-gray-200">Pelabuhan Lembar Sejahtera</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Secondary Decorative Image (Small) -->
                    <div 
                        class="absolute -bottom-6 -right-6 w-40 h-40 bg-white p-2 shadow-lg rounded-2xl transform transition-all duration-1000 delay-300 ease-out z-20"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    >
                         <img src="{{ asset('images/kapal1.jpg') }}" alt="Detail Kapal" class="w-full h-full object-cover rounded-xl">
                    </div>
                </div>
            </div>

            <!-- Column 2: Content -->
            <div class="order-1 lg:order-2">
                <div class="space-y-6">

                    <!-- Heading -->
                    <h2 
                        class="text-3xl md:text-4xl font-bold text-slate-900 leading-tight opacity-0 transform translate-y-4 transition-all duration-700 delay-200"
                        :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                    >
                        Sinergi untuk <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">Kemajuan Maritim</span>
                    </h2>
                    
                    <!-- Content Paragraphs -->
                    <div class="space-y-4 text-gray-600 text-lg leading-relaxed text-justify">
                        <p 
                            class="opacity-0 transform translate-y-4 transition-all duration-700 delay-300"
                            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                        >
                            <span class="font-semibold text-slate-800">Pelabuhan Lembar Sejahtera (PELTRA)</span> merupakan Badan Usaha Pelabuhan yang hadir dengan semangat profesionalisme, integritas, dan keberlanjutan. Kami berkomitmen untuk tumbuh dan berkembang bersama para mitra usaha melalui kolaborasi yang saling menguatkan, pelayanan yang andal, serta tata kelola yang transparan dan akuntabel.
                        </p>

                        <p 
                            class="opacity-0 transform translate-y-4 transition-all duration-700 delay-400"
                            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                        >
                            Sebagai entitas bisnis yang berorientasi pada kemajuan jangka panjang, Pelabuhan Lembar Sejahtera menempatkan kepatuhan terhadap regulasi serta pengelolaan lingkungan yang bertanggung jawab sebagai fondasi utama operasional. Kami percaya bahwa pertumbuhan ekonomi pelabuhan harus berjalan seiring dengan perlindungan lingkungan dan pemberdayaan masyarakat sekitar.
                        </p>

                        <p 
                            class="opacity-0 transform translate-y-4 transition-all duration-700 delay-500"
                            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'"
                        >
                            Dengan dukungan sumber daya yang kompeten dan sistem operasional yang terstandar, kami siap menjadi simpul logistik yang efisien, berdaya saing, dan berkelanjutan bagi Indonesia.
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>