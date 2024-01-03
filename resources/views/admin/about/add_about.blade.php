@extends('admin.admin_master')

@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>{{ __('Добавление раздела') }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('store-about') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('Название раздела') }}</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('Введите название слайда') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('Краткое описание') }}</label>
                        <textarea class="form-control" name="short" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('Полное описание') }}</label>
                        <textarea class="form-control" name="long" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>

                    <div class="pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">{{ __('Создать') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
