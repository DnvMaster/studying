
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
                                </tr>
                                </thead>
                                <tbody>
                                @php($i = 1)
                                @foreach($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $i++ }}</th>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{ $category->user_id }}</td>
                                        <td>
                                            @if($category->created_at == NULL)
                                                <span class="text-primary">{{ __('Дата не установлена.') }}</span>
                                            @else
                                                {{ Carbon\Carbon::parse($category->created_at)->diffforHumans() }}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
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
                                <button type="submit" class="btn btn-success">{{ __('Добавить категорию') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
