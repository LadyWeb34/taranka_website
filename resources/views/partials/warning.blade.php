<div class="warning-wrapper" id="warning-wrapper">
    <div class="warning-wrapper__container container">
        <div class="warning-wrapper__inner flex-block">
            <div class="warning-wrapper__content">
                <img src="{{ asset('/assets/images/logo.png') }}" alt="" class="warning-wrapper__content-img">
                <h2 class="warning-wrapper__content-title">добро пожаловать</h2>
                <p class="warning-wrapper__content-text">Сайт содержит информацию, не рекомендованную для лиц, не достигших совершеннолетия. Сведения, размещенные на сайте, носят исключительно информационный характер и предназначены только для личного использования.</p>
            </div>
            <div class="warning-wrapper__action">
                <button class="warning-wrapper__button button button--outline" id="warning-success">Мне исполнилось 18 лет</button>
                <a href="{{ route('front.sorry') }}" class="warning-wrapper__button button button--outline" id="warning-exit">Я несовершеннолетний</a>
            </div>
        </div>
    </div>
</div>