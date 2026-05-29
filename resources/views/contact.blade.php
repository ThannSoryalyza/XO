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

    <section class="max-w-6xl mx-auto px-6 py-12 md:py-20">
        <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-start">

            <!-- Left Side: Contact Information & Training Schedule -->
            <div class="w-full lg:flex-1 space-y-10">
                <div>
                    <h1 class="font-stadium text-5xl md:text-7xl tracking-tight uppercase leading-none">Contact Us</h1>
                    <p class="text-lg md:text-xl text-red-600 mt-4 font-medium italic">Have questions? We'd love to hear from you!</p>
                </div>

                <div class="space-y-8">
                    <div class="flex items-center gap-5 group">
                        <div class="w-14 h-14 bg-red-100 flex items-center justify-center text-2xl rounded-2xl text-red-600 transition-colors group-hover:bg-red-600 group-hover:text-white">📍</div>
                        <div>
                            <p class="font-bold uppercase text-[10px] text-red-600 tracking-[0.2em]">Address</p>
                            <p class="text-gray-800 font-bold text-lg">Veng Sreng, Phnom Penh</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-5 group">
                        <div class="w-14 h-14 bg-red-100 flex items-center justify-center text-2xl rounded-2xl text-red-600 transition-colors group-hover:bg-red-600 group-hover:text-white">✉️</div>
                        <div>
                            <p class="font-bold uppercase text-[10px] text-red-600 tracking-[0.2em]">Email</p>
                            <p class="text-gray-800 font-bold text-lg">xounited@gmail.com</p>
                        </div>
                    </div>
                </div>

                <div class="w-full bg-white p-8 rounded-3xl border-l-8 border-red-600 shadow-xl transition-all hover:shadow-2xl">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-3xl">🏃‍♂️</span>
                        <h3 class="font-stadium text-3xl uppercase italic tracking-wider text-gray-900">Training Session</h3>
                    </div>

                    <div class="space-y-4">
                        <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                            <span class="font-bold text-gray-500 text-xs uppercase tracking-widest">Tue - Sat</span>
                            <span class="text-sm md:text-base font-black text-gray-900">5:30 PM - 7:30 PM</span>
                        </div>

                        <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                            <span class="font-bold text-gray-500 text-xs uppercase tracking-widest">Friday</span>
                            <span class="text-sm md:text-base font-black text-gray-900">3:00 PM - 5:00 PM</span>
                        </div>

                        <div class="flex justify-between items-center bg-red-600 p-4 rounded-xl text-white shadow-lg shadow-red-200">
                            <span class="font-bold text-xs uppercase tracking-widest">Sunday</span>
                            <span class="text-sm md:text-base font-black italic">9:00 AM - 11:00 AM</span>
                        </div>
                    </div>

                    <p class="mt-6 text-[10px] text-gray-400 font-bold italic text-center tracking-wider leading-tight">
                        * Schedule subject to change based on Match Fixtures
                    </p>
                </div>
            </div>

            <!-- Right Side: The Secure Form Box -->
            <div class="w-full lg:flex-1 bg-white p-8 md:p-12 shadow-2xl border-t-8 border-red-600 rounded-b-3xl">

                <!-- Success Notification Banner -->
                @if(session('success'))
                    <div class="mb-8 p-4 bg-red-100 border-l-4 border-red-500 text-red-800 font-bold animate-bounce flex items-center gap-3">
                        <span class="text-xl">✅</span> {{ session('success') }}
                    </div>
                @endif

                <!-- Contact Form Wrapper -->
                <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Full Name Input -->
                    <div class="group">
                        <label class="block font-stadium text-xl mb-2 group-focus-within:text-red-600 transition-colors uppercase tracking-wide">Full Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" required placeholder="Enter your name"
                            class="w-full p-4 bg-gray-50 border-2 border-gray-100 focus:border-red-600 focus:bg-white outline-none transition-all rounded-lg">
                        @error('name') <p class="text-red-600 text-[10px] mt-2 uppercase font-bold tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="group">
                        <label class="block font-stadium text-xl mb-2 group-focus-within:text-red-600 transition-colors uppercase tracking-wide">Email Address</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@example.com"
                            class="w-full p-4 bg-gray-50 border-2 border-gray-100 focus:border-red-600 focus:bg-white outline-none transition-all rounded-lg">
                        @error('email') <p class="text-red-600 text-[10px] mt-2 uppercase font-bold tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <!-- Subject Selector -->
                    <div>
                        <label class="block font-stadium text-xl mb-2 uppercase tracking-wide">Subject (Position)</label>
                        <div class="relative">
                            <select name="subject" required class="w-full p-4 bg-gray-50 border-2 border-gray-100 focus:border-red-600 outline-none rounded-lg appearance-none cursor-pointer">
                                <option value="" disabled selected>-- Select One --</option>
                                <option value="Player Inquiry" {{ old('subject') == 'Player Inquiry' ? 'selected' : '' }}>Player</option>
                                <option value="Coach Inquiry" {{ old('subject') == 'Coach Inquiry' ? 'selected' : '' }}>Coach</option>
                                <option value="Sponsorship" {{ old('subject') == 'Sponsorship' ? 'selected' : '' }}>Sponsor</option>
                                <option value="General Question" {{ old('subject') == 'General Question' ? 'selected' : '' }}>Other</option>
                            </select>
                            <div class="absolute right-4 top-1/2 -translate-y-1/2 pointer-events-none text-gray-400 font-bold">▼</div>
                        </div>
                    </div>

                    <!-- Message TextArea -->
                    <div class="group">
                        <label class="block font-stadium text-xl mb-2 group-focus-within:text-red-600 transition-colors uppercase tracking-wide">Your Message</label>
                        <textarea name="message" rows="5" required placeholder="How can we help you?"
                            class="w-full p-4 bg-gray-50 border-2 border-gray-100 focus:border-red-600 focus:bg-white outline-none transition-all rounded-lg">{{ old('message') }}</textarea>
                        @error('message') <p class="text-red-600 text-[10px] mt-2 uppercase font-bold tracking-widest">{{ $message }}</p> @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full py-4 bg-red-600 text-white font-stadium text-2xl tracking-widest hover:bg-black transition-all active:scale-95 shadow-xl shadow-red-600/20 rounded-lg">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </section>

</body>
</html>
