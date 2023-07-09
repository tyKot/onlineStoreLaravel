@extends('layouts.admin_app')
{{-- <link rel="stylesheet" href="{{ asset('./assets/admin/css/admin_styles.css') }}"> --}}
@section('content')
    <div class="container-fluid">
        <div class="row main">
            @include('admin.page.components.adminHeader')

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="users-block">
                    <h4>Список пользователей</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-light table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Фамилия</th>
                                    <th class="text-center" scope="col">Имя</th>
                                    <th class="text-center" scope="col">Отчество</th>
                                    <th class="text-center" scope="col">Муниципальное образование</th>
                                    <th class="text-center" scope="col">Населённый пункт</th>
                                    <th class="text-center" scope="col">Школа</th>
                                    <th class="text-center" scope="col">Логин</th>
                                    <th class="text-center" scope="col">Почта</th>
                                    <th class="text-center" scope="col">Баланс</th>
                                    <th class="text-center" scope="col">Мили</th>
                                    <th scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($users as $user)
                                    @if ($user['is_admin'] == null)
                                        <tr>
                                            <td class="text-center">{{ $user->id }}</td>
                                            <td class="text-center">{{ $user->surname }}</td>
                                            <td class="text-center">{{ $user->first_name }}</td>
                                            <td class="text-center">{{ $user->patronymic }}</td>
                                            <td class="text-center">{{ $user->municipality }}</td>
                                            <td class="text-center">{{ $user->locality }}</td>
                                            <td class="text-center">{{ $user->school }}</td>
                                            <td class="text-center">{{ $user->login }}</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                            <td class="text-center">{{ $user->balance }}</td>
                                            <td class="text-center">{{ $user->mili }}</td>
                                            <td class="text-center d-flex justify-content-evenly gap-1 p-1">
                                                <form action="{{ route('editUser') }}" method="get">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <button type="submit" class="btn btn-success py-1 btn-edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-edit">
                                                            <path
                                                                d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                                            </path>
                                                            <path
                                                                d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                                            </path>
                                                        </svg>

                                                    </button>
                                                </form>
                                                <form action="{{ route('deleteUser') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <button type="submit" class="btn btn-danger py-1 btn-delete">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-user-minus">
                                                            <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="8.5" cy="7" r="4"></circle>
                                                            <line x1="23" y1="11" x2="17"
                                                                y2="11"></line>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="register-user">
                    <div class="d-flex justify-content-between mb-3">
                        <h4>Обновить данные пользователя</h4>
                        @if (\Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="alert-body">
                                    {{ \Session::get('success') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <button class="btn btn-primary mx-4" data-bs-toggle="modal" data-bs-target="#exampleModal">Импорт
                            пользователей</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Импорт пользователей</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="my-0">Загрузите подготовленный файл Excel в формате csv для импорта
                                            пользователей</p>
                                        <p class="my-0"><a class="btn btn-link"
                                                href="{{ asset('/assets/shablon.csv') }}">Скачать шаблон</a></p>
                                        <form action="{{ route('file.import') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="file" />
                                            <button type="submit" class="btn mt-2 w-100 btn-primary">Импорт</button>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Закрыть</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (\Session::has('user'))
                            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Данные</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="my-0">Фамилия: <b>{{ \Session::get('user')[3] }}</b></p>
                                            <p class="my-0">Имя: <b>{{ \Session::get('user')[2] }}</b></p>
                                            <p class="my-0">Логин: <b>{{ \Session::get('user')[0] }}</b></p>
                                            <p class="my-0">Пароль: <b>{{ \Session::get('user')[1] }}</b></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Закрыть</button>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    const myModalAlternative = new bootstrap.Modal('#myModal');
                                    myModalAlternative.show();
                                </script>
                                @php
                                    \Session::forget('user');
                                @endphp
                            </div>
                        @endif
                    </div>

                    <form action="{{ route('postEditUser') }}" method="post">
                        @csrf
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="surname" class="form-label">Фамилия</label>
                            <input type="text" value="{{ $edit_user->surname }}" class="form-control" name="surname"
                                id="surname">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="first_name" class="form-label">Имя</label>
                            <input type="text" value="{{ $edit_user->first_name }}" class="form-control"
                                name="first_name" id="first_name">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="patronymic" class="form-label">Отчество</label>
                            <input type="text" value="{{ $edit_user->patronymic }}" class="form-control"
                                name="patronymic" id="patronymic">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="md" class="form-label">Муниципальное образование</label>
                            <input type="text" value="{{ $edit_user->municipality }}" class="form-control"
                                name="municipality" id="md">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="locality" class="form-label">Населённый пункт</label>
                            {{-- @dd($edit_user) --}}
                            <select class="js-select2" name="locality" id="locality">
                                @foreach ($localities as $locality)
                                    @if ($locality->name == $edit_user->locality)
                                        <option selected="selected" value="{{ $locality->name }}">{{ $locality->name }}
                                        </option>
                                    @else
                                        <option value="{{ $locality->name }}">{{ $locality->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="school" class="form-label">Школа</label>
                            <input type="text" value="{{ $edit_user->school }}" class="form-control" name="school"
                                id="school">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="login" class="form-label">Логин</label>
                            <input type="text" value="{{ $edit_user->login }}" class="form-control" name="login"
                                id="login">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" value="{{ $edit_user->email }}" class="form-control" name="email"
                                id="email">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <label class="form-label mt-2">Новый пароль</label>
                            <div class="d-flex flex-column gap-2 w-100">
                                <input type="text" value="" class="form-control"
                                    placeholder="Поле для нового пароля" name="password" id="password">
                                <button type="button" class="btn btn-success w-50 generatePassword">Создать новый
                                    пароль</button>
                            </div>
                        </div>
                        <input class="genPass" type="hidden" name="id" value="{{ $edit_user->id }}">
                        <button type="submit" class="btn btn-primary">Обновить</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            console.log('gud');
            $('.js-select2').select2({
                placeholder: "Выберите округ",
                maximumSelectionLength: 2,
                language: "ru",
                theme: "bootstrap-5",
                width: "100%",
            });
            $('.generatePassword').on('click', function() {
                $.ajax({
                    url: "{{ route('editUserReGenPass') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: $('.genPass').val(),
                    },
                    success: function(response) {
                        $('#password').val(response);
                    }
                });
            });
        });
    </script>
    @vite(['resources/js/admin/admin_script.js'])
@endsection
