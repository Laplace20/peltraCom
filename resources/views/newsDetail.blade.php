<x-landingPageLayout>
    <x-slot:title>{{ $news->title }}</x-slot>
    
    <x-slot:header>
        <div class="h-12 bg-gray-900"></div> 
    </x-slot:header>

    <div class="py-12 bg-gray-50 px-4 relative overflow-hidden">
        <!-- Decorative Background Pattern -->
        <div class="absolute inset-0 opacity-[0.4] pointer-events-none" 
             style="background-image: radial-gradient(#cbd5e1 1px, transparent 1px); background-size: 24px 24px;">
        </div>
        
        <!-- Decorative Blob -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-indigo-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob pointer-events-none"></div>
        <div class="absolute top-0 left-0 -ml-20 -mt-20 w-72 h-72 bg-blue-100 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000 pointer-events-none"></div>

        {{-- Breadcrumb --}}
        <div 
            x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)"
            :class="shown ? 'opacity-100 translate-x-0' : 'opacity-0 -translate-x-5'"
            class="max-w-4xl mx-auto mb-8 transition-all duration-700 ease-out opacity-0 -translate-x-5 relative z-10"
        >
            <nav class="flex text-sm text-gray-500">
                <a href="{{ route('LandingPage') }}" class="hover:text-indigo-600">Home</a>
                <span class="mx-2">/</span>
                <a href="{{ route('news.index') }}" class="hover:text-indigo-600">Berita</a>
                <span class="mx-2">/</span>
                <span class="text-gray-900 truncate">{{ Str::limit($news->title, 30) }}</span>
            </nav>
        </div>

        <div class="max-w-4xl mx-auto relative z-10">
            <article 
                x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 300)"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="bg-white rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 overflow-hidden transition-all duration-1000 ease-out opacity-0 translate-y-10"
            >
                <!-- Decorative Top Gradient Line -->
                <div class="h-1.5 w-full bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500"></div>

                @if($news->image)
                    <div class="h-64 md:h-96 w-full overflow-hidden">
                        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-full object-cover">
                    </div>
                @endif
                
                <div class="p-8 md:p-12">
                    <div class="flex items-center space-x-4 mb-6">
                        @if($news->category)
                            <span class="bg-indigo-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase">{{ $news->category }}</span>
                        @endif
                        <span class="text-sm text-gray-500">
                            {{ $news->published_at ? $news->published_at->format('d M Y') : $news->created_at->format('d M Y') }}
                        </span>
                    </div>

                    <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-8">{{ $news->title }}</h1>

                    <div class="prose prose-lg prose-indigo max-w-none">
                        {!! $news->content !!}
                    </div>

                    <!-- Youtube Video -->
                    @if($news->video_id)
                        <div class="mt-8 relative w-full rounded-xl overflow-hidden shadow-lg bg-gray-100" style="padding-bottom: 56.25%;">
                            <iframe 
                                src="https://www.youtube.com/embed/{{ $news->video_id }}" 
                                title="YouTube video player"
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                                allowfullscreen 
                                class="absolute top-0 left-0 w-full h-full">
                            </iframe>
                        </div>
                    @endif
                </div>
            </article>

            <!-- Navigation Links -->
            @if($nextNews)
            <div class="mt-8 flex justify-end">
                 <a href="{{ route('news.show', $nextNews->slug) }}" class="group bg-white p-4 rounded-xl border border-gray-200 hover:border-indigo-600 transition flex items-center shadow-sm max-w-sm">
                    <div class="text-right mr-4 flex-1">
                        <span class="block text-xs text-gray-400 uppercase tracking-wider">Berita Selanjutnya</span>
                        <span class="block font-bold text-gray-900 group-hover:text-indigo-600 transition">{{ Str::limit($nextNews->title, 40) }}</span>
                    </div>
                    <div class="bg-gray-100 p-2 rounded-full group-hover:bg-indigo-600 transition shrink-0">
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </div>
                </a>
            </div>
            @endif

            <!-- Related News Divider -->
            @if(isset($relatedNews) && $relatedNews->count() > 0)
            <div class="mt-16 relative">
                 <div class="absolute inset-0 flex items-center" aria-hidden="true">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-gray-50 px-3 text-lg font-semibold text-gray-900">Baca Juga</span>
                </div>
            </div>

            <div class="mt-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($relatedNews as $related)
                        <a 
                            href="{{ route('news.show', $related->slug) }}" 
                            x-data="{ shown: false }" x-intersect.threshold.10="shown = true"
                            :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                            style="transition-delay: {{ $loop->index * 150 }}ms"
                            class="block bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-all duration-500 group h-full flex flex-col"
                        >
                            <div class="h-40 overflow-hidden relative">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=400&q=80" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @endif
                            </div>
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <span class="text-xs text-indigo-600 font-semibold block mb-1">
                                    {{ $related->published_at ? $related->published_at->format('d M Y') : $related->created_at->format('d M Y') }}
                                    </span>
                                    <h4 class="font-bold text-gray-900 group-hover:text-indigo-600 transition line-clamp-2 text-sm">{{ $related->title }}</h4>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</x-landingPageLayout>
