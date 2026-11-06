@extends('layouts.app')

@section('title', "Oasis' Coffee - Home")

@section('content')
<section class="hero">
    <div class="hero-inner">
        <div class="hero-copy">
            <div class="eyebrow">Jakarta's Finest Third Wave</div>
                 <h1>Where Every<br><em>Sip Tells</em><br>a Story</h1>
        <p>Oasis' Coffee is a sanctuary for coffee lovers - sourcing single-origin beans from Sumatra to Flores, 
            crafted by baristas who treat every cup as a conversation.</p>
        <div class="hero-stats"><div class="stat">
            <strong>350+</strong>
            <span>Coffee Varieties</span>
        </div>
        <div class="stat">
            <strong>8</strong>
            <span>Origin Islands</span>
        </div>
        <div class="stat">
            <strong>12K+</strong>
            <span>Happy Guests / Mo.</span>
        </div>
        <div class="stat">
            <strong>4.9★</strong>
            <span>Average Rating</span>
        </div>
    </div>
  </div>
</section>

<section class="section">
    <div class="shell">
     <div class="feature-head">
        <div>
            <div class="eyebrow">Handpicked for You</div>
            <h2 class="section-title">Our Signature Favourites</h2>
        </div><a class="text-link" href="{{ route('menu') }}">View All Menu →</a>
    </div>
    @php
        $fallbackMenus = collect([
            (object) ['name' => 'Signature Espresso', 'description' => 'Rich single-origin espresso with velvety crema and notes of dark chocolate.', 
            'price' => 32000, 'image' => 'images/americano.jpg'],
            (object) ['name' => 'Pour Over Blend', 'description' => 'Hand-poured specialty coffee, bright and nuanced with floral undertones.', 
            'price' => 38000, 'image' => 'images/cappuccino.jpg'],
            (object) ['name' => 'Creamy Latte', 'description' => 'Silky steamed milk over a double shot, lightly sweetened with honey.', 
            'price' => 42000, 'image' => 'images/Latte.jpg'],
        ]);
        $featuredMenus = $menus->isNotEmpty() ? $menus : $fallbackMenus;
    @endphp
    <div class="cards">
        @foreach($featuredMenus->take(3) as $menu)
            @php $imageUrl = str_starts_with($menu->image ?? '', 'images/') ? asset($menu->image) : 
            (($menu->image ?? null) ? route('media.show', ['path' => $menu->image]) : asset('images/Latte.jpg')); @endphp
            <article class="card">
                <img class="card-img" src="{{ $imageUrl }}" alt="{{ $menu->name }}">
                <div class="card-body">
                    <span class="tag">Coffee</span>
                    <h3>{{ $menu->name }}</h3>
                    <p>{{ $menu->description ?: 'Coffee crafted with attention to every detail.' }}</p>
                    <div class="price">Rp {{ number_format((float) $menu->price, 0, ',', '.') }}</div>
                </div>
            </article>
        @endforeach
    </div>
  </div>
</section>

<section class="section" style="background:#fff;">
    <div class="shell two-col">
        <img class="about-photo" src="{{ asset('images/hero.jpg') }}" alt="Barista preparing coffee">
        <div class="copy">
            <div class="eyebrow">Why Oasis' Coffee</div>
            <h2>Coffee as a<br>cultural practice.</h2>
            <p>We believe that a cup of coffee is an act of connection - between farmer, barista, and guest. 
                Our sourcing team travels to remote farms across the Indonesian archipelago, 
                building direct relationships that honour the land and the people who tend it.</p>
            <div class="filters">
                <span class="filter">Direct Trade</span>
                <span class="filter">Seasonal Roasts</span>
                <span class="filter">In-house Bakes</span>
                <span class="filter">Live Workshops</span>
            </div>
            <a class="btn btn-dark" href="{{ route('about') }}">Learn Our Story</a>
        </div>
    </div>
</section>

<section class="cta">
    <div class="shell">
        <h2>Ready for your next favourite cup?</h2>
        <p>Walk in today, reserve a table for a special occasion, or talk to a barista about our seasonal offerings.</p>
        <a class="btn btn-dark" href="{{ route('contact') }}">Get In Touch</a>
    </div>
</section>
@endsection
