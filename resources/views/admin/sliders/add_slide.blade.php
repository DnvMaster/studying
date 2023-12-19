@extends('admin.admin_master')

@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>{{ __('Добавление слайда') }}</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('store-slide') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">{{ __('Название слайда') }}</label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="{{ __('Введите название слайда') }}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">{{ __('Текст слайда') }}</label>
                        <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">{{ __('Изображение слайда') }}</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                    </div>
                    <div class="pt-4 pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">{{ __('Создать') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
