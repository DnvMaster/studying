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
                        <div class="card-header">{{ __('Редактирование раздела о нас') }}</div>
                        <div class="card-body">
                            <form action="{{ url('about/update/'.$abouts->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ __('Обновить заголовок раздела') }}</label>
                                    <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="{{ $abouts->title }}">
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ __('Обновить краткий текст') }}</label>
                                    <textarea class="form-control" name="short" id="exampleFormControlTextarea1" placeholder="{{ $abouts->short }}" rows="3"></textarea>
                                    @error('short')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">{{ __('Обновить полный текст') }}</label>
                                    <textarea class="form-control" name="long" id="exampleFormControlTextarea1" placeholder="{{ $abouts->long }}" rows="3"></textarea>
                                    @error('long')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success"><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp; {{ __('Обновить Раздел') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

