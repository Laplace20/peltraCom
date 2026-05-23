<x-landingPageLayout>
    <x-slot:title>{{ $news->title }} - PELTRA News</x-slot>

    <x-slot:header>
        {{-- Empty slot to remove default spacer --}}
    </x-slot:header>

    <div class="bg-white min-h-screen">
        
        {{-- HERO SECTION --}}
        <div class="relative w-full h-[60vh] min-h-[500px] flex items-end overflow-hidden">
            
            <div class="absolute inset-0 z-0 select-none">
                @if($news->image)
                    <img 
                        src="{{ asset('storage/' . $news->image) }}" 
                        alt="{{ $news->title }}" 
                        class="w-full h-full object-cover transform scale-105"
                    >
                @else
                    <div class="w-full h-full bg-slate-800 flex items-center justify-center">
                        <span class="text-slate-600 font-bold text-4xl opacity-20">PELTRA</span>
                    </div>
                @endif
                {{-- Gradient Overlay for Text Readability --}}
                <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-slate-900/60 to-slate-900/20"></div>
            </div>

            {{-- Hero Content --}}
            <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
                <div 
                     x-data="{ shown: false }" 
                     x-init="setTimeout(() => shown = true, 100)"
                     :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-5'"
                     class="max-w-4xl transition-all duration-1000 ease-out"
                >
                    {{-- Breadcrumb --}}
                    <nav class="flex items-center text-sm font-medium text-slate-300 mb-6 space-x-2">
                        <a href="{{ route('LandingPage') }}" class="hover:text-white hover:underline transition-colors">Home</a>
                        <svg class="h-4 w-4 text-slate-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                        <a href="{{ route('news.index') }}" class="hover:text-white hover:underline transition-colors">Berita</a>
                        <svg class="h-4 w-4 text-slate-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" /></svg>
                        <span class="text-white/80 truncate max-w-[200px]">{{ $news->title }}</span>
                    </nav>

                    {{-- Badges --}}
                    <div class="flex flex-wrap items-center gap-4 mb-4">
                        @if($news->category)
                            <span class="bg-indigo-600 text-white text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-wider shadow-lg shadow-indigo-900/20">
                                {{ $news->category }}
                            </span>
                        @endif
                        <div class="flex items-center text-slate-300 text-sm font-medium bg-white/10 backdrop-blur-md px-3 py-1 rounded-full border border-white/10">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                            {{ $news->published_at ? $news->published_at->format('d F Y') : $news->created_at->format('d F Y') }}
                        </div>
                    </div>

                    {{-- Main Title --}}
                    <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight tracking-tight drop-shadow-sm">
                        {{ $news->title }}
                    </h1>
                </div>
            </div>
        </div>

        {{-- CONTENT LAYOUT --}}
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-20 z-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                
                {{-- MAIN ARTICLE COLUMN --}}
                <div class="lg:col-span-8">
                    <article class="bg-white rounded-2xl shadow-xl shadow-slate-200/50 p-8 md:p-12 border border-slate-100">
                        {{-- Lead Text --}}
                        @if($news->excerpt)
                            <p class="text-xl md:text-2xl text-slate-600 font-medium leading-relaxed mb-8 border-l-4 border-indigo-500 pl-6 italic">
                                "{{ $news->excerpt }}"
                            </p>
                        @endif

                        {{-- Main Body --}}
                        <div class="prose prose-lg prose-indigo max-w-none text-slate-700 leading-8">
                            {!! $news->content !!}
                        </div>

                        {{-- Divider --}}
                        <hr class="my-10 border-slate-200">

                        {{-- Embedded Video (If Exists) --}}
                        @if($news->video_id)
                            <div class="mb-10">
                                <h3 class="text-lg font-bold text-slate-900 mb-4 flex items-center">
                                    <svg class="w-5 h-5 text-red-600 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                                    Video Terkait
                                </h3>
                                <div class="rounded-xl overflow-hidden shadow-lg bg-slate-900 aspect-video relative">
                                    <iframe 
                                        src="https://www.youtube.com/embed/{{ $news->video_id }}" 
                                        title="YouTube video player"
                                        class="absolute inset-0 w-full h-full"
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        @endif

                        {{-- Navigation --}}
                        @if($nextNews)
                            <div class="flex flex-col sm:flex-row justify-end items-center bg-slate-50 p-6 rounded-xl border border-slate-100 gap-4">
                                <a href="{{ route('news.show', $nextNews->slug) }}" class="group flex items-center text-right hover:text-indigo-700 transition">
                                    <div class="mr-3">
                                        <span class="block text-xs font-bold text-slate-400 uppercase">Selanjutnya</span>
                                        <span class="font-bold text-slate-900 group-hover:text-indigo-600 transition">{{ Str::limit($nextNews->title, 30) }}</span>
                                    </div>
                                    <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                    </div>
                                </a>
                            </div>
                        @endif
                    </article>
                </div>

                {{-- SIDEBAR COLUMN --}}
                <div class="lg:col-span-4 space-y-8">
                    
                    {{-- Company Box --}}
                    <div class="bg-indigo-900 rounded-2xl p-6 text-white relative overflow-hidden">
                        <div class="absolute top-0 right-0 -mr-10 -mt-10 w-40 h-40 bg-white/10 rounded-full blur-2xl"></div>
                        <div class="relative z-10">
                            <h3 class="font-bold text-lg mb-2">Tentang PELTRA</h3>
                            <p class="text-indigo-100 text-sm leading-relaxed mb-4 text-justify">
                                Pelabuhan Lembar Sejahtera (PELTRA) berkomitmen menjadi mitra maritim terpercaya, mendorong pertumbuhan ekonomi melalui layanan pelabuhan yang efisien dan modern.
                            </p>
                        </div>
                    </div>

                    {{-- Related News Widget --}}
                    @if(isset($relatedNews) && $relatedNews->count() > 0)
                        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sticky top-8">
                            <h3 class="font-bold text-slate-900 text-lg mb-6 pb-2 border-b border-slate-100 flex items-center">
                                <span class="text-indigo-600 mr-2">#</span> Berita Terkait
                            </h3>
                            <div class="flex flex-col gap-6">
                                @foreach($relatedNews as $item)
                                    <a href="{{ route('news.show', $item->slug) }}" class="group flex gap-4 items-start">
                                        <div class="w-20 h-20 shrink-0 rounded-lg overflow-hidden relative">
                                            @if($item->image)
                                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                            @else
                                                <div class="w-full h-full bg-slate-200"></div>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-wide mb-1 block">
                                                {{ $item->published_at ? $item->published_at->format('d M') : $item->created_at->format('d M') }}
                                            </span>
                                            <h4 class="text-sm font-bold text-slate-800 leading-snug group-hover:text-indigo-600 transition-colors line-clamp-3">
                                                {{ $item->title }}
                                            </h4>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-landingPageLayout>
