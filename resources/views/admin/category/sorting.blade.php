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
                                <h2>{{ __('Category Sorting') }}</h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{ __('Dashboard') }}</a></li>
                                    <li class="breadcrumb-item"><a href="{{route('category.index')}}">{{ __('Sorting') }}</a></li>
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
                        <form action="{{route('category.sorting.update')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    <th>{{__('Category')}}</th>
                                                    <th>{{__('Category(English)')}}</th>
                                                    <th style="width:100px;">{{__('Serial')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $item)
                                                    @if ($item->parent_id==0)

                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->name_english }}</td>
                                                            <td>
                                                                <input type="number" name="sorting_value[]" class="form-control" value="{{$item->sort_id}}">
                                                                <input type="hidden" name="category_id[]" class="form-control" value="{{$item->id}}">

                                                            </td>
                                                        </tr>
                                                    @endif

                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-sm table-hover table-bordered mb-0">
                                                <thead>
                                                <tr>
                                                    <th>{{__('Category')}}</th>
                                                    <th>{{__('Category(English)')}}</th>
                                                    <th style="width:100px;">{{__('Serial')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($categories as $item)
                                                    @if ($item->parent_id > 0)
                                                        <tr>
                                                            <td>{{ $item->name }}</td>
                                                            <td>{{ $item->name_english }}</td>
                                                            <td><input type="number"  name="sorting_value[]" class="form-control" value="{{$item->sort_id}}"></td>
                                                            <input type="hidden" name="category_id[]" class="form-control" value="{{$item->id}}">
                                                        </tr>
                                                    @endif

                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="input__group">
                                <div class="mt-4">
                                    @updateButton
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

