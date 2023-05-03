@extends('layouts.frontend')
@section('content')
@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
<section class="page-section section" id="page-menu">
    <div class="page-section__container container">
        <div class="page-section__inner">
            <div class="page-section__headline">
                <h2 class="page-section__title">{{ __('Меню') }}</h2>
                <div class="divider"></div>
            </div>
            <ul class="page-section__list grid-block">
                @forelse ($categories as $category)
                <li class="page-section__list-item">
                    <article class="page-section__list-article">
                        <img src="{{ Storage::url($category->image) }}" alt="" class="page-section__list-banner">
                        <div class="page-section__list-info">
                            <div class="page-section__list-detail">
                                {{-- <span class="page-section__list-span">240 руб.</span> --}}
                                <h5 class="page-section__list-name">{{ $category->name }}</h5>
                            </div>
                            <a href="{{ route('front.food', $category->id) }}" class="page-section__list-more"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
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