@extends('admin.layouts.app')

@section('title', 'Город')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row mb-4">
            <div class="col-12 col-md-4">
                <h3 style="margin-top: 5px;">
                    @if (isset($city))
                        Город {{ $city->title }}
                    @else
                        Создание города
                    @endif
                </h3>
            </div>
        </div>
        @if (isset($city))
            <form action="{{ route('admin.city.update', $city->id) }}" method="post">
            @method('PATCH')
        @else
            <form action="{{ route('admin.city.store') }}" method="post">
        @endif
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Наименование</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ isset($city) ? $city->title : '' }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center justify-content-end mt-2">
                                        <p>
                                            <a href="{{ route('admin.city.index') }}" class="btn btn-primary">Отмена</i></a>
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