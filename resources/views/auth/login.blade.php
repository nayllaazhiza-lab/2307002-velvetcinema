<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-[#3d0000] relative overflow-hidden font-['Poppins']">
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] bg-[#800000] rounded-full blur-[120px] opacity-50"></div>
        <div class="absolute bottom-[-10%] left-[-10%] w-[40%] h-[40%] bg-[#800000] rounded-full blur-[120px] opacity-50"></div>

        <div class="z-10 w-full max-w-md px-6">
            <div class="text-center mb-10">
                <h1 class="text-[#F5F5DC] text-4xl font-serif font-bold tracking-[0.3em] uppercase">Velvet</h1>
                <p class="text-[#F5F5DC]/50 tracking-[0.5em] text-xs mt-2 uppercase">Member Access</p>
            </div>

            <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-[3rem] p-10 shadow-2xl">
                <div class="mb-8 text-center">
                    <h2 class="text-[#F5F5DC] text-2xl font-light tracking-wide">Welcome Back</h2>
                    <div class="w-12 h-[1px] bg-[#F5F5DC]/30 mx-auto mt-4"></div>
                </div>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label class="block text-[#F5F5DC]/60 text-xs mb-2 ml-4 uppercase tracking-widest">Email Address</label>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-[#F5F5DC] focus:border-[#F5F5DC]/50 focus:ring-0 transition-all placeholder:text-white/20"
                            placeholder="your@email.com">
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs" />
                    </div>

                    <div>
                        <label class="block text-[#F5F5DC]/60 text-xs mb-2 ml-4 uppercase tracking-widest">Password</label>
                        <input id="password" type="password" name="password" required 
                            class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-[#F5F5DC] focus:border-[#F5F5DC]/50 focus:ring-0 transition-all"
                            placeholder="••••••••">
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs" />
                    </div>

                    <div class="flex items-center justify-between px-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="remember" class="rounded border-white/10 bg-white/5 text-[#800000] focus:ring-0">
                            <span class="ml-2 text-xs text-[#F5F5DC]/60 uppercase tracking-tighter">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-xs text-[#F5F5DC]/40 hover:text-[#F5F5DC] transition-colors">Forgot?</a>
                        @endif
                    </div>

                    <div class="pt-4 text-center">
                        <button type="submit" class="w-full bg-[#F5F5DC] text-[#3d0000] py-4 rounded-2xl font-bold tracking-widest hover:bg-white hover:scale-[1.02] active:scale-[0.98] transition-all shadow-xl shadow-[#000]/20">
                            LOG IN
                        </button>
                        
                        <p class="mt-8 text-[#F5F5DC]/40 text-sm">
                            New here? 
                            <a href="{{ route('register') }}" class="text-[#F5F5DC] hover:underline decoration-[#F5F5DC]/30 underline-offset-4 ml-1">Create Account</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>