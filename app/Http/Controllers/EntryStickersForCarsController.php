<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnteryStickersForCarsRequest;
use App\Owner;
use App\EntryStickerForCar;


class EntryStickersForCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entryStickers = EntryStickerForCar::latest()->paginate(25);
        return view('entry_stickers_for_cars.index', compact('entryStickers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ownersIDs = Owner::latest()->pluck('name', 'id');
        return view('entry_stickers_for_cars.create', compact('ownersIDs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnteryStickersForCarsRequest $request)
    {
        $arr = $request->all();
        $arr['creator_user_id'] = auth()->user()->id;

        $entrySticker = EntryStickerForCar::create($arr);
        flash()->success('تم إدخال الملصق دخول السيارة بنجاح')->important();
        return redirect()->action('EntryStickersForCarsController@show', ['id'=>$entrySticker->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $entrySticker  = EntryStickerForCar::findOrFail($id);
        $ownersIDs = Owner::latest()->pluck('name', 'id');
        return view('entry_stickers_for_cars.show', compact('entrySticker', 'ownersIDs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entrySticker  = EntryStickerForCar::findOrFail($id);
        $ownersIDs = Owner::latest()->pluck('name', 'id');
        return view('entry_stickers_for_cars.edit', compact('entrySticker', 'ownersIDs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EnteryStickersForCarsRequest $request, $id)
    {
        $entrySticker  = EntryStickerForCar::findOrFail($id);
        $entrySticker->update($request->all());
        flash()->success('تم تعديل الملصق الخاص بالسيارة بنجاح')->important();
        return redirect()->action('EntryStickersForCarsController@show', ['id'=>$entrySticker->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $entrySticker  = EntryStickerForCar::findOrFail($id);
        $entrySticker->delete();
        flash()->success('تم حذف الملصق الخاص بالسيارة بنجاح')->important();
        return redirect()->action('EntryStickersForCarsController@index');

    }
}
