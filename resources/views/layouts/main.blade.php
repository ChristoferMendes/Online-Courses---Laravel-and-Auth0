<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
        <!--Application Scripts -->
        <script src="/js/scripts.js"></script>
        <script src="/js/button.js"></script>

        <!--Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
       
        <!--Application CSS -->
       <link rel="stylesheet" href="/css/styles.css">

        {{-- <link rel="shortcut icon" href="/img/banner.jpg" type="image/x-icon"> --}}
        <!--Roboto Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
       
        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/d537ac151f.js" crossorigin="anonymous"></script>
        
       
        <!--Catching the title -->
        <title>@yield("title")</title>
        
    </head>
    <body>

      
      <!--Header -->

      <header>
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
              <img src="/img/hdcevents_logo.svg" alt="HDC Events logo">
            </a>
            <ul class="navbar-nav nav">

              <li class="nav-item">
                <a href="/" class="nav-link"><i class="fas fa-home"></i> Home</a>
              </li>

              <li class="nav-item">
                <a href="/courses/view" class="nav-link"><i class="fas fa-graduation-cap"></i> Courses</a>
              </li>
              @auth
              <li class="nav-item">
                <a href="/courses/create" class="nav-link"><i class="fas fa-calendar-plus"></i> Create Courses</a>
              </li>
              @endauth
              @auth
              <li class="nav-item">
                <a href="/dashboard" class="nav-link"><i class="fa-solid fa-book-open"></i> My courses</a>
              </li>
              @endauth
              @guest
              <li class="nav-item">
                <a href="/l" class="nav-link"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
              </li>
              
              <li class="nav-item">
                <a href="/l" class="nav-link"><i class="fas fa-user-plus"></i> Register</a>
              </li>
              @endguest
              @auth
              <li class="nav-item">
                <a href="/l" class="nav-link"><i class="fas fa-user-plus"></i>Logout</a>
              </li>
              @endauth
            </ul>
           
          </div>
          @auth
          <div class="user-welcome">
            <h5>Welcome&comma; {{ Auth::user()->name }}!</h5>
          </div>
          @endauth
        </nav>

      </header>
      <main>
          <div class="container-fluid">
            <div class="row">
              @if(session("msg"))
                <p class="msg">{{ session("msg") }}</p>
              @endif
              @yield("content")
            </div>
          </div>
      </main>
      <footer class="footer">
        <p>Developed by <a href="https://github.com/ChristoferMendes" target="_blank" class="footer-link">ChristoferMendes</a> &copy; 2022</p>
      </footer>
    </body>
</html>