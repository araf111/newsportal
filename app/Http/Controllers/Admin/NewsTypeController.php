<?php

namespace App\Http\Controllers\Admin;

use App\Traits\General;
use App\Models\NewsType;
use App\Models\NewsHeading;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsTypeController extends Controller
{

    use General;

    protected $model;
    public function __construct(NewsType $newsType)
    {
        $this->model = new Crud($newsType);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (!Auth::user()->can('manage_dashboard')) {
        //     abort('403');
        // } // end permission checking

        $data['title'] = 'Manage News Type';
        $data['news_types'] = $this->model->getOrderById('DESC', 25);
        return view('admin.news_type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (!Auth::user()->can('manage_dashboard')) {
        //     abort('403');
        // } // end permission checking

        $data['title'] = 'Add News Type';
        return view('admin.news_type.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->model->create($request->only('name','name_eng','type','status')); // create new news heading

        return $this->controlRedirection($request, 'news-type', 'NewsType');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function show(NewsType $newsType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsType $newsType)
    {
        $data['title'] = 'Edit News Type';
        $data['newsType'] = $this->model->getRecordById($newsType->id);
        return view('admin.news_type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsType $newsType)
    {

        $this->model->update($request->only('name','name_eng','type','status'), $newsType->id); // create new news heading

        return $this->controlRedirection($request, 'news-type', 'NewsType');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\NewsType  $newsType
     * @return \Illuminate\Http\Response
     */
    public function delete(NewsType $newsType)
    {
        $this->model->delete($newsType->id); // delete record
        $this->showToastrMessage('error', __('News Type has been deleted'));
       return redirect()->back();
    }
}
