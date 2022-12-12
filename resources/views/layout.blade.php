<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
  <!--dsjfkasdsda-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Business News</title>
    <!-- Css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}" />
    <!-- Font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    @yield('head')

    {{-- <!-- tailwindcss CDN -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.17/tailwind.min.css"
    /> --}}
  </head>
  <body>
    <div id="wrapper">
      <!-- header -->
      @yield('header')
      <!-- sidebar -->
      <div class="sidebar">
        <span class="closeButton">&times;</span>
        <p class="brand-title"><a href="">Business News</a></p>

        <div class="side-links">
          <ul>
            <li><a class="{{Request::routeIs('home.index') ? 'active' : ''}}" href="{{route('home.index')}}">Home</a></li>
            {{-- <li><a class="{{Request::routeIs('news.index') ? 'active' : ''}}" href="{{route('news.index')}}">All News</a></li> --}}
            {{-- <li><a class="{{Request::routeIs('about') ? 'active' : ''}}" href="{{route('about')}}">About</a></li> --}}
            <li><a class="{{Request::routeIs('contact.index') ? 'active' : ''}}" href="{{route('contact.index')}}">About Us</a></li>
            @guest
            <li><a class="{{Request::routeIs('login') ? 'active' : ''}}" href="{{route('login')}}">Login</a></li>
            <li><a class="{{Request::routeIs('register') ? 'active' : ''}}" href="{{route('register')}}">Register</a></li>
            @endguest
            @auth
            <li><a class="{{Request::routeIs('dashboard') ? 'active' : ''}}" href="{{route('register')}}">Dashboard</a></li>
            @endauth
          </ul>
        </div>

        <!-- sidebar footer -->
        <footer class="sidebar-footer">
          <small>Handles</small>
          <div>
            <a href="#business-news"><i class="fab fa-facebook-f"></i></a>
            <a href="#business-news"><i class="fab fa-instagram"></i></a>
            <a href="#business-news"><i class="fab fa-twitter"></i></a>
          </div>


        </footer>
      </div>
      <!-- Menu Button -->
      <div class="menuButton">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
      <!-- main -->
      @yield('main')

      <!-- Main footer -->
      <footer class="main-footer">
        <small>
 +254 720 001 001, +254 720 002 002
       <br>info@macknondesigns.co.ke
       <br>
          &copy 2022 Macknon Designs
        </small>
      </footer>
    </div>

    <!-- Click events to menu and close buttons using javaascript-->
    <script>
      document
        .querySelector(".menuButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "100%";
          document.querySelector(".sidebar").style.zIndex = "5";
        });

      document
        .querySelector(".closeButton")
        .addEventListener("click", function () {
          document.querySelector(".sidebar").style.width = "0";
        });
    </script>
    @yield('scripts')
  </body>
</html>
