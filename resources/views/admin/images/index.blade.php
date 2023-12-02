<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-grey-800 leading-tight">{{ __('Изображения') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header p-3 mb-2 bg-primary text-white">{{ __('Все изображения') }}</div>
                        <div class="card-body">
                            @foreach($images as $img)
                                <div class="col-4 mt-3">
                                    <div class="card">
                                        <img src="{{ asset($img->image) }}" alt="{{ asset($img->image) }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header p-3 mb-2 bg-primary text-white">{{ __('Добавление изображений') }}</div>
                        <div class="card-body">
                            <form action="{{ route('add-images') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="ExampleInputEmail1" class="text-white">{{ __('Добавить изображение') }}</label>
                                    <input type="file" name="image[]" class="form-control-file" id="formGroupExampleInput" multiple="">
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-file-image-o" aria-hidden="true"></i></i>&nbsp;&nbsp;{{ __('Добавить') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
