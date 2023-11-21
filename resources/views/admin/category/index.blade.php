
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
                        <div class="card-header">{{ __('Все категории') }}</div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">№</th>
                                    <th scope="col">Имя</th>
                                    <th scope="col">Эл.почта</th>
                                    <th scope="col">Дата регистрации</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
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
