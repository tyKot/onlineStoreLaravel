@extends('layouts.app')

@section('content')
    @include('components.header')
    <main class="py-4">
        <section class="cart">
            <div class="container">
                @if (\Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
                        <div class="alert-body">
                            {{ \Session::get('error') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row row-cols-1 row-cols-xl-2">
                    <div class=" col pe-3">
                        <div class="cart__block h-auto">
                            <div class="cart__header d-flex justify-content-between">
                                <h3 class="name__block">
                                    Корзина
                                    @if (empty($products))
                                        <sup class="name__block-sup">0</sup>
                                    @else
                                        <sup class="name__block-sup">{{ count(session('cart')) }}</sup>
                                    @endif
                                </h3>
                                <form action="{{ route('cart.clear') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn py-0 px-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                            <polyline points="3 6 5 6 21 6" />
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            {{-- @dd(session('cart')) --}}
                            <div class="product__items my-2">
                                @if (!empty($products))
                                    @foreach ($products as $key => $product)
                                        <div
                                            class="product__item d-flex align-items-center justify-content-between px-3 py-2">
                                            <div class="d-flex flex-row align-items-center gap-2">
                                                <div class="product__image">
                                                    <img class="product__image rounded-3"
                                                        src="{{ asset($product['image']) }}"
                                                        alt="картинка {{ $product['name'] }}">
                                                </div>
                                                <div class="product__name">
                                                    <span>
                                                        {{ $product['name'] }}
                                                    </span>
                                                    <span class="product__category">
                                                        {{ $product['category'] }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                {{ $product['product_price'] }}
                                                <svg width="20" height="20" viewBox="0 0 23 23" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                            </div>
                                            <div class="quantity_prod">
                                                <button class="btn_qty-down btnQtyDown"
                                                    data-product-id="{{ $key }}">
                                                    <img class="h-100" src="{{ asset('./assets/page/cart/minus.svg') }}"
                                                        alt="">
                                                </button>
                                                <input class="qty" id="qty" type="number"
                                                    value="{{ $product['order_qty'] }}" min="1"
                                                    max="{{ $product['product_qty'] }}">
                                                <button class="btn_qty-up btnQtyUp" data-product-id="{{ $key }}">
                                                    <img class="h-100" src="{{ asset('./assets/page/cart/plus.svg') }}"
                                                        alt="">
                                                </button>
                                            </div>
                                            <div>
                                                {{ $product['product_qty'] }}&nbsp;шт.
                                            </div>
                                            <form method="get" action="{{ route('cart.delete') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $key }}">
                                                <button class="border-0 bg-transparent" type="submit">
                                                    <svg width="32" height="32" viewBox="0 0 32 32" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_140_267)">
                                                            <path
                                                                d="M3.99994 29C3.86833 29.0008 3.73787 28.9755 3.61603 28.9258C3.49419 28.876 3.38338 28.8027 3.28994 28.71C3.19621 28.617 3.12182 28.5064 3.07105 28.3846C3.02028 28.2627 2.99414 28.132 2.99414 28C2.99414 27.868 3.02028 27.7373 3.07105 27.6154C3.12182 27.4936 3.19621 27.383 3.28994 27.29L27.2899 3.29C27.4782 3.1017 27.7336 2.99591 27.9999 2.99591C28.2662 2.99591 28.5216 3.1017 28.7099 3.29C28.8982 3.47831 29.004 3.7337 29.004 4C29.004 4.2663 28.8982 4.5217 28.7099 4.71L4.70994 28.71C4.6165 28.8027 4.50568 28.876 4.38385 28.9258C4.26201 28.9755 4.13155 29.0008 3.99994 29Z"
                                                                fill="#FA0202" />
                                                            <path
                                                                d="M27.9997 29C27.8681 29.0008 27.7376 28.9755 27.6158 28.9258C27.494 28.876 27.3831 28.8027 27.2897 28.71L3.2897 4.71C3.10139 4.5217 2.99561 4.2663 2.99561 4C2.99561 3.7337 3.10139 3.47831 3.2897 3.29C3.478 3.1017 3.7334 2.99591 3.9997 2.99591C4.266 2.99591 4.52139 3.1017 4.7097 3.29L28.7097 27.29C28.8034 27.383 28.8778 27.4936 28.9286 27.6154C28.9794 27.7373 29.0055 27.868 29.0055 28C29.0055 28.132 28.9794 28.2627 28.9286 28.3846C28.8778 28.5064 28.8034 28.617 28.7097 28.71C28.6163 28.8027 28.5054 28.876 28.3836 28.9258C28.2618 28.9755 28.1313 29.0008 27.9997 29Z"
                                                                fill="#FA0202" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_140_267">
                                                                <rect width="32" height="32" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        @php $total_price = $total_price + $product['order_price'] @endphp
                                    @endforeach
                                @else
                                    Корзина пуста
                                @endif
                            </div>
                            <div class="order">
                                <div class="order_price">Итого:&nbsp;
                                    <div class="total_price" id="total_price">{{ $total_price }}</div>&nbsp;
                                    <img class="mili" src="{{ asset('./assets/page/mili.svg') }}" alt="mili">
                                </div>
                                <form action="{{ route('cart.purchase') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-order">Заказать</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col ps-3">
                        <div class="map__block">
                            <h3 class="name__block">Где забрать заказ?</h3>
                            <p>Пункт выдачи:<br>
                                ул. Университетская Набережная, 2, Ульяновск</p>
                            <div class="ymap" id="map">
                                <iframe class="ymap"
                                    src="https://yandex.ru/map-widget/v1/?um=constructor%3A966d28f523e421e8c277b7927f08b7da7d842cb9498dead02c71b7a51b4ed7b9&amp;source=constructor"
                                    frameborder="0"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {

            $('.btnQtyUp').click(function() {
                var productId = $(this).data('product-id');
                var productQty = $(this).prev('.qty');
                var order_prod = parseInt($('span.product_price').text()) * parseInt(productQty.val());
                var max = productQty.attr('max');
                if (!productQty.val()) {
                    productQty.val(1);
                }

                if (parseInt(productQty.val()) < max) {
                    var newQuantity = parseInt(productQty.val()) + 1;
                    productQty.val(newQuantity);
                    $.ajax({
                        url: "{{ route('cart.update') }}",
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: productId,
                            qty: parseInt(productQty.val()),
                            order_price: order_prod,
                        }
                    })
                }
            });

            $('.btnQtyDown').click(function() {
                var productId = $(this).data('product-id');
                var productQty = $(this).next('.qty');
                var min = $('.qty').attr('min');
                if (!productQty.val()) {
                    productQty.val(1);
                }
                var order_prod = parseInt($('span.product_price').text()) * parseInt(productQty.val());
                if (parseInt(productQty.val()) > min) {
                    var newQuantity = parseInt(productQty.val()) - 1;
                    productQty.val(newQuantity);
                    $.ajax({
                        url: "{{ route('cart.update') }}",
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: productId,
                            qty: parseInt(productQty.val()),
                            order_price: order_prod,
                        },
                    })
                }
            });
        });
    </script>
@endsection
