<!-- Left Side Of Navbar -->
<ul class="navbar-nav mr-auto">
	<a class="nav-link" href="{{ route("home") }}">Dashboard</a>
	<li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Manage taxonomies	 <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route("regnums.index") }}">
            	Regnums
            </a>
            <a class="dropdown-item" href="{{ route("divisios.index") }}">
            	Divisios
            </a>
            <a class="dropdown-item" href="{{ route("classes.index") }}">
            	Classes
            </a>
            <a class="dropdown-item" href="#">
            	Ordos
            </a>
            <a class="dropdown-item" href="#">
            	Familias
            </a>
            <a class="dropdown-item" href="#">
            	Genera
            </a>
            <a class="dropdown-item" href="#">
            	Species
            </a>
        </div>
    </li>
    {{-- <a class="nav-link" href="{{ route("settings") }}">Settings</a> --}}
</ul>