@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="main">

        <section class="promo section">
            <div class="container">
                @if (\Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{ \Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="swiper promo__swiper">
                    <ul class="swiper-wrapper">
                        <li class="swiper-slide">

                            <a href=''>
                                <picture class="promo__img">
                                    <source srcset="{{ asset('assets/page/index/slider/7.png') }}" media="(max-width: 575px)"
                                        type="image/webp">
                                    <source srcset="{{ asset('assets/page/index/slider/8.png') }}"
                                        media="(min-width: 576px)" type="image/webp">
                                    <img src="#" data-src="{{ asset('assets/page/index/slider/8.png') }}"
                                        alt="1" title="1" class="promo__img">
                                </picture>
                            </a>
                        </li>
                        <li class="swiper-slide">

                            <a href=''>
                                <picture class="promo__img">
                                    <source srcset="{{ asset('assets/page/index/slider/8_1_.png') }}"
                                        media="(max-width: 575px)" type="image/webp">
                                    <source srcset="{{ asset('assets/page/index/slider/9.png') }}"
                                        media="(min-width: 576px)" type="image/webp">
                                    <img src="#" data-src="{{ asset('assets/page/index/slider/9.png') }}"
                                        alt="2" title="2" class="promo__img">
                                </picture>
                            </a>
                        </li>
                        <li class="swiper-slide">

                            <a href=''>
                                <picture class="promo__img">
                                    <source srcset="{{ asset('assets/page/index/slider/Slayder-mobilka.png') }}"
                                        media="(max-width: 575px)" type="image/webp">
                                    <source srcset="{{ asset('assets/page/index/slider/Slayder-desktop.png') }}"
                                        media="(min-width: 576px)" type="image/webp">
                                    <img src="#"
                                        data-src="{{ asset('assets/page/index/slider/Slayder-desktop.png') }}"
                                        alt="3" title="3" class="promo__img">
                                </picture>
                            </a>
                        </li>
                    </ul>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
        </section>

        <section class="announcements section">
            <div class="container">
                <h1 class="section__title">Анонсы</h1>
                <div class="filter">
                    <ul class="filter__list">
                        <li class="filter__item">
                            <button class="filter__btn filter__btn_active">Все</button>
                        </li>
                        <li class="filter__item">
                            <button class="filter__btn">Наука</button>
                        </li>
                        <li class="filter__item">
                            <button class="filter__btn">Искусство</button>
                        </li>
                        <li class="filter__item">
                            <button class="filter__btn">Литературное творчество</button>
                        </li>
                        <li class="filter__item">
                            <button class="filter__btn">Спорт</button>
                        </li>
                    </ul>
                </div>
                <ul class="tabcontent">
                    <li class="tabcontent__item tabcontent__item_active">
                        <ul class="announcements__list">
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main announcements__item-main_active">
                                        <time class="announcements__item-date" datetime="30.03.2023">30.03.2023</time>
                                        <h3 class="announcements__item-title">
                                            <a href="https://odarendeti73.ru/announcements/art/letnie-intensivy-2023/"
                                                class="announcements__item-link">
                                                Платные летние практические интенсивы 2023 </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture announcements__item-picture_active">
                                        <source srcset="{{ asset('assets/page/index/Anonsy-_1_.png') }}" type="image/webp">
                                        <img src="{{ asset('assets/page/index/Anonsy-_1_.png') }}"
                                            data-src="{{ asset('assets/Anonsy-_1_.png') }}" alt="летние интенсивы 2023"
                                            class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="26.12.2022">26.12.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/science/astra-math-phy-ya-/"
                                                class="announcements__item-link">
                                                Летняя физико-математическая смена «ASTRA-MATH-PHY-Я!» </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source
                                            srcset="/upload/iblock/429/2qpx0de3omyp2vre5wzwoyasm4kg9m7g/3e437d0df9e62b3e8d44748110b67cf5....png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/429/2qpx0de3omyp2vre5wzwoyasm4kg9m7g/3e437d0df9e62b3e8d44748110b67cf5....png"
                                            alt="«ASTRA-MATH-PHY-Я!»" class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="17.08.2022">17.08.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/art/zhivopis-dlya-vzroslykh/"
                                                class="announcements__item-link">
                                                Курс "Живопись для взрослых" </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/9b1/vzcln6exisyh2a202yucyqu07ixwmwu8/Anonsy.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/9b1/vzcln6exisyh2a202yucyqu07ixwmwu8/Anonsy.png"
                                            alt="Живопись для взрослых" class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="29.06.2022">29.06.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/science/letniy-intensivy/"
                                                class="announcements__item-link">
                                                Платные летние практические интенсивы 2022 </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/e89/dol9xyp56pfju2s37eym4wz0p005oqaq/Anonsy-_1_.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/e89/dol9xyp56pfju2s37eym4wz0p005oqaq/Anonsy-_1_.png"
                                            alt="Летние интенсивы" class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                        </ul>

                    </li>
                    <li class="tabcontent__item">
                        <ul class="announcements__list">
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="26.12.2022">26.12.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/science/astra-math-phy-ya-/"
                                                class="announcements__item-link">
                                                Летняя физико-математическая смена «ASTRA-MATH-PHY-Я!» </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source
                                            srcset="/upload/iblock/429/2qpx0de3omyp2vre5wzwoyasm4kg9m7g/3e437d0df9e62b3e8d44748110b67cf5....png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/429/2qpx0de3omyp2vre5wzwoyasm4kg9m7g/3e437d0df9e62b3e8d44748110b67cf5....png"
                                            alt="«ASTRA-MATH-PHY-Я!»" class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="29.06.2022">29.06.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/science/letniy-intensivy/"
                                                class="announcements__item-link">
                                                Платные летние практические интенсивы 2022 </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/e89/dol9xyp56pfju2s37eym4wz0p005oqaq/Anonsy-_1_.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/e89/dol9xyp56pfju2s37eym4wz0p005oqaq/Anonsy-_1_.png"
                                            alt="Летние интенсивы" class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="21.06.2022">21.06.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/science/razdel-olimpiadnoy-matematiki-teoriya-chisel/"
                                                class="announcements__item-link">
                                                Приглашаем обучающихся 5-7 классов на программу «Раздел олимпиадной
                                                математики: теория чисел»<br>
                                            </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/82d/irq52iwvbd0ww737pjhjdokkzvq1aegv/IMG_7220.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/82d/irq52iwvbd0ww737pjhjdokkzvq1aegv/IMG_7220.png"
                                            alt="«Раздел олимпиадной математики: теория чисел»"
                                            class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="25.05.2022">25.05.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/science/iii-kazanskaya-olimpiada-yunykh-khimikov-/"
                                                class="announcements__item-link">
                                                Участвуй в III Казанской олимпиаде Юных химиков </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/732/9d0thjnt3obmzrgmqinsr3o2sp5d7h0g/Anonsy.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/732/9d0thjnt3obmzrgmqinsr3o2sp5d7h0g/Anonsy.png"
                                            alt=" III Казанская олимпиада Юных химиков " class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                        </ul>
                    </li>
                    <li class="tabcontent__item">
                        <ul class="announcements__list">
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="30.03.2023">30.03.2023</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/art/letnie-intensivy-2023/"
                                                class="announcements__item-link">
                                                Платные летние практические интенсивы 2023 </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/3a5/dceydmf22mctv3nb7l546tqpzxkalenp/Anonsy-_1_.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/3a5/dceydmf22mctv3nb7l546tqpzxkalenp/Anonsy-_1_.png"
                                            alt="летние интенсивы 2023" class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="17.08.2022">17.08.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/art/zhivopis-dlya-vzroslykh/"
                                                class="announcements__item-link">
                                                Курс "Живопись для взрослых" </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/9b1/vzcln6exisyh2a202yucyqu07ixwmwu8/Anonsy.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/9b1/vzcln6exisyh2a202yucyqu07ixwmwu8/Anonsy.png"
                                            alt="Живопись для взрослых" class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                        </ul>
                    </li>
                    <li class="tabcontent__item">
                        <ul class="announcements__list">
                        </ul>
                    </li>
                    <li class="tabcontent__item">
                        <ul class="announcements__list">
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="01.05.2022">01.05.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/sport/vserossiyskiy-turnir-po-volnoy-borbe-pobeda/"
                                                class="announcements__item-link">
                                                В Ульяновской области состоится традиционный XXXXII Всероссийский турнир
                                                по вольной борьбе «Победа»! </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source srcset="/upload/iblock/586/sy3h908z7txsgu8u9b51ohnhdolzjlcw/Anonsy.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/586/sy3h908z7txsgu8u9b51ohnhdolzjlcw/Anonsy.png"
                                            alt="Всероссийский турнир по вольной борьбе «Победа»"
                                            class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                            <li class="announcements__item">
                                <article class="announcements__item-article">
                                    <div class="announcements__item-main">
                                        <time class="announcements__item-date" datetime="13.04.2022">13.04.2022</time>
                                        <h3 class="announcements__item-title">
                                            <a href="/announcements/sport/turnir-po-khokkeyu-sredi-detskikh-komand-alye-parusa/"
                                                class="announcements__item-link">
                                            </a>
                                        </h3>
                                    </div>
                                    <picture class="announcements__item-picture">
                                        <source
                                            srcset="/upload/iblock/f70/1r7nj27hmlyhcv1evkpzg2yncnpqswc1/VSE-Anonsy-_2_-_1_.png"
                                            type="image/webp">
                                        <img src="#"
                                            data-src="/upload/iblock/f70/1r7nj27hmlyhcv1evkpzg2yncnpqswc1/VSE-Anonsy-_2_-_1_.png"
                                            alt="Турнир по хоккею среди детских команд «Алые паруса»"
                                            class="announcements__item-img">
                                    </picture>
                                </article>
                            </li>
                        </ul>
                    </li>
                </ul>
                <div class="announcements__all-wrapper">
                    <a href="https://odarendeti73.ru/announcements/" class="announcements__all">Все анонсы</a>
                </div>
            </div>
        </section>

        <section class="qna section">
            <div class="container">
                <h1 class="section__title">Как получить баллы?</h1>

                <div class="qna__cards row row-cols-1 row-cols-sm-2">
                    <div class="col p-1">
                        <div class="qna__card-item d-flex flex-column justify-content-between text-center p-2 h-100">
                            <img class="card__img h-100" src="{{ asset('assets/page/index/qna/uchavstvui.jpg') }}"
                                alt="1">
                            <span class="card__title">1.Участвуй в конкурсах</span>
                        </div>
                    </div>
                    <div class="col p-1">
                        <div class="qna__card-item d-flex flex-column justify-content-between text-center p-2 h-100">
                            <img class="card__img h-100" src="{{ asset('assets/page/index/qna/pobezhdai.jpg') }}"
                                alt="2">
                            <span class="card__title">2.Выигрывай призовые места</span>
                        </div>
                    </div>
                    <div class="col p-1">
                        <div class="qna__card-item d-flex flex-column justify-content-between text-center p-2 h-100">
                            <img class="card__img h-100" src="{{ asset('assets/page/index/qna/obmen.png') }}"
                                alt="3">
                            <span class="card__title">3.Обменивай баллы</span>
                        </div>
                    </div>
                    <div class="col p-1">
                        <div class="qna__card-item d-flex flex-column justify-content-between text-center p-2 h-100">
                            <img class="card__img w-auto h-100" src="{{ asset('assets/page/index/qna/poluchai.png') }}"
                                alt="4">
                            <span class="card__title">4.Получай призы</span>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="popular-products section">
            <div class="container">
                <h1 class="section__title">Товары</h1>
                <div class="slider">
                    <div class="slider-product">

                        <div class="responsive container p-0">
                            @foreach ($products as $product)
                                <div class="slider-product col mx-1 p-2 h-auto">
                                    @if (!$product->qty)
                                        <div class="product-item position-relative">
                                            <div class="position-absolute top-0 bottom-0 end-0 start-0 z-2 bg-secondary bg-opacity-50"
                                                style="--bs-bg-color:#252525;border-radius: 10px;">
                                                <div class="position-absolute start-0 end-0 bg-danger text-white text-center p-3"
                                                    style="top:40%;">Нет в наличии</div>
                                            </div>
                                            <div class="card-head">
                                                <img class="image-card" src="{{ asset($product->image) }}"
                                                    alt="image-card" width="235px" height="236px">
                                                {{-- <div class="favorite">
                                                    @if ($product)
                                                        <img src="{{ asset('assets/page/catalog/favorite.svg') }}"
                                                            alt="favorite">
                                                    @else
                                                        <img src="{{ asset('assets/page/catalog/favorite-active.svg') }}"
                                                            alt="favorite">
                                                    @endif
                                                </div> --}}
                                            </div>

                                            <div class="card_bottom-section">
                                                <div class="card-info">
                                                    <h5 class="card-name">{{ $product->name }}</h5>
                                                    <p class="card-price">{{ $product->price }}
                                                        <svg width="23" height="23" viewBox="0 0 23 23"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                                                stroke="black" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                                                stroke="black" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>

                                                    </p>
                                                </div>

                                                <form class="card_bottom-form" method="" action=''>
                                                    <button class="purchase" type="button">
                                                        <img src="{{ asset('assets/page/catalog/product-buy.svg') }}"
                                                            alt="buy">
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    @else
                                        <div class="product-item w-100">
                                            <div class="card-head">
                                                <img class="image-card" src="{{ asset($product->image) }}"
                                                    alt="image-card" width="235px" height="236px">
                                                <div class="favorite">
                                                    {{-- @if ($product)
                                                        <img src="{{ asset('assets/page/catalog/favorite.svg') }}"
                                                            alt="favorite">
                                                    @else
                                                        <img src="{{ asset('assets/page/catalog/favorite-active.svg') }}"
                                                            alt="favorite">
                                                    @endif --}}
                                                </div>
                                            </div>

                                            <div class="card_bottom-section">
                                                <div class="card-info">
                                                    <h5 class="card-name">{{ $product->name }}</h5>
                                                    <p class="card-price">{{ $product->price }}
                                                        <svg width="23" height="23" viewBox="0 0 23 23"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                                                stroke="black" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                            <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                                                stroke="black" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </svg>

                                                </div>

                                                <form class="card_bottom-form m-0" method="POST"
                                                    action='{{ route('cart.add') }}' enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                                    <button class="purchase" type="submit">
                                                        <img src="{{ asset('assets/page/catalog/product-buy.svg') }}"
                                                            alt="buy">
                                                    </button>
                                                </form>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        </div>
    </main>
    @include('components.footer')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.responsive').slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2500,
                // variableWidth: true,
                touchMove: false,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,

                        }
                    },
                    {
                        breakpoint: 876,
                        settings: {
                            slidesToShow: 3,

                        }
                    },
                    {
                        breakpoint: 680,
                        settings: {
                            slidesToShow: 2,

                        }
                    },
                    {
                        breakpoint: 460,
                        settings: {
                            slidesToShow: 1,

                        }
                    },
                ],
            });

            new Swiper('.promo__swiper', {
                autoplay: {
                    delay: 3000,
                },
                grabCursor: true,
                loop: true,
                spaceBetween: 30,
                speed: 700,
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                }
            });

        });
    </script>
@endsection
