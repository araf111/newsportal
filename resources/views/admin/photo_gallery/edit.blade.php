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
                                <h2>{{__('Edit Photo Gallery')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('photo-gallery.index')}}">{{__('All Photo Gallery')}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{__('Edit Photo Gallery')}}</li>
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
                            <h2>{{__('Edit Photo Gallery')}}</h2>
                        </div>
                        <form action="{{route('photo-gallery.update',[$photoGallery->id])}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input__group mb-25">
                                                <label>{{__('Title')}} <span class="text-danger">*</span></label>
                                                <input type="text" name="title" value="{{$photoGallery->title}}" placeholder="{{__('Title')}}" class="form-control slugable"  onkeyup="slugable()">
                                                @if ($errors->has('title'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input__group mb-25">
                                                <label for="status"> {{ __('Status') }} </label>
                                                <select name="status" id="status[]">
                                                    <option value="">--{{ __('Select status') }}--</option>
                                                    <option value="{{INACTIVE}}" {{$photoGallery->status == 0 ? 'selected':''}}>{{ status(INACTIVE) }}</option>
                                                    <option value="{{ACTIVE}}" {{$photoGallery->status == 1 ? 'selected':''}}>{{ status(ACTIVE) }}</option>
                                                </select>
        
                                                @if ($errors->has('status'))
                                                    <span class="text-danger"><i class="fas fa-exclamation-triangle"></i> {{ $errors->first('status') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input__group mb-25">
                                        <div class="form-group p-2 border bg-white">
                                            <div class="col-md-12 mb-3">
                                                {{-- {{dd($photoGallery->photoGalleryImages->count())}} --}}
                                                @if($photoGallery->photoGalleryImages->count() > 0)
                                                    @foreach($photoGallery->photoGalleryImages as $photoGalleryImage)
                                                        <div class="row mb-2">
                                                            <div class="col-md-5">
                                                                <label for="caption" class="control-label pl-3 pt-3">{{_('Image Caption')}}</label>
                                                                <input class="form-control height-auto" name="caption[]" id="caption[]" value="{{$photoGalleryImage->caption}}" type="text" placeholder="{{__('Caption')}}">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <label for="image" class="control-label pl-3 pt-3">{{_('Image')}}</label>
                                                                <input type="hidden" value="{{$photoGalleryImage->id}}" name="photo_gallery_image_ids[]">
                                                                <input class="form-control height-auto" name="image[]" id="image[]" value="" type="file">
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div class="row mb-2">
                                                        <div class="col-md-5">
                                                            <label for="caption" class="control-label pl-3 pt-3">{{_('Image Caption')}}</label>
                                                            <input class="form-control height-auto" name="caption[]" id="caption[]" value="" type="text" placeholder="{{__('Caption')}}">
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label for="image" class="control-label pl-3 pt-3">{{_('Image')}}</label>
                                                            <input class="form-control height-auto" name="image[]" id="image[]" value="" type="file">
                                                        </div>
                                                    </div>
                                                @endif
                                                <label for="add_more" class="sr-only">Add More</label>
                                                <div class="" id="imageBlock_news"></div>
                                                <button type="button" class="btn btn-sm btn-blue text-white" id="addMoreImage_news_creae">Add More image</button>
                                            </div>
                                        </div>
                                    </div> 

                                    <div class="row mb-3">
                                        <div class="col-md-12 text-right">
                                            @updateButton
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
@endpush
