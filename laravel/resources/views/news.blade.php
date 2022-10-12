@extends('layout')
@section('main') 
        <!-- main -->
        <main class="container">
      <h2 class="header-title">All Business News & Reviews</h2>
      <div class="searchbar">
        <form action="">
          <input type="text" placeholder="Search..." name="search" />

          <button type="submit">
            <i class="fa fa-search"></i>
          </button>

        </form>
      </div>
      <div class="categories">
        <ul>
          <li><a href="">Health</a></li>
          <li><a href="">Entertainment</a></li>
          <li><a href="">Sports</a></li>
          <li><a href="">Nature</a></li>
        </ul>
      </div>
      <section class="cards-blog latest-blog">
        <div class="card-blog-content">
          <img src="{{asset('images/pic1.jpg')}}" alt="" />
          <p>
            2 hours ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4>
            <a href="{{route('news.show')}}">Benefits of getting covid 19 vaccination</a>
          </h4>
        </div>

        <div class="card-blog-content">
          <img src="{{asset('images/pic2.jpg')}}" alt="" />
          <p>
            23 hours ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4 style="font-weight: bolder">
            <a href="{{route('news.show')}}">Top 10 Music Stories Never Told</a>
          </h4>
        </div>

        <div class="card-blog-content">
          <img src="{{asset('images/pic3.jpg')}}" alt="" />
          <p>
            2 days ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4 style="font-weight: bolder">
            <a href="{{route('news.show')}}">WRC Safari Rally Back To Kenya After 19 Years</a>
          </h4>
        </div>

        <div class="card-blog-content">
          <img src="{{asset('images/pic4.jpg')}}" alt="" />
          <p>
            3 days ago
            <span>Written By Alphayo Wakarindi</span>
          </p>
          <h4 style="font-weight: bolder">
            <a href="{{route('news.show')}}">Premier League 2021/2022 Fixtures</a>
          </h4>
        </div>
@endsection