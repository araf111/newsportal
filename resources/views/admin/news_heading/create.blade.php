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
                                <h2>{{__('Add News Heading')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('news-heading.index')}}">{{__('News Headings')}}</a></li>
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
                                <h2>{{__('Add New News Heading')}}</h2>
                            </div>
                            <form action="{{route('news-heading.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="input__group mb-25">
                                    <label for="title"> {{__('Title')}} </label>
                                    <input type="text" name="title" id="title" value="{{old('title')}}" class="form-control flat-input" placeholder="{{__('Title')}}">
                                    @if ($errors->has('title'))
                                        <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('title') }}</span>
                                    @endif
                                </div>

                                <div class="input__group mb-25">
                                    <label for="is_feature"> {{__('Feature')}} </label>
                                    <div>
                                        <label class="text-black"> <input type="checkbox" name="is_feature" id="is_feature" value="yes" {{old('is_feature') == 'yes' ? 'checked' : '' }} > {{ __('Yes') }} </label>
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
