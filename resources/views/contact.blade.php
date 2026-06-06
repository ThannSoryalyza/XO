@extends('layouts.public')

@section('title', 'Contact Us | XO United')

@section('content')
<section class="contact-page">
    {{-- Page header --}}
    <div class="contact-hero">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <img src="{{ asset('img/XO.png') }}" alt="XO United" class="contact-hero-logo">
            <p class="xo-eyebrow contact-hero-eyebrow mb-2">Get in Touch</p>
            <h1 class="font-stadium contact-hero-title">CONTACT US</h1>
            <p class="contact-hero-subtitle">Have questions about joining, training, or partnering with XO United? Send us a message.</p>
        </div>
    </div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-8 lg:gap-10">

            {{-- Left column --}}
            <div class="lg:col-span-2 space-y-5">
                <div class="contact-info-card">
                    <div class="contact-info-icon">📍</div>
                    <div>
                        <p class="contact-info-label">Address</p>
                        <p class="contact-info-value">Phum Trapang Thloeng I, Phnom Penh</p>
                    </div>
                </div>

                <div class="contact-info-card">
                    <div class="contact-info-icon">✉️</div>
                    <div>
                        <p class="contact-info-label">Email</p>
                        <a href="mailto:xounited@gmail.com" class="contact-info-value contact-info-link">xounited@gmail.com</a>
                    </div>
                </div>

                <div class="contact-training-card">
                    <div class="contact-training-header">
                        <span class="text-2xl">🏃‍♂️</span>
                        <h3 class="font-stadium text-2xl uppercase">Training Sessions</h3>
                    </div>
                    <ul class="contact-training-list">
                        <li class="contact-training-item">
                            <span class="contact-training-day">Tue – Sat</span>
                            <span class="contact-training-time">5:30 PM – 7:30 PM</span>
                        </li>
                        <li class="contact-training-item">
                            <span class="contact-training-day">Friday</span>
                            <span class="contact-training-time">3:00 PM – 5:00 PM</span>
                        </li>
                        <li class="contact-training-item contact-training-highlight">
                            <span class="contact-training-day">Sunday</span>
                            <span class="contact-training-time">9:00 AM – 11:00 AM</span>
                        </li>
                    </ul>
                    <p class="contact-training-note">* Schedule may change based on match fixtures</p>
                </div>

                <div class="contact-quick-links">
                    <a href="{{ route('player') }}" class="contact-quick-link">👕 View Players</a>
                    <a href="{{ route('matches') }}" class="contact-quick-link">⚽ View Matches</a>
                </div>
            </div>

            {{-- Form column --}}
            <div class="lg:col-span-3">
                <div class="contact-form-card">
                    <div class="contact-form-header">
                        <h2 class="font-stadium text-3xl uppercase text-zinc-900">Send a Message</h2>
                        <p class="text-zinc-500 text-sm mt-1">We typically respond within 24–48 hours.</p>
                    </div>

                    @if(session('success'))
                        <div class="contact-success">
                            <span>✅</span>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                        @csrf

                        <div class="contact-form-row">
                            <div class="contact-field">
                                <label class="contact-label" for="contact_name">Full Name</label>
                                <input type="text" id="contact_name" name="name" value="{{ old('name') }}" required placeholder="Your full name" class="contact-input">
                                @error('name')<p class="contact-error">{{ $message }}</p>@enderror
                            </div>
                            <div class="contact-field">
                                <label class="contact-label" for="contact_email">Email Address</label>
                                <input type="email" id="contact_email" name="email" value="{{ old('email') }}" required placeholder="you@email.com" class="contact-input">
                                @error('email')<p class="contact-error">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        <div class="contact-field">
                            <label class="contact-label" for="contact_subject">Subject</label>
                            <select id="contact_subject" name="subject" required class="contact-input contact-select">
                                <option value="" disabled {{ !old('subject') ? 'selected' : '' }}>Select a topic</option>
                                @foreach(['Player Inquiry' => 'Player', 'Coach Inquiry' => 'Coach', 'Sponsorship' => 'Sponsor', 'General Question' => 'Other'] as $val => $lbl)
                                    <option value="{{ $val }}" {{ old('subject') == $val ? 'selected' : '' }}>{{ $lbl }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="contact-field">
                            <label class="contact-label" for="contact_message">Your Message</label>
                            <textarea id="contact_message" name="message" rows="6" required placeholder="Tell us how we can help you..." class="contact-input contact-textarea">{{ old('message') }}</textarea>
                            @error('message')<p class="contact-error">{{ $message }}</p>@enderror
                        </div>

                        <button type="submit" class="contact-submit">
                            <span>Send Message</span>
                            <span class="contact-submit-arrow">→</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
