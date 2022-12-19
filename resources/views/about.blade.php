@extends('layout')
@section('main')
<!-- main -->
<main class="container">
  <section class="single-blog-post">
    <h1>About Me</h1>
    <div class="single-blog-post-ContentImage" data-aos="fade-left">
      <img src="{{asset('images/photography.jpg')}}" alt="" />
    </div>

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
</main>
@endsection