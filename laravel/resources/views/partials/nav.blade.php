<nav class="main-nav" aria-label="menu principal">
    <ul>
        <li><a href="{{ route('home') }}" @if (($active ?? '') === 'inicio') class="active" @endif>Inicio</a></li>
        <li><a href="{{ route('tienda') }}" @if (($active ?? '') === 'tienda') class="active" @endif>Tienda</a></li>
        <li><a href="{{ route('tendencias') }}" @if (($active ?? '') === 'tendencias') class="active" @endif>Tendencias</a></li>
        <li><a href="{{ route('contacto') }}" @if (($active ?? '') === 'contacto') class="active" @endif>Contacto</a></li>
        <li><a href="{{ route('carrito') }}" @if (($active ?? '') === 'carrito') class="active" @endif>Carrito</a></li>
        <li><a href="{{ route('login') }}" @if (($active ?? '') === 'login') class="active" @endif>{{ Auth::check() ? 'Panel de administración' : 'Iniciar sesión' }}</a></li>
    </ul>
</nav>
