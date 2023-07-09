@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="py-4">
        <section class="profile">
            <div class="container">
                @if (\Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show " role="alert">
                        <div class="alert-body">
                            {{ \Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (\Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show " role="alert">
                        <div class="alert-body">
                            {{ \Session::get('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row gap-4">
                    <div class="m-auto p-0 row row-cols-1 row-cols-md-2 gap-4 gap-md-0">
                        <div class="col">
                            <div class="block">
                                <h3 class="block__name">
                                    {{ $dataUser->first_name }}&nbsp;{{ $dataUser->surname }}&nbsp;{{ $dataUser->patronymic }}
                                </h3>
                                <p>Баланс:&nbsp;{{ $dataUser->balance }}&nbsp;баллов</p>
                                <p class="mili-balance d-flex align-items-center">Мили:&nbsp;{{ $dataUser->mili }}&nbsp;
                                    <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                            stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333" stroke="black"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </p>
                                <p>Муниципальное образование:&nbsp;{{ $dataUser->municipality }}</p>
                                <p>Населённый пункт:&nbsp;{{ $dataUser->locality }}</p>
                                <p>Школа:&nbsp;{{ $dataUser->school }}</p>
                                <div class="input-group align-items-center justify-content-between gap-2">
                                    <p class="m-0" style="">E-mail:&nbsp;{{ $dataUser->email }}</p>
                                    <a class="user__reset-password btn btn-danger rounded-1 z-0"
                                        href="{{ route('password.update') }}">Сбросить пароль</a>
                                </div>
                            </div>
                        </div>
                        {{-- @dd($orders) --}}
                        <div class="col orders__block">
                            <div class="block">
                                <h3 class="block__name">История заказов</h3>
                                <div class="orders__items @if ($orders->isEmpty()) border-bottom @endif"
                                    style="@if ($orders->isEmpty()) --bs-border-color:#A8A8A8; @endif">
                                    @if ($orders->isEmpty())
                                        <div class="empty-history">
                                            Список заказов пуст
                                        </div>
                                    @else
                                        @foreach ($orders as $order)
                                            {{-- @dd(json_decode($order->products)) --}}
                                            @foreach (json_decode($order->products) as $key => $product)
                                                <div class="orders__product">
                                                    <div
                                                        class="product__item d-flex align-items-center justify-content-between">
                                                        <div class="d-flex flex-row align-items-center gap-1">
                                                            <div class="product__image">
                                                                <img class="product__image rounded-1"
                                                                    src="{{ asset($product->product_image) }}"
                                                                    alt="картинка {{ $product->product_name }}">
                                                            </div>
                                                            <div class="product__name">
                                                                <span>
                                                                    {{ $product->product_name }}
                                                                </span>
                                                                <span class="product__category">
                                                                    {{ $product->product_category }}
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            {{ $product->product_price }}
                                                            <svg width="23" height="23" viewBox="0 0 23 23"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                                                    stroke="black" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                                <path
                                                                    d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                                                    stroke="black" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>

                                                        </div>
                                                        <div>
                                                            {{ $product->product_qty }}&nbsp;шт.
                                                        </div>
                                                        <div
                                                            class="text-center @if ($order->status_id) waiting @else complete @endif">
                                                            {{ $order->status()->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    @endif

                                    <div class="pagination">
                                        {{ $orders->onEachSide(0)->links() }}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-auto row row row-cols-1 row-cols-md-2 gap-4 gap-md-0">

                        <div class="col exchange pe-0 pe-md-3 ps-0">
                            <div class="block">
                                <h3 class="block__name">Перевести баллы в мили</h3>
                                <div class="exchange-content">
                                    <div class="exchange-text">
                                        <span>Перевод баллов в соотношении 2 балла => 1 мили</span>
                                        <p class="mili-balance">Баланс: {{ $dataUser->balance }} баллов</p>
                                    </div>
                                    <form method="POST" class="exchange-form d-flex align-items-center flex-column"
                                        action="{{ route('exchange.points') }}">
                                        @csrf
                                        <div class="exchange-group d-flex align-items-center mt-3 justify-content-evenly">
                                            <input class="exchangeValue form-control" type="number" name="exchangeValue">
                                            <img class="exchange-arrow"
                                                src="{{ asset('assets/page/profile/right-arrow.png') }}" alt="">
                                            <div class="exchange-mili"><span>0</span>&nbsp;
                                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </div>
                                        </div>
                                        <button class="submitExchange exchange-submit" type="submit">Обменять</button>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div class="col ps-0 ps-md-3 pe-0">
                            <div class="block">
                                <h3 class="block__name">История обмена валюты</h3>
                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Баллы</th>
                                            <th scope="col">Мили</th>
                                            <th scope="col">Дата</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $countHistory = 0;
                                        @endphp
                                        @if ($history->isEmpty())
                                            <tr>
                                                <td class="text-center" colspan="5">
                                                    История пуста
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($history as $itemHistory)
                                                <tr>
                                                    <th scope="row">{{ $countHistory += 1 }}</th>
                                                    <td><span>-{{ $itemHistory->points }}</span> б.</td>
                                                    <td><span>+{{ $itemHistory->mili }}</span>&nbsp;
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

                                                    </td>
                                                    <td>{{ $itemHistory->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="main-info">
                        <div class="block">
                            <h3 class="block__name">Твои достижения</h3>
                            <table class="table table-hover">
                                <colgroup>
                                    <col style="padding: 20px;" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Название мероприятия</th>
                                        <th scope="col">Ты получил</th>
                                        <th scope="col">Описание</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($contests->isEmpty())
                                        <tr>
                                            <td class="text-center" colspan="4">
                                                У вас ещё нет побед? <a class="link-danger"
                                                    href="https://odarendeti73.ru/competition/olimpiady-i-konkursy/">Учавствуйте
                                                    в мероприятиях</a>
                                                и побеждайте!
                                            </td>
                                        </tr>
                                    @else
                                        @foreach ($contests as $contest)
                                            <tr>
                                                <td scope="row">1</td>
                                                <td>{{ $contest->contest_name }}</td>
                                                <td>{{ $contest->points }}</td>
                                                <td><a href="{{ $contest->link_detailed }}">Подбронее</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{-- <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav> --}}

                            <div class="paginate">
                                {{ $contests->onEachSide(0)->links() }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.exchangeValue').on('focus change keyup', function() {
                $('.exchange-mili span').text(Math.floor($(this).val() / 2));
            });
        });
    </script>
@endsection
