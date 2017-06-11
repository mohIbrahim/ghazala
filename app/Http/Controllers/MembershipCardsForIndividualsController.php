<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MembershipCardsForIndividualsRequest;
use App\Owner;
use App\Unit;
use App\MembershipCardForIndividual;

class MembershipCardsForIndividualsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('membership_cards_for_individuals');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $membershipCards = MembershipCardForIndividual::latest()->paginate(25);
        return view('membership_cards_for_individuals.index',  compact('membershipCards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ownersIDs = Owner::latest()->pluck('name', 'id');
        $unitsIDs = Unit::latest()->pluck('code', 'id');
        return view('membership_cards_for_individuals.create',  compact('ownersIDs', 'unitsIDs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembershipCardsForIndividualsRequest $request)
    {
        $arr = $request->all();
        $arr['creator_user_id'] = auth()->user()->id;
        $membershipCard = MembershipCardForIndividual::create($arr);
        flash()->success('تم إضافة كارت العضوية بنجاح')->important();
        return redirect()->action('MembershipCardsForIndividualsController@show', ['id'=>$membershipCard->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $membershipCard = MembershipCardForIndividual::findOrFail($id);
        return view('membership_cards_for_individuals.show', compact('membershipCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $membershipCard = MembershipCardForIndividual::findOrFail($id);
        $ownersIDs = Owner::latest()->pluck('name', 'id');
        $unitsIDs = Unit::latest()->pluck('code', 'id');
        return view('membership_cards_for_individuals.edit', compact('membershipCard', 'ownersIDs', 'unitsIDs'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MembershipCardsForIndividualsRequest $request, $id)
    {
        $membershipCard = MembershipCardForIndividual::findOrFail($id);
        $membershipCard->update($request->all());
                
        flash()->success('تم تعديل كارت العضوية بنجاح')->important();
        return redirect()->action('MembershipCardsForIndividualsController@show', ['id'=>$membershipCard->id]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $membershipCard = MembershipCardForIndividual::findOrFail($id);
        $membershipCard->delete();        
        flash()->success('تم حذف كارت العضوية بنجاح')->important();
        return redirect()->action('MembershipCardsForIndividualsController@index', ['id'=>$membershipCard->id]);

    }



    public function indexAjax()
    {
       $key = request()->key;       

       $startTable = '<div class="table-responsive"><table class="table table-condensed table-hover table-bordered text-center">';
       $tHead = '<thead>
                       <tr>                           
                            <td><strong>تاريخ و وقت التعديل</strong></td>
                            <td><strong>تاريخ و وقت الإنشاء</strong></td>
                            <td><strong>إنشاء من قبل المستخدم</strong></td>
                            <td><strong>تاريخ تسليم الكارت</strong></td>
                            <td><strong>هل تم تسليم الكارت؟</strong></td>
                            <td><strong>حالة الكارت</strong></td>
                            <td><strong>تاريخ الإصدار</strong></td>
                            <td><strong>نوع الكارت</strong></td>
                            <td><strong>كود الوحدة</strong></td>
                            <td><strong>اسم مالك الوحدة</strong></td>
                            <td><strong>الكود</strong></td>
                       </tr>
                </thead>';
        $tableBody = '<tbody>';
        $unitsCodes = '';        

        $membershipCards = MembershipCardForIndividual::where('serial', 'like', '%'.$key.'%')                            
                                    ->orWhereHas('owner', function($query) use($key) {
                                                        $query->where('name', 'like', '%'.$key.'%');
                                                })
                                    ->orWhereHas('unit', function($query) use($key) {
                                                        $query->where('code', 'like', '%'.$key.'%');
                                                })->get();

        foreach ($membershipCards as $key => $membershipCard) 
        {
            $tableBody .= '<tr>                                    
                                <td>'.$membershipCard->updated_at.'</td>
                                <td>'.$membershipCard->created_at.'</td>
                                <td>'.$membershipCard->creator->name.'</td>
                                <td>'.(($membershipCard->delivered_date)? $membershipCard->delivered_date->format('d-m-Y') : "").'</td>
                                <td>'.(($membershipCard->delivered)? "نعم":"لا").'</td>
                                <td>'.(($membershipCard->status)? "فعال":"<span style='color:red'>موقوف</span>").'</td>

                                <td>'.(($membershipCard->release_date)?$membershipCard->release_date->format("Y") : "") .'</td>

                                <td>'.$membershipCard->type.'</td>
                                <td><a href="'.action('UnitsController@show', ['id'=>$membershipCard->unit->id]).'" target="_blank">'.$membershipCard->unit->code.'</a></td>
                                <td><a href="'.action('OwnersController@show', ['slug'=>$membershipCard->owner->slug]).'" target="_blank">'.$membershipCard->owner->name.'</a></td>                                
                                <td><a href="'.action('MembershipCardsForIndividualsController@show', ['id'=>$membershipCard->id]).'" target="_blank">'.$membershipCard->serial.'</a></td>
                                
                        </tr>';
            $unitsCodes = '';
        }

        $endTable = '</table></div>';
        
            return $startTable.$tHead.$tableBody.$endTable;
            
        
        
    }

}
