@extends('layouts.frontend')
@section('content')
@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
<section class="hero-section" style="background-image: url('{{ Storage::url($setting->main_image) }}');">
    <div class="hero-section__container container">
        <div class="hero-section__inner flex-block">
            <h1 class="hero-section__title">Таранька бар</h1>
            <p class="hero-section__description">Погрузитесь в мир разнообразных вкусов и ароматов настоящего пива в нашем баре</p>
            <a href="tel:{{ $setting->phone }}" class="hero-section__phone-link">{{ $setting->phone }}</a>
        </div>
    </div>
</section>
<section class="gallery-section section" id="gallery-section">
    <div class="gallery-section__container container">
      <div class="gallery-section__inner">
          <ul class="gallery-section__grid grid-block">
            @forelse ($galleries as $gallery)
            <li class="gallery-section__grid-item">
                <a data-fslightbox="gallery" href="{{ Storage::url($gallery->image) }}" class="gallery-section__grid-link">
                    <img src="{{ Storage::url($gallery->image) }}" alt="" class="gallery-section__grid-image">
                </a>
            </li>
            @empty
                {{ __('Этот раздел редактируется') }}
            @endforelse
          </ul>
          <div class="gallery-section__footer flex-block">
              <div class="gallery-section__footer-col">
                  <div class="gallery-section__footer-count">фотографии 6 / {{ $gallery_full_count }}</div>
                  <div class="divider"></div>
              </div>
              <div class="gallery-section__footer-col">
                  <a href="{{ route('front.gallery') }}" class="gallery-section__footer-link button button--outline">Все фото</a>
              </div>
          </div>
      </div>
    </div>
</section>
<section class="menu-section section" id="menu-section" style="background-image: url('{{ asset('/assets/images/menu_background.webp') }}');">
    <div class="menu-section__container container">
      <div class="menu-section__inner flex-block">
          <div class="menu-section__content flex-block">
              <h2 class="menu-section__title">Основное меню</h2>
              <div class="menu-section__other">
                  <p class="menu-section__subtitle">Стартеры, закуски и блюда для всей компании. Сытный ужин все, что отлично подходит к пиву.</p>
                  <a href="{{ route('front.menu') }}" class="menu-section__more-link button button--outline">Смотреть основное меню</a>
              </div>
          </div>
      </div>
    </div>
</section>
<section class="partners-section section" id="partners-section">
  <div class="partners-section__container container">
    <div class="partners-section__inner">
        <h2 class="partners-section__title">Наши партнеры</h2>
        <div class="partners-section__content">
            <ul class="partners-section__list grid-block">
                @forelse ($partnerst as $partner)
                    <li class="partners-section__list-item">
                        <article class="partners-section__list-article">
                            <img src="{{ Storage::url($partner->image) }}" alt="" class="partners-section__list-image">
                        </article>
                    </li> 
                @empty
                    {{ __('Этот раздел редактируется') }}
                @endforelse
            </ul>
        </div>
    </div>
  </div>
</section>
<section class="about-section section" id="about-section" style="background-image: url('{{ asset('/assets/images/about_backgorund.jpg') }}');">
  <div class="about-section__container container">
    <div class="about-section__inner">
        <h2 class="about-section__title">Мы создаем настроение</h2>
        <p class="about-section__description">{{ $setting->about }}</p>
    </div>
  </div>
</section>
<section class="rent-section section" id="rent-section">
  <div class="rent-section__container container">
    <div class="rent-section__inner flex-block">
        <div class="rent-section__col-block flex-block">
            <h3 align="left" class="rent-section__title">Забронируйте столик</h3>
            <div class="divider"></div>
        </div>
        <div class="rent-section__col-block">
            <a href="{{ route('front.contact') }}" class="rent-section__link button button--outline">Забронировать место</a>
        </div>
    </div>
  </div>
</section>
<section class="contacts-section section" id="contacts-section" style="background-image: url('{{ asset('/assets/images/contacts-background.jpg') }}');">
  <div class="contacts-section__container container">
    <div class="contacts-section__inner flex-block">
        <h2 class="contacts-section__title">г.Волгоград {{ $setting->adress }}</h2>
        <a href="tel:{{ $setting->phone }}" class="contacts-section__phone"><i class='bx bxs-phone' ></i>{{ $setting->phone }}</a>
        <time class="contacts-section__time">ежедневно, {{ $setting->time }}</time>
    </div>
  </div>
</section>
@endsection