@props(['news', 'activities'])

<section class="py-24 bg-gradient-to-b from-slate-50 to-white w-full overflow-hidden relative" id="updates-section">
    <!-- Background -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none z-0">
        <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-teal-50 rounded-full mix-blend-multiply filter blur-3xl opacity-50 animate-blob animation-delay-2000"></div>
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#64748b 1px, transparent 1px); background-size: 32px 32px;"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="grid lg:grid-cols-12 gap-12">
            
            <!-- LEFT COLUMN: LATEST NEWS -->
            <div class="lg:col-span-8 flex flex-col">
                <!-- News Header -->
                <div class="flex flex-col sm:flex-row justify-between items-end mb-10 border-b border-slate-200 pb-4">
                    <div>
                        <span class="text-indigo-600 font-bold tracking-wider uppercase text-xs mb-2 block">Update Terbaru</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                            Berita <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-blue-500">Terkini</span>
                        </h2>
                    </div>
                    <a href="{{ route('news.index') }}" class="hidden sm:inline-flex items-center text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors mt-4 sm:mt-0 group">
                        Lihat Semua
                        <svg class="w-4 h-4 ml-1 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                <!-- News Grid -->
                <div class="grid md:grid-cols-2 gap-6">
                    @forelse($news as $item)
                        <!-- News Card -->
                        <div class="group bg-white rounded-xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 flex flex-col h-full relative">
                            <div class="relative h-48 overflow-hidden">
                                <img 
                                    src="{{ $item->image ? asset('storage/' . $item->image) : 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80' }}" 
                                    alt="{{ $item->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                >
                                <div class="absolute top-3 left-3">
                                    <span class="bg-white/90 backdrop-blur-sm text-indigo-700 text-[10px] font-bold px-2 py-1 rounded shadow-sm uppercase tracking-wide">
                                        {{ $item->category ?? 'News' }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-5 flex flex-col flex-grow">
                                <span class="text-xs text-slate-400 font-medium mb-2 flex items-center">
                                    <svg class="w-3.5 h-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                    {{ $item->published_at ? $item->published_at->format('d M Y') : $item->created_at->format('d M Y') }}
                                </span>
                                <h3 class="text-lg font-bold text-slate-900 mb-2 leading-snug group-hover:text-indigo-600 transition-colors line-clamp-2">
                                    <a href="{{ route('news.show', $item->slug) }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $item->title }}
                                    </a>
                                </h3>
                                <p class="text-slate-500 text-sm line-clamp-2 mt-auto">
                                    {{ $item->excerpt ?? Str::limit(strip_tags($item->content), 80) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 text-center py-10 text-slate-400">Belum ada berita.</div>
                    @endforelse
                </div>
                
                <div class="mt-6 sm:hidden text-center">
                     <a href="{{ route('news.index') }}" class="text-sm font-bold text-indigo-600 hover:underline">Lihat Semua Berita</a>
                </div>
            </div>

            <!-- RIGHT COLUMN: CSR ACTIVITIES -->
            <div class="lg:col-span-4 flex flex-col mt-12 lg:mt-0">
                <!-- CSR Header -->
                <div class="flex flex-col sm:flex-row justify-between items-end mb-10 border-b border-slate-200 pb-4">
                    <div>
                        <span class="text-teal-600 font-bold tracking-wider uppercase text-xs mb-2 block">Peduli Sesama</span>
                        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900">
                            Kegiatan <span class="text-transparent bg-clip-text bg-gradient-to-r from-teal-600 to-emerald-500">CSR</span>
                        </h2>
                    </div>
                </div>

                <!-- CSR Stack -->
                <div class="space-y-6 flex-grow">
                    @forelse($activities as $activity)
                    <!-- Compact Horizontal Card -->
                    <div class="group relative flex bg-white rounded-xl border border-slate-100 shadow-sm overflow-hidden hover:shadow-md transition-all duration-300">
                        <!-- Image Layout -->
                        <div class="w-1/3 min-w-[100px] relative overflow-hidden">
                            <img 
                                src="{{ $activity->image ? asset('storage/' . $activity->image) : 'https://placehold.co/400x400?text=CSR' }}" 
                                alt="{{ $activity->title }}" 
                                class="w-full h-full object-cover absolute inset-0 group-hover:scale-105 transition-transform duration-500"
                            >
                        </div>
                        <div class="p-4 w-2/3 flex flex-col justify-center">
                            <span class="text-[10px] font-bold text-teal-600 uppercase mb-1">
                                {{ \Carbon\Carbon::parse($activity->date ?? $activity->created_at)->format('d M Y') }}
                            </span>
                            <h4 class="text-sm font-bold text-slate-900 leading-tight mb-2 group-hover:text-teal-600 transition-colors line-clamp-2">
                                <a href="{{ route('news.show', $activity->slug) }}" class="focus:outline-none">
                                    <span class="absolute inset-0"></span>
                                    {{ $activity->title }}
                                </a>
                            </h4>
                            <div class="text-xs text-teal-600 font-semibold flex items-center mt-auto">
                                Baca 
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                            </div>
                        </div>
                    </div>
                    @empty
                     <div class="text-center py-10 text-slate-400 font-light italic">Belum ada kegiatan CSR.</div>
                    @endforelse
                </div>

                <!-- Footer CTA for CSR -->
                <div class="mt-8 pt-6 border-t border-slate-100">
                    <a href="{{ route('csr.index') }}" class="group flex items-center justify-between w-full p-4 rounded-xl bg-teal-50 hover:bg-teal-100 transition-colors">
                        <span class="font-bold text-teal-700 text-sm">Arsip Kegiatan Sosial</span>
                        <span class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-teal-600 shadow-sm group-hover:translate-x-1 transition-transform">
                             <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
