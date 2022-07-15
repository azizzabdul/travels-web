@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
<main>
    <div class="section section-success d-flex align-items-center">
        <div class="col text-center">
            <img src="{{ url('frontend/images/Ic-mail.png') }}" alt="">
            <h1>Oopps!</h1>
            <p>
                Sorry your transactions is failed.
                <br>
                please contact our representative if this occrus
            </p>
            <a href="{{ url('/') }}" class="btn btn-homepage mt-3 px-5">
                Home Page
            </a>
        </div>
    </div>
</main>
@endsection
    