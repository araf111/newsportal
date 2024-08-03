<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Epaper;
use App\Traits\General;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class EpaperController extends Controller
{

    use ImageSaveTrait, General;

    protected $model;
    public function __construct(Epaper $epaper)
    {
        $this->model = new Crud($epaper);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['title'] = 'Epaper';
        $data['epapers'] = $this->model->getOrderById('DESC', 25);

        return view('admin.epaper.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Epaper';
        return view('admin.epaper.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            if ($request->file('image')) {
                $image_name = $this->saveImage('epaper', $request->file('image'), null, null); 
                $data['image'] = $image_name;
            }else{
                $data['image'] = '';
            }

            $this->model->create($data); // create new epaper image

        } catch (Exception $exception) {
            echo $exception->getMessage();
        }
        return $this->controlRedirection($request, 'epaper', 'Epaper');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function show(Epaper $epaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function edit(Epaper $epaper)
    {
        $data['title'] = 'Edit Epaper';
        $data['epaper'] = $epaper;
        return view('admin.epaper.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Epaper $epaper)
    {

        if ($request->feature_image)
        {
            $this->deleteFile($epaper->image); // delete file from server

            $image = $this->saveImage('epaper', $request->image, null, null); // new file upload into server

        } else {
            $image = $epaper->image;
        }

        $data['image'] = $image;
        $data['status'] = $request->status;

        $this->model->update($data, $epaper->id); // create new live stream
        return $this->controlRedirection($request, 'epaper', 'Epaper');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Epaper  $epaper
     * @return \Illuminate\Http\Response
     */
    public function delete(Epaper $epaper)
    {

        $this->deleteFile($epaper->image); 
        $epaper->delete();
    }
}
