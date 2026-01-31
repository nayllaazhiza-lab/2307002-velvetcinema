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
                <a href="#" class="flex items-center space-x-4 bg-white/10 p-4 rounded-2xl border border-white/20">
                    <i class="fas fa-chart-line"></i>
                    <span class="font-semibold">Statistics</span>
                </a>
                <a href="#" class="flex items-center space-x-4 p-4 rounded-2xl opacity-60 hover:opacity-100 hover:bg-white/5 transition-all">
                    <i class="fas fa-users"></i>
                    <span>Manage Users</span>
                </a>
                <a href="#" class="flex items-center space-x-4 p-4 rounded-2xl opacity-60 hover:opacity-100 hover:bg-white/5 transition-all">
                    <i class="fas fa-film"></i>
                    <span>Movie List</span>
                </a>
            </nav>

            <div class="mt-auto pt-6 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center space-x-2 p-4 bg-red-600/20 hover:bg-red-600 rounded-2xl transition-all">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="font-bold">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-10">
            <header class="mb-10">
                <h2 class="text-4xl font-serif font-bold text-[#800000]">Admin Dashboard</h2>
                <p class="text-gray-500 mt-1">Sistem Manajemen VelvetCinema v1.0</p>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border-l-8 border-[#800000]">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-sm font-bold uppercase tracking-wider">Total Movies</p>
                            <h3 class="text-3xl font-bold mt-1">{{ count($movies) }}</h3>
                        </div>
                        <i class="fas fa-video text-3xl text-[#800000]/20"></i>
                    </div>
                </div>

                <div class="bg-[#800000] p-8 rounded-[2.5rem] shadow-xl text-[#F5F5DC]">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="opacity-60 text-sm font-bold uppercase tracking-wider">Active Users</p>
                            <h3 class="text-3xl font-bold mt-1">1,204</h3>
                        </div>
                        <i class="fas fa-user-friends text-3xl opacity-20"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border-r-8 border-[#800000]">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-gray-400 text-sm font-bold uppercase tracking-wider">Watchlist Saved</p>
                            <h3 class="text-3xl font-bold mt-1">859</h3>
                        </div>
                        <i class="fas fa-heart text-3xl text-[#800000]/20"></i>
                    </div>
                </div>
            </div>

            <section class="bg-white rounded-[2.5rem] p-8 shadow-sm">
                <h3 class="text-xl font-bold mb-6 text-[#800000]">Recent Movies from TMDB</h3>
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-widest border-b border-gray-100">
                            <th class="pb-4">Movie</th>
                            <th class="pb-4">Release</th>
                            <th class="pb-4">Rating</th>
                            <th class="pb-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach(array_slice($movies, 0, 5) as $movie)
                        <tr class="border-b border-gray-50 group">
                            <td class="py-4 flex items-center space-x-4">
                                <img src="https://image.tmdb.org/t/p/w200/{{ $movie['poster_path'] }}" class="w-10 h-14 rounded-lg object-cover">
                                <span class="font-bold">{{ $movie['title'] }}</span>
                            </td>
                            <td class="py-4 text-gray-500">{{ $movie['release_date'] }}</td>
                            <td class="py-4 font-bold text-[#800000]">⭐ {{ $movie['vote_average'] }}</td>
                            <td class="py-4">
                                <button class="text-xs bg-[#F5F5DC] px-4 py-2 rounded-xl font-bold hover:bg-[#800000] hover:text-white transition-all">Details</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </section>
        </main>
    </div>

</body>
</html>