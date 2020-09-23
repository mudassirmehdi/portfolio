  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container d-flex align-items-center px-4">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
        <span class="order-lg-last">
          <div class="d-flex">
            <img src="{{ asset('frontend/images/bismillah.png') }}" height="30">
          </div>
        </span>
        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link pl-0">Home</a></li>
            <li class="nav-item"><a href="{{ url('about') }}" class="nav-link">About</a></li>
            <!-- <li class="nav-item"><a href="{{ url('gallery') }}" class="nav-link">Gallery</a></li> -->
            <li class="nav-item"><a href="{{ url('team') }}" class="nav-link">Staff</a></li>
            <li class="nav-item"><a href="{{ url('blog') }}" class="nav-link">News</a></li>
            <li class="nav-item"><a href="{{ url('contact') }}" class="nav-link">Contact</a></li>
          </ul>
        </div>
      </div>
    </nav>