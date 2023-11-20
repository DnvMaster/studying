<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Привет') }}, <b>{{ Auth::user()->name }}</b>
            <b style="float: right;">{{ __('Всего пользователей') }}
                <span class="badge badge-danger">{{ count($user) }}</span>
            </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                    @php($i = 1)
                    @foreach($user as $users)
                        <tr>
                            <th scope="row">{{ $i++ }}</th>
                            <td>{{ $users->name }}</td>
                            <td>{{ $users->email }}</td>
                            <td>{{ $users->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
