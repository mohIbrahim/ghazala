<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RentersRequest;

use App\Unit;
use App\Renter;

class RentersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('renters');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renters = Renter::latest()->paginate(25);
        return view('renters.index', compact('renters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('renters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentersRequest $request)
    {
        $arr = $request->all();
        $arr['slug'] = str_slug($request->name);
        $arr['creator_user_id'] = auth()->user()->id;
        
        $renter = Renter::create($arr);
        flash()->success('تم إضافة مستأجر جديد بنجاح')->important();
        return redirect()->action('RentersController@show', ['slug'=>$renter->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $renter = Renter::where('slug', $slug)->first();
        return view('renters.show', compact('renter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $renter = Renter::where('slug', $slug)->first();
        return view('renters.edit', compact('renter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RentersRequest $request, $id)
    {
        $renter = Renter::findOrFail($id);
        $arr = $request->all();
        $arr['slug'] = str_slug($request->name);
        $renter->update($arr);
        flash()->success('تم نعديل بيانات المستأجر بنجاح')->important();
        return redirect()->action('RentersController@show', ['slug'=>$renter->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renter = Renter::findOrFail($id);
        $renter->delete();
        flash()->success('تم حذف بيانات المستأجر بنجاح')->important();
        return redirect()->action('RentersController@index');
    }


    public function indexAjax()
    {
        $key = request()->key;

       $startTable = '<div class="table-responsive"><table class="table table-condensed table-hover table-bordered text-center">';
       $tHead = '<thead>
                       <tr>
                           
                           <td><strong>المهنة</strong></td>
                           <td><strong>العنوان</strong></td>
                           <td><strong>الايميل الشخصى</strong></td>
                           <td><strong>التليفون الارضي</strong></td>
                           <td><strong>موبيل 2</strong></td>
                           <td><strong>موبيل 1</strong></td>
                           <td><strong>رقم البطاقة</strong></td>
                           <td><strong>الوحدات المستأجرة</strong></td>
                           <td><strong>الاسم</strong></td>
                           <td><strong>#</strong></td>
                       </tr>
                </thead>';
        $tableBody = '<tbody>';
        $unitsCodes = '';

        

        $renters = Renter::where('name', 'like', '%'.$key.'%')
                            ->orWhere('mobile_1', 'like', '%'.$key.'%')
                             ->orWhereHas('units', function($query) use($key) {
                            $query->where('code', 'like', '%'.$key.'%');
                            })->paginate(30);
        foreach ($renters as $key => $renter) 
        {

            foreach ($renter->units as $key => $unit) 
            {
                $unitsCodes .= '<p><a href="'.action('UnitsController@show', ['id'=>$unit->id]).'">'.$unit->code.'</a></p>' ;
            }

            $tableBody .= '<tr>                                    
                                    
                                <td>'.$renter->occupation.'</td>
                                <td>'.$renter->address.'</td>
                                <td>'.$renter->email.'</td>
                                <td>'.$renter->telephone.'</td>
                                <td>'.$renter->mobile_2.'</td>
                                <td>'.$renter->mobile_1.'</td>
                                <td>'.$renter->ssn.'</td>
                                <td>'.$unitsCodes.'</td>
                                <td><a href="'.action("RentersController@show",["slug"=>$renter->slug]).'" target="_blank">'.$renter->name.'</a></td>                                
                                <td>'.$renter->id.'</td>
                        </tr>';
            $unitsCodes = '';
        }
        $endTable = '</table></div>';
        
            return $startTable.$tHead.$tableBody.$endTable;
    }
}
