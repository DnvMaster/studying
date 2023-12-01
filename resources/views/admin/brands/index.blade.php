<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Бренды') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="card-header">{{ __('Все бренды') }}</div>
                        <div class="card-body">
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
                                <!-- @php($i = 1) -->
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

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Добавить бренд') }}</div>
                        <div class="card-body">
                            <form action="{{ route('store-brand') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ __('Название бренда') }}</label>
                                    <input type="text" name="brand_name" class="form-control" id="formGroupExampleInput">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ __('Логотип бренда') }}</label>
                                    <input type="file" name="brand_image" class="form-control-file" id="formGroupExampleInput">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-file-image-o" aria-hidden="true"></i></i>&nbsp;&nbsp;{{ __('Добавить бренд') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

