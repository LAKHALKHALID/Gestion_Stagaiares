<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            {{ __('Dashboard') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a href="{{route('stagiaires.index')}}" class="nav-link">Stagiaires</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('inscription.index')}}" class="nav-link">Inscription</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('absences.index')}}" class="nav-link">Absences</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('comportement.index')}}" class="nav-link">Comportement</a>
                </li>
                
                <li class="nav-item">
                    <a href="{{route('listAbsences.index')}}" class="nav-link">ListAbsences</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('retraitBac.index')}}" class="nav-link">Retrait Bac</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('deperditions.index')}}" class="nav-link">Deperdition</a>
                </li>
                
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{-- {{ Auth::user()->name }} --}}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>