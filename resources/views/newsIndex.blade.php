<x-landingPageLayout>
    <x-slot:title>Berita & Informasi - PELTRA</x-slot>

    {{-- CUSTOM HEADER / HERO SECTION --}}
    <x-slot:header>
        <div class="relative bg-slate-900 py-24 overflow-hidden">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 opacity-20" 
                 style="background-image: radial-gradient(#4f46e5 1px, transparent 1px); background-size: 32px 32px;">
            </div>
            
            {{-- Decoration --}}
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                <span class="inline-block py-1 px-3 rounded-full bg-indigo-500/10 border border-indigo-500/20 text-indigo-300 font-semibold text-xs uppercase tracking-wider mb-4 backdrop-blur-sm">
                    Newsroom
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                    Berita & <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-cyan-400">Informasi</span>
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-400">
                    Update terbaru seputar kegiatan operasional, pengembangan infrastruktur, dan inovasi PELTRA.
                </p>
            </div>
        </div>
    </x-slot:header>

    {{-- MAIN CONTENT AREA --}}
    <div class="bg-gray-50 min-h-screen py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Search & Filter Bar (Visual Placeholder for Future Functionality) --}}
            <div class="mb-12 flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-2xl shadow-sm border border-gray-100">
                <div class="text-gray-500 font-medium text-sm mb-4 md:mb-0">
                    Menampilkan <span class="text-indigo-600 font-bold">{{ $news->count() }}</span> berita terbaru
                </div>
                
            </div>

            {{-- News Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($news as $newsItem)
                <div 
                    x-data="{ shown: false }"
                    x-intersect.threshold.10="shown = true"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $loop->index * 100 }}ms"
                    class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-500 ease-out flex flex-col h-full opacity-0 translate-y-10"
                >
                    {{-- Image Container --}}
                    <div class="relative h-56 overflow-hidden">
                        @if($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                <span class="text-slate-300 font-bold text-lg">PELTRA</span>
                            </div>
                        @endif
                        
                        {{-- Overlay Gradient --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>

                        {{-- Date Badge (Floating) --}}
                        <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1 rounded-lg shadow-sm">
                            <div class="text-center">
                                <span class="block text-xs font-bold text-slate-400 uppercase tracking-widest leading-none">{{ $newsItem->published_at ? $newsItem->published_at->format('M') : $newsItem->created_at->format('M') }}</span>
                                <span class="block text-lg font-black text-slate-800 leading-none mt-0.5">{{ $newsItem->published_at ? $newsItem->published_at->format('d') : $newsItem->created_at->format('d') }}</span>
                            </div>
                        </div>

                        {{-- Category Badge --}}
                        @if($newsItem->category)
                        <div class="absolute bottom-4 left-4">
                            <span class="bg-indigo-600/90 backdrop-blur-md text-white text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wide">
                                {{ $newsItem->category }}
                            </span>
                        </div>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="p-6 flex-1 flex flex-col relative">
                        {{-- Title --}}
                        <h3 class="text-xl font-bold text-slate-900 mb-3 leading-snug group-hover:text-indigo-600 transition-colors line-clamp-2">
                            <a href="{{ route('news.show', $newsItem->slug) }}">
                                <span class="absolute inset-0"></span>
                                {{ $newsItem->title }}
                            </a>
                        </h3>
                        
                        {{-- Excerpt --}}
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
                             @if($newsItem->excerpt)
                                {{ Str::limit($newsItem->excerpt, 120) }}
                            @else
                                {{ Str::limit(strip_tags($newsItem->content), 120) }}
                            @endif
                        </p>

                        {{-- Footer Metas --}}
                        <div class="mt-auto border-t border-gray-100 pt-4 flex items-center justify-between">
                            <span class="text-xs font-semibold text-slate-400 group-hover:text-indigo-500 transition-colors">
                                Baca Selengkapnya &rarr;
                            </span>
                             {{-- Optional: Add author or read time here --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-16 flex justify-center">
                <div class="bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100">
                    {{ $news->links() }}
                </div>
            </div>

        </div>
    </div>
</x-landingPageLayout>
