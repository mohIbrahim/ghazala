<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnersFamilyMembersRequest;
use App\OwnerFamilyMember;
use App\Owner;

class OwnersFamilyMembersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('owners_family_members');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members  = OwnerFamilyMember::latest()->paginate(15);
        return view('owners_family_members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ownersIDs  = Owner::latest()->pluck('name', 'id');
        return view('owners_family_members.create', compact('ownersIDs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnersFamilyMembersRequest $request)
    {
        $arr = $request->all();
        $arr['slug'] = str_slug($request->name);
        $arr['creator_user_id'] = auth()->user()->id;


        $member = OwnerFamilyMember::create($arr);
        flash()->success('تم إضافة عضو جديد بنجاح')->important();
        return redirect()->action('OwnersFamilyMembersController@show', ['slug'=>$member->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $member = OwnerFamilyMember::where('slug', $slug)->first();        
        return view('owners_family_members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $member = OwnerFamilyMember::where('slug', $slug)->first();
        $ownersIDs  = Owner::latest()->pluck('name', 'id');
        return view('owners_family_members.edit', compact('member', 'ownersIDs'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnersFamilyMembersRequest $request, $id)
    {
        $arr = $request->all();
        $arr['slug'] = str_slug($request->name);
        $member = OwnerFamilyMember::findOrFail($id);
        $member->update($arr);

        flash()->success('تم تعديل العضو بنجاح')->important();
        return redirect()->action('OwnersFamilyMembersController@show', ['slug'=>$member->slug]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = OwnerFamilyMember::findOrFail($id);
        $member->delete();

        flash()->success('تم حذف العضو بنجاح')->important();
        return redirect()->action('OwnersFamilyMembersController@index');
    }
}
