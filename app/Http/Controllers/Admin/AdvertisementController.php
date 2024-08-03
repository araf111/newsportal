<?php

namespace App\Http\Controllers\Admin;

use App\Traits\General;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Traits\ImageSaveTrait;
use App\Tools\Repositories\Crud;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Models\CategoryWiseAdvertisement;

class AdvertisementController extends Controller
{

    use  ImageSaveTrait, General;

    protected $model;
    public function __construct(Advertisement $advertisement)
    {
        $this->model = new Crud($advertisement);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['title'] = 'Add Advertisement';
        return view('admin.advertisement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $array = [
            1 => ['front','middle 1',468,60],
            2 => ['front','middle 2',468,60],
            3 => ['front','middle 3',468,60],
            4 => ['front','middle 4',468,60],
            5 => ['front','middle 5',468,60],
            6 => ['front','middle 6',468,60],
            7 => ['front','middle 7',468,60],
            8 => ['front','middle 8',468,60],
            9 => ['front','Sidebar 1',468,60],
            10 => ['front','Sidebar 2',468,60],
            11 => ['front','Header',468,60],
            12 => ['front','Footer',468,60],
            13 => ['Category','Sidebar 1',468,60],
            14 => ['Category','Sidebar 2',468,60],
            15 => ['Category','Sidebar 3',468,60],
            16 => ['Category','Header',468,60],
            17 => ['Category','Footer',468,60],
            18 => ['Details','Sidebar 1',468,60],
            19 => ['Details','Sidebar 2',468,60],
            20 => ['Details','Sidebar 3',468,60],
            21 => ['Details','Sidebar 4',468,60],
            22 => ['Details','Header',468,60],
            23 => ['Details','Footer',468,60],
            24 => ['Writer Details','Sidebar 1',468,60],
            25 => ['Writer Details','Sidebar 2',468,60]
        ];


        for ($i = 1; $i <= 25; $i++) {
            $id = $request->get('id_1_1_' . $i);
            $dataImage = [];
            if ($id == "") {

                if ($files = $request->file('name_1_1_' . $i)) {

                    $image_name = $this->saveImage('advertisement_thumbnail', $request->file('name_1_1_' . $i), 140, 140); 
                    $dataImage['image'] = $image_name;
                    $dataImage['ad_page'] = $array[$i][0];
                    $dataImage['ad_number'] = $i;
                    $dataImage['ad_position'] =  $array[$i][1];
                    $dataImage['ad_link'] = $request->get('link_1_1_' . $i);

                    if ($i >= 13 && $i <= 17) {
                        $dataImage['ad_page'] = $array[$i][0];
                        $dataImage['ad_number'] = $i;
                        $dataImage['ad_position'] =  $array[$i][1];
                        $dataImage['ad_link'] = $request->get('link_1_1_' . $i);
                        $dataImage['category_id'] = $request->get('category_ads');

                        CategoryWiseAdvertisement::create($dataImage);
                    }
                }

                $this->model->create($dataImage);
                

            } else {

            $advertisements = Advertisement::find($id);
            if ($files = $request->file('name_1_1_' . $i)) {

                $image_name = $this->saveImage('advertisement_thumbnail', $request->file('name_1_1_' . $i), 140, 140); 
                $dataImage['image'] = $image_name;

                    if ($i >= 13 && $i <= 17) {
                        $dataImage['category_id'] = $request->get('category_ads');
                    }
                }

                $dataImage['ad_link'] = $request->get('link_1_1_' . $i);
                $advertisements->update($dataImage);

                if ($i >= 13 && $i <= 17) {
                    CategoryWiseAdvertisement::where('','',);
                }
            }
        }

        return $this->controlRedirection($request, 'advertisement', 'Advertisement');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function show(Advertisement $advertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertisement  $advertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
}
