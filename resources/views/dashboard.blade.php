<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VelvetCinema | Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #F5F5DC; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #80000022; border-radius: 10px; }
    </style>
</head>
<body class="text-[#3d0000]">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-72 bg-[#800000] m-4 rounded-[3rem] shadow-2xl flex flex-col p-8 text-[#F5F5DC]">
            <div class="mb-12">
                <h1 class="text-2xl font-serif font-bold tracking-widest uppercase">Velvet</h1>
                <p class="text-[10px] tracking-[0.4em] opacity-50 uppercase">Cinema</p>
            </div>

            <nav class="flex-1 space-y-4">
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-4 p-4 rounded-2xl transition-all border {{ request()->routeIs('dashboard') ? 'bg-white/10 border-white/10 shadow-lg' : 'border-transparent opacity-60 hover:opacity-100 hover:bg-white/5' }}">
                    <i class="fas fa-home"></i>
                    <span class="font-semibold tracking-wide">Discovery</span>
                </a>

                <a href="{{ route('trending') }}" 
                   class="flex items-center space-x-4 p-4 rounded-2xl transition-all border {{ request()->routeIs('trending') ? 'bg-white/10 border-white/10 shadow-lg' : 'border-transparent opacity-60 hover:opacity-100 hover:bg-white/5' }}">
                    <i class="fas fa-fire"></i>
                    <span class="font-semibold tracking-wide">Trending</span>
                </a>

                <a href="{{ route('watchlist') }}" 
                   class="flex items-center space-x-4 p-4 rounded-2xl transition-all border {{ request()->routeIs('watchlist') ? 'bg-white/10 border-white/10 shadow-lg' : 'border-transparent opacity-60 hover:opacity-100 hover:bg-white/5' }}">
                    <i class="fas fa-heart"></i>
                    <span class="font-semibold tracking-wide">Watchlist</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-white/10 flex items-center justify-between">
                <div class="overflow-hidden">
                    <p class="text-[10px] opacity-50 uppercase tracking-tighter">Account</p>
                    <p class="font-bold text-sm truncate w-32">{{ Auth::user()->name }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-3 bg-white/10 rounded-xl hover:bg-red-600 hover:text-white transition-all shadow-inner">
                        <i class="fas fa-sign-out-alt text-xs"></i>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-10 custom-scrollbar">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h2 class="text-4xl font-serif font-bold text-[#800000]">
                        @php
                            $hour = date('H');
                            $greeting = ($hour < 12) ? 'Good Morning' : (($hour < 17) ? 'Good Afternoon' : 'Good Evening');
                        @endphp
                        {{ $greeting }}, {{ explode(' ', Auth::user()->name)[0] }}!
                    </h2>
                    <p class="text-gray-500 text-sm mt-1 italic">Ready for some cinematic magic today?</p>
                </div>
                
                <div class="relative w-96 group">
                    <i class="fas fa-search absolute left-5 top-1/2 -translate-y-1/2 text-gray-300 group-focus-within:text-[#800000] transition-colors"></i>
                    <input type="text" placeholder="Search movies..." 
                           class="w-full bg-white border-none rounded-2xl py-4 pl-14 pr-6 shadow-sm focus:ring-2 focus:ring-[#800000]/10 transition-all placeholder:text-gray-300">
                </div>
            </header>

            <section>
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h3 class="text-xl font-bold uppercase tracking-[0.2em] text-[#800000]/30">
                            @if(request()->routeIs('watchlist')) My Watchlist @elseif(request()->routeIs('trending')) Trending Now @else Featured Discovery @endif
                        </h3>
                        <div class="w-12 h-1 bg-[#800000]/10 mt-2 rounded-full"></div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                    @forelse($movies as $movie)
                    <div class="group bg-white rounded-[2.5rem] overflow-hidden shadow-[0_15px_40px_-15px_rgba(128,0,0,0.15)] transition-all hover:-translate-y-3">
                        <div class="relative h-80 overflow-hidden">
                            <img src="https://image.tmdb.org/t/p/w500/{{ $movie['poster_path'] }}" 
                                 alt="{{ $movie['title'] }}" 
                                 class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            
                            <form action="{{ route('watchlist.add') }}" method="POST" class="absolute top-5 left-5 z-20">
                                @csrf
                                <input type="hidden" name="movie_id" value="{{ $movie['id'] }}">
                                <input type="hidden" name="title" value="{{ $movie['title'] }}">
                                <input type="hidden" name="poster_path" value="{{ $movie['poster_path'] }}">
                                <button type="submit" class="bg-white/90 backdrop-blur p-3 rounded-2xl shadow-sm hover:text-red-600 transition-all active:scale-90 shadow-xl border border-white">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </form>

                            <div class="absolute inset-0 bg-gradient-to-t from-[#3d0000] via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-end p-6">
                                <button class="w-full bg-[#F5F5DC] text-[#3d0000] py-3 rounded-2xl font-bold text-xs tracking-widest uppercase shadow-xl hover:bg-white transition-colors">
                                    Quick View
                                </button>
                            </div>
                            
                            <div class="absolute top-5 right-5 bg-white/90 backdrop-blur px-3 py-1.5 rounded-2xl shadow-sm border border-white">
                                <span class="text-[#800000] font-bold text-[10px] tracking-tighter">
                                    <i class="fas fa-star mr-1"></i>{{ is_numeric($movie['vote_average']) ? number_format($movie['vote_average'], 1) : $movie['vote_average'] }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h4 class="font-bold text-[#3d0000] truncate text-lg mb-1">{{ $movie['title'] }}</h4>
                            <div class="flex items-center text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                <span>{{ $movie['release_date'] !== 'Saved' ? \Carbon\Carbon::parse($movie['release_date'])->format('Y') : 'Watchlist' }}</span>
                                <span class="mx-2">•</span>
                                <span class="text-[#800000]/50">Cinema</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full py-24 text-center">
                        <div class="w-20 h-20 bg-[#800000]/5 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-heart text-[#800000]/20 text-3xl"></i>
                        </div>
                        <p class="text-gray-400 font-serif italic text-lg">Your watchlist is empty. Start exploring!</p>
                    </div>
                    @endforelse
                </div>
            </section>
        </main>
    </div>
</body>
</html>