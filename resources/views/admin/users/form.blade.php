@extends('admin.layouts.app')

@section('title', 'Пользователь')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <h3 style="margin-top: 5px;">
                    @if (isset($user))
                        Пользователь {{ $user->surname }} {{ $user->name }}
                    @else
                        Создание пользователя
                    @endif
                </h3>
            </div>
        </div>
        @if (isset($user))
            <form action="{{ route('admin.user.update', $user->id) }}" method="post">
            @method('PATCH')
        @else
            <form action="{{ route('admin.user.store') }}" method="post">
        @endif
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="mb-3">
                                    <label for="surname" class="form-label">Фамилия</label>
                                    <input type="text" class="form-control" id="surname" name="surname" value="{{ isset($user) ? $user->surname : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Имя</label>
                                    <input type="text" class="form-control" id="name" name="name"  value="{{ isset($user) ? $user->name : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="middle_name" class="form-label">Отчество</label>
                                    <input type="text" class="form-control" id="middle_name" name="middle_name"  value="{{ isset($user) ? $user->middle_name : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"  value="{{ isset($user) ? $user->email : '' }}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Пароль</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    @if (isset($user))
                                        <div class="form-text">Оставьте пустым, если не хотите менять</div>
                                    @else
                                        <div class="form-text">Мы никому его не сообщим</div>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-end mt-2">
                                        <p>
                                            <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Отмена</i></a>
                                            <button type="submit" class="btn btn-success">Сохранить</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection