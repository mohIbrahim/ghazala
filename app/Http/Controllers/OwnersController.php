<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnersRequest;
use App\Owner;
use App\Unit;

class OwnersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $owners = Owner::latest()->paginate(25);
        return view('owners.index', compact('owners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unitsIDs = Unit::latest()->pluck('code', 'id');
        return view('owners.create', compact('unitsIDs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OwnersRequest $request)
    {
        $request['slug'] = str_slug($request->name);
        $request['creator_user_id'] = auth()->user()->id;

        $newArray  = $request->all();

        if ($request->hasFile('personal_image') && 
            $request->file('personal_image')->isValid()) 
        {
            $image = $request->file('personal_image');
            $imageNewName = str_random(64).'.'.$image->guessExtension();
            $image->move('images/owner_images', $imageNewName);
            $newArray['personal_image'] = $imageNewName;
        }

        if ($request->hasFile('contract_image') && 
            $request->file('contract_image')->isValid()) 
        {
            $pdf = $request->file('contract_image');
            $pdfNewName = str_random(64).'.'.$pdf->guessExtension();
            $pdf->move('images/owner_contracts_images', $pdfNewName);
            $newArray['contract_image'] = $pdfNewName;
        }
        
        $owner = Owner::create($newArray);

        $owner->units()->attach($request->units_ids);

        flash()->success('تم إضافة مالك جديد بنجاح')->important();
        return redirect()->action('OwnersController@show', ['slug'=>$owner->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $owner = Owner::where('slug', $slug)->first();
        return view('owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $owner = Owner::where('slug', $slug)->first();
        $unitsIDs = Unit::latest()->pluck('code', 'id');
        return view('owners.edit', compact('owner', 'unitsIDs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OwnersRequest $request, $id)
    {

       
        $owner = Owner::findOrFail($id);
        $request['slug'] = str_slug($request->name);

        $newArray  = $request->all();


        //if we need to delete old images
        if(isset($request->imageToDelete))
        {
            $this->deleteFile('images/owner_images/'.$request->imageToDelete);
            $owner->personal_image = 'no_image.png';
        }
        //update new image if uploaded
        if ($request->hasFile('personal_image') && 
            $request->file('personal_image')->isValid()) 
        {
            $image = $request->file('personal_image');
            $imageNewName = str_random(64).'.'.$image->guessExtension();
            $image->move('images/owner_images', $imageNewName);
            $newArray['personal_image'] = $imageNewName;
            if($owner->personal_image !== "no_image.png")
            {

                $this->deleteFile('images/owner_images/'.$owner->personal_image);
            }
        }        
        


        //if we need to delete old contract
        if(isset($request->contractToDelete))
        {
            $this->deleteFile('images/owner_contracts_images/'.$request->contractToDelete); 
            $owner->contract_image = null;
        }

        //update new contract if uploaded
        if ($request->hasFile('contract_image') && 
            $request->file('contract_image')->isValid()) 
        {
            $pdf = $request->file('contract_image');
            $pdfNewName = str_random(64).'.'.$pdf->guessExtension();
            $pdf->move('images/owner_contracts_images', $pdfNewName);
            $newArray['contract_image'] = $pdfNewName;
            $this->deleteFile('images/owner_contracts_images/'.$owner->contract_image);
        }



        $owner->update($newArray);

        $owner->units()->sync($request->units_ids);

        flash()->success('تم تعديل المالك بنجاح')->important();
        return redirect()->action('OwnersController@show', ['slug'=>$owner->slug]);        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = Owner::findOrFail($id);

        $this->deleteFile('images/owner_images/'.$owner->personal_image);
        $this->deleteFile('images/owner_contracts_images/'.$owner->contract_image);

        $owner->delete();

        flash()->success('تم حذف المالك بنجاح')->important();
        return redirect()->action('OwnersController@index');
    }

    /**
     * [deleteFile description]
     * @param  [type] $source [description]
     * @return [type]         [description]
     */
    private function deleteFile($source)
    {        
        if(file_exists($source)){
            try{
                unlink(public_path().'/'.$source);
            }catch(\Exception $e){
                return $e->getMessage();
            }
        }    
    }




    public function indexAjax()
    {
       $key = request()->key;

       $startTable = '<div class="table-responsive"><table class="table table-condensed table-hover table-bordered text-center" id="owners-table">';
       $tHead = '<thead>
                       <tr>
                           
                           <td><strong>حالة المالك</strong></td>
                           <td><strong>المهنة</strong></td>
                           <td><strong>العنوان</strong></td>
                           <td><strong>رقم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</strong></td>
                           <td><strong>اسم الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك</strong></td>
                           <td><strong>الايميل الخاص بالعمل</strong></td>
                           <td><strong>الايميل الشخصى</strong></td>
                           <td><strong>التليفون الارضي</strong></td>
                           <td><strong>موبيل 2</strong></td>
                           <td><strong>موبيل 1</strong></td>
                           <td><strong>السن</strong></td>
                           <td><strong>رقم البطاقة</strong></td>
                           <td><strong>الاسم</strong></td>
                           <td><strong>أرقام الوحدات</strong></td>
                           <td><strong>الصورة الشخصية</strong></td>
                           <td><strong>الرقم</strong></td>
                       </tr>
                </thead>';
        $tableBody = '<tbody>';
        $unitsCodes = '';

        

        $owners = Owner::where('name', 'like', '%'.$key.'%')
                            ->orWhere('owner_status', 'like', '%'.$key.'%')
                             ->orWhereHas('units', function($query) use($key) {
                            $query->where('code', 'like', '%'.$key.'%');
                            })->get();
        foreach ($owners as $key => $owner) 
        {

            foreach ($owner->units as $key => $unit) 
            {
                $unitsCodes .= '<p><a href="'.action('UnitsController@show', ['id'=>$unit->id]).'">'.$unit->code.'</a></p>' ;
            }

            $tableBody .= '<tr>                                    
                                    
                                <td>'.$owner->owner_status.'</td>
                                <td>'.$owner->occupation.'</td>
                                <td>'.$owner->address.'</td>
                                <td>'.$owner->contact_person_phone.'</td>
                                <td>'.$owner->contact_person_name.'</td>
                                <td>'.$owner->work_email.'</td>
                                <td>'.$owner->email.'</td>
                                <td>'.$owner->telephone.'</td>
                                <td>'.$owner->mobile_2.'</td>
                                <td>'.$owner->mobile_1.'</td>
                                <td>'.$owner->date_of_birth->age.'</td>
                                <td>'.$owner->ssn.'</td>
                                <td>'.$unitsCodes.'</td>
                                <td><a href="'.action("OwnersController@show",["slug"=>$owner->slug]).'" target="_blank">'.$owner->name.'</a></td>
                                <td>
                                    <img src="'. asset('images/owner_images/'.$owner->personal_image) .'" class="img-responsive" alt="Image" width="30px">
                                </td>
                                <td>'.$owner->id.'</td>
                        </tr>';
            $unitsCodes = '';
        }
        $endTable = '</table></div>';
        
            return $startTable.$tHead.$tableBody.$endTable;
            
        
        
    }








}
