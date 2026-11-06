@extends('layouts.app')
@section('title', "Oasis' Coffee - Gallery")
@section('content')
<section class="page-hero">
    <div class="shell">
        <div class="eyebrow">Visual Archive</div>
        <h1>Gallery</h1>
        <p class="lead">A glimpse of the people, pours, and quiet moments that make up Oasis' Coffee.</p>
    </div>
</section>
<section class="section">
    <div class="shell">
        <div class="filters">
            <span class="filter active">All</span>
            <span class="filter">Coffee</span>
            <span class="filter">Barista</span>
            <span class="filter">Food</span>
            <span class="filter">Interior</span>
         </div>
        @php $fallbackGallery = collect([(object)['title'=>'The Daily Pour',
        'image'=>'images/cappuccino.jpg'],(object)['title'=>'Coffee Details',
        'image'=>'images/americano.jpg'],(object)['title'=>'Sweet Companion',
        'image'=>'images/chocolate.jpg'],(object)['title'=>'Comfort in a Cup',
        'image'=>'images/Latte.jpg'],(object)['title'=>'Matcha Moment','image'=>
        'images/matcha.jpg'],(object)['title'=>'A Little Mocha','image'=>'images/Mocha.jpg']]); 
        $items = $galleries->isNotEmpty() ? $galleries : $fallbackGallery; @endphp
        <div class="gallery-grid">@foreach($items as $gallery) @php $imageUrl = str_starts_with($gallery->image ?? '', 
            'images/') ? asset($gallery->image) : (($gallery->image ?? null) ? route('media.show', ['path'=>$gallery->image]) : 
            asset('images/hero.jpg')); @endphp 
            <article class="gallery-item">
                <img src="{{ $imageUrl }}" alt="{{ $gallery->title }}">
                <div class="gallery-label">{{ $gallery->title }}</div>
            </article>
            @endforeach
            </div>
        </div>
        </section>
        <section class="cta">
            <h2>Make your own coffee story.</h2>
            <p>Visit us and share your favourite Oasis moment.</p>
            <a class="btn btn-dark" href="{{ route('contact') }}">Visit Oasis' Coffee</a>
        </section>
        @endsection
