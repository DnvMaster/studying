<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Все категории') }}
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
                        <div class="card-header">{{ __('Все категории') }}</div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Категория</th>
                                    <th scope="col">Пользователь</th>
                                    <th scope="col">Дата регистрации</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <!-- @php($i = 1) -->
                                    @foreach($categories as $category)
                                        <tr>
                                            <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                            <td>{{ $category->category_name }}</td>
                                            <td>{{ $category->user->name }}</td>
                                            <td>
                                                @if($category->created_at == NULL)
                                                    <span class="text-primary">{{ __('Дата не установлена.') }}</span>
                                                @else
                                                    {{ Carbon\Carbon::parse($category->created_at)->diffforHumans() }}
                                                @endif
                                            </td>
                                            <td>
                                                <a class="btn btn-info" href="{{ url('category/edit/'.$category->id) }}"><i class="fa fa-pencil" aria-hidden="true"></i> {{ __('Изменить') }}</a>
                                                <a class="btn btn-danger" href="{{ url('category/softdelete/'.$category->id)  }}"><i class="fa fa-trash" aria-hidden="true"></i> {{ __('В корзину') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">{{ __('Добавить категорию') }}</div>
                        <div class="card-body">
                            <form action="{{ route('add-category') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ __('Название категории') }}</label>
                                    <input type="text" name="category_name" class="form-control" id="formGroupExampleInput">
                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-plus-square-o" aria-hidden="true"></i> {{ __('Добавить категорию') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Basket trach -->
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Файлы в корзине') }}</div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Категория</th>
                                    <th scope="col">Пользователь</th>
                                    <th scope="col">Дата регистрации</th>
                                    <th scope="col">Действие</th>
                                </tr>
                                </thead>
                                <tbody>
                                <!-- @php($i = 1) -->
                                @foreach($trashCategory as $category)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem()+$loop->index }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->user->name }}</td>
                                        <td>
                                            @if($category->created_at == NULL)
                                                <span class="text-primary">{{ __('Дата не установлена.') }}</span>
                                            @else
                                                {{ Carbon\Carbon::parse($category->created_at)->diffforHumans() }}
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href=""><i class="fa fa-trash" aria-hidden="true"></i> {{ __('Удалить') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $trashCategory->links() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
        <!-- // Basket trach -->
    </div>
</x-app-layout>
