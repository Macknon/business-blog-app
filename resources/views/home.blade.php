@extends('layout')

@section('header')
<!-- header -->
<header class="header" style="background-image: url({{asset("images/newspapers.jpg")}})">
        <div class="header-text">
          <h1>Business Reviews for SMEs</h1>
          <h4>Dashboard of genuine business news...</h4>
        </div>
        <div class="overlay"></div>
      </header>
@endsection
      

@section('main')
      <!-- main -->
      <main class="container">
        <h2 class="header-title">Latest Business News</h2>
        <section class="cards-blog latest-blog">

        @foreach ($allNews as $newsItem)
        <div class="card-blog-content">
          <img src="{{asset($newsItem->imagePath)}}" alt="" />
          <p>
            {{$newsItem->created_at->diffForHumans()}}
            <span>Written By {{$newsItem->user->name}}</span>
          </p>
          <h4>
            <a href="{{route('news.show', $newsItem)}}">{{$newsItem->title}}</a>
          </h4>
        </div>
        @endforeach

        </section>
      </main>
@endsection
