
<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редактирование брендов') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Редактирование бренда') }}</div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ __('Обновить название бренда') }}</label>
                                    <input type="text" name="brand_name" class="form-control" id="formGroupExampleInput" value="{{ $brands->brand_name }}">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group" style="width: 18rem;">
                                    <label for="formGroupExampleInput">{{ __('Обновить логотип бренда') }}</label>
                                    <img class="card-img-top" src="{{ asset($brands->brand_image) }}" alt="{{ $brands->brand_name }}"><br>
                                    <input type="file" name="brand_image" class="fom-control-file" id="formGroupExampleInput" value="{{ $brands->brand_image }}">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success"><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp; {{ __('Обновить бренд') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
