@extends('admin.admin_master')

@section('admin')
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
                    <button type="submit" class="btn btn-success"><i class="fa fa-file-image-o" aria-hidden="true"></i></i>&nbsp;&nbsp;{{ __('Создать бренд') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
