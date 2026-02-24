@props(['facilities' => []])

<section id="services" class="py-24 bg-slate-900 overflow-hidden w-full relative">
    <!-- Background Decoration -->
    <div class="absolute inset-0 z-0">
        <!-- World Map Pattern (Abstract) -->
        <div class="absolute inset-0 opacity-10" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        
        <!-- Large Gradient Circle -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-orange-500 rounded-full mix-blend-overlay filter blur-[100px] opacity-20"></div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="text-center mb-20">
            <h2 
                x-data="{ shown: false }"
                x-intersect.threshold.50="shown = true"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-10'"
                class="text-4xl md:text-5xl font-extrabold text-white transition-all duration-700 ease-out"
            >
                Fasilitas
            </h2>
            <div class="w-24 h-1.5 bg-gradient-to-r from-orange-500 to-orange-400 mx-auto mt-6 rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($facilities as $facility)
            <div 
                x-data="{ shown: false }"
                x-intersect.threshold.10="shown = true"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-20'"
                class="group bg-slate-800 rounded-2xl overflow-hidden shadow-lg border border-slate-700/50 hover:shadow-orange-500/10 hover:-translate-y-2 transition-all duration-500 ease-out relative h-full flex flex-col"
                style="transition-delay: {{ $loop->index * 150 }}ms"
            >
                <!-- Decorative Number -->
                <div class="absolute top-4 right-4 z-20 text-5xl font-black text-white/5 italic group-hover:text-orange-500/10 transition-colors duration-500 select-none">
                    0{{ $loop->iteration }}
                </div>

                <div class="relative h-48 overflow-hidden">
                    <img src="{{ asset('storage/' . $facility->image) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/40 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-500"></div>
                </div>

                <div class="p-6 relative flex-grow flex flex-col">
                    <!-- Accent Line -->
                    <div class="w-12 h-1 bg-orange-500 mb-4 group-hover:w-20 transition-all duration-500 ease-out"></div>
                    
                    <h3 class="text-xl font-bold mb-3 text-white group-hover:text-orange-400 transition-colors">{{ $facility->name }}</h3>
                    <div class="text-slate-400 text-sm leading-relaxed mb-4">
                        {!! Str::limit(strip_tags($facility->description), 100) !!}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>