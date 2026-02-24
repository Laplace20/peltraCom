<section class="py-24 bg-slate-900 overflow-hidden w-full relative border-t border-slate-800">
    <!-- Background Decoration -->
    <div class="absolute inset-0 z-0">
        <!-- World Map Pattern (Abstract) -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <!-- Large Gradient Circle -->
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-blue-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-20"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-10 text-center relative z-10">
        <h2 class="text-3xl font-bold text-white mb-2">Member of </h2>
        <div class="h-1 w-16 bg-blue-500 mx-auto rounded-full"></div>
    </div>

    <!-- Carousel Container -->
    <div x-data="{}" class="relative w-full overflow-hidden z-10">
        <!-- Gradients for fade effect on edges -->
        <div class="absolute inset-y-0 left-0 w-24 z-10 bg-gradient-to-r from-slate-900 to-transparent"></div>
        <div class="absolute inset-y-0 right-0 w-24 z-10 bg-gradient-to-l from-slate-900 to-transparent"></div>

        <!-- Sliding Track -->
        <div class="flex w-max animate-infinite-scroll group">
            
            @for ($i = 0; $i < 12; $i++)
                <div class="flex items-center space-x-16 mx-8">
                    <!-- KADIN INDONESIA -->
                    <div class="flex flex-col items-center justify-center hover:scale-110 transition-all duration-300">
                        <img src="{{ asset('images/Kadin-Indonesia.png') }}" alt="Kadin Indonesia" class="h-24 w-auto object-contain">
                    </div>

                    <!-- KADIN NTB -->
                    <div class="flex flex-col items-center justify-center hover:scale-110 transition-all duration-300">
                        <img src="{{ asset('images/kadinda-nt-barat.png') }}" alt="Kadin NTB" class="h-24 w-auto object-contain">
                    </div>

                    <!-- ASOSIASI BADAN USAHA PELABUHAN INDONESIA -->
                    <div class="flex flex-col items-center justify-center hover:scale-110 transition-all duration-300">
                        <img src="{{ asset('images/abupi-logo.png') }}" alt="ABUPI" class="h-24 w-auto object-contain">
                    </div>
                </div>
            @endfor

        </div>
    </div>

    <!-- Tailwind Config Injection for Animation -->
    <style>
        @keyframes infinite-scroll {
            from { transform: translateX(0); }
            to { transform: translateX(-8.333%); } /* 1/12 = 8.333% */
        }
        .animate-infinite-scroll {
            animation: infinite-scroll 60s linear infinite;
        }
        /* Pause on hover */
        .animate-infinite-scroll:hover {
            animation-play-state: paused;
        }
    </style>
</section>
