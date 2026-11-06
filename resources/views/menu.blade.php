@extends('layouts.app')

@section('title', "Oasis' Coffee - Menu")

@section('content')

{{-- =========================================================
    PAGE HERO
========================================================= --}}
<section class="page-hero">
    <div class="shell">

        <div class="eyebrow">
            Curated Daily
        </div>

        <h1>
            Our Menu
        </h1>

        <p class="lead">
            Every cup is prepared with carefully chosen beans,
            thoughtful techniques, and a little warmth.
        </p>

    </div>
</section>


{{-- =========================================================
    MENU SECTION
========================================================= --}}
<section class="section">

    <div class="shell">

        {{-- =====================================================
            CATEGORY FILTER
        ====================================================== --}}
        <div class="filters">

            <button
                type="button"
                class="filter active"
                data-category="all"
            >
                All
            </button>

            <button
                type="button"
                class="filter"
                data-category="Coffee"
            >
                Coffee
            </button>

            <button
                type="button"
                class="filter"
                data-category="Non-Coffee"
            >
                Non-Coffee
            </button>

            <button
                type="button"
                class="filter"
                data-category="Pastry"
            >
                Pastry
            </button>

            <button
                type="button"
                class="filter"
                data-category="Snack"
            >
                Snack
            </button>

        </div>


        {{-- =====================================================
            FALLBACK MENU
            Dipakai kalau database belum mempunyai menu.
        ====================================================== --}}
        @php

            $fallbackMenus = collect([

                (object) [
                    'name' => 'Signature Espresso',
                    'category' => 'Coffee',
                    'description' => 'Rich single-origin espresso with velvety crema.',
                    'price' => 32000,
                    'image' => 'images/americano.jpg',
                ],

                (object) [
                    'name' => 'Pour Over Blend',
                    'category' => 'Coffee',
                    'description' => 'Bright and nuanced, hand-poured to order.',
                    'price' => 38000,
                    'image' => 'images/cappuccino.jpg',
                ],

                (object) [
                    'name' => 'Creamy Latte',
                    'category' => 'Coffee',
                    'description' => 'Silky steamed milk over a double shot.',
                    'price' => 42000,
                    'image' => 'images/Latte.jpg',
                ],

                (object) [
                    'name' => 'Mocha',
                    'category' => 'Coffee',
                    'description' => 'Coffee, chocolate and milk in perfect balance.',
                    'price' => 42000,
                    'image' => 'images/Mocha.jpg',
                ],

                (object) [
                    'name' => 'Matcha Latte',
                    'category' => 'Non-Coffee',
                    'description' => 'Smooth matcha with lightly sweet milk.',
                    'price' => 35000,
                    'image' => 'images/matcha.jpg',
                ],

                (object) [
                    'name' => 'Chocolate',
                    'category' => 'Non-Coffee',
                    'description' => 'Comforting chocolate for every mood.',
                    'price' => 32000,
                    'image' => 'images/chocolate.jpg',
                ],

                (object) [
                    'name' => 'Butter Croissant',
                    'category' => 'Pastry',
                    'description' => 'Flaky, buttery and freshly baked every morning.',
                    'price' => 30000,
                    'image' => 'images/croissant.jpg',
                ],

                (object) [
                    'name' => 'Chocolate Cookies',
                    'category' => 'Snack',
                    'description' => 'Crispy cookies with rich chocolate chips.',
                    'price' => 27000,
                    'image' => 'images/cookies.jpg',
                ],

            ]);


            /*
            |--------------------------------------------------------------------------
            | DATA MENU
            |--------------------------------------------------------------------------
            |
            | Kalau Admin sudah mempunyai menu:
            | gunakan data dari database.
            |
            | Kalau belum ada:
            | gunakan fallback menu.
            |
            */

            $items = $menus->isNotEmpty()
                ? $menus
                : $fallbackMenus;

        @endphp


        {{-- =====================================================
            MENU GRID
        ====================================================== --}}
        <div class="menu-grid">

            @foreach($items as $menu)

                @php

                    /*
                    |--------------------------------------------------------------------------
                    | CATEGORY
                    |--------------------------------------------------------------------------
                    |
                    | Mengambil kategori dari Admin Filament.
                    |
                    */

                    $category = trim($menu->category ?? 'Coffee');


                    /*
                    |--------------------------------------------------------------------------
                    | IMAGE
                    |--------------------------------------------------------------------------
                    |
                    | Kalau gambar berasal dari public/images
                    | gunakan asset().
                    |
                    | Kalau gambar berasal dari Storage/Admin
                    | gunakan route media.show.
                    |
                    */

                    if (
                        !empty($menu->image) &&
                        str_starts_with($menu->image, 'images/')
                    ) {

                        $imageUrl = asset($menu->image);

                    } elseif (!empty($menu->image)) {

                        $imageUrl = route(
                            'media.show',
                            ['path' => $menu->image]
                        );

                    } else {

                        $imageUrl = asset('images/Latte.jpg');

                    }

                @endphp


                {{-- =================================================
                    MENU CARD
                ================================================== --}}
                <article
                    class="card menu-item"
                    data-category="{{ strtolower($category) }}"
                >

                    {{-- IMAGE --}}
                    <img
                        class="card-img"
                        src="{{ $imageUrl }}"
                        alt="{{ $menu->name }}"
                    >


                    {{-- CARD BODY --}}
                    <div class="card-body">

                        {{-- CATEGORY --}}
                        <span class="tag">
                            {{ $category }}
                        </span>


                        {{-- MENU NAME --}}
                        <h3>
                            {{ $menu->name }}
                        </h3>


                        {{-- DESCRIPTION --}}
                        <p>
                            {{ $menu->description ?: 'Freshly made with our selected ingredients.' }}
                        </p>


                        {{-- PRICE --}}
                        <div class="price">
                            Rp {{ number_format((float) $menu->price, 0, ',', '.') }}
                        </div>

                    </div>

                </article>

            @endforeach

        </div>


        {{-- =====================================================
            EMPTY MESSAGE
            Muncul kalau tidak ada menu yang cocok.
        ====================================================== --}}
        <div
            id="empty-category"
            class="blank"
            style="display:none; margin-top:20px;"
        >
            Tidak ada menu dalam kategori ini.
        </div>

    </div>

