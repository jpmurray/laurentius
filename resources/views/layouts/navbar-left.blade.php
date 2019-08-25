<!-- Left Side Of Navbar -->
<ul class="navbar-nav mr-auto">
	<a class="nav-link" href="{{ route("home") }}">{{ __('Dashboard') }}</a>
	<li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ __('Manage taxonomies') }}	 <span class="caret"></span>
        </a>

        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route("regnums.index") }}">
            	{{ __('Regnums') }}
            </a>
            <a class="dropdown-item" href="{{ route("divisios.index") }}">
            	{{ __('Divisios') }}
            </a>
            <a class="dropdown-item" href="{{ route("classes.index") }}">
            	{{ __('Classes') }}
            </a>
            <a class="dropdown-item" href="{{ route("ordos.index") }}">
            	{{ __('Ordos') }}
            </a>
            <a class="dropdown-item" href="{{ route("familias.index") }}">
            	{{ __('Familias') }}
            </a>
            <a class="dropdown-item" href="{{ route("genera.index") }}">
            	{{ __('Genera') }}
            </a>
        </div>
    </li>
    <a class="nav-link" href="{{ route("species.index") }}">{{ __('Manage species') }}</a>
    <a class="nav-link" href="{{ route("suppliers.index") }}">{{ __('Manage suppliers') }}</a>
</ul>