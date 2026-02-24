@props(['activities'])

<section class="py-24 bg-gradient-to-b from-white to-slate-50 w-full overflow-hidden relative border-t border-slate-100">
    
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <!-- Abstract Blob Top Right -->
        <div class="absolute top-1/2 left-0 w-96 h-96 bg-teal-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <!-- Abstract Blob Bottom Left -->
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-emerald-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <!-- Dotted Pattern -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#0d9488 1px, transparent 1px); background-size: 32px 32px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Header Section -->
        <div 
            x-data="{ shown: false }"
            x-intersect.threshold.50="shown = true"
            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
            class="flex flex-col md:flex-row justify-between items-end mb-16 transition-all duration-700 ease-out"
        >
            <div class="relative">
                <span class="inline-block py-1 px-3 rounded-full bg-teal-100 text-teal-700 font-semibold text-xs uppercase tracking-wider mb-2">
                    Social Responsibility
                </span>
                <div class="h-1.5 w-24 bg-teal-600 mt-4 rounded-full"></div>
            </div>
            
            <a href="{{ route('csr.index') }}" class="hidden md:inline-flex items-center group text-teal-600 font-bold hover:text-teal-800 transition-colors mt-4 md:mt-0">
                Lihat Semua Kegiatan
                <span class="ml-2 w-8 h-8 rounded-full bg-teal-50 flex items-center justify-center group-hover:bg-teal-100 transition-colors">
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
        </div>
            
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($activities as $activity)
            
            <div 
                x-data="{ shown: false }"
                x-intersect.threshold.10="shown = true"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                style="transition-delay: {{ $loop->index * 150 }}ms"
                class="group flex flex-col h-full bg-white rounded-2xl shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-slate-100 overflow-hidden transform opacity-0 translate-y-10"
            >
                <div class="relative h-48 overflow-hidden">
                    @if($activity->image)
                        <img src="{{ Storage::url($activity->image) }}" alt="{{ $activity->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                            <svg class="w-16 h-16" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    
                    <div class="absolute top-4 left-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-white/90 text-teal-700 backdrop-blur-sm shadow-sm">
                            {{ \Carbon\Carbon::parse($activity->date ?? $activity->created_at)->format('d M Y') }}
                        </span>
                    </div>
                </div>
                
                <div class="p-6 flex flex-col flex-grow relative">
                    <h3 class="text-lg font-bold text-slate-800 mb-2 line-clamp-2 group-hover:text-teal-600 transition-colors">
                        <a href="{{ route('news.show', $activity->slug) }}" class="focus:outline-none">
                            <span class="absolute inset-0"></span>
                            {{ $activity->title }}
                        </a>
                    </h3>
                    
                    <p class="text-slate-500 mb-4 line-clamp-3 text-sm leading-relaxed">
                        {{ Str::limit(strip_tags($activity->content), 100) }}
                    </p>
                    
                    <div class="mt-auto pt-4 border-t border-slate-100 flex items-center text-teal-600 font-semibold text-sm group-hover:translate-x-1 transition-transform">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </div>
            </div>
            
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-slate-500 italic">Belum ada kegiatan CSR yang ditampilkan.</p>
            </div>
            @endforelse
        </div>

        <div class="mt-12 text-center md:hidden">
            <a href="{{ route('csr.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-full text-teal-700 bg-teal-100 hover:bg-teal-200 transition-colors shadow-sm">
                Lihat Semua Kegiatan
                <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

    </div>
</section>
