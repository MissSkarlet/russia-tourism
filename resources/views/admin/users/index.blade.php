@extends('admin.layouts.app')

@section('title', 'Пользователи')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <h3 style="margin-top: 5px;">Все пользователи</h3>
            </div>
            <div class="col-12 col-md-8">
                <div class="d-flex align-items-sm-center flex-column flex-sm-row justify-content-sm-end">
                    <div class="ml-sm-4">
                        <a href="" class="btn btn-lg btn-primary">Создать пользователя</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover center-aligned-table">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>ФИО</th>
                                    <th>Почта</th>
                                    <th>Дата регистрации</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->index + $data->firstItem()}}</td>
                                    <td><a class="text-dark font-weight-bold" href="{{ route('admin.user.edit', $item->id) }}">{{ $item->surname }} {{ $item->name }} {{ $item->middle_name }}</a></td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', $item->id) }}" title="Редактировать" class="mr-1 text-muted">
                                            Редактировать
                                        </a>
                                        &nbsp;
                                        <a href="{{ route('admin.user.destroy', $item->id) }}" title="Удалить" class="mr-1 text-muted button-destroy">
                                            Удалить
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="d-flex align-items-center justify-content-start text-muted mt-2">
                                    <p>
                                        {{ $data->firstItem() }}-{{ $data->lastItem() }} из {{ $data->total() }} элементов
                                        <a href="{{ $data->withQueryString()->previousPageUrl() }}" class="text-muted">Назад</i></a>
                                        <a href="{{ $data->withQueryString()->nextPageUrl() }}" class="text-muted">Вперед</i></a>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection