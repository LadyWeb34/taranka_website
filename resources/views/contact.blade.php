@extends('layouts.frontend')
@section('content')
@php
$setting = App\Models\Setting::where('id', 1)->first();
@endphp
<section class="contact-page" id="contact-page">
    <div class="contact-page__container container">
        <div class="contact-page__inner">
            <div class="contact-page__headline">
                <h2 class="contact-page__title">Наши контакты</h2>
                <div class="divider"></div>
            </div>
            <ul class="contact-page__list benefits-list">
                <li class="benefits-list__item grid-block">
                    <div class="benefits-list__item-col">
                        <h6 class="benefits-list__item-name">Разнообразие напитков</h6>
                    </div>
                    <div class="benefits-list__item-col">
                        <p class="benefits-list__item-description">Широкий выбор разных сортов пива, включая как традиционные, так и экспериментальные варианты.</p>
                    </div>
                </li>
                <li class="benefits-list__item grid-block">
                    <div class="benefits-list__item-col">
                        <h6 class="benefits-list__item-name">Приятная атмосфера</h6>
                    </div>
                    <div class="benefits-list__item-col">
                        <p class="benefits-list__item-description">У нас царит дружеская атмосфера, которая позволяет посетителям расслабиться и насладиться пивом в компании друзей или коллег.</p>
                    </div>
                </li>
                <li class="benefits-list__item grid-block">
                    <div class="benefits-list__item-col">
                        <h6 class="benefits-list__item-name">Вкусная закуска</h6>
                    </div>
                    <div class="benefits-list__item-col">
                        <p class="benefits-list__item-description">Пиво и закуска - это идеальное сочетание. Мы предлагаем вкусные и сытные закуски, которые подходят к разным сортам пива.</p>
                    </div>
                </li>
            </ul>
            <div class="contact-page__form-wrapper">
                <div class="contact-page__form-inner">
                    <div class="contact-page__form-header">
                        <h5 class="contact-page__form-title">Забронируйте стол или задайте свой вопрос</h5>
                    </div>
                    <form action="{{ route('front.toTg') }}" method="POST" class="contact-page__form-post">
                        @csrf
                        @method('POST')
                        <div class="contact-page__form-top">
                            <div class="contact-page__form-group">
                                <div class="contact-page__form-icon">
                                    <i class='bx bxs-user' ></i>
                                </div>
                                <input type="text" name="name" id="input-name" class="contact-page__form-input" placeholder="Введите имя">
                            </div>
                            <div class="contact-page__form-group">
                                <div class="contact-page__form-icon">
                                    <i class='bx bxs-phone' ></i>
                                </div>
                                <input type="phone" name="phone" id="input-phone" class="contact-page__form-input" placeholder="Введите моб.телефон">
                            </div>
                            <div class="contact-page__form-group">
                                <div class="contact-page__form-icon">
                                    <i class='bx bxs-envelope' ></i>
                                </div>
                                <input type="email" name="email" id="input-email" class="contact-page__form-input" placeholder="Введите e-mail">
                            </div>
                        </div>
                        <div class="contact-page__form-center">
                            <div class="contact-page__form-group">
                                <div class="contact-page__form-icon">
                                    <i class='bx bxs-message-dots' ></i>
                                </div>
                                <input type="text" name="message" id="input-message" class="contact-page__form-input" placeholder="Введите сообщение и кол-во гостей">
                            </div>
                        </div>
                        <div class="contact-page__form-bottom">
                            <span class="contact-page__form-span">Нажимая на кнопку «Отправить предложение», я даю свое согласие на обработку персональных данных</span>
                            <button type="submit" class="contact-page__form-button button button--outline">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection