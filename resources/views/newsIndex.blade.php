<x-landingPageLayout>
    <x-slot:title>Berita & Informasi - Peltra</x-slot>

    <x-slot:header>
         <div class="h-24 bg-indigo-900"></div>
    </x-slot:header>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div 
                x-data="{ shown: false }"
                x-intersect.threshold.50="shown = true"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 -translate-y-5'"
                class="text-center mb-12 transition-all duration-700 ease-out opacity-0 -translate-y-5"
            >
                <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Berita & Informasi</h1>
                <p class="mt-4 text-lg text-gray-500">Update terbaru seputar kegiatan dan perkembangan perusahaan</p>
            </div>

            <div class="grid grid-cols-1 gap-8">
                @foreach($news as $newsItem)
                <div 
                    x-data="{ shown: false }"
                    x-intersect.threshold.10="shown = true"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $loop->index * 150 }}ms"
                    class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition-all duration-700 ease-out group flex flex-col md:flex-row opacity-0 translate-y-10"
                >
                    <div class="relative h-56 md:h-auto md:w-1/3 shrink-0 overflow-hidden">
                        @if($newsItem->image)
                            <img src="{{ asset('storage/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="{{ $newsItem->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                        @if($newsItem->category)
                        <div class="absolute top-4 left-4">
                            <span class="bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">{{ $newsItem->category }}</span>
                        </div>
                        @endif
                    </div>
                    <div class="p-8 flex-1 flex flex-col">
                        <p class="text-sm text-gray-400 mb-2">
                             {{ $newsItem->published_at ? $newsItem->published_at->format('d M Y') : $newsItem->created_at->format('d M Y') }}
                        </p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-600 transition">{{ $newsItem->title }}</h3>
                        <p class="text-gray-500 text-sm leading-relaxed mb-6 flex-1">
                             @if($newsItem->excerpt)
                                {{ Str::limit($newsItem->excerpt, 200) }}
                            @else
                                {{ Str::limit(strip_tags($newsItem->content), 200) }}
                            @endif
                        </p>
                        <a href="{{ route('news.show', $newsItem->slug) }}" class="inline-flex items-center text-indigo-600 font-semibold text-sm hover:underline mt-auto">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $news->links() }}
            </div>
        </div>
    </div>
</x-landingPageLayout>
