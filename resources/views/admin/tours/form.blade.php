@extends('admin.layouts.app')

@section('title', 'Тур')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <h3 style="margin-top: 5px;">
                    @if (isset($tour))
                        Тур {{ $tour->title }}
                    @else
                        Создание тура
                    @endif
                </h3>
            </div>
        </div>
        @if (isset($tour))
            <form action="{{ route('admin.tour.update', $tour->id) }}" method="post" enctype='multipart/form-data'>
            @method('PATCH')
        @else
            <form action="{{ route('admin.tour.store') }}" method="post" enctype='multipart/form-data'>
        @endif
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Наименование</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($tour) ? $tour->title : '' }}">
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Дата</label>
                                    <input type="date" class="form-control" id="date" name="date" value="{{ isset($tour) ? $tour->date : '' }}">
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Описание</label>
                                    <textarea class="form-control" id="description" name="description" rows="4">{{ isset($tour) ? $tour->description : '' }}</textarea>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3 form-check">
                                    <label for="is_popular" class="form-check-label">Популярный тур</label>
                                    <input type="checkbox" class="form-check-input" id="is_popular" name="is_popular" @if (isset($tour) && $tour->is_popular) checked @endif>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Картинка</label>
                                    @if (isset($tour))
                                        <img src="{{ Storage::disk('public')->url($tour->image) }}" class="rounded img-fluid mb-2">
                                    @endif
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="start_city_id" class="form-label">Стартовый город</label>
                                    <select class="form-select" id="start_city_id" name="start_city_id">
                                        <option selected disabled>Выберите город</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" @if (isset($tour) && $tour->start_city_id == $city->id) selected @endif>{{ $city->title }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                    <label for="finish_city_id" class="form-label">Конечный город</label>
                                    <select class="form-select" id="finish_city_id" name="finish_city_id">
                                        <option selected disabled>Выберите город</option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" @if (isset($tour) && $tour->finish_city_id == $city->id) selected @endif>{{ $city->title }}</option>
                                        @endforeach
                                      </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-end mt-2">
                                        <p>
                                            <a href="{{ route('admin.tour.index') }}" class="btn btn-primary">Отмена</i></a>
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