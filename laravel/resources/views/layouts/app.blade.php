<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/maylu logo sin fondo.png') }}">
    @yield('meta')
    <!--FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <!--CDN FONTAWE data-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!--CSS-->
    <!--llamamos los css de la carpeta..como html vienen en cascda si importa el orden en que pongamos los link-->
    @vite(['resources/css/global.css', 'resources/css/header.css'])
    @yield('styles')
    @vite(['resources/css/footer.css'])
</head>
<body data-route-home="{{ route('home') }}" data-route-producto="{{ route('producto') }}" data-products-base="{{ asset('images/productos') }}">
    @include('partials.header', [
        'active' => $navActive ?? '',
        'mobileShopLabel' => $mobileShopLabel ?? 'Tienda',
        'mobileMenuNote' => $mobileMenuNote ?? ''
    ])
    <main>
        @yield('content')
    </main>
    @include('partials.footer', [
        'footerFollowLabel' => $footerFollowLabel ?? 'Síguenos'
    ])
    @yield('scripts')
</body>
</html>
