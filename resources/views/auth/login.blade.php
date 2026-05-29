<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-950 flex items-center justify-center min-h-screen p-4 font-sans antialiased">

    <div class="w-full max-w-md bg-slate-900 rounded-3xl p-8 shadow-2xl border border-slate-800">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-black text-red-500 uppercase tracking-widest">Admin Panel</h1>
            <p class="text-slate-400 text-sm mt-2">Please sign in to access your dashboard</p>
        </div>

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6 text-sm font-bold">
                @foreach ($errors->all() as $error)
                    <p class="flex items-center"><span class="mr-2">•</span> {{ $error }}</p>
                @endforeach
            </div>
        @endif

        <!-- Login Form Submit to /login route -->
        <form action="{{ url('/login') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Email Field -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Email Address</label>
                <input type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-slate-200 outline-none focus:border-red-500 transition">
            </div>

            <!-- Password Field -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-slate-400 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full bg-slate-950 border border-slate-800 rounded-xl p-3 text-slate-200 outline-none focus:border-red-500 transition">
            </div>

            <!-- Remember Me Feature -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-slate-400 cursor-pointer select-none">
                    <input type="checkbox" name="remember" class="accent-red-500 mr-2 rounded">
                    Remember me
                </label>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full bg-red-600 hover:bg-red-700 text-white font-black py-3.5 px-4 rounded-xl shadow-lg shadow-red-600/20 uppercase tracking-wider transition-colors">
                Sign In
            </button>
        </form>
    </div>

</body>
</html>
