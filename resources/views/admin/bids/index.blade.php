@extends('admin.layouts.app')

@section('title', 'Заявки')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <h3 style="margin-top: 5px;">Я тебя люблю</h3>
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
                                    <th>Тур</th>
                                    <th>Почта</th>
                                    <th>ФИО</th>
                                    <th>Статус</th>
                                    <th>Дата заявки</th>
                                    <th style="text-align: right">Действия</th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->index + $data->firstItem()}}</td>
                                        <td><a class="text-dark font-weight-bold" href="{{ route('admin.tour.show', $item->id) }}">{{ $item->tour->title }}</a></td>
                                        <td>{{ optional($item->user)->email ?? $item->email }}</td>
                                        <td>{{ optional($item->user)->name ?? $item->name }} {{ optional($item->user)->surname ?? $item->surname }}</td>
                                        <td>{{ $item->is_processed ? 'Выполнена' : 'В ожидании' }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <div class="d-flex justify-content-end gap-1">
                                                <a href="{{ route('admin.tour.show', $item->id) }}" class="btn btn-primary btn-sm">
                                                    Просмотр
                                                </a>
                                                <a href="{{ route('admin.tour.process', $item->id) }}" class="btn btn-primary btn-sm">
                                                    Выполнить заявку
                                                </a>
                                            </div>
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