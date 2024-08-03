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
                                <h2>{{__('Add News Type')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('news-type.index')}}">{{__('News Type')}}</a></li>
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
                                <h2>{{__('Add New News Type')}}</h2>
                            </div>
                            <form action="{{route('news-type.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label for="name"> {{__('Name')}} </label>
                                            <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control flat-input" placeholder="{{__('Name')}}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label for="name_eng"> {{__('Name Eng')}} </label>
                                            <input type="text" name="name_eng" id="name_eng" value="{{old('name_eng')}}" class="form-control flat-input" placeholder="{{__('Name Eng')}}">
                                            @if ($errors->has('name_eng'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('name_eng') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label for="type"> {{__('Type')}} </label>
                                            <input type="text" name="type" id="type" value="{{old('type')}}" class="form-control flat-input" placeholder="{{__('Type')}}">
                                            @if ($errors->has('type'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('type') }}</span>
                                            @endif
                                        </div>
        
                                    </div>
                                
                                    <div class="col-md-6">
                                        <div class="input__group mb-25">
                                            <label for="status"> {{ __('Status') }} </label>
                                            <select name="status" id="status[]">
                                                <option value="">--{{ __('Select status') }}--</option>
                                                <option value="{{INACTIVE}}">{{ status(INACTIVE) }}</option>
                                                <option value="{{ACTIVE}}">{{ status(ACTIVE) }}</option>
                                            </select>

                                            @if ($errors->has('status'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
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
