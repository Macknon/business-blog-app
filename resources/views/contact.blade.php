@extends('layout')

@section('main')

<!-- main -->
<main class="container">

    <section class="single-blog-post">
        <h1>About Us</h1>
        {{-- <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{asset('images/photography.jpg')}}" alt="" />
        </div> --}}

        <div>
          <p class="about-text">
            We are a news business with the business of bringing your business to light with a business platform
            and to review businesses. We have a simple business app:
            <br /><br />
            Just register, Login after registration then start your business journey as you add your reviews.
            You can also add a new busines category and start linking up posts related to the your business.
          </p>
        </div>
      </section>



    <section id="contact-us">
        <h1>Get in Touch!</h1>
        {{-- flash message --}}
        @include('include.statuses')
        <!-- contact info -->
        <div class="container">
            
            <!-- Contact Form -->
            <div class="contact-form">
                <form action="{{ route('contact.store') }}" method="post">
                    @csrf
                    <!-- Name -->
                    <label for="name"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" />
                    @error('name')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror

                    <!-- Email -->
                    <label for="email"><span>Email</span></label>
                    <input type="text" id="email" name="email" value="{{ old('email') }}" />
                    @error('email')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror

                    <!-- Subject -->
                    <label for="subject"><span>Subject</span></label>
                    <input type="text" id="Subject" name="subject" value="{{ old('subject') }}" />
                    @error('subject')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror
                    <!-- Message -->
                    <label for="message"><span>Message</span></label>
                    <textarea id="message" name="message">{{ old('message') }}</textarea>
                    @error('message')
                    <p style="color: red; margin-bottom:5px; ">{{ $message }}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>

        </div>
    </section>
</main>
@endsection
