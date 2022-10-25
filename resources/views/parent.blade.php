<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />

    <!-- My CSS -->
    <link rel="stylesheet" href="/style.css" />
    <!-- Akhir CSS -->

    <title>Portofolio Firta - @yield('title')</title>
  </head>
  <body id="home">

    <!-- Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Firta Arie Firmansyah</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link @if(Request::is('home')) active @endif" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if(Request::is('about')) active @endif" href="/about">About </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if(Request::is('project')) active @endif" href="/project">Projects</a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if(Request::is('contact')) active @endif" href="/contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Akhir Navbar-->


            @yield('content')

    <!-- Footer -->
    <footer class="bg-primary text-white text-center pb-5">
      <p>Created by <a href="https://www.instagram.com/firtaariefirmansyah/" class="text-white fw-bold">firtaariefirmansyah</a></p>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>