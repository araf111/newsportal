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
                                <h2>{{__('Add Advertisement')}}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('home-video.index')}}">{{__('Advertisement')}}</a></li>
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
                            <h2>{{__('Add New Advertisement')}}</h2>
                        </div>
                        <form action="{{route('advertisement.store')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <inpu type="hidden" name="categoryId"   id="categoryId" value="" />
                            <div class="card card-lg">
                                <h5 class="card-header bg-blue text-white">
                                    Position: Front Page
                                </h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pb-3">
                                                <strong>Advertisement 01:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">

                                                        <input type="hidden" name="id_1_1_1" value="">
                                                        <input type="file" class="form-control" name="name_1_1_1" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_1" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 1'])?'':$frontAdvertisementList['middle 1']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 02:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_2" value="">
                                                        <input type="file" class="form-control" name="name_1_1_2" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_2" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 2'])?'':$frontAdvertisementList['middle 2']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 03:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_3" value="">
                                                        <input type="file" class="form-control" name="name_1_1_3" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_3" value="{{!isset($frontAdvertisementList['middle 3'])?'':$frontAdvertisementList['middle 3']['ad_link']}}"  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 3'])?'':$frontAdvertisementList['middle 3']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 04:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_4" value="">
                                                        <input type="file" class="form-control" name="name_1_1_4" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_4" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 4'])?'':$frontAdvertisementList['middle 4']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 05:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_5" value="">
                                                        <input type="file" class="form-control" name="name_1_1_5" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_5" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 5'])?'':$frontAdvertisementList['middle 5']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 06:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_6" value="">
                                                        <input type="file" class="form-control" name="name_1_1_6" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_6" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 6'])?'':$frontAdvertisementList['middle 6']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 07:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_7" value="">
                                                        <input type="file" class="form-control" name="name_1_1_7" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_7" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 7'])?'':$frontAdvertisementList['middle 7']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 08:  468*60</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_8" value="">
                                                        <input type="file" class="form-control" name="name_1_1_8" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_8" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['middle 8'])?'':$frontAdvertisementList['middle 8']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 09:  336*280 (Sidebar)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_9" value="">
                                                        <input type="file" class="form-control" name="name_1_1_9" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_9" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['Sidebar 1'])?'':$frontAdvertisementList['Sidebar 1']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 10:  336*280 (Sidebar)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_10" value="">
                                                        <input type="file" class="form-control" name="name_1_1_10" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_10" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['Sidebar 2'])?'':$frontAdvertisementList['Sidebar 2']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 11: 970*90 (Header)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_11" value="">
                                                        <input type="file" class="form-control" name="name_1_1_11" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_11" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['Header'])?'':$frontAdvertisementList['Header']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 12: 970*90 (Footer)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_12" value="">
                                                        <input type="file" class="form-control" name="name_1_1_12" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_12" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($frontAdvertisementList['Footer'])?'':$frontAdvertisementList['Footer']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="active" style="{{ request()->segment(3) ? 'padding-top: 120px' : '' }}">
                                <div class="card card-lg">
                                    <div class="card-header bg-blue text-white">
                                        <div class="row d-flex">
                                            <div class="col-md-10">
                                                <h5 class="text-white">
                                                    Position: Category Page
                                                </h5>
                                            </div>
                                            <div class="col-md-2 text-right">
                                                <label for="category_ads" class="d-none">Categories</label>
                                                <select onchange="advertisementCategory(value)" name="category_ads" id="category_ads" class="form-control w-100" tabindex="-1" aria-hidden="true">
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $key=>$category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="pb-3">
                                                    <strong>Advertisement 1: 336*280 (Sidebar 1)</strong>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="id_1_1_13" value="">
                                                            <input type="file" class="form-control" name="name_1_1_13"  id="name_1_1_13" value="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="link_1_1_13" value=""  placeholder="Enter Link">
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <img src="/assets/advertisements/thumbnail/{{!isset($categoryAdvertisementList['Sidebar 1'])?'':$categoryAdvertisementList['Sidebar 1']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisementCategory()"><i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pb-3">
                                                    <strong>Advertisement 2: 336*280 (Sidebar 2)</strong>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="id_1_1_14" value="">
                                                            <input type="file" class="form-control" name="name_1_1_14"  id="name_1_1_14" value="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="link_1_1_14" value=""  placeholder="Enter Link">
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <img src="/assets/advertisements/thumbnail/{{!isset($categoryAdvertisementList['Sidebar 2'])?'':$categoryAdvertisementList['Sidebar 2']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisementCategory()"><i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pb-3">
                                                    <strong>Advertisement 3: 336*280 (Sidebar 3)</strong>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="hidden" name="id_1_1_15" value="">
                                                            <input type="file" class="form-control" name="name_1_1_15"  id="name_1_1_15" value="">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control" name="link_1_1_15" value=""  placeholder="Enter Link">
                                                        </div>
                                                        <div class="col-md-3">
                                                            {{-- <img src="/assets/advertisements/thumbnail/{{!isset($categoryAdvertisementList['Sidebar 3'])?'':$categoryAdvertisementList['Sidebar 3']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisementCategory()"><i class="fa fa-close"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-lg">
                                <h5 class="card-header bg-blue text-white">
                                    Position: Details Page
                                </h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pb-3">
                                                <strong>Advertisement 1: 336*280 (Sidebar 1)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_18" value="">
                                                        <input type="file" class="form-control" name="name_1_1_18" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_18" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($detailsAdvertisementList['Sidebar 1'])?'':$detailsAdvertisementList['Sidebar 1']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="pb-3">
                                                <strong>Advertisement 2: 336*280 (Sidebar 2)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_19" value="}">
                                                        <input type="file" class="form-control" name="name_1_1_19" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_19" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($detailsAdvertisementList['Sidebar 2'])?'':$detailsAdvertisementList['Sidebar 2']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement(})"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="pb-3">
                                                <strong>Advertisement 3: 336*280 (Sidebar 3)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_20" value="">
                                                        <input type="file" class="form-control" name="name_1_1_20" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_20" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($detailsAdvertisementList['Sidebar 3'])?'':$detailsAdvertisementList['Sidebar 3']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="pb-3">
                                                <strong>Advertisement 4: 336*280 (Sidebar 4)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_21" value="">
                                                        <input type="file" class="form-control" name="name_1_1_21" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_21" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($detailsAdvertisementList['Sidebar 4'])?'':$detailsAdvertisementList['Sidebar 4']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="pb-3">
                                                <strong>Advertisement 5: 970*90 (Header)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_22" value="">
                                                        <input type="file" class="form-control" name="name_1_1_22" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_22" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($detailsAdvertisementList['Header'])?'':$detailsAdvertisementList['Header']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pb-3">
                                                <strong>Advertisement 6: 970*90 (Footer)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_23" value="">
                                                        <input type="file" class="form-control" name="name_1_1_23" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_23" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($detailsAdvertisementList['Footer'])?'':$detailsAdvertisementList['Footer']['image']}}" alt="" style="max-width: 100%;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-lg">
                                <h5 class="card-header bg-blue text-white">
                                    Position: Writer Details Page
                                </h5>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="pb-3">
                                                <strong>Advertisement 1: 336*280 (Sidebar 1)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_24" value="">
                                                        <input type="file" class="form-control" name="name_1_1_24" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_24" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($writerDetailsAdvertisementList['Sidebar 1'])?'':$writerDetailsAdvertisementList['Sidebar 1']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="pb-3">
                                                <strong>Advertisement 2: 336*280 (Sidebar 2)</strong>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="hidden" name="id_1_1_25" value="">
                                                        <input type="file" class="form-control" name="name_1_1_25" value="">
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control" name="link_1_1_25" value=""  placeholder="Enter Link">
                                                    </div>
                                                    <div class="col-md-3">
                                                        {{-- <img src="/assets/advertisements/thumbnail/{{!isset($writerDetailsAdvertisementList['Sidebar 2'])?'':$writerDetailsAdvertisementList['Sidebar 2']['image']}}" alt="" style="max-width: 100%;max-height:40px;"> --}}
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="button" class="btn btn-danger btn-xs" onclick="removeAdvertisement()"><i class="fa fa-close"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <button type="button" name="insert" class="btn btn-success btn-block" onclick="checkCategoryFileSelectedOrNot()">Save</button> --}}

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
