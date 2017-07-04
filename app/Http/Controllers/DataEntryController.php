<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class DataEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Excel::load('excel/book1.xlsx', function($reader) {

            $model1 = \App\UnitModel::create(['name'=>'آ', 'slug'=>str_slug('آ'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model2 = \App\UnitModel::create(['name'=>'أ', 'slug'=>str_slug('أ'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model3 = \App\UnitModel::create(['name'=>'ب', 'slug'=>str_slug('ب'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model4 = \App\UnitModel::create(['name'=>'دَ ب', 'slug'=>str_slug('دَ ب'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model5 = \App\UnitModel::create(['name'=>'د شدة', 'slug'=>str_slug('د شدة'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model6 = \App\UnitModel::create(['name'=>'ج', 'slug'=>str_slug('ج'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model7 = \App\UnitModel::create(['name'=>'د', 'slug'=>str_slug('د'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model8 = \App\UnitModel::create(['name'=>'ج معدل', 'slug'=>str_slug('ج معدل'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

            $model9 = \App\UnitModel::create(['name'=>'ح', 'slug'=>str_slug('ح'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

           foreach ($reader->get() as $key => $sheet)
           {
                $model_id = \App\UnitModel::where('name', $sheet['a'])->first()->id;
                $unit = \App\Unit::create(  [
                                                'code'=>$sheet['b'], 
                                                'model_id'=>$model_id, 
                                                'unit_account_code'=>$key, 
                                                'electricity_meter_number'=>$key,
                                                'creator_user_id'=> auth()->user()->id,
                                            ]);
                $owner = \App\Owner::create(    [
                                                    'name'=>$sheet['c'],
                                                    'slug'=>str_slug($sheet['c']),
                                                    'unit_id'=>$unit->id,
                                                    'mobile_1'=>'012000000'.$key,
                                                    'owner_status'=>'مالك حالي',
                                                    'creator_user_id'=> auth()->user()->id,
                                                ]);

                $owner->units()->attach([$unit->id]);
            }

        });

        Excel::load('excel/book1.xlsx', function($reader)
        {

        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
