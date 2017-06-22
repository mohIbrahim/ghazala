<?php

namespace App\Http\Controllers;


use App\Http\Requests\RentingContractsRequest;
use App\Unit;
use App\Renter;
use App\RentingContract;

class RentingContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentingContracts = RentingContract::latest()->paginate(15);
        return view('renting_contracts.index', compact('rentingContracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rentersNames = Renter::latest()->pluck('name', 'id');
        $unitsCodes = Unit::latest()->pluck('code', 'id');
        return view('renting_contracts.create', compact('unitsCodes', 'rentersNames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RentingContractsRequest $request)
    {
        $request['creator_user_id'] = auth()->user()->id;

        $newArray  = $request->all();
        

        if ($request->hasFile('soft_copy') && 
            $request->file('soft_copy')->isValid()) 
        {
            $pdf = $request->file('soft_copy');
            $pdfNewName = str_random(64).'.'.$pdf->guessExtension();
            $pdf->move('images/ranting_contracts_images', $pdfNewName);
            $newArray['soft_copy'] = $pdfNewName;
        }
        
        $rentingContract = RentingContract::create($newArray);
        

        flash()->success('تم إضافة عقد إيجار جديد بنجاح')->important();
        return redirect()->action('RentingContractsController@show', ['id'=>$rentingContract->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rentingContract = RentingContract::findOrFail($id);
        return view('renting_contracts.show', compact('rentingContract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rentingContract = RentingContract::findOrFail($id);
        $rentersNames = Renter::latest()->pluck('name', 'id');
        $unitsCodes = Unit::latest()->pluck('code', 'id');
        return view('renting_contracts.edit', compact('rentingContract', 'rentersNames', 'unitsCodes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RentingContractsRequest $request, $id)
    {
        $rentingContract = RentingContract::findOrFail($id);
        $newArray  = $request->all();
        // if we need to delete old soft copy
        if(isset($request->contractToDelete))
        {
            $this->deleteFile('images/renting_contracts_images/'.$request->contractToDelete); 
            $rentingContract->soft_copy = null;
        }
        // update new soft copy if uploaded
        if ($request->hasFile('soft_copy') && 
            $request->file('soft_copy')->isValid()) 
        {
            $pdf = $request->file('soft_copy');
            $pdfNewName = str_random(64).'.'.$pdf->guessExtension();
            $pdf->move('images/renting_contracts_images', $pdfNewName);
            $newArray['soft_copy'] = $pdfNewName;
            if($rentingContract->soft_copy)
                $this->deleteFile('images/renting_contracts_images/'.$rentingContract->soft_copy);
        }
        $rentingContract->update($newArray);
        flash()->success('تم تعديل عقد الإيجار')->important();
        return redirect()->action('RentingContractsController@show', ['id'=>$rentingContract->id]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rentingContract = RentingContract::findOrFail($id);
        if($rentingContract->soft_copy)
            $this->deleteFile('images/renting_contracts_images/'.$rentingContract->soft_copy);
        $rentingContract->delete();
        flash()->success('تم حذف عقد الإيجار بنجاح')->important();
        return redirect()->action('RentingContractsController@index');
    }

    private function deleteFile($source){        
        if(file_exists($source)){
            unlink($source);
        }    
    }


    public function indexAjax()
    {
        $key = request()->key;
       $startTable = '<div class="table-responsive"><table class="table table-condensed table-hover table-bordered text-center">';
       $tHead = '<thead>
                       <tr>                           
                            <td><strong>وقت و تاريخ التعديل</strong></td>
                            <td><strong>وقت و تاريخ الإنشاء</strong></td>
                            <td><strong>اسم منشئ المحتوى</strong></td>
                            <td><strong>تاريخ نهاية العقد</strong></td>
                            <td><strong>تاريخ بداية العقد</strong></td>
                            <td><strong>اسم المستأجر</strong></td>
                            <td><strong>كود الوحدة</strong></td>
                            <td><strong>المسلسل</strong></td>
                       </tr>
                </thead>';
        $tableBody = '<tbody>';

        $rentingContracts = RentingContract::where('id', 'like', '%'.$key.'%')
                                            ->orWhereHas('renter', function($query) use($key) 
                                                                {
                                                                    $query->where('name', 'like', '%'.$key.'%');
                                                                })
                                            ->orWhereHas('unit', function($query) use($key) 
                                                                {
                                                                    $query->where('code', 'like', '%'.$key.'%');
                                                                })->paginate(30);

                                    
        foreach ($rentingContracts as $key => $rentingContract) 
        {
            $tableBody .= '<tr>
                                <td>'. $rentingContract->updated_at .'</td>
                                <td>'. $rentingContract->created_at .'</td>

                                <td>'.
                                    (($rentingContract->creator)? $rentingContract->creator->name : "").'                                        
                                </td>
                                <td>'.
                                    (($rentingContract->to) ? $rentingContract->to->format("d-m-Y") : "") .'
                                    
                                </td>
                                <td>'.
                                    (($rentingContract->from)? $rentingContract->from->format("d-m-Y"): "").'
                                    
                                </td>
                                <td>';
                                    if($rentingContract->renter)
                                    {
                                      $tableBody .=  
                                        '<a href="'.action("RentersController@show", ["slug"=>$rentingContract->renter->slug]) .'" target="_blank">
                                            '. $rentingContract->renter->name .'
                                        </a>';                                            
                                    }
                                    
                                $tableBody .= '</td>
                                <td>';
                                    if($rentingContract->unit)
                                    {
                                        $tableBody .=
                                        '<a href="'.action("UnitsController@show", ['id'=>$rentingContract->unit->id]) .'" target="_blank">
                                            '.$rentingContract->unit->code .'
                                        </a>';
                                    }
                                    
                                $tableBody .= '</td>
                                <td>
                                    <a href="'.action("RentingContractsController@show", ['id'=>$rentingContract->id]).'" target="_blank"> 
                                        '.$rentingContract->id.'
                                    </a>
                                </td>
                            </tr>';
        }
        $endTable = '</table></div>';
        
            return $startTable.$tHead.$tableBody.$endTable;
    }
}
