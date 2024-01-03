@extends('admin.admin_master')

    @section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">{{ __('Редактирование бренда') }}</div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brands->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{ $brands->brand_image }}">
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
@endsection
