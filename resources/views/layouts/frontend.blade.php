<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Описание сайта таранька бар">
    <meta name="author" content="Кондрашов Алексей">
    <meta name="robots" content="index,follow" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/assets/images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffc40d">
    <meta name="theme-color" content="#ffffff">
    <title>Таранька - бар</title>
    <link rel="stylesheet" href="{{ asset('/assets/style/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/style/main.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script defer src="{{ asset('/assets/javascript/libs/scrolltrigger.min.js') }}"></script>
    <script defer src="{{ asset('/assets/javascript/libs/gsap.min.js') }}"></script>
    <script defer src="{{ asset('/assets/javascript/libs/fslightbox.js') }}"></script>
    <script defer src="{{ asset('/assets/javascript/main.js') }}"></script>
</head>
<body class="app" id="app">
   <div class="app-layout" id="app-layout">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="link-dashboard">
                        <i class='bx bxs-dashboard'></i>
                    </a>
                @endauth
            </div>
        @endif
        @include('partials.menu')
        @if(\Illuminate\Support\Facades\Route::is('front.home'))
        @php
            $setting = App\Models\Setting::where('id', 1)->first();
        @endphp
        <header class="header" id="header">
            <div class="header__container container">
                <div class="header__inner flex-block">
                    <div class="header__col-block">
                        <ul class="header__info flex-block">
                            <li class="header__info-item flex-block">
                                <i class='bx bx-map'></i>
                                <span>{{ $setting->adress }}</span>
                            </li>
                            <li class="header__info-item flex-block">
                                <i class='bx bx-time-five' ></i>
                                <span>ежедневно, {{ $setting->time }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="header__col-block">
                        <a href="{{ route('front.home') }}" title="На главную" class="header__logo logo-brand">
                            <img height="72" src="{{ asset('/assets/images/logo.png') }}" alt="Логотип Таранька-бар" class="logo-brand__img">
                        </a>
                    </div>
                    <div class="header__col-block">
                        <button class="header__btn-menu" id="btn-menu">
                            Навигация
                            <i class='bx bx-menu' ></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @else
        <header class="header header--black-font" id="header">
            <div class="header__container container">
                <div class="header__inner flex-block">
                    <div class="header__col-block">
                        <ul class="header__info flex-block">
                            <li class="header__info-item flex-block">
                                <i class='bx bx-map'></i>
                                <span>{{ $setting->adress }}</span>
                            </li>
                            <li class="header__info-item flex-block">
                                <i class='bx bx-time-five' ></i>
                                <span>ежедневно, {{ $setting->time }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="header__col-block">
                        <a href="{{ route('front.home') }}" title="На главную" class="header__logo logo-brand">
                            <img height="72" src="{{ asset('/assets/images/logo.png') }}" alt="Логотип Таранька-бар" class="logo-brand__img">
                        </a>
                    </div>
                    <div class="header__col-block">
                        <button class="header__btn-menu" id="btn-menu">
                            Навигация
                            <i class='bx bx-menu' ></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        @endif
        <!-- header end -->
        <!-- main start -->
        <main class="main-content" id="main">
            <div class="page-content" id="page-content">
                @yield('content')
            </div>
        </main>
        <!-- end main -->
        <!-- start footer -->
        @include('partials.footer')
        <!-- end footer -->
        <!-- warning-wrapper start -->
        @include('partials.warning')
        <!-- warning-wrapper end -->
    </div> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Ваша заявка успешно отправлена!',
                showConfirmButton: false,
                timer: 1500
            })
        </script>
    @endif
</body>
</html>