<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('buho.ico')}}"> 

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Round" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Two+Tone" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <script src="{{ asset('anime.min.js') }}" async></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/3be00db212.js" crossorigin="anonymous"></script>
    <title>@yield('titulo')</title>
</head>

<body>
    <div class="logo">
        <a href="{{ route('inicio') }}"><img src="{{ asset('img/buho.svg') }}" alt="buho"
                class="logo__imagen--width"></a>
    </div>

    <header class="header header--height">
        <nav>
            <span id="menu-barra" class="header__menu-barra">
                <i class="fas fa-bars header__i--margin"></i>Menu
            </span>
            <ul id="c" class="header__ul header__ul--none">

                <li><a href="{{ route('inicio') }}" class="header__a">{{ __('Home') }}</a></li>
                <li><a href="{{ route('ejemplar.ejemplares') }}" class="header__a">{{ __('Books') }}</a></li>
                <li><a href="{{ route('conocenos') }}" class="header__a">{{ __('About us') }}</a></li>
                <li><a href="{{ route('contacto') }}" class="header__a">{{ __('Contact') }}</a></li>
                <li><a href="{{ route('usuario.wishlist') }}" class="header__a"><i
                            class="fas fa-heart header__i--margin"></i>WishList</a></li>
                <li><a href="{{ route('carrito.show') }}" class="header__a"><i
                            class="fas fa-cart-plus header__i--margin"></i>{{ __('Cart') }}</a>
                </li>
                <li>
                    @if (Auth::user())

                        @if (Auth::user()->idRol == 3)
                            <a href="{{ route('admin') }}" class="header__a"><i
                                    class="fas fa-tools header__i--margin"></i>Admin</a>
                        @else
                            <a href="{{ route('usuario.userHome') }}" class="header__a"><i
                                    class="fas fa-user header__i--margin"></i>{{ __('My Account') }}</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="header__a"><i
                                class="fas fa-user header__i--margin"></i>{{ __('My Account') }}</a>
                    @endif
                </li>
            </ul>
        </nav>
    </header>

    <div class="contenedor">

        <main>
            @yield('content')
        </main>

    </div>

    <footer class="footer">
        <div class="footer__contenido">

            <div class="footer__informacion footer__informacion--width">
                <h3 class="footer__h3">{{ __('Further company information') }}</h3>
                <p class="footer__p--justify">
                    {{ __('The Owl is a library that contains a large number of books on many subjects for you to enjoy and learn from') }}
                </p>
            </div>

            <div class="footer__cambiar-idioma footer__cambiar-idiomas--width">
                <h3 class="footer__h3">{{ __('Change Language') }}</h3>
                <ul class="footer__ul">
                    @if (config('locale.status') && count(config('locale.languages')) > 1)
                        <div class="top-right links">
                            @foreach (array_keys(config('locale.languages')) as $lang)
                                @if ($lang != App::getLocale())
                                    <a href="{!! route('lang.swap', $lang) !!}" class="footer__idioma">
                                        <span class="footer__idioma--uppercase"> {!! $lang !!}</span> {!! $lang !!}
                                    </a>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </ul>
            </div>

            <div class="footer__contacto footer__contacto--width">
                <h3 class="footer__h3">{{ __('Customer Service') }}</h3>
                <a href="{{ route('contacto') }}" class="footer__a">{{ __('Contact') }}</a>
            </div>
        </div>

        <div class="footer__copyright">
            <div class="footer__div--size footer__div--padding">
                <span>© 2022 {{ __('All Rights Reserved') }}</span>
            </div>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('js/script.js') }}" async></script>

</body>

</html>
