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
                                    <h2>{{__('Live Stream')}}</h2>
                                </div>
                            </div>
                            <div class="breadcrumb__content__right">
                                <nav aria-label="breadcrumb">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Dashboard')}}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">{{__('Live Stream')}}</li>
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
                                <h2>{{__('Live Stream List')}}</h2>
                                <a href="{{route('live-stream.create')}}" class="btn btn-success btn-sm"> <i class="fa fa-plus"></i> {{__('Add Live Stream')}} </a>
                            </div>
                            <div class="customers__table">
                                <table id="customers-table" class="row-border data-table-filter table-style">
                                    <thead>
                                    <tr>
                                        <th>{{__('SL')}}</th>
                                        <th>{{__('Stream Link')}}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{__('Action')}}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($liveStreams as $live_stream)
                                        <tr class="removable-item">
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{$live_stream->stream_link}}
                                        </td>
                                        <td>
                                            @if($live_stream->status)
                                                <span class="status active">{{ __('Yes') }}</span>
                                            @else
                                                <span class="status blocked">{{ __('No') }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action__buttons">
                                                <a href="{{route('live-stream.edit', [$live_stream->id])}}" class="btn-action" title="Edit">
                                                    <img src="{{asset('admin/images/icons/edit-2.svg')}}" alt="edit">
                                                </a>
                                                <a href="javascript:void(0);" data-url="{{route('live-stream.delete', [$live_stream->id])}}" class="btn-action delete" title="Delete">
                                                    <img src="{{asset('admin/images/icons/trash-2.svg')}}" alt="trash">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="mt-3">
                                    {{$liveStreams->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Page content area end -->
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('admin/css/jquery.dataTables.min.css')}}" />
@endpush

@push('script')
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/custom/data-table-page.js')}}"></script>
@endpush
