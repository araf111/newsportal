<?php

namespace App\Http\Controllers\Admin;

use App\Traits\General;
use App\Models\NewsHeading;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewsHeadingController extends Controller
{

    use  ImageSaveTrait, General;

    protected $model;
    public function __construct(NewsHeading $newsHeading)
    {
        $this->model = new Crud($newsHeading);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (!Auth::user()->can('manage_news_heading')) {
        //     abort('403');
        // } // end permission checking

        $data['title'] = 'Manage New Heading';
        $data['news_headings'] = $this->model->getOrderById('DESC', 25);
        return view('admin.news_heading.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (!Auth::user()->can('manage_news_heading')) {
        //     abort('403');
        // } // end permission checking

        $data['title'] = 'Add News Heading';
        return view('admin.news_heading.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = [
            'title' => $request->title,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
        ];

        $this->model->create($data); // create new news heading

        return $this->controlRedirection($request, 'news-heading', 'NewsHeading');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\NewsHeading  $newsHeading
     * @return \Illuminate\Http\Response
     */
    public function show(NewsHeading $newsHeading)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\NewsHeading  $newsHeading
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsHeading $newsHeading)
    {
        $data['title'] = 'Edit News Heading';
        $data['news_heading'] = $this->model->getRecordById($newsHeading->id);
        return view('admin.news_heading.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\NewsHeading  $newsHeading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsHeading $newsHeading)
    {

        $data = [
            'title' => $request->title,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
        ];


        $this->model->update($data, $newsHeading->id); // create new news heading

        return $this->controlRedirection($request, 'news-heading', 'NewsHeading');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\NewsHeading  $newsHeading
     * @return \Illuminate\Http\Response
     */
    public function delete(NewsHeading $newsHeading)
    {
        $this->model->delete($newsHeading->id); // delete record
        $this->showToastrMessage('error', __('News Heading has been deleted'));
       return redirect()->back();
    }
}
