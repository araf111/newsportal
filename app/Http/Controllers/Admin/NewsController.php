<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\News;
use App\Models\User;
use App\Traits\General;
use App\Models\Category;
use App\Models\NewsType;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use App\Http\Requests\Admin\UpdateNewsRequest;
use App\Models\NewsPhotoGallery;

class NewsController extends Controller
{

    use  ImageSaveTrait, General;

    protected $model;
    public function __construct(News $news)
    {
        $this->model = new Crud($news);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
        $data['title'] = 'Manage News';
        $data['newsLists'] = $this->model->getOrderById('DESC', 25);
        
        return view('admin.news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['categories'] = Category::active()->select('id','name')->get();
        $data['authores'] = User::author()->select('id','name')->get();
        $data['writeres'] = User::writer()->select('id','name')->get();
        $data['tags'] = Tag::select('id','name')->get();
        $data['newsTypes'] = NewsType::select('id','name')->get();

        return view('admin.news.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {


        if($request->save_and_add || $request->save){
            $status = 1;
        }else{
            $status = 4;
        }

        if (News::where('slug', $request->slug)->count() > 0)
        {
            $slug = $request->slug . '-'. rand(100000, 999999);
        } else {
            $slug = $request->slug;
        }

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'youtube_video' => $request->youtube_video,
            'facebook_video' => $request->facebook_video,
            'opinionWriter_id' => 1,
            'news_type_id' => $request->news_type_id ? implode("|", $request->news_type_id) : '',
            'news_heading_id' => 1,
            'author_id' => $request->author_id,
            'writer_id' => 1,
            'slug' => $slug,
            'feature_image' => $request->feature_image ? $this->saveImage('feature_image', $request->feature_image, null, null) :   null,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $status,
        ];

        $news = $this->model->create($data);

        $news->categories()->attach($request->category_id);
        $news->newsTags()->attach($request->tag_ids);

        //image add
        if($files = $request->file('image')) {
            foreach ($files as $key => $file) {
                $image_name = $this->saveImage('news_gallaries', $file, 150, 150);
                $dataImage['caption'] = $request->caption[$key];
                $dataImage['image'] = $image_name;
                $news->photoGalleries()->create($dataImage);
            }
        }

        return $this->controlRedirection($request, 'news', 'News');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {

        $data['categories'] = Category::active()->select('id','name')->get();
        $data['authores'] = User::author()->select('id','name')->get();
        $data['writeres'] = User::writer()->select('id','name')->get();
        $data['tags'] = Tag::select('id','name')->get();
        $data['newsTypes'] = NewsType::select('id','name')->get();
        $data['news'] = $news;

        return view('admin.news.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {

        if($request->update){
            $status = 1;
        }else{
            $status = 4;
        }

        if ($request->feature_image)
        {
            $this->deleteFile($news->feature_image); // delete file from server

            $image = $this->saveImage('feature_image', $request->feature_image, null, null); // new file upload into server

        } else {
            $image = $news->feature_image;
        }

        if ($news->where('slug', $request->slug)->where('uuid', '!=', $news->id)->count() > 0)
        {
            $slug = $request->slug . '-'. rand(100000, 999999);
        } else {
            $slug = $request->slug;
        }
        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'youtube_video' => $request->youtube_video,
            'facebook_video' => $request->facebook_video,
            'opinionWriter_id' => 1,
            'news_type_id' => $request->news_type_id ? implode("|", $request->news_type_id) : '',
            'news_heading_id' => 1,
            'author_id' => $request->author_id,
            'writer_id' => 1,
            'slug' => $slug,
            'feature_image' => $image,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'status' => $status,
        ];

        $news = $this->model->update($data, $news->id);

        $news->categories()->sync($request->category_id);
        $news->newsTags()->sync($request->tag_ids);

        $photoIds = $request->photo_gallery_image_ids;
        $caption = $request->caption;
        $image = $request->image;

        //if existing image item update
        if(isset($photoIds)){
            foreach($photoIds as $key => $photoId){
                $dataImage['caption'] = $caption[$key];
                $newsPhotoGallery = NewsPhotoGallery::findOrFail($photoId);
                if(isset($image[$key])){
                    $file = $image[$key];
                    $this->deleteFile($newsPhotoGallery->image);
                    $image_name = $this->saveImage('news_gallaries', $file, 150, 150); 
                    $dataImage['image'] = $image_name;
                }
                $newsPhotoGallery->update($dataImage);
            }
        }
        
        //if new image item add
        if($files = $request->file('image')) {
            foreach ($files as $key => $file) {
                if (isset($photoIds) && collect($photoIds)->count() > $key) {
                    continue;
                }

                $dataImage['caption'] = $caption[$key];
                $image_name = $this->saveImage('news_gallaries', $file, 150, 150); 
                $dataImage['news_id'] = $news->id;
                $dataImage['image'] = $image_name;
                NewsPhotoGallery::create($dataImage);
            }
        }

        return $this->controlRedirection($request, 'news', 'News');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function delete(News $news)
    {

        $news->categories()->detach();
        $news->newsTags()->detach();
        
        if($news->photoGalleries && $news->photoGalleries->count() > 0){
            foreach($news->photoGalleries as $key => $galleryImage){
                $this->deleteFile($galleryImage->image);
            }
        }

        $news->photoGalleries()->delete();

        $this->deleteFile($news->feature_image); 

        $news->delete();

        $this->showToastrMessage('error', __('News has been deleted'));
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function draftNews()
    {
    
        $data['title'] = 'Manage News';
        $data['newsLists'] = News::where('status', 4)->orderBy('id', 'desc')->paginate(25);
        
        return view('admin.news.draft', $data);
    }

}
