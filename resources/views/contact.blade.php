<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Instrument+Sans:wght@400;700&display=swap">
    <title>Contact Us | XO United</title>
    <style>
        body { font-family: 'Instrument Sans', sans-serif; }
        .font-stadium { font-family: 'Bebas Neue', cursive; }
    </style>
</head>
<body class="bg-gray-50 text-gray-900">
<x-header />
    <section class="max-w-5xl mx-auto px-6 py-16">
        <div class="flex flex-col lg:flex-row gap-16">
            <div class="flex-1">
                <h1 class="font-stadium text-5xl md:text-6xl tracking-tight">Contact Us</h1>
                <p class="text-lg md:text-xl text-red-600 mt-4">Have questions? We'd love to hear from you!</p>

                <div class="space-y-6 mt-8">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-100 flex items-center justify-center text-red-600 rounded-lg">📍</div>
                        <div>
                            <p class="font-bold uppercase text-xs text-red-600">Address</p>
                            <p class="text-gray-700">Veng Sreng, Phnom Penh</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-red-100 flex items-center justify-center text-red-600 rounded-lg">✉️</div>
                        <div>
                            <p class="font-bold uppercase text-xs text-red-600">Email</p>
                            <p class="text-gray-700">xounited@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-white p-8 md:p-12 shadow-2xl border-t-8 border-red-600">
                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 font-bold">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ url('/contact') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block font-stadium text-xl mb-2">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="John Doe"
                            class="w-full p-4 bg-gray-50 border-2 focus:border-red-600 outline-none @error('name') border-red-500 @enderror">
                    </div>

                    <div>
                        <label class="block font-stadium text-xl mb-2">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@example.com"
                            class="w-full p-4 bg-gray-50 border-2 focus:border-red-600 outline-none @error('email') border-red-500 @enderror">
                    </div>

                    <div>
                        <label class="block font-stadium text-xl mb-2">Position / Role</label>
                        <select name="role" required class="w-full p-4 bg-gray-50 border-2 border-gray-100 focus:border-red-600 outline-none">
                            <option value="" disabled selected>-- Select One --</option>
                            <option value="Player" {{ old('role') == 'Player' ? 'selected' : '' }}>Player</option>
                            <option value="Coach" {{ old('role') == 'Coach' ? 'selected' : '' }}>Coach</option>
                            <option value="Scout" {{ old('role') == 'Scout' ? 'selected' : '' }}>Scout</option>
                            <option value="Sponsor" {{ old('role') == 'Sponsor' ? 'selected' : '' }}>Sponsor</option>
                        </select>
                    </div>

                    <div>
                        <label class="block font-stadium text-xl mb-2">Your Message</label>
                        <textarea name="message" rows="4" required placeholder="Tell us how we can help..."
                            class="w-full p-4 bg-gray-50 border-2 focus:border-red-600 outline-none @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full py-5 bg-red-600 text-white font-stadium text-2xl tracking-widest hover:bg-black transition-all">
                        SEND MESSAGE
                    </button>
                </form>
            </div>
        </div>
    </section>

    <footer class="py-8 bg-red-600 text-center border-t border-gray-100 mt-12">
        <p class="font-stadium text-xl text-white">Copyright &copy; 2026 XO United</p>
    </footer>
</body>
</html>
