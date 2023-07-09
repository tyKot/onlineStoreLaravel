@extends('layouts.admin_app')
{{-- <link rel="stylesheet" href="{{ asset('./assets/admin/css/admin_styles.css') }}"> --}}
@section('content')
    <div class="container-fluid">
        <div class="row main">
            @include('admin.page.components.adminHeader')

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="users-block">
                    <div class="page-header d-flex justify-content-between pb-2">
                        <h4>Список товаров</h4>
                        {{-- <button type="submit" class="btn btn-danger">Удалить все товары</button> --}}
                    </div>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-light table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">ID</th>
                                    <th class="text-center" scope="col">Название</th>
                                    <th class="text-center" scope="col">Цена</th>
                                    <th class="text-center" scope="col">Категория</th>
                                    <th class="text-center" scope="col">Путь картинки</th>
                                    <th class="text-center" scope="col">Количество</th>
                                    <th class="text-center" scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="text-center">{{ $product->id }}</td>
                                        <td class="text-center">{{ $product->name }}</td>
                                        <td class="text-center">{{ $product->price }}</td>
                                        <td class="text-center">{{ $product->category() }}</td>
                                        <td class="text-center"
                                            style="text-overflow: ellipsis;
                                                    white-space: nowrap;
                                                    overflow: hidden;
                                                    -webkit-line-clamp: 3;
                                                    -webkit-box-orient: vertical;
                                                    min-width: 100px;
                                                    max-width: 300px;">
                                            {{ $product->image }}
                                        </td>
                                        <td class="text-center">{{ $product->qty }}</td>
                                        <td class="text-center d-flex justify-content-evenly">
                                            <form action="{{ route('editProduct') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit"
                                                    class="btn btn-success py-1 btn-edit">Редактировать</button>
                                            </form>
                                            <form action="{{ route('deleteProduct') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit"
                                                    class="btn btn-danger py-1 btn-delete">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="register-user">
                    <h4>Добавить товар в базу данных</h4>
                    @if (\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{ \Session::get('success') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @error('image')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{ $message }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror
                    <form action="{{ route('addProduct') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="price" class="form-label">Цена</label>
                            <input type="text" class="form-control" name="price" id="price">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="category_id" class="form-label">Категория</label>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                            </button>
                            <select name="category_id" class="form-select js-select2" aria-label="Категории">
                                <option selected>Выберите категории</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="image" class="form-label">Загрузить фото</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image') is-invalid @enderror">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="qty" class="form-label">Количество</label>
                            <input type="number" min="0" pattern="\d [0-9]"
                                title="Введите количество продуктов в числовом формате" class="form-control"
                                name="qty" id="qty">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id="addCategory" action="{{ route('addProductCategory') }}" method="POST">
            @csrf
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить категорию</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <table id="categoryTable" class="table table-light table-bordered align-middle">
                            <thead>
                                <th>Название</th>
                                <th></th>
                            </thead>
                            <tbody>
                                @foreach ($categorys as $category)
                                    <tr>
                                        <td>
                                            {{ $category->name_category }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('deleteCategoryProduct') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $category->id }}">
                                                <button type="submit"
                                                    class="btn btn-danger py-1 btn-delete">Удалить</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @csrf
                        <div class="d-flex mt-2 gap-2 align-items-center">
                            <label class="form-label" for="category_name">Добавить</label>
                            <input class="form-control" id="category_name" type="text" name="category_name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-primary addCategory">Добавить</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-select2').select2({
                placeholder: "Выберите категорию",
                maximumSelectionLength: 2,
                language: "ru",
                theme: "bootstrap-5",
                width: "100%",
            });

        });
    </script>
    @vite(['resources/js/admin/admin_script.js'])
@endsection
