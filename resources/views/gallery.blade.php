@extends('layouts.frontend')
@section('content')
@php
$setting = App\Models\Setting::where('id', 1)->first();
@endphp
<section class="page-section section" id="page-menu">
    <div class="page-section__container container">
        <div class="page-section__inner">
            <div class="page-section__headline">
                <h2 class="page-section__title">{{ __('Галерея') }}</h2>
                <div class="divider"></div>
            </div>
            <ul class="page-section__list gallery-list grid-block">
                @forelse ($galleries as $gallery)
                <li class="gallery-list__item">
                    <a data-fslightbox="gallery-page" href="{{ Storage::url($gallery->image) }}" class="gallery-list__link">
                        <img src="{{ Storage::url($gallery->image) }}" alt="" class="gallery-list__img">
                    </a>
                </li>
                @empty
                    {{ __('Этот раздел редактируется') }}
                @endforelse
            </ul>
        </div>
    </div>
</section>
@endsection