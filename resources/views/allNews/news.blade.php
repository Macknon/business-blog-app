@extends('layout')
@section('main') 
        <!-- main -->
        <main class="container">
      <h2 class="header-title">All Business News & Reviews</h2>
      @if (session('status'))
               <p style="text-align:center; color:#fff; background:rgb(53, 199, 8); padding: 17px 0; margin-bottom: 16px; font-weight:700;">{{session("status")}}</p> 
            @endif
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

          @foreach ($categories as $category)
          <li><a href="">{{$category->name}}</a></li>
          @endforeach
          
        </ul>
      </div>
      <section class="cards-blog latest-blog">

        @forelse ($allNews as $newsItem)
        <div class="card-blog-content">
          @auth
          
          @if (auth()->user()->id === $newsItem->user->id)
          <div class="post-buttons">
            <a href="{{ route('news.edit', $newsItem) }}">Edit</a>
            <form action="{{ route('news.destroy', $newsItem) }}" method="post">
              @csrf 
              @method('delete')
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
        @empty
        <h4>There are no business reviews on the search term 🙁</h4>
        @endforelse
    <!-- pagination -->
        
    {{ $allNews->links('pagination::default') }}
    <br>
      
@endsection