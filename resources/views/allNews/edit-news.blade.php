@extends('layout')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/35.2.1/classic/ckeditor.js"></script>

@endsection
@section('main')
    <main class="container" style="background-color: #fff;">
        <section id="contact-us">
            <h1 style="padding-top: 50px;">Edit This Review</h1>
            @if (session('status'))
               <p style="text-align:center; color:#fff; background:rgb(53, 199, 8); padding: 17px 0; margin-bottom: 16px; font-weight:700;">{{session("status")}}</p> 
            @endif
            
            <!-- Contact Form -->
            <div class="contact-form">
                <form action={{route('news.update', $newsItem) }} method="post" enctype="multipart/form-data">
                    @method('put')   
                    @csrf
                    <!-- Title -->
                    <label for="title"><span>Title</span></label>
                    <input type="text" id="title" name="title" value="{{ $newsItem->title }}" />
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
                    <input type="text" id="highlight" name="highlight" value="{{ $newsItem->highlight }}" />
                    @error('highlight')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
  
                    <!-- Drop down -->
                    <label for="categories"><span>Choose a category:</span></label>
                    <select name="category_id" id="categories">
                        <option selected disabled>Select option </option>
                            <option value=""></option>         
                    </select>
                    @error('highlight')
                        <p style="color: red; margin-bottom:25px;">{{$message}}</p>
                    @enderror
         

                    <!-- Body-->
                    <label for="body"><span>Body</span></label>
                    <textarea id="body" name="body">{{ $newsItem->body  }}</textarea>
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