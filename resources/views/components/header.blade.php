

    <header class="relative bg-white overflow-hidden min-h-[700px] flex items-center" x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)">
     
    <div 
        class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-900 opacity-0 transform translate-y-10 z-0 transition-transform duration-1000 ease-out" 
        style="clip-path: polygon(0 0, 0% 100%, 100% 100%);"
        :class="shown ? 'translate-y-0 opacity-20' : 'translate-y-10 opacity-0'"
    ></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full relative z-10">
        <div class="grid lg:grid-cols-1 gap-12 items-center">
            <div class="py-12">
                <div class="mb-2 opacity-0 translate-y-10 transition-all duration-1000 delay-100 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                    <img src="{{ asset('images/LogoPeltra.jpeg') }}" alt="Logo Peltra" class="h-60 w-auto object-cover">
                </div>

                <!-- <div class="mb-8 mt-10 opacity-0 -translate-x-10 transition-all duration-1000 delay-300 ease-out" :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-10'">
                    <h1 class="text-3xl md:text-6xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        Wujudkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-gray-600 to-indigo-500">Konektivitas</span><br>
                        Tanpa Batas
                    </h1>
                </div> -->

                <!-- Button cek jadwal (tidak jadi) -->

                <!-- <div class="max-w-2xl opacity-0 translate-y-10 transition-all duration-1000 delay-500 ease-out" :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'">
                    
                    <div class="mt-8 pl-6 relative" x-data="{ notification: false }">
                        <button 
                            @click="notification = true; setTimeout(() => notification = false, 3000)" 
                            class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-indigo-600 hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 transition duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >
                            Cek Jadwal & Booking Tiket
                            
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </button>

                        
                        <div 
                            x-show="notification" 
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                            x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                            x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                            class="absolute left-6 top-full mt-4 bg-gray-900 border border-gray-700 text-white text-sm px-5 py-3 rounded-xl shadow-2xl flex items-center gap-3 z-50 min-w-max backdrop-blur-md bg-opacity-90"
                            style="display: none;"
                        >
                            <span class="relative flex h-3 w-3">
                              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-3 w-3 bg-indigo-500"></span>
                            </span>
                            <span class="font-medium tracking-wide">Fitur Coming Soon! 🚀</span>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
            

            <!-- SISI KANAN: GRID GAMBAR GEOMETRIS -->
            <div  class="relative w-full flex flex-col items-end overflow-hidden hidden md:block">
                
                
                <!-- Gambar Diagonal -->
                <div class="relative flex flex-col items-end" >
                    
                    
                    <!-- Gambar 1 -->
                    <div 
                        class="w-64 h-40 bg-gray-200 opacity-0 translate-x-20 transition-all duration-1000 delay-300 ease-out" 
                        style="clip-path: polygon(100% 10%, 100% 100%, 10% 100%, 45% 10%);"
                        :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-20'"
                    >
                        <img src="{{ asset('images/kapal1.jpg') }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Gambar 2 -->
                    <div 
                        class="w-full max-w-md h-72 -mt-1 [clip-path:polygon(49%_0%,100%_0%,100%_100%,10%_100%)] opacity-0 translate-x-20 transition-all duration-1000 delay-500 ease-out"
                        :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-20'"
                    >
                        <img src="{{ asset('images/kapalAboutus1.jpg') }}" class="w-full h-full object-cover">
                    </div>

                    <!-- Gambar 3 -->
                    <div 
                        class="w-full max-w-md h-72 -mt-1 opacity-0 translate-x-20 transition-all duration-1000 delay-700 ease-out" 
                        style="clip-path: polygon(100% 100%, 100% 0%, 10% 1%, 40% 100%);"
                        :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 translate-x-20'"
                    >
                        <img src="{{ asset('images/kapal3.jpg') }}" class="w-full h-full object-cover">
                    </div>

                    

                </div>
                <div class="absolute bottom-0 left-11 w-96 h-80 bg-indigo-900 " style="clip-path: polygon(68% 18%, 100% 100%, 25% 100%);"></div>
            </div>
</header>