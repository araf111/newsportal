<?php

namespace App\Http\Controllers\Admin;

use App\Traits\General;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ImageSaveTrait;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryRequest;

class CategoryController extends Controller
{
    use  ImageSaveTrait, General;

    protected $model;
    public function __construct(Category $category)
    {
        $this->model = new Crud($category);
    }
    public function index()
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Manage Category';
        $data['categories'] = $this->model->getOrderById('DESC', 25);
        return view('admin.category.index', $data);
    }

    public function create()
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Add Category';
        $data['categories'] = Category::where('status', 1)->get();
        return view('admin.category.create', $data);
    }

    public function store(CategoryRequest $request)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data = [
            'name' => $request->name,
            'name_english' => $request->name_english,
            'parent_id' => $request->parent_id,
            'sort_id' => 0,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => getSlug($request->name),
            'image' => $request->image ? $this->saveImage('category', $request->image, null, null) :   null,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        if($request->hasFile('og_image')){
            $data['og_image'] = $this->saveImage('meta', $request->og_image, null, null);
        }

        $this->model->create($data); // create new category

        return $this->controlRedirection($request, 'category', 'Category');
    }

    public function edit($uuid)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Edit Category';
        $data['category'] = $this->model->getRecordByUuid($uuid);
        $data['categories'] = $this->model->getOrderById('DESC', 25);
        return view('admin.category.edit', $data);
    }

    public function update(CategoryRequest $request, $uuid)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        // dd($request->all());

        $category = $this->model->getRecordByUuid($uuid);

        if ($request->image)
        {
            $this->deleteFile($category->image); // delete file from server

            $image = $this->saveImage('category', $request->image, null, null); // new file upload into server

        } else {
            $image = $category->image;
        }

        $data = [
            'name' => $request->name,
            'name_english' => $request->name_english,
            'parent_id' => $request->parent_id,
            'is_feature' => $request->is_feature ? 'yes' : 'no',
            'slug' => getSlug($request->name),
            'image' => $image,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
        ];

        if($request->hasFile('og_image')){
            $data['og_image'] = $this->saveImage('meta', $request->og_image, null, null);
        }

        $this->model->updateByUuid($data, $uuid); // update category

        return $this->controlRedirection($request, 'category', 'Category');
    }

    public function delete($uuid)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $category = $this->model->getRecordByUuid($uuid);
        $this->deleteFile($category->image); // delete file from server
        $this->model->deleteByUuid($uuid); // delete record

        $this->showToastrMessage('error', __('Category has been deleted'));
       return redirect()->back();
    }

    public function categorySortingForm()
    {
        $data['title'] = 'Sorting Category';
        $data['categories'] = Category::where('name', '!=', 'অন্যান্য')->get();
        return view('admin.category.sorting', $data);
    }

    public function categorySortingUpdate(Request $request)
    {

        $sorting_value = $request->sorting_value;
        $categories = $request->category_id;
        foreach($categories as $key => $category) {
            $catObj = Category::findOrFail($category);
            $catObj->sort_id = $sorting_value[$key];
            $catObj->save();
        }
        
        return redirect()->route('category.sorting.form')->with('flash_message', 'Sorting updated Successfully!');
    }
}
