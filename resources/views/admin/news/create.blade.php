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
                                <h2>{{__('Add News')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('blog.index')}}">{{__('All News')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Add News')}}</li>
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
                            <h2>{{__('Add News')}}</h2>
                        </div>
                        <form action="{{route('news.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="input__group mb-25">
                                        <label>{{__('Title')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="title" value="{{old('title')}}" placeholder="{{__('Title')}}" class="form-control slugable"  onkeyup="slugable()">
                                        @if ($errors->has('title'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                    <div class="input__group mb-25">
                                        <label>{{__('Sub Title')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="sub_title" value="{{old('sub_title')}}" placeholder="{{__('Sub Title')}}" class="form-control slugable"  onkeyup="slugable()">
                                        @if ($errors->has('sub_title'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('sub_title') }}</span>
                                        @endif
                                    </div>
                                    <div class="input__group mb-25">
                                        <label>{{__('Slug')}} <span class="text-danger">*</span></label>
                                        <input type="text" name="slug" value="{{old('slug')}}" placeholder="{{__('Slug')}}" class="form-control slug" onkeyup="getMyself()">
                                        @if ($errors->has('slug'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label>{{__('Description')}} <span class="text-danger">*</span></label>
                                        <textarea name="description" id="summernote">{{old('description')}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('description') }}</span>
                                            @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label>{{ __('Meta Title') }}</label>
                                        <input type="text" name="meta_title" value="{{ old('meta_title') }}" placeholder="{{ __('Meta title') }}" class="form-control">
                                        @if ($errors->has('meta_title'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_title') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="input__group mb-25">
                                        <label>{{ __('Meta Description') }}</label>
                                        <input type="text" name="meta_description" value="{{ old('meta_description') }}" placeholder="{{ __('meta description') }}" class="form-control">
                                        @if ($errors->has('meta_description'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_description') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="input__group mb-25">
                                        <label>{{ __('Meta Keywords') }}</label>
                                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" placeholder="{{ __('meta keywords') }}" class="form-control">
                                        @if ($errors->has('meta_keywords'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('meta_keywords') }}</span>
                                        @endif
                                    </div>

                                    <div class="input__group mb-25">
                                        <label>{{ __('Youtube Video') }}</label>
                                        <input type="text" name="youtube_video" value="{{ old('youtube_video') }}" placeholder="{{ __('Youtube Video') }}" class="form-control">
                                        @if ($errors->has('youtube_video'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('youtube_video') }}</span>
                                        @endif
                                    </div>
                                     
                                    <div class="input__group mb-25">
                                        <label>{{ __('Facebook Video') }}</label>
                                        <input type="text" name="facebook_video" value="{{ old('facebook_video') }}" placeholder="{{ __('Facebook Video') }}" class="form-control">
                                        @if ($errors->has('facebook_video'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('facebook_video') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="input__group mb-25">
                                        <label>{{ __('Twitter Code') }}</label>
                                        <input type="text" name="twitter_code" value="{{ old('twitter_code') }}" placeholder="{{ __('Twitter Code') }}" class="form-control">
                                        @if ($errors->has('twitter_code'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('twitter_code') }}</span>
                                        @endif
                                    </div>
                                    
                                    <div class="input__group mb-25">
                                        <div class="form-group p-2 border bg-white">
                                            <div class="col-md-12 mb-3">
                                                @foreach(old('caption', ['']) as $index => $caption)
                                                <div class="row mb-2">
                                                    <div class="col-sm-5">
                                                        <label for="caption" class="control-label pl-3 pt-3">{{_('Image Caption')}}</label>
                                                        <input class="form-control height-auto @error('caption.*') is-invalid @enderror" name="caption[]" id="caption[]" value="" type="text" placeholder="{{__('Caption')}}">
                                                        @if ($errors->has('caption.*'))
                                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('caption') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="col-sm-5">
                                                        <label for="image" class="control-label pl-3 pt-3">{{_('Image')}}</label>
                                                        <input class="form-control height-auto @error('image.*') is-invalid @enderror" name="image[]" id="image[]" value="" type="file">
                                                        @if ($errors->has('image.*'))
                                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('image') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                @endforeach
                                                <label for="add_more" class="sr-only">Add More</label>
                                                <div class="" id="imageBlock_news"></div>
                                                <button type="button" class="btn btn-sm btn-blue text-white" id="addMoreImage_news_creae">Add More image</button>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row mb-3">
                                        <div class="col-md-12 text-right">
                                            @saveWithAnotherButton
                                            @draftButton
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input__group mb-25">
                                        <label for="category_id"> {{ __('Categories') }} </label>
                                        <select name="category_id[]" id="category_id[]" multiple>
                                            <option value="">--{{ __('Select Option') }}--</option>
                                            @foreach($categories as $Category)
                                            <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                                            @endforeach 
                                        </select>

                                        @if ($errors->has('category_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('category_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="input__group mb-25 border p-2 bg-white">
                                        <label>{{ __('Feature Image') }}</label>
                                        <div class="upload-img-box mb-25">
                                            <img src="{{getImageFile('')}}">
                                            <input type="file" name="feature_image" id="feature_image" accept="image/*" onchange="previewFile(this)">
                                            <div class="upload-img-box-icon">
                                                <i class="fa fa-camera"></i>
                                                <p class="m-0">{{__('Feature Image')}}</p>
                                            </div>
                                        </div>
                                        @if ($errors->has('feature_image'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('feature_image') }}</span>
                                        @endif
                                        <p>{{ __('Accepted Files') }}: JPEG, JPG, PNG <br> {{ __('Recommend Size') }}: 870 x 500 (1MB)</p>
                                    </div>
                                    
                                    <div class="input__group mb-25 border p-2 bg-white">
                                        <div class="row">
                                            <label for="news_type_id"> {{ __('News Type') }} </label>
                                            @if(isset($newsTypes) & $newsTypes->count() > 0)
                                                @foreach($newsTypes as $newsType)
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-checkbox checkbox-teal">
                                                            <input type="checkbox" name="news_type_id[]" value="{{$newsType->id}}" class="custom-control-input" id="customCheck5">
                                                            <label class="custom-control-label" for="customCheck5">{{$newsType->name}}</label>
                                                        </div>
                                                    </div>
                                                @endforeach

                                                @if ($errors->has('news_type_id'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('news_type_id') }}</span>
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="input__group mb-25 border p-2 bg-white">
                                        <label for="author_id"> {{ __('Author') }} </label>
                                        <select name="author_id" id="author_id">
                                            <option value="">--{{ __('Select Option') }}--</option>
                                            @foreach($authores as $key=>$author)
                                                <option value="{{$author->id}}">{{$author->name}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('author_id'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('author_id') }}</span>
                                        @endif
                                    </div>
                                    <div class="input__group mb-25 border p-2 bg-white">
                                        <label for="tag_ids"> {{ __('Tag') }} </label>
                                        <select name="tag_ids[]" multiple id="tag_ids[]" class="multiple-basic-single form-control">
                                            @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('tag_ids'))
                                            <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('tag_ids') }}</span>
                                        @endif
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
            border-radius: 5;
        }
    </style>
@endpush

@push('script')
    <script src="{{asset('admin/js/custom/image-preview.js')}}"></script>
    <script src="{{asset('admin/js/custom/slug.js')}}"></script>
    {{-- <script src="{{asset('admin/js/custom/form-editor.js')}}"></script> --}}

    <!-- Summernote JS - CDN Link -->
    <script src="{{ asset('common/js/summernote/summernote-lite.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#summernote").summernote({dialogsInBody: true});
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <script>
        // create more image on click add button
        jQuery("#addMoreImage").click(function () {
            jQuery('#imageBlock').append(
                '<div id="imageField">' +
                '<div class="row"><div class="col-md-5"><input class="form-control height-auto" required name="caption[]" id="caption[]" type="text" placeholder="Caption"></div>' +
                '<div class="col-md-5"><input class="form-control height-auto" name="image[]" required id="image[]" type="file">' +
                '</div><div class="col-md-2 text-left"> <button type="button" class="removeImageBtn btn btn-danger btn-xs"><i class="fa fa-close"></i></button></div>' +
                '</div>'
            );
        });
        jQuery("#imageBlock").on("click", ".removeImageBtn", function (e) {
            //alert('ok');
            jQuery(this).parents("#imageField").remove();
            no--;
        });

        $("#addMoreImage_news_creae").click(function () {
            $('#imageBlock_news').append(
                '<div id="imageField">' +
                '<div class="row"><div class="col-md-5"><input class="form-control height-auto" required name="caption[]" id="caption[]" type="text" placeholder="Caption"></div>' +
                '<div class="col-md-5"><input class="form-control height-auto" name="image[]" id="image[]" required type="file"></div><div class="col-md-2 text-left"><button type="button" class="removeImageBtn btn btn-danger btn-xs"><i class="fa fa-close"></i></button>' +
                '</div>' +
                '</div>'
            );
        });
        jQuery("#imageBlock_news").on("click", ".removeImageBtn", function (e) {
            //alert('ok');
            jQuery(this).parents("#imageField").remove();
            no--;
        });

        $("#addMoreImage_news_edit").click(function () {
            $('#imageBlock_news_edit').append(
                '<div id="imageField">' +
                '<div class="row"><div class="col-sm-5"><input class="form-control height-auto" required name="caption[]" id="caption[]" type="text" placeholder="Caption"></div>' +
                '<div class="col-sm-4"><input class="form-control height-auto" name="image[]" required id="image[]" type="file">' +
                '</div><div class="col-sm-3"><button type="button" class="removeImageBtn btn btn-danger btn-xs"><i class="fa fa-close"></i></button></div>' +
                '</div>'
            );
        });
        jQuery("#imageBlock_news_edit").on("click", ".removeImageBtn", function (e) {
            //alert('ok');
            jQuery(this).parents("#imageField").remove();
            no--;
        });

    </script>
    <!-- //Summernote JS - CDN Link -->
@endpush
