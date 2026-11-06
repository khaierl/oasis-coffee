@extends('layouts.app')

@section('title', "Oasis' Coffee - Contact")

@section('content')

<style>
    .contact-page {
        background: #fbf7f0;
        min-height: 670px;
        padding: 48px 0 78px;
    }

    .contact-wrap {
        width: min(1180px, calc(100% - 40px));
        margin: 0 auto;
        display: grid;
        grid-template-columns: 0.9fr 1.1fr;
        gap: 70px;
        align-items: start;
    }

    .contact-info {
        min-width: 0;
        padding-top: 4px;
    }

    .contact-info .eyebrow {
        margin-bottom: 12px;
    }

    .contact-info h1 {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 40px;
        line-height: 1.08;
        margin: 0 0 20px;
        color: #32170d;
    }

    .contact-description {
        color: #7d6658;
        font-size: 13px;
        line-height: 1.7;
        max-width: 510px;
        margin-bottom: 28px;
    }

    .contact-list {
        display: grid;
        gap: 18px;
        margin-top: 0;
    }

    .contact-row {
        display: flex;
        align-items: center;
        gap: 14px;
    }

    .contact-icon {
        width: 34px;
        height: 34px;
        min-width: 34px;
        display: grid;
        place-items: center;
        background: #f0dfcb;
        color: #6b3b25;
        border-radius: 50%;
        font-size: 13px;
    }

    .contact-row strong {
        display: block;
        color: #32170d;
        font-size: 12px;
        margin-bottom: 2px;
    }

    .contact-row span:not(.contact-icon),
    .contact-row a {
        color: #7d6658;
        font-size: 12px;
    }

    .contact-row a:hover {
        color: #8f603d;
    }

    /* SOCIAL MEDIA */
    .socials {
        display: flex;
        gap: 10px;
        margin-top: 25px;
    }

    .socials a {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #d6b184;
        border-radius: 50%;
        color: #7a452c;
        background: transparent;
        font-size: 16px;
        transition: .2s ease;
    }

    .socials a:hover {
        background: #472115;
        color: #fff;
        border-color: #472115;
        transform: translateY(-2px);
    }

    /* FORM */
    .contact-form-card {
        width: 100%;
        min-width: 0;
        background: #fff;
        border: 1px solid #eddfd0;
        border-radius: 5px;
        padding: 30px;
        box-shadow: 0 12px 32px #47211514;
    }

    .contact-form-card .eyebrow {
        margin-bottom: 6px;
    }

    .contact-form-card h2 {
        font-family: Georgia, 'Times New Roman', serif;
        font-size: 28px;
        line-height: 1.15;
        color: #32170d;
        margin: 0 0 7px;
    }

    .form-subtitle {
        color: #9b6e5a;
        font-size: 12px;
        margin: 0 0 22px;
    }

    .form-grid-contact {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 13px 15px;
    }

    .field-contact {
        display: grid;
        gap: 6px;
    }

    .field-contact.full {
        grid-column: 1 / -1;
    }

    .field-contact label {
        color: #32170d;
        font-size: 11px;
        font-weight: 700;
    }

    .field-contact input,
    .field-contact textarea {
        width: 100%;
        border: 1px solid #dbcab7;
        border-radius: 3px;
        padding: 11px 12px;
        background: #fffcf8;
        color: #32170d;
        outline: 0;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 13px;
        transition: .2s ease;
    }

    .field-contact input {
        height: 43px;
    }

    .field-contact textarea {
        min-height: 125px;
        resize: vertical;
    }

    .field-contact input::placeholder,
    .field-contact textarea::placeholder {
        color: #9a8b80;
    }

    .field-contact input:focus,
    .field-contact textarea:focus {
        border-color: #9d6c47;
        box-shadow: 0 0 0 3px #d9b4864d;
    }

    .contact-submit {
        width: 100%;
        margin-top: 1px;
        height: 42px;
        border: 0;
        border-radius: 3px;
        background: #32170d;
        color: #fff;
        font-size: 11px;
        font-weight: 700;
        cursor: pointer;
        transition: .2s ease;
    }

    .contact-submit:hover {
        background: #61311e;
    }

    .contact-alert {
        padding: 11px 13px;
        border-radius: 3px;
        margin-bottom: 16px;
        font-size: 12px;
    }

    .contact-alert.success {
        background: #dcf5e4;
        color: #176538;
    }

    .contact-alert.error {
        background: #fee2e2;
        color: #9b1c1c;
    }

    /* RESPONSIVE */
    @media (max-width: 820px) {
        .contact-wrap {
            grid-template-columns: 1fr;
            gap: 35px;
        }

        .contact-page {
            padding: 45px 0 60px;
        }
    }

    @media (max-width: 540px) {
        .contact-wrap {
            width: min(100% - 28px, 1180px);
        }

        .contact-info h1 {
            font-size: 34px;
        }

        .form-grid-contact {
            grid-template-columns: 1fr;
        }

        .field-contact.full {
            grid-column: auto;
        }

        .contact-form-card {
            padding: 22px;
        }
    }
