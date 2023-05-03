@extends('layouts.frontend')
@section('content')           
@php
    $setting = App\Models\Setting::where('id', 1)->first();
@endphp
 <section class="sorry-section">
    <div class="sorry-section__container container">
        <div class="sorry-section__inner">
            <h2 class="sorry-section__title">Извините</h2>
            <p class="sorry-section__subtitle">Сайт доступен только лицам от 18 лет!</p>
        </div>
    </div>
</section>
@endsection    