@extends('layout')
@section('main')
<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2> --}}
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200">
                    <h4>Click on an acion to perform!</h4> 

                    <div class="dashboard">
                        <ul class="a-actions" >
                            <li><a style="text-decoration: none; color: #2b7a78" href="{{route('news.create')}}">Make Business Review</a></li>
                            <li><a style="text-decoration: none; color: #2b7a78" href="{{route('categories.create')}}">Add New Business Category</a></li>
                            <li><a style="text-decoration: none; color: #2b7a78" href="{{route('categories.index')}}">View all Categories</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@endsection
