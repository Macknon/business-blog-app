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

        @foreach ($allNews as $newsItem)
        <div class="card-blog-content">
          @auth
          
          @if (auth()->user()->id === $newsItem->user->id)
          <div class="post-buttons">
            <a href="">Edit</a>
            <form action="" method="">
              <input type="submit" value=" Delete">
            </form>
          </div>    
          @endif
          
          @endauth
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
    <!-- pagination -->

    {{-- {{ $allNews->links('pagination::default') }} --}}
    <br>
      
@endsection