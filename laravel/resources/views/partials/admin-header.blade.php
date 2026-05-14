<header class="site-header">
    <div class="container">
        <a href="{{ route('panel') }}" class="logo" aria-label="Maylu Store - Admin">
            <img src="{{ asset('images/maylu logo sin fondo.png') }}" alt="Maylu Store logo"/>
        </a>
        <button class="btn-toggle" aria-label="abrir menu">
            <i class="fa-solid fa-bars"></i>
        </button>

        <nav class="main-nav" aria-label="menu administrativo">
            <ul>
                <li><a href="{{ route('panel') }}" @if (($active ?? '') === 'panel') class="active" @endif>Inicio</a></li>
                <li><a href="{{ route('admin.prendas.index') }}" @if (($active ?? '') === 'prendas') class="active" @endif>Prendas</a></li>
                <li><a href="{{ route('admin.categorias.index') }}" @if (($active ?? '') === 'categorias') class="active" @endif>Categorías</a></li>
                <li><a href="{{ route('admin.tallas.index') }}" @if (($active ?? '') === 'tallas') class="active" @endif>Tallas</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer; padding:0;"><a>Cerrar sesión</a></button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</header>
<div class="menu-responsive" aria-label="Menu Mobile">
    <ul>
        <li><a href="{{ route('panel') }}">Inicio</a></li>
        <li><a href="{{ route('admin.prendas.index') }}">Prendas</a></li>
        <li><a href="{{ route('admin.categorias.index') }}">Categorías</a></li>
        <li><a href="{{ route('admin.tallas.index') }}">Tallas</a></li>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" style="background:none; border:none; color:inherit; cursor:pointer; padding:0; width: 100%; text-align: left;"><a>Cerrar sesión</a></button>
            </form>
        </li>
    </ul>
</div>
