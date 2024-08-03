<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Traits\General;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\TagRequest;
use App\Http\Requests\Admin\SubcategoryRequest;

class TagController extends Controller
{
    use General;

    protected $model;

    public function __construct(Tag $tag)
    {
        $this->model = new Crud($tag);
    }

    public function index()
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Manage Tag';
        $data['tags'] = $this->model->getOrderById('DESC', 25);
        return view('admin.tag.index', $data);
    }

    public function create()
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Add Tag';
        return view('admin.tag.create', $data);
    }

    public function store(TagRequest $request)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data = [
            'name' => $request->name,
            'slug' => getSlug($request->name)
        ];
        $this->model->create($data); // create new category
        return $this->controlRedirection($request, 'tag', 'Tag');
    }

    public function edit($uuid)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data['title'] = 'Edit Tag';
        $data['tag'] = $this->model->getRecordByUuid($uuid);
        return view('admin.tag.edit', $data);
    }

    public function update(TagRequest $request, $uuid)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking

        $data = [
            'name' => $request->name,
            'slug' => getSlug($request->name)
        ];
        $this->model->updateByUuid($data, $uuid); // update tag
        return $this->controlRedirection($request, 'tag', 'Tag');
    }

    public function delete($uuid)
    {
        if (!Auth::user()->can('manage_dashboard')) {
            abort('403');
        } // end permission checking


        $this->model->deleteByUuid($uuid); // delete record

        $this->showToastrMessage('error', __('Tag has been deleted'));
        return redirect()->back();
    }
}
