<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Movies | VelvetCinema</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #FDFCF0; }
        .font-serif { font-family: 'Playfair Display', serif; }
        .sidebar-gradient { background: linear-gradient(180deg, #4a0000 0%, #2d0000 100%); }
    </style>
</head>
<body class="text-[#3d0000]">
    <div class="flex h-screen overflow-hidden p-4 gap-4">
        
        <aside class="w-80 sidebar-gradient rounded-[2.5rem] shadow-2xl flex flex-col p-8 text-[#F5F5DC]">
            <div class="mb-10 text-center">
                <h1 class="text-2xl font-serif font-bold tracking-[0.2em] uppercase text-white">Velvet</h1>
                <p class="text-[9px] tracking-[0.5em] opacity-50 uppercase text-white mt-1">Cinema Management</p>
            </div>
            <nav class="flex-1 space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-4 p-4 rounded-2xl text-white/60 hover:text-white hover:bg-white/5 transition-all">
                    <i class="fas fa-th-large"></i>
                    <span class="font-medium">Overview</span>
                </a>
                <a href="{{ route('admin.movies.index') }}" class="flex items-center space-x-4 bg-white/10 p-4 rounded-2xl border border-white/5 text-white shadow-lg">
                    <i class="fas fa-clapperboard"></i>
                    <span class="font-medium">Manage Movies</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 overflow-y-auto rounded-[2.5rem] bg-white/50 border border-white p-8">
            <header class="flex justify-between items-center mb-10">
                <div>
                    <h2 class="text-3xl font-serif font-bold text-[#4a0000]">Manage Movies</h2>
                    <p class="text-gray-400 text-xs mt-1">Organize your movie collection.</p>
                </div>
                <a href="{{ route('admin.movies.create') }}" class="bg-[#800000] text-white px-6 py-3 rounded-2xl font-bold text-sm hover:bg-[#4a0000] transition-all shadow-lg">
                    <i class="fas fa-plus mr-2"></i> Add New Movie
                </a>
            </header>

            <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-gray-100">
                <table class="w-full text-left">
                    <thead>
                        <tr class="text-[#800000] border-b border-gray-100 text-xs uppercase tracking-widest">
                            <th class="p-4">Title</th>
                            <th class="p-4">Genre</th>
                            <th class="p-4">Rating</th>
                            <th class="p-4 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        @foreach($movies as $movie)
                        <tr class="border-b border-gray-50 hover:bg-[#F5F5DC]/40 transition-all">
                            <td class="p-4 font-bold">{{ $movie['title'] }}</td>
                            <td class="p-4 text-gray-500">{{ $movie['genre'] }}</td>
                            <td class="p-4">
                                <span class="bg-[#800000]/10 text-[#800000] px-3 py-1 rounded-full font-bold text-xs">⭐ {{ $movie['rating'] }}</span>
                            </td>
                            <td class="p-4 flex justify-center space-x-2">
                                <button class="w-8 h-8 rounded-lg bg-blue-50 text-blue-600 hover:bg-blue-600 hover:text-white transition-all"><i class="fas fa-edit"></i></button>
                                <button class="w-8 h-8 rounded-lg bg-red-50 text-red-600 hover:bg-red-600 hover:text-white transition-all"><i class="fas fa-trash"></i></button>
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