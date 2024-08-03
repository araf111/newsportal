<?php

namespace App\Http\Controllers\Admin;

use App\Traits\General;
use App\Models\LiveStream;
use Illuminate\Http\Request;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LiveStreamRequest;

class LiveStreamController extends Controller
{

    use General;

    protected $model;
    public function __construct(LiveStream $liveStream)
    {
        $this->model = new Crud($liveStream);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Live Stream';
        $data['liveStreams'] = $this->model->getOrderById('DESC', 25);

        return view('admin.live_stream.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['title'] = 'Live Stream Create';
        
        return view('admin.live_stream.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LiveStreamRequest $request)
    {
        $this->model->create($request->all()); // create new live stream
        return $this->controlRedirection($request, 'live-stream', 'LiveStream');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LiveStreaming  $liveStreaming
     * @return \Illuminate\Http\Response
     */
    public function show(LiveStream $liveStream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LiveStreaming  $liveStreaming
     * @return \Illuminate\Http\Response
     */
    public function edit(LiveStream $liveStream)
    {
        $data['title'] = 'Live Stream Edit';
        $data['liveStream'] = $liveStream;
        return view('admin.live_stream.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LiveStreaming  $liveStreaming
     * @return \Illuminate\Http\Response
     */
    public function update(LiveStreamRequest $request, LiveStream $liveStream)
    {
        $this->model->update($request->all(), $liveStream->id); // create new live stream
        return $this->controlRedirection($request, 'live-stream', 'LiveStream');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LiveStreaming  $liveStreaming
     * @return \Illuminate\Http\Response
     */
    public function delete(LiveStream $liveStream)
    {
        $liveStream->delete();
    }
}
