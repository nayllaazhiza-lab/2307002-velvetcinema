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
        body { font-family: 'Poppins', sans-serif; background-color: #F5F5DC; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #80000022; border-radius: 10px; }
    </style>
</head>
<body class="text-[#3d0000]">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-72 bg-[#4a0000] m-4 rounded-[3rem] shadow-2xl flex flex-col p-8 text-[#F5F5DC]">
            <div class="mb-12">
                <h1 class="text-2xl font-serif font-bold tracking-widest uppercase text-white">Velvet</h1>
                <p class="text-[10px] tracking-[0.4em] opacity-50 uppercase text-white">Admin Central</p>
            </div>

            <nav class="flex-1 space-y-4">
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-4 bg-white/10 p-4 rounded-2xl border border-white/20 shadow-lg">
                    <i class="fas fa-chart-line text-white"></i>
                    <span class="font-semibold text-white">Dashboard</span>
                </a>
                <a href="#" class="flex items-center space-x-4 p-4 rounded-2xl opacity-60 hover:opacity-100 hover:bg-white/5 transition-all">
                    <i class="fas fa-users"></i>
                    <span>Manage Users</span>
                </a>
                <a href="#" class="flex items-center space-x-4 p-4 rounded-2xl opacity-60 hover:opacity-100 hover:bg-white/5 transition-all">
                    <i class="fas fa-film"></i>
                    <span>All Movies</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-white/10 flex flex-col space-y-4">
                <div class="px-2">
                    <p class="text-[10px] opacity-50 uppercase tracking-widest">Logged as Admin</p>
                    <p class="font-bold text-sm truncate">{{ Auth::user()->name }}</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 p-4 bg-red-600/20 hover:bg-red-600 rounded-2xl transition-all group">
                        <i class="fas fa-sign-out-alt group-hover:rotate-12 transition-transform"></i>
                        <span class="font-bold">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-10 custom-scrollbar">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h2 class="text-4xl font-serif font-bold text-[#800000]">System Statistics</h2>
                    <p class="text-gray-500 mt-1 italic">Welcome back, Chief! Here's what's happening.</p>
                </div>
                
                <div class="bg-white px-6 py-3 rounded-2xl shadow-sm border border-[#800000]/5 flex items-center space-x-3">
                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-xs font-bold uppercase tracking-widest text-[#800000]">System Online</span>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border-l-8 border-[#800000] hover:shadow-xl transition-shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Movies Database</p>
                            <h3 class="text-3xl font-bold mt-1 text-[#3d0000]">{{ count($movies) }}</h3>
                        </div>
                        <div class="w-12 h-12 bg-[#800000]/5 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-video text-xl text-[#800000]"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-[#800000] p-8 rounded-[2.5rem] shadow-2xl text-[#F5F5DC] transform hover:scale-105 transition-transform">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="opacity-60 text-xs font-bold uppercase tracking-wider">Registered Users</p>
                            <h3 class="text-3xl font-bold mt-1">1,402</h3>
                        </div>
                        <div class="w-12 h-12 bg-white/10 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border-r-8 border-[#800000] hover:shadow-xl transition-shadow">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Watchlist Activity</p>
                            <h3 class="text-3xl font-bold mt-1 text-[#3d0000]">4,289</h3>
                        </div>
                        <div class="w-12 h-12 bg-[#800000]/5 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-heart text-xl text-[#800000]"></i>
                        </div>
                    </div>
                </div>
            </div>

            <section class="bg-white rounded-[3rem] p-10 shadow-sm border border-[#800000]/5">
                <div class="flex justify-between items-center mb-8">
                    <h3 class="text-xl font-bold text-[#800000] flex items-center">
                        <i class="fas fa-fire-alt mr-3 text-orange-500"></i> Trending Movies Monitor
                    </h3>
                    <span class="text-[10px] bg-[#F5F5DC] px-4 py-2 rounded-full font-bold uppercase tracking-widest">Live API Data</span>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-gray-400 text-[10px] uppercase tracking-[0.2em] border-b border-gray-100">
                                <th class="pb-6">Movie Poster & Title</th>
                                <th class="pb-6">Release Date</th>
                                <th class="pb-6 text-center">Popularity</th>
                                <th class="pb-6 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach(array_slice($movies, 0, 5) as $movie)
                            <tr class="border-b border-gray-50 group hover:bg-[#F5F5DC]/30 transition-colors">
                                <td class="py-5 flex items-center space-x-4">
                                    <div class="relative w-12 h-16 rounded-xl overflow-hidden shadow-lg">
                                        <img src="https://image.tmdb.org/t/p/w200/{{ $movie['poster_path'] }}" class="w-full h-full object-cover">
                                    </div>
                                    <span class="font-bold text-[#3d0000]">{{ $movie['title'] }}</span>
                                </td>
                                <td class="py-5 text-gray-400 font-medium italic">
                                    {{ \Carbon\Carbon::parse($movie['release_date'])->format('d M Y') }}
                                </td>
                                <td class="py-5 text-center">
                                    <span class="bg-[#800000]/10 text-[#800000] px-3 py-1 rounded-full font-bold text-[10px]">
                                        ⭐ {{ number_format($movie['vote_average'], 1) }}
                                    </span>
                                </td>
                                <td class="py-5 text-right">
                                    <button class="text-[10px] bg-[#800000] text-white px-5 py-2.5 rounded-xl font-bold hover:bg-[#3d0000] transition-all shadow-lg shadow-[#800000]/20">
                                        MANAGE
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>

</body>
</html>