{{-- Code for adding news --}}

@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

@endsection
@section('main')
    <main class="container">
        <section id="contact-us">
            <h1>Add a review/news article!</h1>
            @include('include.statuses')
            
            <!-- Contact Form -->
            <div class="contact-form mack-center">
                <form action={{route('news.store')}} method="post" enctype="multipart/form-data">
                    @csrf
                    <!-- Title -->
                    <label for="title"><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" />
                    @error('title')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                    <!-- Image -->
                    <label for="image"><span>Image</span></label>
                    <input type="file" id="image" name="image" />
                    @error('image')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                    <!-- Highlight -->
                    <label for="highlight"><span>Highlight</span></label>
                    <input type="text" id="highlight" name="highlight" value="{{ old('highlight') }}" />
                    @error('highlight')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
  
                    <!-- Drop down -->
                    <label for="categories"><span>Choose a category:</span></label>
                    <select name="category_id" id="categories">
                        <option selected disabled>Select option </option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach         
                    </select>
                    @error('category_id')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
         

                    <!-- Body-->
                    <label for="body"><span>Body</span></label>
                    <textarea id="body" name="body">{{ old('body') }}</textarea>
                    @error('body')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
                    <!-- Button -->
                    <input type="submit" value="Submit" />
                </form>
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