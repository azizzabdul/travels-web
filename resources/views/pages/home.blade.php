@extends('layouts.app')

@section('title', 'Travels')
    
@section('content')
        <!-- header -->
        <header class="text-center">
            <h1>
                Explore The Beautiful World
                <br>
                As Easy One Click
            </h1>
            <p class="mt-3">
                You will see beautiful
                <br>
                moment you never see before
            </p>
    
            <a href="#popular" class="btn btn-getstarted px-4 mt-4">
                Get Started
            </a>
        </header>
    
        <main>
            <div class="container">
                <section class="section-stats row justify-content-center" id="stats">
                    <div class="col-3 col-md-2 stats-detail">
                        <h2>20K</h2>
                        <p>Members</p>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <h2>12</h2>
                        <p>Countries</p>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <h2>3K</h2>
                        <p>Hotels</p>
                    </div>
                    <div class="col-3 col-md-2 stats-detail">
                        <h2>72</h2>
                        <p>Partners</p>
                    </div>
                </section>
            </div>
    
            <section class="section-popular" id="popular">
                <div class="container">
                    <div class="row">
                        <div class="col text-center section-popular-heading">
                            <h2>Wisata Popular</h2>
                            <p>
                                Something that you never try
                                <br>
                                before in this world
                            </p>
                        </div>
                    </div>
                </div>
            </section>
    
            <section class="section-popular-content" id="popularContent">
                <div class="container">
                    <div class="section-popular-travel row justify-content-center">
                        @foreach ($item as $item)
                            <div class="col-sm-6 col-md-4 col-lg-3">
                                <div class="card-travel text-center d-flex flex-column" style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
                                    <div class="travel-country">
                                        {{ $item->location }}
                                    </div>
                                    <div class="travel-location">
                                        {{ $item->title }}
                                    </div>
                                    <div class="travel-button mt-auto">
                                        <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                                            View Details 
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    
            </section>
    
            <section class="section-networks" id="networks">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>Our Networks</h2>
                            <P>
                                Companies are trusted us <br>
                                more than just a trip</P>
                        </div>
                        <div class="col-md-8 text-center">
                            <img src="{{ url('frontend/images/partner@2x.png') }}" class="img-partner" alt="Our Networks">
                        </div>
                    </div>
                </div>
            </section>
    
            <section class="section-testimonial-heading" id="testimoniHeading">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h2>They Are Loving Us</h2>
                            <p>
                                Moments were giving them <br>
                                the best experince
                            </p>
                        </div>
                    </div>
                </div>
            </section>
    
            <section class="section section-testimonial-content" id="testimoniContent">
                <div class="container">
                    <div class="section-popular-travel row justify-content-center">
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimoni text-center">
                                <div class="testimoni-content">
                                    <img src="{{ url('frontend/images/testimoni-1.png') }}" alt="user" class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Sisca</h3>
                                    <p class="testimoni">
                                        "It was glorious and I could
                                        notstop to say wohooo for
                                        every single moment. Dankeee"
                                    </p>
                                </div>
                                <hr>
                                <p class="trip-to mt-2">
                                    Trip to Ubud
                                </p>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimoni text-center">
                                <div class="testimoni-content">
                                    <img src="{{ url('frontend/images/testimoni-2.png') }}" alt="user" class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Shabrina</h3>
                                    <p class="testimoni">
                                        "The trip was amazing and
                                        I saw something beautiful in
                                        that Island that makes me
                                        want to learn more"
                                    </p>
                                </div>
                                <hr>
                                <p class="trip-to mt-2">
                                    Trip to Bromo
                                </p>
                            </div>
                        </div>
    
                        <div class="col-sm-6 col-md-6 col-lg-4">
                            <div class="card card-testimoni text-center">
                                <div class="testimoni-content">
                                    <img src="{{ url('frontend/images/testimoni-3.png') }}" alt="user" class="mb-4 rounded-circle">
                                    <h3 class="mb-4">Ricardo</h3>
                                    <p class="testimoni">
                                        "I loved it when the waves 
                                        was shaking harder - I was
                                        scared too"
                                    </p>
                                </div>
                                <hr>
                                <p class="trip-to mt-2">
                                    Trip to Nusa Penida
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center">
                            <a href="#" class="btn btn-help ps-4 mt-4 mx-1">
                                I Need Help
                            </a>
                            
                            <a href="{{ route('register') }}" class="btn btn-getstarted ps-4 mt-4 mx-1">
                                Get Started
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
@endsection