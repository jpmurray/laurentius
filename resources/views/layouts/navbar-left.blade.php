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
            <a class="dropdown-item" href="{{ route("ordos.index") }}">
            	Ordos
            </a>
            <a class="dropdown-item" href="{{ route("familias.index") }}">
            	Familias
            </a>
            <a class="dropdown-item" href="{{ route("genera.index") }}">
            	Genera
            </a>
        </div>
    </li>
    <a class="nav-link" href="{{ route("species.index") }}">Manage species</a>
    <a class="nav-link" href="{{ route("suppliers.index") }}">Manage suppliers</a>
</ul>