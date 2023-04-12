<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <img src="{{ asset('/logo/logo.JPG')}}"
        width="95"
        height="45"
        class="rounded-circle"
        alt="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/')}}">Accueil</a>
          </li>

          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                categories
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Visage</a></li>
              <li><a class="dropdown-item" href="#">COMPLÉMENTS ALIMENTAIRES</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Dentaire</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled"> Marques</a>
          </li> --}}

          @if(auth()->check())
          <li class="nav-item">
              <a class="nav-link" href="{{route('profile.show')}}">
                {{auth()->user()->name}}
              </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('post.create')}}">Ajouter</a>
          </li>
          @else
          <li class="nav-item">
              <a class="nav-link" href="{{route('register')}}">
                 Inscription
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{route('login')}}">
                 Connexion
              </a>
            </li>
          @endif


        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Recherche</button>
        </form>
      </div>
    </div>
  </nav>