</section>


{{-- =========================================================
    CTA
========================================================= --}}
<section class="cta">

    <h2>
        Something special in mind?
    </h2>

    <p>
        Tell us about your event or reserve a table
        for your favourite people.
    </p>

    <a
        class="btn btn-dark"
        href="{{ route('contact') }}"
    >
        Contact Us
    </a>

</section>


{{-- =========================================================
    CATEGORY FILTER JAVASCRIPT
========================================================= --}}
<script>

document.addEventListener('DOMContentLoaded', function () {

    const filterButtons = document.querySelectorAll('.filter');
    const menuItems = document.querySelectorAll('.menu-item');
    const emptyMessage = document.getElementById('empty-category');


    /*
    |--------------------------------------------------------------------------
    | FUNCTION FILTER MENU
    |--------------------------------------------------------------------------
    */

    function filterMenu(category) {

        let visibleItems = 0;

        /*
        | Normalisasi kategori yang dipilih
        */

        const selectedCategory = category
            .trim()
            .toLowerCase();


        /*
        | Cek setiap menu
        */

        menuItems.forEach(function (item) {

            const itemCategory = item
                .getAttribute('data-category')
                .trim()
                .toLowerCase();


            /*
            | ALL
            | Semua menu ditampilkan
            */

            if (selectedCategory === 'all') {

                item.style.display = '';

                visibleItems++;

            }


            /*
            | KATEGORI TERTENTU
            */

            else if (itemCategory === selectedCategory) {

                item.style.display = '';

                visibleItems++;

            }


            /*
            | KATEGORI TIDAK COCOK
            */

            else {

                item.style.display = 'none';

            }

        });


        /*
        |--------------------------------------------------------------------------
        | EMPTY MESSAGE
        |--------------------------------------------------------------------------
        */

        if (visibleItems === 0) {

            emptyMessage.style.display = 'block';

        } else {

            emptyMessage.style.display = 'none';

        }

    }


    /*
    |--------------------------------------------------------------------------
    | KLIK BUTTON CATEGORY
    |--------------------------------------------------------------------------
    */

    filterButtons.forEach(function (button) {

        button.addEventListener('click', function () {

            /*
            | Ambil kategori dari data-category
            */

            const selectedCategory =
                this.getAttribute('data-category');


            /*
            |--------------------------------------------------------------------------
            | HAPUS ACTIVE DARI SEMUA BUTTON
            |--------------------------------------------------------------------------
            */

            filterButtons.forEach(function (btn) {

                btn.classList.remove('active');

            });


            /*
            |--------------------------------------------------------------------------
            | ACTIVE BUTTON YANG DIKLIK
            |--------------------------------------------------------------------------
            */

            this.classList.add('active');


            /*
            |--------------------------------------------------------------------------
            | FILTER MENU
            |--------------------------------------------------------------------------
            */

            filterMenu(selectedCategory);

        });

    });


    /*
    |--------------------------------------------------------------------------
    | DEFAULT
    | Saat halaman pertama kali dibuka,
    | tampilkan semua menu.
    |--------------------------------------------------------------------------
    */

    filterMenu('all');

});

</script>

@endsection