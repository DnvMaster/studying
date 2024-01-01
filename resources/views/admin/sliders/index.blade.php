@extends('admin.admin_master')

@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-body">
                            <div class="card-header">{{ __('Все слайды') }}</div>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" width="5%">{{ __('№') }}</th>
                                    <th scope="col" width="15%">{{ __('Заголовок слайда') }}</th>
                                    <th scope="col" width="15%">{{ __('Описание слайда') }}</th>
                                    <th scope="col" width="15%">{{ __('Изображение слайда') }}</th>
                                    <th scope="col" width="15%">{{ __('Дата создания') }}</th>
                                    <th scope="col" width="15%">{{ __('Действие') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($sliders as $slider)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->description }}</td>
                                        <td><img src="{{ asset($slider->image) }}" alt="{{ asset($slider->title) }}" style="width: 70px; height: 40px;"></td>
                                        <td>{{ $slider->created_at->format('d.m.y')}}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('slide/edit/'.$slider->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Редактировать') }}</a>
                                            <a class="btn btn-danger" href="{{ url('slide/delete/'.$slider->id)  }}" onclick="return confirm('Вы действительно хотите удалить этот слайд?')"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Удалить') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('add-slide') }}"> <button type="submit" class="btn btn-success mt-5">{{ __('Добавить слайд') }}</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
