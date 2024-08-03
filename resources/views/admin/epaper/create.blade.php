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
                                <h2>{{__('Add Epaper')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('epaper.index')}}">{{__('All Epaper')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Add Epaper')}}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="customers__area bg-style mb-30">
                        <div class="item-title d-flex justify-content-between">
                            <h2>{{__('Add Epaper')}}</h2>
                        </div>
                        <form action="{{route('epaper.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input__group mb-25 border p-2 bg-white">
                                        <label>{{ __('Epaper Image') }}</label>

                                        <div class="upload-img-box mb-25">
                                            {{-- <div id="imgPreview"> --}}
                                                <img src="" id="imgPreview">
                                            {{-- </div> --}}
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                                <p class="m-0">{{__('Epaper Image')}}</p>
                                            </div>
                                        </div>
                                        <input type="file" name="image" id="image" accept="image/*" onchange="previewFileInDiv(this)">
                                        @if ($errors->has('image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                        @endif
                                        <p>{{ __('Accepted Files') }}: JPEG, JPG, PNG <br> {{ __('Recommend Size') }}: 1900 x 1200 (2MB)</p>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12 text-right">
                                            @saveWithAnotherButton
                                        </div>
                                    </div>
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

    <!-- Summernote CSS - CDN Link -->
    <link href="{{ asset('common/css/summernote/summernote.min.css') }}" rel="stylesheet">
    <link href="{{ asset('common/css/summernote/summernote-lite.min.css') }}" rel="stylesheet">
    <!-- //Summernote CSS - CDN Link -->

    <style>
        /* imageField css */
        #imageField,.imageField,
        #colorField{
            position: relative;
            margin-bottom:10px;
        }
        #imageField button,.imageField button,
        #colorField button {
            position: absolute;
            right: 17px;
            top: 0;
            padding: 8px 12px;
            border-radius: 0;
        }
    </style>
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
    <script src="{{asset('admin/js/custom/slug.js')}}"></script>

@endpush
