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
                                <h2>{{__('Add Home Video')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('home-video.index')}}">{{__('Home Video')}}</a></li>
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
                                <h2>{{__('Add New Home Video')}}</h2>
                            </div>
                            <form action="{{route('home-video.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Row 1 -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="input__group mb-25">
                                            <label for="type"> {{__('Video Type')}} </label>
                                            {{-- <input type="text" name="type" id="type" value="{{old('type')}}" class="form-control flat-input" placeholder="{{__('Video Type')}}"> --}}
                                                <div class="chk-padding">
                                                    <input type="radio" name="type" required="" value="youtube"> <label for="type"> {{__('Youtube')}}</label>
                                                </div>
                                                <div class="chk-padding">
                                                    <input type="radio" name="type" required="" value="facebook"> <label for="type"> {{__('Facebook')}}</label>
                                                </div>
                                            @if ($errors->has('type'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('type') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label for="video_url"> {{__('Video Id')}} </label>
                                            <input type="text" name="video_url" id="video_url" value="{{old('video_url')}}" class="form-control flat-input" placeholder="{{__('VSN0bcDda5o')}}">
                                            @if ($errors->has('video_url'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('video_url') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label for="caption"> {{__('Video Caption')}} </label>
                                            <input type="text" name="caption" id="caption" value="{{old('caption')}}" class="form-control flat-input" placeholder="{{__('Video Caption')}}">
                                            @if ($errors->has('caption'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('caption') }}</span>
                                            @endif
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
