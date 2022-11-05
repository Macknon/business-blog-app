@extends('layout')
@section('main')
<!-- main -->
<main class="container">
      <section class="single-blog-post">
        <h1>{{$newsItem->title}}</h1>

        <p class="time-and-author">
          {{$newsItem->created_at->diffForHumans()}}
          <span>{{$newsItem->user->name}}</span>
        </p>

        <div class="single-blog-post-ContentImage" data-aos="fade-left">
          <img src="{{asset($newsItem->imagePath)}}" alt="" />
        </div>

        <div class="about-text">
          {!!$newsItem->body!!}
          </p>
        </div>
      </section>
      <section class="recommended">
        <p>Related</p>
        <div class="recommended-cards">
          
          @foreach($relatedNews as $related)
          <a href="">
            <div class="recommended-card">
              <img src="{{asset($related->imagePath)}}" alt="" loading="lazy" />
              <h4>
                {{$related->title}}
              </h4>
            </div>
          </a>
          @endforeach

        </div>
      </section>
    </main>
@endsection
