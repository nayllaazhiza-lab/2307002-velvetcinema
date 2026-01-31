<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CineTrack | Admin Movie Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #FDFCF0; }
        .sidebar-gradient { background: linear-gradient(180deg, #4a0000 0%, #2d0000 100%); }
    </style>
</head>
<body class="p-8">
    <div class="flex h-screen gap-8">
        <aside class="w-80 sidebar-gradient rounded-[3rem] p-10 text-[#F5F5DC] shadow-2xl">
            <h1 class="text-3xl font-bold mb-12 text-center tracking-widest uppercase">CineTrack</h1>
            <nav class="space-y-6">
                <a href="{{ route('admin.dashboard') }}" class="block p-4 rounded-2xl hover:bg-white/5 opacity-60 transition-all">
                    <i class="fas fa-home mr-3"></i> Dashboard
                </a>
                <a href="#" class="block p-4 rounded-2xl bg-white/10 text-white shadow-lg border border-white/20">
                    <i class="fas fa-film mr-3"></i> Manage Movies
                </a>
            </nav>
        </aside>

        <main class="flex-1 bg-white/60 backdrop-blur-sm border border-white rounded-[3rem] p-12 overflow-y-auto shadow-sm">
            <div class="flex justify-between items-center mb-12">
                <div>
                    <h2 class="text-4xl font-bold text-[#4a0000]">Movie List</h2>
                    <p class="text-gray-400 mt-2">Manage your cinema collection</p>
                </div>
                <a href="{{ route('admin.movies.create') }}" class="bg-[#800000] text-white px-8 py-4 rounded-2xl hover:bg-[#4a0000] transition-all shadow-xl font-bold">
                    <i class="fas fa-plus mr-2"></i> Add New Movie
                </a>
            </div>

            <div class="bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-sm">
                <table class="w-full text-left">
                    <thead class="bg-gray-50 text-[#800000] text-xs uppercase tracking-[0.2em] font-black">
                        <tr>
                            <th class="p-6">Movie Title</th>
                            <th class="p-6">Genre</th>
                            <th class="p-6">Rating</th>
                            <th class="p-6 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach($movies as $movie)
                        <tr class="border-b border-gray-50 hover:bg-[#FDFCF0] transition-all">
                            <td class="p-6 font-bold text-[#3d0000]">{{ $movie['title'] }}</td>
                            <td class="p-6 text-gray-500">{{ $movie['genre'] }}</td>
                            <td class="p-6">
                                <span class="bg-[#800000]/10 text-[#800000] px-4 py-2 rounded-full font-bold">⭐ {{ $movie['rating'] }}</span>
                            </td>
                            <td class="p-6 flex justify-center space-x-3 text-lg">
                                <button class="text-blue-400 hover:text-blue-600"><i class="fas fa-edit"></i></button>
                                <button class="text-red-400 hover:text-red-600"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>