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

           foreach ($reader->get() as $key => $sheet) {

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
