@extends('layouts.frontend')
@section('content')
@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
<section class="page-section section" id="page-menu">
    <div class="page-section__container container">
        <div class="page-section__inner">
            <div class="page-section__headline">
                <h2 class="page-section__title">Новости</h2>
                <div class="divider"></div>
            </div>
            <ul class="page-section__list post-list grid-block" style="--collumn: 4;">
                @forelse ($news as $new)
                <li class="post-list__item">
                    <article class="post-list__article">
                        <div class="post-list__article-detail">
                            <time class="post-list__article-date">{{ $new->created_at->format('d/m/y') }}</time>
                            <div class="post-list__article-info">
                                <h5 class="post-list__article-name">{{ $new->name }}</h5>
                                <a href="{{ route('front.single', $new->slug) }}" title="Открыть запись" class="post-list__article-more">
                                    <i class='bx bx-right-arrow-alt'></i>
                                </a>
                            </div>
                        </div>
                        <img src="{{ Storage::url($new->image) }}" alt="" class="post-list__article-banner">
                    </article>
                </li>
                @empty
                    <h5 class="text-info">{{ __('Этот раздел редактируется') }}</h5>
                @endforelse
            </ul>
        </div>
    </div>
</section>
@endsection