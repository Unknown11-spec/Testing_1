<nav class="navbar navbar-expand-lg  bg-primary navbar-dark py-3">
    <div class="container">
      {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse col-4" id="navbarNavAltMarkup">
        <div class="navbar-nav me-auto">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
          {{-- <a class="nav-link" href="#">Features</a>
          <a class="nav-link" href="#">Pricing</a>
          <a class="nav-link disabled" aria-disabled="true">Disabled</a> --}}
        </div>
      </div>
            @if(Auth::check())
                
                <div class="dropdown">
                    <a class="btn text-white dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{Auth::user()->name}}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('profile.index') }}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('photo.post') }}">Post</a></li>
                        <li><a class="dropdown-item" href="{{ route('album.create_album') }}">Create Album</a></li>
                        <li><a class="dropdown-item" href="{{ route('album.index', Auth::user()->id) }}">Album</a></li>
                        <li><a class="dropdown-item" href="/logout">Logout</a></li>
                    </ul>
                </div>
        	  @else
                <a href="/login" class="nav-link active text-white">Login</a>
            @endif
      </div>
    </div>
  </nav>
