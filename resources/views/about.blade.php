@extends('layouts.app')
@section('title', "Oasis' Coffee - About")
@section('content')
<section class="page-hero">
    <div class="shell">
        <div class="eyebrow">Our Story</div>
        <h1>About Oasis' Coffee</h1>
    </div>
</section>
@php $aboutImage = ($about && $about->image) ? 
    route('media.show', ['path'=>$about->image]) : 
    asset('images/hero.jpg'); @endphp
<section class="section">
    <div class="shell two-col">
        <img class="about-photo" src="{{ $aboutImage }}" alt="Inside Oasis' Coffee">
        <div class="copy">
            <div class="eyebrow">Company Profile</div>
            <h2>{{ $about->title ?? 'More Than Just Coffee' }}</h2>
            <p>{{ $about->description ?? "Oasis' Coffee was founded in the heart of Jakarta Selatan by 
                Carissa - a specialty coffee house committed to showcasing the extraordinary terroir of 
                Indonesian coffee, from the volcanic highlands of Aceh Gayo to the fertile slopes of Flores 
                and Toraja." }}</p><p>Our space is designed as a living room for the neighbourhood - a place to work, 
                connect, celebrate, and reflect. We hold monthly cupping sessions, barista workshops, and cultural evenings 
                with local artists and musicians.</p>
                <a class="btn btn-dark" href="{{ route('contact') }}">
                    {{ $about->button_text ?? 'Learn Our Story' }}
                </a>
            </div>
        </div>
    </section>
<section class="section" style="background:#f1e4d4;">
    <div class="shell">
        <div style="text-align:center;margin-bottom:30px;">
            <div class="eyebrow">Since 2026</div>
            <h2 class="section-title">Our History</h2>
        </div><div class="info-grid">
            <article class="info-card">
                <span class="tag">2026</span>
                <h3>The Beginning</h3>
                <p>Oasis' Coffee was born from a belief that every cup can tell a story.</p>
            </article>
            <article class="info-card">
                <span class="tag">Today</span>
                <h3>Rooted in the Town</h3>
                <p>We keep discovering and sharing the variety of Indonesian coffee.</p>
            </article>
            <article class="info-card">
                <span class="tag">Always</span>
                <h3>Brewed with Care</h3>
                <p>Thoughtful coffee and genuine hospitality for every guest.</p>
            </article>
        </div>
    </div>
</section>
<section class="section" style="background:var(--ink);color:#fff;">
    <div class="shell">
        <div class="info-grid">
            <article class="info-card" style="background:#472115;border-color:#744e39;color:#fff;">
                <h3>Vision</h3>
                <p style="color:#ead8c6;">To be Jakarta Selatan's most beloved specialty coffee destination.</p>
            </article>
            <article class="info-card" style="background:#472115;border-color:#744e39;color:#fff;">
                <h3>Mission</h3>
                <p style="color:#ead8c6;">Educate, celebrate, and connect through coffee.</p>
            </article>
            <article class="info-card" style="background:#472115;border-color:#744e39;color:#fff;">
                <h3>Values</h3>
                <p style="color:#ead8c6;">Integrity in sourcing. Excellence in craft. Warmth in service.</p>
            </article>
        </div>
    </div>
</section>
@endsection
