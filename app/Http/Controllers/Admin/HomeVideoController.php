<?php

namespace App\Http\Controllers\Admin;

use App\Traits\General;
use App\Models\HomeVideo;
use Illuminate\Http\Request;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeVideoRequest;

class HomeVideoController extends Controller
{

    use General;

    protected $model;
    public function __construct(HomeVideo $homeVideo)
    {
        $this->model = new Crud($homeVideo);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Manage Home Video';
        $data['home_videos'] = $this->model->getOrderById('DESC', 25);
        return view('admin.home_video.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Home Video';
        return view('admin.home_video.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeVideoRequest $request)
    {

        $this->model->create($request->all()); // create new home video
        return $this->controlRedirection($request, 'home-video', 'HomeVideo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeVideo  $homeVideo
     * @return \Illuminate\Http\Response
     */
    public function show(HomeVideo $homeVideo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeVideo  $homeVideo
     * @return \Illuminate\Http\Response
     */
    public function edit(HomeVideo $homeVideo)
    {
        $data['title'] = 'Edit Home Video';
        $data['home_video'] = $homeVideo;
        
        return view('admin.home_video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeVideo  $homeVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeVideo $homeVideo)
    {
        $this->model->update($request->all(), $homeVideo->id);
        return $this->controlRedirection($request, 'home-video', 'HomeVideo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeVideo  $homeVideo
     * @return \Illuminate\Http\Response
     */
    public function delete(HomeVideo $homeVideo)
    {
        $homeVideo->delete();
    }
}
