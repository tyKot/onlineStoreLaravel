@extends('layouts.admin_app')
{{-- <link rel="stylesheet" href="{{ asset('./assets/admin/css/admin_styles.css') }}"> --}}
@section('content')
    <div class="container-fluid">
        <div class="row main">
            @include('admin.page.components.adminHeader')

            <div class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="users-block">
                    <h4>Список награждений</h4>
                    <div class="table-responsive">
                        <table id="myTable" class="table table-light table-bordered align-middle">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">#</th>
                                    <th class="text-center" scope="col">Название конкурса</th>
                                    <th class="text-center" scope="col">Тип конкурса</th>
                                    <th class="text-center" scope="col">Пользователь</th>
                                    <th class="text-center" scope="col">Начислено баллов</th>
                                    <th class="text-center" scope="col">Ссылка на конкурс</th>
                                    <th class="text-center" scope="col">Действие</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                @foreach ($contests as $contest)
                                    <tr>
                                        <td class="text-center">{{ $contest->id }}</td>
                                        <td class="text-center">{{ $contest->contest_name }}</td>
                                        <td class="text-center">{{ $contest->contest_type }}</td>
                                        <td class="text-center">{{ $contest->user_id }}</td>
                                        <td class="text-center">{{ $contest->points }}</td>
                                        <td class="text-center">
                                            <a href="{{ $contest->link_detailed }}">
                                                {{ $contest->link_detailed }}
                                            </a>
                                        </td>
                                        <td class="text-center d-flex justify-content-evenly">
                                            {{-- <form action="{{ route('editProduct') }}" method="get">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $contest->id }}">
                                                <button type="submit"
                                                    class="btn btn-success mb-1 py-1 btn-edit">Редактировать</button>
                                            </form> --}}
                                            <form action="{{ route('deleteContest') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $contest->id }}">
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
                    <form action="{{ route('addMili') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="contest_name" class="form-label">Название</label>
                            <input type="text" class="form-control" name="contest_name" id="contest_name">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="contest_type" class="form-label">Тип конкурса</label>
                            <input type="text" class="form-control" name="contest_type" id="contest_type">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="user_id" class="form-label">Пользователь</label>
                            <select class="form-select js-select2" name="user_id" id="user_id">
                                @foreach ($users as $user)
                                    @if ($user['is_admin'])
                                    @else
                                        <option value="{{ $user->id }}">{{ $user->id }}.{{ $user->first_name }}
                                            {{ $user->surname }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="points" class="form-label">Сколько баллов</label>
                            <input type="text" class="form-control" name="points" id="points">
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-center">
                            <label for="link_detailed" class="form-label">Ссылка на конкурс</label>
                            <input type="text" class="form-control" value="#" name="link_detailed" id="link_detailed">
                        </div>

                        <button type="submit" class="btn btn-primary">Добавить</button>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/admin/admin_script.js'])
@endsection
