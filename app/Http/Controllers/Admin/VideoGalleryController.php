<?php

namespace App\Http\Controllers\Admin;

use App\Traits\General;
use App\Models\HomeVideo;
use App\Models\VideoGallery;
use Illuminate\Http\Request;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HomeVideoRequest;
use App\Http\Requests\Admin\VideoGalleryRequest;

class VideoGalleryController extends Controller
{

    use General;

    protected $model;
    public function __construct(VideoGallery $videoGallery)
    {
        $this->model = new Crud($videoGallery);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Manage Video Gallery';
        $data['video_galleries'] = $this->model->getOrderById('DESC', 25);
        return view('admin.video_gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Video Gallery';
        return view('admin.video_gallery.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoGalleryRequest $request)
    {

        $this->model->create($request->all()); // create new home video
        return $this->controlRedirection($request, 'video-gallery', 'VideoGallery');
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
    public function edit(VideoGallery $videoGallery)
    {
        $data['title'] = 'Edit Home Video';
        $data['home_video'] = $videoGallery;
        
        return view('admin.video_gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeVideo  $homeVideo
     * @return \Illuminate\Http\Response
     */
    public function update(VideoGalleryRequest $request, VideoGallery $videoGallery)
    {
        $this->model->update($request->all(), $videoGallery->id);
        return $this->controlRedirection($request, 'video-gallery', 'VideoGallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VideoGallery  $videoGallery
     * @return \Illuminate\Http\Response
     */
    public function delete(VideoGallery $videoGallery)
    {
        $videoGallery->delete();
    }
}
