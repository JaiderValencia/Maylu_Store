<footer class="site-footer">
    <div class="container footer-grid">

        <!-- LOGO y DESCRIPCIÓN -->
        <div class="footer-col">
            <div class="footer-logo">
                <img src="{{ asset('images/maylu logo sin fondo.png') }}" alt="Maylu Store logo">
            </div>
            <p>Moda femenina diseñada para resaltar tu esencia. Estilo, elegancia y autenticidad en cada prenda.</p>
        </div>

        <!-- ENLACES -->
        <div class="footer-col">
            <h4>Enlaces</h4>
            <ul>
                <li><a href="{{ route('home') }}">Inicio</a></li>
                <li><a href="{{ route('tienda') }}">Tienda</a></li>
                <li><a href="{{ route('tendencias') }}">Tendencias</a></li>
                <li><a href="{{ route('contacto') }}">Contacto</a></li>
            </ul>
        </div>

        <!-- CONTACTO -->
        <div class="footer-col">
            <h4>Contacto</h4>
            <p><i class="fa-brands fa-whatsapp"></i> +57 319 7279263</p>
            <p><i class="fa-brands fa-instagram"></i> @maylu_store_</p>
        </div>

        <!-- REDES -->
        <div class="footer-col">
            <h4>{{ $footerFollowLabel ?? 'Síguenos' }}</h4>
            <div class="social-icons">
                <a href="https://www.instagram.com/maylu_store_/" target="_blank">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="https://wa.me/573001112233" target="_blank">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>
            </div>
        </div>

    </div>

    <!-- COPYRIGHT -->
    <div class="footer-bottom">
        <p>© 2026 Maylu Store. Todos los derechos reservados.</p>
    </div>
</footer>
