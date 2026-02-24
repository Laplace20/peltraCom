<x-landingPageLayout>
    <x-slot:title>Corporate Social Responsibility - Peltra</x-slot>
    <x-slot:header></x-slot:header>

    <div class="relative py-24 bg-gray-50 overflow-hidden min-h-screen">
        <!-- Decoration: Blob Gradients -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-[600px] h-[600px] bg-teal-50 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-[600px] h-[600px] bg-emerald-50 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- PAGE HEADER -->
            <div 
                x-data="{ shown: false }"
                x-intersect.threshold.20="shown = true"
                :class="shown ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10'"
                class="text-center mb-20 transition-all duration-1000 ease-out opacity-0 translate-y-10"
            >
                <div class="inline-flex items-center justify-center p-2 bg-teal-50 rounded-full mb-4">
                    <span class="px-4 py-1 text-teal-700 text-xs font-bold uppercase tracking-widest">Tanggung Jawab Sosial</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-6 text-gray-900">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-teal-600 to-emerald-500">
                        CSR Activities
                    </span>
                </h1>
                <p class="mt-4 max-w-2xl mx-auto text-xl text-gray-500">
                    Wujud kepedulian kami terhadap masyarakat dan lingkungan.
                </p>
                <div class="w-24 h-1.5 bg-gradient-to-r from-teal-500 to-emerald-400 mx-auto rounded-full mt-6"></div>
            </div>

            <!-- CSR Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($activities as $activity)
                <div 
                    class="group bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 border border-gray-100 flex flex-col h-full"
                >
                    <!-- Image -->
                    <div class="relative h-64 overflow-hidden">
                        @if($activity->image)
                            <img src="{{ Storage::url($activity->image) }}" alt="{{ $activity->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center text-gray-400">
                                <flux:icon name="photo" class="w-12 h-12" />
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <div class="absolute bottom-4 left-4 text-white opacity-0 group-hover:opacity-100 transition-opacity duration-300 translate-y-4 group-hover:translate-y-0">
                            <span class="bg-teal-600 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                                {{ \Carbon\Carbon::parse($activity->date ?? $activity->created_at)->format('d M Y') }}
                            </span>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-8 flex flex-col flex-grow">
                        <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-teal-600 transition-colors">
                            {{ $activity->title }}
                        </h3>
                        <div class="text-gray-600 mb-6 flex-grow line-clamp-3 prose prose-teal">
                            {!! Str::limit(strip_tags($activity->content), 150) !!}
                        </div>
                        <a href="{{ route('news.show', $activity->slug) }}" class="inline-flex items-center text-teal-600 font-semibold hover:text-teal-700 transition-colors mt-auto group/link">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2 transform group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">Belum ada kegiatan CSR yang ditambahkan.</p>
                </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $activities->links() }}
            </div>
            
        </div>
    </div>
</x-landingPageLayout>
