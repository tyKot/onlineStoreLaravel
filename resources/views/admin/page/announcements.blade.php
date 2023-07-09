@extends('layouts.admin_app')
{{-- <link rel="stylesheet" href="{{ asset('./assets/admin/css/admin_styles.css') }}"> --}}
@section('content')
    <div class="container-fluid">
        <div class="row main">
            @include('admin.page.components.adminHeader')
            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="users-block">
                    <h4>Список аннонсов</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-light table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Название</th>
                                    <th class="text-center" scope="col">Путь картинки</th>
                                    <th class="text-center" scope="col">Категория</th>
                                    <th class="text-center" scope="col">Ссылка</th>
                                    <th class="text-center" scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($announcements as $announcement)
                                    <tr>
                                        <td class="text-center">{{ $announce->id }}</td>
                                        <td class="text-center">{{ $announce->name }}</td>
                                        <td class="text-center">{{ $announce->picture }}</td>
                                        <td class="text-center">{{ $announce->announce_category }}</td>
                                        <td class="text-center">
                                            <a href="{{ $announce->link_detailed }}">
                                                {{ $announce->link }}
                                            </a>
                                        </td>
                                        <td class="text-center d-flex justify-content-evenly">
                                            <form action="{{ route('editAnnouncement') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $announce->id }}">
                                                <button type="submit"
                                                    class="btn btn-success mb-1 py-1 btn-edit">Редактировать</button>
                                            </form>
                                            <form action="{{ route('deleteAnnouncement') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $announce->id }}">
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
                    <h4>Зачислить баллы пользователю</h4>
                    @if (\Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                {{ \Session::get('success') }}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form action="{{ route('addAnnouncements') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="announce_name" class="form-label">Название</label>
                            <input type="text" class="form-control" name="announce_name" id="announce_name">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="announce_type" class="form-label">Тип аннонса</label>
                            <input type="text" class="form-control" name="announce_type" id="announce_type">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="announce_category" class="form-label">Категория</label>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                            </button>

                            <select class="form-select js-select2" name="announce_category" id="announce_category">
                                @foreach ($announce_categorys as $announce_category)
                                    <option value="{{ $announce_category->name }}">
                                        {{ $announce_category->name }}
                                    </option>
                                @endforeach
                            </select>

                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="link" class="form-label">Ссылка на аннонс</label>
                            <input type="text" class="form-control" value="#" name="link" id="link">
                        </div>

                        <button class="btn btn-primary">Добавить</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <form id="addCategory" action="{{ route('addAnnouncementCategory') }}" method="POST">
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
                                @foreach ($announce_categorys as $announce_category)
                                    <tr>
                                        <td>
                                            {{ $announce_category->name }}
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('deleteCategoryProduct') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ $announce_category->id }}">
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
    <script src="{{ asset('./assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('./assets/admin/js/i18n/ru.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-select2').select2({
                placeholder: "Выберите округ",
                maximumSelectionLength: 2,
                language: "ru",
                theme: "bootstrap-5",
                width: "100%",
            });
        });
    </script>
    @vite(['resources/js/admin/admin_script.js'])
@endsection
