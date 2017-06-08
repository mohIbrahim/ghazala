<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MembershipCardsForIndividualsRequest;
use App\Owner;
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
        return view('membership_cards_for_individuals.create',  compact('ownersIDs'));
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
        flash()->success('تم إضافة كرت العضوية بنجاح')->important();
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
        return view('membership_cards_for_individuals.edit', compact('membershipCard', 'ownersIDs'));        
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
                
        flash()->success('تم تعديل كرت العضوية بنجاح')->important();
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
        flash()->success('تم حذف كرت العضوية بنجاح')->important();
        return redirect()->action('MembershipCardsForIndividualsController@index', ['id'=>$membershipCard->id]);

    }
}
