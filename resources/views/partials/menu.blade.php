<div class="menu-wrapper" id="menu-wrapper">
    <button class="button-close" id="menu-close-btn">
        <i class='bx bx-x'></i>
    </button>
    <div class="menu-wrapper__container container">
        <div class="menu-wrapper__inner grid-block">
            <div class="menu-wrapper__col-block">
                @php
                    $setting = App\Models\Setting::where('id', 1)->first();
                @endphp
                <ul class="menu-wrapper__info flex-block">
                    <li class="menu-wrapper__info-item">
                        <div class="menu-wrapper__info-icon">
                            <i class='bx bx-map'></i>
                        </div>
                        <span>{{ $setting->adress }}</span>
                    </li>
                    <li class="menu-wrapper__info-item">
                        <div class="menu-wrapper__info-icon">
                            <i class='bx bx-time-five' ></i>
                        </div>
                        <span>{{ $setting->time }}</span>
                    </li>
                    <li class="menu-wrapper__info-item">
                        <div class="menu-wrapper__info-icon">
                            <i class='bx bx-phone'></i>
                        </div>
                        <span>{{ $setting->phone }}</span>
                    </li>
                </ul>
            </div>
            <div class="menu-wrapper__col-block">
                <nav class="menu-wrapper__navbar">
                    <ul class="menu-wrapper__navbar-list">
                        <li class="menu-wrapper__navbar-item">
                            <a href="{{ route('front.home') }}" class="menu-wrapper__navbar-link">{{ __('Главная') }}</a>
                        </li>
                        <li class="menu-wrapper__navbar-item">
                            <a href="{{ route('front.menu') }}" class="menu-wrapper__navbar-link">{{ __('Меню') }}</a>
                        </li>
                        <li class="menu-wrapper__navbar-item">
                            <a href="{{ route('front.question') }}" class="menu-wrapper__navbar-link">{{ ('Вопрос-Ответ') }}</a>
                        </li>
                        <li class="menu-wrapper__navbar-item">
                            <a href="{{ route('front.news') }}" class="menu-wrapper__navbar-link">{{ __('Новости') }}</a>
                        </li>
                        <li class="menu-wrapper__navbar-item">
                            <a href="{{ route('front.gallery') }}" class="menu-wrapper__navbar-link">{{ __('Галерея') }}</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>