</style>


<section class="contact-page">

    <div class="contact-wrap">

        {{-- ========================================
             LEFT SIDE
        ========================================= --}}
        <div class="contact-info">

            <div class="eyebrow">
                Find Us
            </div>

            <h1>
                Let's talk over<br>
                a good cup.
            </h1>

            <p class="contact-description">
                {{ $contact->description ?? 'Whether you want to reserve a seat, plan a small event, or ask about our menu, our team is ready to help.' }}
            </p>


            {{-- CONTACT INFORMATION --}}
            <div class="contact-list">

                {{-- ADDRESS --}}
                <div class="contact-row">

                    <span class="contact-icon">
                        ⌖
                    </span>

                    <div>
                        <strong>Address</strong>

                        <span>
                            {{ $contact->address ?? 'Jl. Kemang Raya No. 12, Jakarta Selatan 12730' }}
                        </span>
                    </div>

                </div>


                {{-- PHONE --}}
                <div class="contact-row">

                    <span class="contact-icon">
                        ☎
                    </span>

                    <div>
                        <strong>Phone</strong>

                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $contact->phone ?? '') }}">
                            {{ $contact->phone ?? '+62 21 7890 1234' }}
                        </a>
                    </div>

                </div>


                {{-- EMAIL --}}
                <div class="contact-row">

                    <span class="contact-icon">
                        ✉
                    </span>

                    <div>
                        <strong>Email</strong>

                        <a href="mailto:{{ $contact->email ?? '' }}">
                            {{ $contact->email ?? 'hello@oasiscoffee.com' }}
                        </a>
                    </div>

                </div>

            </div>


            {{-- ========================================
                 SOCIAL MEDIA
            ========================================= --}}
            <div class="socials">

                {{-- INSTAGRAM --}}
                <a
                    href="{{ $contact->instagram ?? '#' }}"
                    target="_blank"
                    rel="noopener"
                    title="Instagram"
                >
                    <i class="fa-brands fa-instagram"></i>
                </a>


                {{-- TIKTOK --}}
                <a
                    href="{{ $contact->tiktok ?? '#' }}"
                    target="_blank"
                    rel="noopener"
                    title="TikTok"
                >
                    <i class="fa-brands fa-tiktok"></i>
                </a>


                {{-- WHATSAPP --}}
                <a
                    href="{{ !empty($contact->whatsapp)
                        ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $contact->whatsapp)
                        : '#'
                    }}"
                    target="_blank"
                    rel="noopener"
                    title="WhatsApp"
                >
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

            </div>

        </div>


        {{-- ========================================
             RIGHT SIDE
        ========================================= --}}
        <div class="contact-form-card">

            <div class="eyebrow">
                Send Us a Message
            </div>

            <h2>
                Tell us what you need
            </h2>

            <p class="form-subtitle">
                We respond to all messages within two days.
            </p>


            {{-- SUCCESS --}}
            @if(session('success'))

                <div class="contact-alert success">
                    {{ session('success') }}
                </div>

            @endif


            {{-- ERROR --}}
            @if($errors->any())

                <div class="contact-alert error">
                    {{ $errors->first() }}
                </div>

            @endif


            {{-- FORM --}}
            <form
                method="POST"
                action="{{ route('contact.send') }}"
            >

                @csrf

                <div class="form-grid-contact">

                    {{-- NAME --}}
                    <div class="field-contact full">

                        <label for="name">
                            Full Name
                        </label>

                        <input
                            id="name"
                            name="name"
                            type="text"
                            value="{{ old('name') }}"
                            placeholder="Your Full Name"
                            required
                        >

                    </div>


                    {{-- EMAIL --}}
                    <div class="field-contact full">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            value="{{ old('email') }}"
                            placeholder="Your Email"
                            required
                        >

                    </div>


                    {{-- SUBJECT --}}
                    <div class="field-contact full">

                        <label for="subject">
                            Subject
                        </label>

                        <input
                            id="subject"
                            name="subject"
                            type="text"
                            value="{{ old('subject') }}"
                            placeholder="Reservation, question, or feedback"
                            required
                        >

                    </div>


                    {{-- MESSAGE --}}
                    <div class="field-contact full">

                        <label for="message">
                            Message
                        </label>

                        <textarea
                            id="message"
                            name="message"
                            placeholder="Write your message here..."
                            required
                        >{{ old('message') }}</textarea>

                    </div>


                    {{-- SUBMIT --}}
                    <div class="field-contact full">

                        <button
                            type="submit"
                            class="contact-submit"
                        >
                            Send Message →
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection