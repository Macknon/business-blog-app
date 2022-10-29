@extends('layout')

@section('main')
    <div class="categories-list">
        <h1>Categories List</h1>
        {{-- @include('includes.flash-message') --}}
        @if (session('status'))
               <p style="text-align:center; color:#fff; background:rgb(53, 199, 8); padding: 17px 0; margin-bottom: 16px; font-weight:700;">{{session("status")}}</p> 
        @endif
        @foreach ($categories as $category)
            <div class="item">
                <p>{{ $category->name }}</p>
                <div>
                    <a href="{{ route('categories.edit', $category) }}">Change/Edit</a>
                </div>
                <form action="{{route('categories.destroy', $category)}}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete">
                </form>
            </div>
        @endforeach
        <div class="index-categories">
            <a href="{{ route('categories.create') }}">Create category<span>&#8594;</span></a>
        </div>
    </div>
@endsection