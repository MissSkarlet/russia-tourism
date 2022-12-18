@extends('admin.layouts.app')

@section('title', 'Туры')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <h3 style="margin-top: 5px;">Все туры</h3>
            </div>
            <div class="col-12 col-md-8">
                <div class="d-flex align-items-sm-center flex-column flex-sm-row justify-content-sm-end">
                    <div class="ml-sm-4">
                        <a href="{{ route('admin.tour.create') }}" class="btn btn-lg btn-primary">Создать тур</a>
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
                                    <th>Наименование</th>
                                    <th>Стартовый город</th>
                                    <th>Финишный город</th>
                                    <th>Дата создания</th>
                                    <th style="text-align: right">Действия</th>
                                </tr>
                                </thead>
                                <tbody id="sortable">
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->index + $data->firstItem()}}</td>
                                    <td><a class="text-dark font-weight-bold" href="{{ route('admin.tour.edit', $item->id) }}">{{ $item->title }}</a></td>
                                    <td>{{ $item->start_city->title }}</td>
                                    <td>{{ $item->finish_city->title }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-1">
                                            <a href="{{ route('admin.tour.edit', $item->id) }}" title="Редактировать" class="btn btn-primary btn-sm">
                                                Редактировать
                                            </a>
                                            <form method="post" action="{{ route('admin.tour.destroy', $item->id) }}"> 
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-primary btn-sm" type="submit">Удалить</button>
                                            </form>
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