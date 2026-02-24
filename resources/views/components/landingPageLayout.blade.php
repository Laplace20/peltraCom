<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="icon" href="{{ asset('images/logoPPeltra.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <style> body { font-family: 'Inter', sans-serif; } </style>
    <script src="https://cdn.tailwindcss.com?plugins=typography"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <style>
        [x-cloak] { display: none !important; }
        .animate-on-scroll { opacity: 0; transform: translateY(20px); transition: all 0.8s ease-out; }
        .is-visible { opacity: 1; transform: translateY(0); }

        /* Rich Text Content Styling */
        .prose blockquote {
            font-style: italic;
            border-left-width: 4px;
            --tw-border-opacity: 1;
            border-color: rgb(99 102 241 / var(--tw-border-opacity)); /* indigo-500 */
            background-color: rgb(249 250 251 / 1); /* gray-50 */
            padding: 1rem;
            border-radius: 0 0.375rem 0.375rem 0;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .prose ul {
            list-style-type: disc !important;
            padding-left: 1.625rem !important;
        }
        .prose ol {
            list-style-type: decimal !important;
            padding-left: 1.625rem !important;
        }
        .prose li {
            margin-top: 0.25rem;
            margin-bottom: 0.25rem;
        }
        .prose strong {
            color: inherit;
            font-weight: 700;
        }
        .prose a {
            color: rgb(79 70 229); /* indigo-600 */
            text-decoration: underline;
            font-weight: 500;
        }
    </style>
</head>
<body x-data="{ scrolled: false }" @scroll.window="scrolled = (window.pageYOffset > 20)">
    
    <x-navbar></x-navbar>
    
    @if(isset($header))
        {{ $header }}
    @else
        <x-header></x-header>
    @endif

    <main class="w-full">
        {{$slot}}
    </main>
    <x-footer></x-footer>
</body>
</html>
