@extends('layouts.frontend')
@section('content')
@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
<section class="question-section section" id="question-section">
    <div class="question-section__container container">
        <div class="question-section__inner">
            <div class="question-section__headline flex-block">
                <h2 class="question-section__title">Популярные вопросы</h2>
                <div class="divider"></div>
            </div>
            <div class="question-section__content">
                <ul class="question-section__list accordion">
                    @forelse ($questions as $question)
                    <li class="accordion__item">
                        <article class="accordion__article">
                            <div class="accordion__article-header">
                                <h6 class="accordion__article-question">{{ $question->question }}</h6>
                                <div class="divider"></div>
                                <div class="accordion__article-icon">
                                    <i class='bx bx-plus'></i>
                                </div>
                            </div>
                            <div class="accordion__article-content">
                                <p class="accordion__article-text">{{ $question->description }}</p>
                            </div>
                        </article>
                    </li>
                    @empty
                        <h5 class="text-information">{{ __('Этот раздел редактируется') }}</h5>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection