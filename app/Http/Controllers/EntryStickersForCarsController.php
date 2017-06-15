<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EnteryStickersForCarsRequest;
use App\Owner;
use App\EntryStickerForCar;


class EntryStickersForCarsController extends Controller
{   
    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('entry_stickers_for_cars');
    }

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

    /**
     * [indexAjax description]
     * @return [type] [description]
     */
    public function indexAjax()
    {
       $key = request()->key;
       $startTable = '<div class="table-responsive"><table class="table table-condensed table-hover table-bordered text-center">';
       $tHead = '<thead>
                       <tr>                           
                            <td><strong>تاريخ و وقت التعديل</strong></td>
                            <td><strong>تاريخ و وقت الإنشاء</strong></td>
                            <td><strong>إنشاء من قبل المستخدم</strong></td>
                            <td><strong>التعليقات</strong></td>
                            <td><strong>السماح بدخول السيارة</strong></td>
                            <td><strong>لون السيارة</strong></td>
                            <td><strong>موديل السيارة</strong></td>
                            <td><strong>تصنيف السيارة</strong></td>
                            <td><strong>اسم الشركة المصنعة للسيارة</strong></td>
                            <td><strong>رقم لوحة السيارة</strong></td>
                            <td><strong>تاريخ الإصدار</strong></td>
                            <td><strong>اسم المالك الفعلي للسيارة</strong></td>
                            <td><strong>اسم مالك الوحدة</strong></td>
                            <td><strong>كود الملصق الخاص بالسيارة</strong></td>
                       </tr>
                </thead>';
        $tableBody = '<tbody>';
        $entryStickers = EntryStickerForCar::where('code', 'like', '%'.$key.'%')
                                    ->orWhere('car_owner', 'like', '%'.$key.'%')
                                    ->orWhere('plate_number', 'like', '%'.$key.'%')
                                    ->orWhere('the_manufacture_company', 'like', '%'.$key.'%')
                                    ->orWhereHas('owner', function($query) use($key) 
                                                {
                                                    $query->where('name', 'like', '%'.$key.'%');
                                                })->paginate(30);
                                                                             
        foreach ($entryStickers as $key => $entrySticker) 
        {
            $status = '';
            if($entrySticker->status){
                $status = '<span style="color:green">مسموح بالدخول</span>';
            }else{
                $status = '<span style="color:red">غير مسموح بالدخول</span>';
            }
            $tableBody .= '<tr>
                                <td>'. $entrySticker->updated_at .'</td>
                                    <td>'. $entrySticker->created_at .'</td>
                                    <td>'. $entrySticker->creator->name .'</td>
                                    <td>'. $entrySticker->comments .'</td>
                                    <td>'. $status .'</td>
                                    <td>'. $entrySticker->color .'</td>
                                    <td>'. $entrySticker->model .'</td>
                                    <td>'. $entrySticker->type .'</td>
                                    <td>'. $entrySticker->the_manufacture_company .'</td>
                                    <td>'. $entrySticker->plate_number .'</td>
                                    <td>'. $entrySticker->release_date .'</td>
                                    <td>'. $entrySticker->car_owner.'</td>
                                    <td>';
                                        if($entrySticker->owner){
                                            $tableBody .= 
                                            '<a href="'. action('OwnersController@show', ['slug'=>$entrySticker->owner->slug]) .'" target="_blank">'. 
                                                $entrySticker->owner->name
                                            .'</a>';
                                        }else
                                        {
                                            $tableBody .= "";
                                        }                                                   
                                    $tableBody.= '</td>
                                    <td>'.
                                        '<a href="'. action('EntryStickersForCarsController@show', ['id'=>$entrySticker->id]) .'" target="_blank">'.
                                            $entrySticker->code
                                        .'</a>'
                                    .'</td>
                        </tr>';
            $status = '';
        }

        $endTable = '</table></div>';
        
            return $startTable.$tHead.$tableBody.$endTable;
    }
}
