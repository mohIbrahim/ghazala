<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
class DataEntryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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

            $model5 = \App\UnitModel::create(['name'=>'د معدل', 'slug'=>str_slug('د شدة'), 'type'=>'شقة دوبليكس', 'finishing_type'=>'سوبر لوكس', 'creator_user_id'=> auth()->user()->id, ]);

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


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Excel::load('excel/membershipCards.xlsx', function($readerAA)
        {
            foreach ($readerAA->get() as $key => $sheets)
           {
                             
                foreach ($sheets as $key => $table) 
                {                            
                    $unit_code = $table->a;
                    $unit_id = ( \App\Unit::where('code', $unit_code)->first())?  \App\Unit::where('code', $unit_code)->first()->id : null;
                    
                    $owner_name = $table->b;
                    $owner_id = (\App\Owner::where('name', $owner_name)->first())? \App\Owner::where('name', $owner_name)->first()->id :null;

                    $type = $table->c;
                    $serial = $table->d;
                    $status = 0;
                    $release_date = \Carbon\Carbon::now();
                    $creator_user =  auth()->user()->id;

                    $membershipCard = \App\MembershipCardForIndividual::create(['unit_id'=>$unit_id, 'owner_id'=>$owner_id, 'type'=>$type, 'serial'=>$serial, 'status'=>$status, 'release_date'=>$release_date, 'creator_user_id'=>$creator_user]);
                }

           }

        });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Excel::load('excel/indebtedness.xlsx', function($readerAA)
        {
            foreach ($readerAA->get() as $key => $table)
           {                
                $unit_account_code = $table->a;
                $the_current_unit_debt = $table->b;
                $unit_code = $table->c;

                    
                if(\App\Unit::where('code', $unit_code))
                {

                    $unit = \App\Unit::where('code', $unit_code)->first()->update(['unit_account_code'=>$unit_account_code, 'the_current_unit_debt'=>$the_current_unit_debt]);
                }else{

                }
                    
           }

        });
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
