@extends('layouts.frontend')
@section('content')
@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
<section class="single-section" id="single-section">
    <div class="single-section__container container">
        <div class="single-section__inner">
            <article class="single-section__post">
                <div class="single-section__header grid-block">
                    <div class="single-section__col-block">
                        <a href="{{ route('front.news') }}" class="single-section__link-back link-back">
                            <span class="link-back__icon"><i class='bx bx-left-arrow-alt'></i></span>
                            к новостям
                        </a>
                    </div>
                    <div class="single-section__col-block">
                        <time class="single-section__date">{{ $show->created_at->format('d/m/y') }}</time>
                        <h2 class="single-section__name">{{ $show->name }}</h2>
                    </div>
                </div>
                <div class="single-section__content">
                    <div class="single-section__content-banner">
                        <a data-fslightbox="single-page" href="{{ Storage::url($show->image) }}" class="single-section__content-viewport">
                            <img src="{{ Storage::url($show->image) }}" alt="{{ $show->name }}" class="single-section__content-img">
                        </a>
                    </div>
                    <div class="single-section__content-detail grid-block">
                        <div class="single-section__col-block"></div>
                        <div class="single-section__col-block">
                            <div class="single-section__content-text">
                                <p>{{ $show->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="single-section__footer grid-block">
                        <div class="single-section__col-block">
                            <h4 class="single-section__more">Другие новости</h4>
                        </div>
                        <div class="single-section__col-block">
                            <ul class="single-section__cards post-list grid-block" style="--collumn: 6">
                                @forelse ($recomented as $recitem)
                                    <li class="post-list__item">
                                        <article class="post-list__article">
                                            <div class="post-list__article-detail">
                                                <time class="post-list__article-date">{{ $recitem->created_at->format('d/m/y') }}</time>
                                                <div class="post-list__article-info">
                                                    <h5 class="post-list__article-name">{{ $recitem->name }}</h5>
                                                    <a href="{{ route('front.single', $recitem->slug) }}" title="Открыть запись" class="post-list__article-more">
                                                        <i class='bx bx-right-arrow-alt'></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <img src="{{ Storage::url($recitem->image) }}" alt="" class="post-list__article-banner">
                                        </article>
                                    </li> 
                                    @empty
                                        {{ __('Других новостей нет') }}
                                    @endforelse
                            </ul>
                        </div>
                    </div>
            </article>
        </div>
    </div>
</section>
@endsection