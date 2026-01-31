<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VelvetCinema | Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #FDFCF0; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .glass { background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); }
        .sidebar-gradient { background: linear-gradient(180deg, #4a0000 0%, #2d0000 100%); }
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #800000; border-radius: 10px; }
    </style>
</head>
<body class="text-[#3d0000]">
    <div class="flex h-screen overflow-hidden p-4 gap-4">
        
        <aside class="w-80 sidebar-gradient rounded-[2.5rem] shadow-2xl flex flex-col p-8 text-[#F5F5DC]">
            <div class="mb-10 text-center">
                <div class="inline-block p-3 bg-white/10 rounded-2xl mb-4">
                    <i class="fas fa-film text-3xl text-white"></i>
                </div>
                <h1 class="text-2xl font-serif font-bold tracking-[0.2em] uppercase text-white">Velvet</h1>
                <p class="text-[9px] tracking-[0.5em] opacity-50 uppercase text-white mt-1">Cinema Management</p>
            </div>

            <nav class="flex-1 space-y-2">
                <p class="text-[10px] font-bold opacity-40 uppercase tracking-widest mb-4">Main Menu</p>
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-4 bg-white/10 p-4 rounded-2xl border border-white/5 text-white group hover:bg-white/20 transition-all">
                    <i class="fas fa-th-large group-hover:scale-110 transition-transform"></i>
                    <span class="font-medium">Overview</span>
                </a>
                <a href="{{ route('admin.movies.index') }}" class="flex items-center space-x-4 p-4 rounded-2xl text-white/60 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-clapperboard"></i>
                    <span class="font-medium">Manage Movies</span>
                </a>
                <a href="#" class="flex items-center space-x-4 p-4 rounded-2xl text-white/60 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-users"></i>
                    <span class="font-medium">User Database</span>
                </a>
            </nav>

            <div class="mt-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-3 p-4 bg-white/5 hover:bg-red-600/40 rounded-2xl border border-white/10 transition-all group">
                        <i class="fas fa-sign-out-alt group-hover:translate-x-1 transition-transform"></i>
                        <span class="font-bold uppercase text-xs tracking-widest">Sign Out</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto rounded-[2.5rem] bg-white/50 border border-white p-8">
            
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h2 class="text-3xl font-serif font-bold text-[#4a0000]">Dashboard Hub</h2>
                    <p class="text-gray-400 text-xs mt-1">Welcome back, <span class="text-[#800000] font-semibold">Chief Nay</span>!</p>
                </div>
                
                <div class="flex items-center space-x-6">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" placeholder="Search movies..." class="pl-12 pr-6 py-3 bg-white border border-gray-100 rounded-2xl shadow-sm focus:outline-none focus:ring-2 focus:ring-[#800000]/20 w-64 text-sm">
                    </div>
                    <div class="w-12 h-12 rounded-2xl bg-[#4a0000] flex items-center justify-center shadow-lg border-2 border-white">
                        <span class="text-white font-bold">N</span>
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                <div class="bg-white p-6 rounded-[2rem] shadow-sm flex items-center space-x-6 border border-gray-50">
                    <div class="w-14 h-14 rounded-2xl bg-[#F5F5DC] flex items-center justify-center text-[#800000]">
                        <i class="fas fa-video text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Total Movies</p>
                        <h3 class="text-2xl font-bold text-[#3d0000]">{{ count($movies) }}</h3>
                    </div>
                </div>
                
                <div class="bg-[#800000] p-6 rounded-[2rem] shadow-xl flex items-center space-x-6 text-white relative overflow-hidden">
                    <div class="absolute -right-4 -bottom-4 opacity-10">
                        <i class="fas fa-user-shield text-8xl"></i>
                    </div>
                    <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center">
                        <i class="fas fa-user-check text-xl"></i>
                    </div>
                    <div class="relative">
                        <p class="opacity-60 text-[10px] font-bold uppercase tracking-widest">Admin Status</p>
                        <h3 class="text-2xl font-bold uppercase tracking-tighter italic">Authorized</h3>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-[2rem] shadow-sm flex items-center space-x-6 border border-gray-50">
                    <div class="w-14 h-14 rounded-2xl bg-[#F5F5DC] flex items-center justify-center text-[#800000]">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">Active Users</p>
                        <h3 class="text-2xl font-bold text-[#3d0000]">128</h3>
                    </div>
                </div>
            </div>

            <section class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-lg font-bold text-[#4a0000] flex items-center">
                        <span class="w-2 h-6 bg-[#800000] rounded-full mr-3"></span>
                        Trending Watchlist
                    </h3>
                    <button class="text-xs font-bold text-[#800000] hover:underline uppercase tracking-widest">View All</button>
                </div>
                
                <div class="grid grid-cols-1 gap-4">
                    @foreach(array_slice($movies, 0, 5) as $movie)
                    <div class="group flex items-center justify-between p-4 bg-gray-50/50 rounded-3xl hover:bg-[#F5F5DC]/40 hover:shadow-md transition-all border border-transparent hover:border-[#800000]/10">
                        <div class="flex items-center space-x-6">
                            <div class="relative overflow-hidden rounded-2xl shadow-md w-14 h-20">
                                <img src="https://image.tmdb.org/t/p/w200/{{ $movie['poster_path'] }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div>
                                <h4 class="font-bold text-[#3d0000] group-hover:text-[#800000] transition-colors">{{ $movie['title'] }}</h4>
                                <p class="text-[10px] text-gray-400 uppercase tracking-widest mt-1">Release: {{ $movie['release_date'] }}</p>
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="text-right">
                                <span class="block text-sm font-bold text-[#800000]">⭐ {{ $movie['vote_average'] }}</span>
                                <span class="text-[9px] text-gray-400 uppercase tracking-tighter">Rating Score</span>
                            </div>
                            <button class="w-10 h-10 rounded-xl bg-white shadow-sm flex items-center justify-center text-[#800000] hover:bg-[#800000] hover:text-white transition-all">
                                <i class="fas fa-ellipsis-v text-xs"></i>
                            </button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
        </main>
    </div>
</body>
</html>