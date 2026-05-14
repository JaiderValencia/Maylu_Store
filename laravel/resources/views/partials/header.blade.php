<header class="site-header">
    <!--se crea un contenedor con el logo y con un enlace directo a la pagina principal-->
    <div class="container">
        <a href="{{ route('home') }}" class="logo" aria-label="Maylu Store -inicio">
            <!--el aria label sirve para agregar una descripcion a un elemento...pero no es visible-->
            <img src="{{ asset('images/maylu logo sin fondo.png') }}" alt="Maylu Store logo" />
        </a>
        <button class="btn-toggle" aria-label="abrir menu">
            <i class="fa-solid fa-bars"></i> <!--esto sale del data y es el icono de tres rayas para el menu-->
        </button>

        @include('partials.nav', ['active' => $active ?? ''])
    </div>
</header>
<!--Menu responsive para mobile-->
<div class="menu-responsive" aria-label="Menu Mobile">
    <ul>
        <li><a href="{{ route('home') }}">Inicio</a></li>
        @if (!empty($mobileMenuNote))
            <!--menu solo para el menu-->
        @endif
        <li><a href="{{ route('tienda') }}">{{ $mobileShopLabel ?? 'Tienda' }}</a></li>
        <li><a href="{{ route('tendencias') }}">Tendencias</a></li>
        <li><a href="{{ route('contacto') }}">Contacto</a></li>
        <li><a href="{{ route('carrito') }}">Carrito</a></li>
        <li><a href="{{ route('login') }}">{{ Auth::check() ? 'Panel de administración' : 'Iniciar sesión' }}</a></li>
    </ul>
</div>
