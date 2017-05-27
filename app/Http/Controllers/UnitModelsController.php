<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnitModelsRequest;

use App\UnitModel;

class UnitModelsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('unit_models');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitModels = UnitModel::latest()->paginate(25);
        return view('unit_models.index', compact('unitModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit_models.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UnitModelsRequest $request)
    {
        $request['slug']= str_slug($request->name);
        $request["creator_user_id"] = auth()->user()->id;

        $unitModel = UnitModel::create($request->all());
        flash()->success('تم إضافة نموذج جديد بنجاح')->important();
        return redirect()->action('UnitModelsController@show', ['slug'=>$unitModel->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $unitModel = UnitModel::where("slug",$slug)->first();
        return view('unit_models.show', compact('unitModel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $unitModel = UnitModel::where('slug',$slug)->first();
        return view('unit_models.edit', compact('unitModel'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UnitModelsRequest $request, $id)
    {
        $unitModel = UnitModel::findOrFail($id);
        $request['slug']= str_slug($request->name);
        $unitModel->update($request->all());
        flash()->success('تم تعديل النموذج بنجاح')->important();
        return redirect()->action('UnitModelsController@show', ['slug'=>$unitModel->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $unitModel = UnitModel::findOrFail($id);
        $unitModel->delete();
        flash()->success('تم حذف النموذج بنجاح')->important();
        return redirect()->action('UnitModelsController@index');
    }
}
