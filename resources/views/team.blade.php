@extends('layouts.app')
@section('title', "Oasis' Coffee - Team")
@section('content')
<section class="page-hero">
    <div class="shell">
        <div class="eyebrow">The People</div>
        <h1>Our Team</h1>
        <p class="lead">Behind every remarkable cup is a remarkable human. Meet the people who make Oasis' Coffee what it is.</p>
    </div>
</section>
<section class="section">
    <div class="shell">
        @php $fallbackTeam = collect([(object)['name'=>'Carissa','role'=>'Founder & Director','description'=>
        'Carissa found Oasis Coffee in 2026 with a simple dream - to create a coffee space in Jakarta Selatan where quality and 
        community live side by side.','image'=>'images/hero.jpg'],(object)['name'=>'James','role'=>'Operations Manager',
        'description'=>'James keeps the flow running with calm precision and a warm welcome for every guest.',
        'image'=>'images/cappuccino.jpg'],(object)['name'=>'Raka','role'=>'Head Barista','description'=>
        'Raka brings curiosity, craft, and care into every pour.','image'=>'images/americano.jpg']]); 
        $members = $teams->isNotEmpty() ? $teams : $fallbackTeam; @endphp
        <div class="team-grid">
            @foreach($members as $team)
                @php $imageUrl = str_starts_with($team->image ?? '', 'images/') ? asset($team->image) : 
                (($team->image ?? null) ? route('media.show', ['path'=>$team->image]) : asset('images/Latte.jpg')); @endphp
                <article class="card member">
                    <img src="{{ $imageUrl }}" alt="{{ $team->name }}">
                    <div class="card-body">
                        <h3>{{ $team->name }}</h3>
                        <div class="role">{{ $team->role }}</div>
                        <p>{{ $team->description ?: 'Dedicated to making every visit warm and memorable.' }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</section>
<section class="cta">
    <h2>Join the Oasis' Coffee family</h2>
    <p>We're always looking for passionate people who love coffee and people.</p>
    <a class="btn btn-dark" href="{{ route('contact') }}">Say Hello</a>
</section>
@endsection
