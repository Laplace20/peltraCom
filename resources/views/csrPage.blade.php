<x-landingPageLayout>
    <x-slot:title>Tanggung Jawab Sosial - PELTRA</x-slot>

    {{-- HERO HEADER --}}
    <x-slot:header>
        <div class="relative bg-slate-900 py-24 overflow-hidden">
            {{-- Background Pattern --}}
            <div class="absolute inset-0 opacity-20" 
                 style="background-image: radial-gradient(#14b8a6 1px, transparent 1px); background-size: 32px 32px;">
            </div>
            
            {{-- Decorative Blobs --}}
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 bg-teal-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-96 h-96 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
                <span class="inline-block py-1 px-3 rounded-full bg-teal-500/10 border border-teal-500/20 text-teal-300 font-semibold text-xs uppercase tracking-wider mb-4 backdrop-blur-sm">
                    Social Responsibility
                </span>
                <h1 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-4">
                    Peduli & <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-400 to-emerald-400">Berkontribusi</span>
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-slate-400">
                    Wujud nyata komitmen PELTRA dalam membangun masyarakat dan melestarikan lingkungan berkelanjutan.
                </p>
            </div>
        </div>
    </x-slot:header>

    <div class="py-16 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($activities as $activity)
                <div 
                    x-data="{ shown: false }"
                    x-intersect.threshold.10="shown = true"
                    :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                    style="transition-delay: {{ $loop->index * 100 }}ms"
                    class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl hover:-translate-y-1 transition-all duration-500 ease-out flex flex-col h-full opacity-0 translate-y-10 relative"
                >
                    {{-- Image --}}
                    <div class="relative h-64 overflow-hidden">
                        @if($activity->image)
                             <img src="{{ Storage::url($activity->image) }}" alt="{{ $activity->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out">
                        @else
                            <div class="w-full h-full bg-slate-100 flex items-center justify-center text-slate-300">
                                <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            </div>
                        @endif
                         
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 to-transparent opacity-60 group-hover:opacity-40 transition-opacity duration-300"></div>

                        <div class="absolute top-4 left-4">
                            <span class="bg-teal-600/90 backdrop-blur-md text-white text-[10px] font-bold px-3 py-1.5 rounded-full uppercase tracking-wide shadow-sm">
                                {{ \Carbon\Carbon::parse($activity->date ?? $activity->created_at)->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-slate-900 mb-3 leading-tight group-hover:text-teal-600 transition-colors">
                            <a href="{{ route('news.show', $activity->slug) }}">
                                <span class="absolute inset-0"></span>
                                {{ $activity->title }}
                            </a>
                        </h3>
                        
                        <p class="text-slate-500 leading-relaxed mb-6 line-clamp-3">
                            {{ Str::limit(strip_tags($activity->content), 120) }}
                        </p>

                        <a href="{{ route('news.show', $activity->slug) }}" class="mt-auto border-t border-gray-100 pt-6 flex items-center text-teal-600 font-bold text-sm group-hover:translate-x-2 transition-transform relative z-10">
                            Lihat Kegiatan
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20 bg-white rounded-3xl border border-dashed border-gray-300">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada kegiatan</h3>
                    <p class="mt-1 text-sm text-gray-500">Kegiatan CSR akan segera diperbarui.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-16 flex justify-center">
                 <div class="bg-white px-4 py-3 rounded-xl shadow-sm border border-gray-100">
                    {{ $activities->links() }}
                </div>
            </div>
        </div>
    </div>
</x-landingPageLayout>
