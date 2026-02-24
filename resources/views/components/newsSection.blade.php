@props(['news'])

<section class="py-24 bg-gradient-to-b from-slate-50 to-white w-full overflow-hidden relative">
    
    <!-- Decorative Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <!-- Abstract Blob Top Right -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob"></div>
        <!-- Abstract Blob Bottom Left -->
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-blue-50 rounded-full mix-blend-multiply filter blur-3xl opacity-70 animate-blob animation-delay-2000"></div>
        <!-- Dotted Pattern -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#4f46e5 1px, transparent 1px); background-size: 32px 32px;"></div>
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
                <span class="inline-block py-1 px-3 rounded-full bg-indigo-100 text-indigo-700 font-semibold text-xs uppercase tracking-wider mb-2">
                    Berita Terkini
                </span>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                    Wawasan & <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">Informasi</span>
                </h2>
                <div class="h-1.5 w-24 bg-indigo-600 mt-4 rounded-full"></div>
            </div>
            
            <a href="{{ route('news.index') }}" class="hidden md:inline-flex items-center group text-indigo-600 font-bold hover:text-indigo-800 transition-colors mt-4 md:mt-0">
                Lihat Semua Berita
                <span class="ml-2 w-8 h-8 rounded-full bg-indigo-50 flex items-center justify-center group-hover:bg-indigo-100 transition-colors">
                    <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
        </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $newsItem)
                
                <div 
                    x-data="{ shown: false }"
                    x-intersect.threshold.10="shown = true"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $loop->index * 150 }}ms"
                    class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-500 ease-out group flex flex-col h-full"
                >
                    <div class="relative h-48 overflow-hidden">
                        @if($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @endif
                        
                        <!-- Overlay Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>

                        @if($newsItem->category)
                        <div class="absolute top-4 left-4 z-10">
                            <span class="bg-indigo-600/90 backdrop-blur-sm text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wide shadow-md">{{ $newsItem->category }}</span>
                        </div>
                        @endif
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow relative">
                        <!-- Date Badge -->
                        <div class="flex items-center text-xs font-medium text-slate-400 mb-3 space-x-2">
                             <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                             <span>
                                @if($newsItem->published_at)
                                    {{ $newsItem->published_at->format('d M Y') }}
                                @else
                                    {{ $newsItem->created_at->format('d M Y') }}
                                @endif
                             </span>
                        </div>

                        <h3 class="text-lg font-bold text-slate-800 mb-2 group-hover:text-indigo-600 transition-colors duration-300 line-clamp-2">
                            <a href="{{ route('news.show', $newsItem->slug) }}" class="focus:outline-none">
                                <span class="absolute inset-0"></span>
                                {{ $newsItem->title }}
                            </a>
                        </h3>
                        
                        <p class="text-slate-500 text-sm leading-relaxed mb-4 line-clamp-3">
                            @if($newsItem->excerpt)
                                {{ Str::limit($newsItem->excerpt, 100) }}
                            @else
                                {{ Str::limit(strip_tags($newsItem->content), 100) }}
                            @endif
                        </p>
                        
                        <div class="mt-auto pt-6 border-t border-slate-100 flex items-center justify-between">
                            <span class="inline-flex items-center text-indigo-600 font-bold text-sm group-hover:underline decoration-2 underline-offset-4">
                                Baca Selengkapnya
                            </span>
                            <div class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300">
                                <svg class="w-4 h-4 transform group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>

            
            <div class="mt-16 flex items-center justify-center md:hidden">
                <a href="{{ route('news.index') }}" class="inline-flex items-center px-8 py-4 bg-indigo-600 text-white font-bold rounded-full shadow-lg hover:bg-indigo-700 hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                    Lihat Semua Berita
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>

        </div>
    </section>