@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

@endsection
@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Make Category!</h1>
            @include('include.statuses')
            
            <!-- Contact Form -->
            <div class="contact-form">
                <form action={{route('categories.store')}} method="post">
                    @csrf
                    <!-- name -->
                    <label for="title"><span>Name</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" />
                    @error('name')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
            </div>

            <div class="create-categories">
                <a href="{{route('categories.index')}}">List of Categories<span>&#8594;</span></a>
            </div>

        </section>
    </main>
@endsection

@section('scripts')
<script>
                        ClassicEditor
                                .create( document.querySelector( '#body' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>
@endsection