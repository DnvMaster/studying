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
                            <div class="card-header">{{ __('Все бренды') }}</div>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Бренд</th>
                                    <th scope="col">Логотип</th>
                                    <th scope="col">Дата регистрации</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row">{{ $brands->firstItem()+$loop->index }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td><img src="{{ asset($brand->brand_image) }}" alt="{{ $brand->brand_name }}" style="height: 40px; width: 70px;"></td>
                                        <td>
                                            @if($brand->created_at == NULL)
                                                <span class="text-primary">{{ __('Дата не установлена.') }}</span>
                                            @else
                                                {{ Carbon\Carbon::parse($brand->created_at)->diffforHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="{{ url('brand/edit/'.$brand->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Редактировать') }}</a>
                                            <a class="btn btn-danger" href="{{ url('brand/delete/'.$brand->id)  }}" onclick="return confirm('Вы действительно хотите удалить этот Брэнд?')"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Удалить') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $brands->links() }}
                        </div>
                    </div>
                </div>
                <a href="{{ route('add-brand') }}"><button type="submit" class="btn btn-success mt-5 ml-5"><i class="fa fa-file-image-o" aria-hidden="true"></i></i>&nbsp;&nbsp;{{ __('Добавить бренд') }}</button></a>
            </div>
        </div>
    </div>
@endsection

