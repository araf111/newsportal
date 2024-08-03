@extends('layouts.admin')

@section('content')
    <!-- Page content area start -->
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{__('Add Category')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">{{__('Categories')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __($title) }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-vertical__item bg-style">
                            <div class="item-top mb-30">
                                <h2>{{__('Add New Category')}}</h2>
                            </div>
                            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Row 1 -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input__group mb-25">
                                            <label for="name"> {{__('Name')}} </label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control flat-input" placeholder="{{__('Name')}}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input__group mb-25">
                                            <label for="name_english"> {{__('Name English')}} </label>
                                            <input type="text" name="name_english" id="name_english" value="{{old('name_english')}}" class="form-control flat-input" placeholder="{{__('Name')}}">
                                            @if ($errors->has('name_english'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name_english') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="input__group mb-25">
                                            <label for="parent_id"> {{__('Parent Name')}} </label>
                                            <select class="form-control" name="parent_id">
                                                <option value>{{ __("Select Name") }}</option>
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if(old('parent_id')==$category->
                                                    id) selected @endif>{{ $category->name}}</option>
                                                @endforeach
                                                {{-- <option value="1">Name1</option>
                                                <option value="2">Name2</option>
                                                <option value="3">Name3</option> --}}
                                            </select>
                                            @if ($errors->has('parent_id'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('parent_id') }}</span>
                                            @endif
                                        </div>
                                        
                                    </div>
                                </div>

                                <!-- Row 2 -->
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input__group mb-25">
                                            <label>{{ __('Meta Title') }}</label>
                                            <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="{{ __('Meta title') }}" class="form-control">
                                            @if ($errors->has('meta_title'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input__group mb-25">
                                            <label>{{ __('Meta Description') }}</label>
                                            <input type="text" name="meta_description" value="{{ old('meta_description') }}" placeholder="{{ __('meta description') }}" class="form-control">
                                            @if ($errors->has('meta_description'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input__group mb-25">
                                            <label>{{ __('Meta Keywords') }}</label>
                                            <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="{{ __('meta keywords') }}" class="form-control">
                                            @if ($errors->has('meta_keywords'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_keywords') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Row 3 -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="custom-form-group mb-25">
                                            <label for="image" class="text-lg-right text-black mb-2"> {{__('Image')}} </label>
                                            <div class="upload-img-box mb-25">
                                                <img src="{{getImageFile('')}}">
                                                <input type="file" name="image" id="image" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{__('Image')}}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('image'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                            @endif
                                            <p>{{ __('Accepted Image Files') }}: PNG <br> {{ __('Recommend Size') }}: 60 x 60 (1MB)</p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="input__group mb-25">
                                            <label>{{ __('OG Image') }}</label>
                                            <div class="upload-img-box">
                                                <img src="{{getImageFile('')}}">
                                                <input type="file" name="og_image" id="og_image" accept="image/*" onchange="previewFile(this)">
                                                <div class="upload-img-box-icon">
                                                    <i class="fa fa-camera"></i>
                                                    <p class="m-0">{{__('OG Image')}}</p>
                                                </div>
                                            </div>
                                            @if ($errors->has('og_image'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('og_image') }}</span>
                                            @endif
                                            <p><span class="text-black">{{ __('Accepted Files') }}:</span> PNG, JPG <br> <span class="text-black">{{ __('Recommend Size') }}:</span> 1200 x 627</p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="input__group mb-25">
                                            <label for="is_feature"> {{__('Feature')}} </label>
                                            <div>
                                                <label class="text-black"> <input type="checkbox" name="is_feature" id="is_feature" value="yes" {{old('is_feature') == 'yes' ? 'checked' : '' }} > {{ __('Yes') }} </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="input__group mb-25">
                                    <div class="">
                                        @saveWithAnotherButton
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/custom/image-preview.css')}}">
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
@endpush