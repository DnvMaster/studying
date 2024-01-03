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
                            <div class="card-header">{{ __('О нас') }}</div>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" width="5%">{{ __('№') }}</th>
                                    <th scope="col" width="15%">{{ __('Название') }}</th>
                                    <th scope="col" width="15%">{{ __('Краткое описание') }}</th>
                                    <th scope="col" width="15%">{{ __('Полное описание') }}</th>
                                    <th scope="col" width="15%">{{ __('Действие') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($abouts as $about)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $about->title }}</td>
                                        <td>{{ $about->short }}</td>
                                        <td>{{ $about->long }}</td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('about/edit/'.$about->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Редактировать') }}</a>
                                            <a class="btn btn-danger" href="{{ url('about/delete/'.$about->id)  }}" onclick="return confirm('Вы действительно хотите удалить этот раздел ?')"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Удалить') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{ route('add-about') }}"> <button type="submit" class="btn btn-success mt-5">{{ __('Добавить') }}</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
