<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Traits\General;
use App\Models\PhotoGallery;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;
use App\Tools\Repositories\Crud;
use App\Models\PhotoGalleryImage;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhotoGalleryRequest;

class PhotoGalleryController extends Controller
{

    use  ImageSaveTrait, General;

    protected $model;
    public function __construct(PhotoGallery $photoGallery)
    {
        $this->model = new Crud($photoGallery);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Photo Gallery';
        $data['photoGalleries'] = $this->model->getOrderById('DESC', 25);

        return view('admin.photo_gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Photo Gallery';

        return view('admin.photo_gallery.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotoGalleryRequest $request)
    {

        $data['title'] = $request->title;
        $photoGallery = $this->model->create($data);
        $caption = $request->caption;

        try {
            if ($files = $request->file('image')) {
                foreach ($files as $key => $file) {
                    $dataImage['caption'] = $caption[$key];
                    $image_name = $this->saveImage('photo_gallery', $file, 150, 150); 
                    $dataImage['image'] = $image_name;
                    $photoGallery->photoGalleryImages()->create($dataImage);
                }
            }
        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        return $this->controlRedirection($request, 'photo-gallery', 'PhotoGAllery');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function show(PhotoGallery $photoGallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(PhotoGallery $photoGallery)
    {

        $data['title'] = 'Edit Photo Gallery';
        $data['photoGallery'] = $photoGallery;
        return view('admin.photo_gallery.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PhotoGallery $photoGallery)
    {


        $photoIds = $request->photo_gallery_image_ids;
        $data = $request->only('title', 'status');
        $photoGallery = $this->model->update($data, $photoGallery->id);
        $caption = $request->caption;
        $image = $request->image;

        //if existing image item update
        if(isset($photoIds)){
            foreach($photoIds as $key => $photoId){
                $dataImage['caption'] = $caption[$key];
                $photoGalleryImage = PhotoGalleryImage::findOrFail($photoId);
                if(isset($image[$key])){
                    $file = $image[$key];
                    $this->deleteFile($photoGalleryImage->image);
                    $image_name = $this->saveImage('photo_gallery', $file, 150, 150); 
                    $dataImage['image'] = $image_name;
                }
                $photoGalleryImage->update($dataImage);
            }
        }
        
        //if new image item add
        if($files = $request->file('image')) {
            foreach ($files as $key => $file) {
                if (isset($photoIds) && collect($photoIds)->count() > $key) {
                    continue;
                }

                $dataImage['caption'] = $caption[$key];
                $image_name = $this->saveImage('photo_gallery', $file, 150, 150); 
                $dataImage['photo_gallery_id'] = $photoGallery->id;
                $dataImage['image'] = $image_name;
                PhotoGalleryImage::create($dataImage);
            }
        }

        return $this->controlRedirection($request, 'photo-gallery', 'PhotoGallery');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PhotoGallery  $photoGallery
     * @return \Illuminate\Http\Response
     */
    public function delete(PhotoGallery $photoGallery)
    {
        if($photoGallery->photoGalleryImages && $photoGallery->photoGalleryImages->count() > 0){
            foreach($photoGallery->photoGalleryImages as $key => $galleryImage){
                $this->deleteFile($galleryImage->image);
            }
        }

        $photoGallery->photoGalleryImages()->delete();
        $photoGallery->delete();
        
    }
}
