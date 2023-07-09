@extends('layouts.admin_app')
{{-- <link rel="stylesheet" href="{{ asset('./assets/admin/css/admin_styles.css') }}"> --}}
@section('content')
    <div class="container-fluid">
        <div class="row main">
            @include('admin.page.components.adminHeader')
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="users-block">
                    <h4>Список заказов</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-light table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Номер заказа</th>
                                    <th class="text-center" scope="col">Товары</th>
                                    <th class="text-center" scope="col">Пользователь</th>
                                    <th class="text-center" scope="col">Сумма заказа</th>
                                    <th class="text-center" scope="col">Статус</th>
                                    <th class="text-center" scope="col">Дата заказа</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @if (!empty($orders))
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td class="text-center order_id">{{ $order->id }}</td>
                                            <td class="text-center">{{ $order->number_order }}</td>
                                            <td class="text-left">
                                                {{-- @dd(json_decode($order->products)) --}}
                                                <details style="width: fit-content;">
                                                    <summary style="width:fit-content;">Подрбонее о заказе</summary>
                                                    @foreach (json_decode($order->products) as $id => $productItem)
                                                        <p class="m-0" style="width: fit-content;">
                                                            {{ $productItem->product_name ?? '' }}({{ $productItem->product_qty ?? '' }}){{ $productItem->product_price ?? '' }}
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
                                                            <br>
                                                        </p>
                                                    @endforeach
                                                </details>
                                            </td>
                                            <td class="text-center">
                                                {{ $order->user()->first_name }}&nbsp;{{ $order->user()->surname }}
                                            </td>
                                            <td class="text-center">{{ $order->sum }}</td>
                                            <td>
                                                <select name="status_id" class="form-select status_id" aria-label="Статус" >
                                                    @foreach ($statuses as $status)
                                                        @if ($status->id == $order->status()->id)
                                                            <option selected value="{{ $status->id }}">{{ $status->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $status->id }}">{{ $status->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            {{-- <td class="text-center">{{ $order->status() }}</td> --}}
                                            <td class="text-center">{{ $order->created_at }}</td>
                                            {{-- <td class="text-center d-flex justify-content-evenly">
                                            <form action="{{ route('editorder') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $order->id }}">
                                                <button type="submit"
                                                    class="btn btn-success mb-1 py-1 btn-edit">Редактировать</button>
                                            </form>
                                            <form action="{{ route('deleteProduct') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit"
                                                    class="btn btn-danger py-1 btn-delete">Удалить</button>
                                            </form>
                                        </td> --}}
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td class="text-center" colspan="7">Нет заказов</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/admin/admin_script.js'])
    <script type="text/javascript">
        $('.status_id').change(function() {
            $.ajax({
                url: "{{ route('changeStatus') }}",
                method: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    order_id: $('.order_id').text(),
                    status_id: $(this).val(),
                },
                success: function(response) {

                },
            });
        });
    </script>
@endsection
