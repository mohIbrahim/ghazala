<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnitsRequest;
use App\Unit;
use App\UnitModel;
use App\UnitImage;

class UnitsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('units');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::latest()->paginate(15);
        return view('units.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelsNames = UnitModel::latest()->pluck('name', 'id');
        return view('units.create', compact('modelsNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitsRequest $request)
    {
        $request['creator_user_id'] = auth()->user()->id;
        $unit = Unit::create($request->all());

        if($request->hasFile('unitImages')){
            foreach ($request->file('unitImages') as $unitImage) {
                if($unitImage->isValid()){
                    $image = $unitImage;
                    $imageNewName = str_random(64).'.'.$image->guessExtension();
                    $image->move('images/unit_images', $imageNewName);                              
                    $unit->images()->save(new UnitImage(['unit_image'=>$imageNewName]));
                }                
            }            
        }

        flash()->success('تم إضافة وحدة جديدة بنجاح')->important();
        return redirect()->action('UnitsController@show', ['id'=>$unit->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $unit = Unit::findOrFail($id);
        return view('units.show',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $modelsNames = UnitModel::latest()->pluck('name', 'id');
        return view('units.edit', compact('unit', 'modelsNames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitsRequest $request, $id)
    {
        $unit = Unit::findOrFail($id);
        $unit->update($request->all());
        flash()->success('تم تعديل الوحدة بنجاح')->important();
        return redirect()->action('UnitsController@show', ['id'=>$unit->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();
        flash()->success('تم حذف الوحدة بنجاح')->important();
        return redirect()->action('UnitsController@index');
    }
}
