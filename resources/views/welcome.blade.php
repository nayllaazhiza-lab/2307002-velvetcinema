<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VelvetCinema | Experience Luxury</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .font-serif { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="bg-[#F5F5DC] overflow-hidden"> <nav class="absolute top-0 w-full p-8 flex justify-between items-center z-50">
        <h1 class="text-[#800000] text-3xl font-serif font-bold tracking-widest">VELVET<span class="text-[#3d0000]">CINEMA</span></h1>
        <div class="space-x-6">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-[#800000] font-semibold">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-[#800000] font-semibold hover:text-[#3d0000]">Log in</a>
                    <a href="{{ route('register') }}" class="bg-[#800000] text-[#F5F5DC] px-6 py-3 rounded-full font-semibold shadow-lg hover:bg-[#a52a2a] transition">Register Now</a>
                @endauth
            @endif
        </div>
    </nav>

    <main class="relative h-screen flex items-center justify-center overflow-hidden">
        <div class="absolute -top-24 -left-24 w-96 h-96 bg-[#800000]/10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-96 h-96 bg-[#800000]/10 rounded-full blur-3xl"></div>

        <div class="text-center z-10 px-4">
            <span class="text-[#800000] uppercase tracking-[0.3em] text-sm font-semibold mb-4 block">The Art of Cinema</span>
            <h2 class="text-[#3d0000] text-6xl md:text-8xl font-serif font-bold mb-8 leading-tight">
                Luxury Movies,<br><span class="text-[#800000]">Unmatched</span> Details.
            </h2>
            <p class="text-[#800000]/70 max-w-2xl mx-auto mb-10 text-lg leading-relaxed">
                Jelajahi dunia sinematik dengan data real-time dari seluruh penjuru dunia. 
                Didesain khusus untuk pecinta film yang menghargai estetika dan kenyamanan.
            </p>
            <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
                <a href="{{ route('register') }}" class="group relative bg-[#800000] text-[#F5F5DC] px-10 py-4 rounded-full text-lg font-bold shadow-2xl overflow-hidden transition-all">
                    <span class="relative z-10">Start Your Journey</span>
                    <div class="absolute inset-0 bg-white/10 transform translate-y-full group-hover:translate-y-0 transition-transform"></div>
                </a>
            </div>
        </div>

        <div class="hidden lg:block absolute right-10 bottom-10 w-48 h-72 bg-[#800000] rounded-2xl shadow-2xl rotate-12 opacity-20 border-4 border-[#F5F5DC]"></div>
        <div class="hidden lg:block absolute left-10 top-20 w-32 h-48 bg-[#800000] rounded-2xl shadow-2xl -rotate-12 opacity-10 border-4 border-[#F5F5DC]"></div>
    </main>

</body>
</html>