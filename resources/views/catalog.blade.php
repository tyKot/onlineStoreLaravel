@extends('layouts.app')
<link rel="preload" as="image" href="{{ asset('assets/page/catalog/mili.svg') }}">
<link rel="preload" as="image" href="{{ asset('assets/page/catalog/favorite.svg') }}">
<link rel="preload" as="image" href="{{ asset('assets/page/catalog/find.svg') }}">
@foreach ($products as $product)
    <link rel="preload" as="image" href="{{ asset($product->image) }}">
@endforeach
@section('content')
    @include('components.header')
    <main class="py-4">
        <section class="catalog">
            <div class="container">
                @if (\Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <div class="alert-body">
                            {{ \Session::get('success') }}
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="catalog__block row nowrap">
                    <div class="category">
                        <form action="" class="sortForm">
                            <div class="main-category">
                                <h4>Категории</h4>

                                <ul class="category-items d-flex flex-wrap gap-3 mx-3">
                                    @foreach ($categories as $category)
                                        <li class="category-item">
                                            <div class="form-check option p-0">
                                                <input class="form-check-input" type="radio"
                                                    id="category{{ $category['id'] }}" name="category"
                                                    value="{{ $category['id'] }}">
                                                <label class="form-check-label" for="category{{ $category['id'] }}">
                                                    {{-- <img src="{{asset('assets/link-border.svg')}}" alt=""> --}}
                                                    <div class="radio-btn">

                                                        {{ $category['name_category'] }}</div>
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="price-filter">
                                    <h4>Цена</h4>
                                    <div class="price-filter__inputs m-3 mt-2">
                                        <span>От<input type="number" pattern=" 0+\.[0-9]*[1-9][0-9]*$"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                name="minPrice" class="form-input minPrice">мили</span>
                                        <span>До<input type="number" pattern=" 0+\.[0-9]*[1-9][0-9]*$"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                name="maxPrice" class="form-input maxPrice">мили</span>
                                    </div>
                                    <button type="submit" class="btn btn-accept">Применить</button>
                                </div>
                                <div class="products">
                                    <div class="sort d-flex justify-content-end align-items-center">
                                        {{-- <div class="sorting">
                                        <span>
                                            Сортировать по:
                                        </span>
                                        <select name="sort" id="sort">
                                            <option value="popular">Популярности</option>
                                            <option value="price">Цене</option>
                                        </select>
                                    </div> --}}

                                        <div class="filters">

                                            <span class="filters-clear filtersClear">Сбросить фильтры</span>
                                        </div>

                                        <div class="search d-flex align-items-center">
                                            <input type="text" class="search__input" placeholder="Поиск товара">
                                            <img class="search__img" src="{{ asset('assets/page/catalog/find.svg') }}"
                                                alt="Найти">
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-1">
                        </form>
                    </div>


                    <div class="product-items" id="product-items">
                        @foreach ($products as $product)
                            @if (!$product['qty'])
                                <div class="product-item position-relative">
                                    <div class="position-absolute top-0 bottom-0 end-0 start-0 z-2 bg-secondary bg-opacity-50"
                                        style="--bs-bg-color:#252525;border-radius: 10px;">
                                        <div class="position-absolute start-0 end-0 bg-danger text-white text-center p-3"
                                            style="top:40%;">Нет в наличии</div>
                                    </div>
                                    <div class="card-head">
                                        <img class="image-card" src="{{ asset($product->image) }}" alt="image-card"
                                            width="235px" height="236px">
                                        {{-- <div class="favorite">
                                            @if ($product)
                                                <img src="{{ asset('assets/page/catalog/favorite.svg') }}" alt="favorite">
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
                                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>

                                            </p>
                                        </div>

                                        <form class="card_bottom-form m-0">
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
                                        <img class="image-card" src="{{ asset($product->image) }}" alt="image-card"
                                            width="235px" height="236px">
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
                                                <svg width="23" height="23" viewBox="0 0 23 23" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.5 22C17.299 22 22 17.299 22 11.5C22 5.70101 17.299 1 11.5 1C5.70101 1 1 5.70101 1 11.5C1 17.299 5.70101 22 11.5 22Z"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                    <path d="M7.99983 16.3333V7L11.4998 12.8333L14.9998 7V16.3333"
                                                        stroke="black" stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                            </p>
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
                        @endforeach
                    </div>

                    <div class="pagination">
                        {{ $products->onEachSide(0)->links() }}
                    </div>
                </div>

            </div>
            </div>
        </section>
    </main>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.search__input').on("keyup", function() {
                $.ajax({
                    url: "{{ route('catalog.find') }}",
                    method: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                        'query': $(this).val(),
                    },
                    success: function(response) {
                        if (response == '<div class="w-100">Ничего не найдено</div>') {
                            $(".pagination").hide();
                        }else{
                            $(".pagination").show();
                        }
                        $('#product-items').html(response);
                    },
                })
            });
            $('.sortForm').on('submit', function(e) {
                e.preventDefault();
                console.log($(this).val());
                $.ajax({
                    url: "{{ route('catalog.sort') }}",
                    method: "GET",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response == '<div class="w-100">Ничего не найдено</div>') {
                            $(".pagination").hide();
                        }else{
                            $(".pagination").show();
                        }
                        $('#product-items').html(response);
                    },
                });
            });
            $('.filtersClear').on('click', function() {
                $.ajax({
                    url: "{{ route('catalog.sort') }}",
                    method: "GET",
                    data: {
                        _token: '{{ csrf_token() }}',
                        'sort': 'delete',
                    },
                    success: function(response) {
                        $('.category-items').each(function() {
                            $('input[type="checkbox"]').prop('checked', false);
                        });
                        $('#product-items').html(response);
                    },
                })
            });
        });
    </script>
@endsection
