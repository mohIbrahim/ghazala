<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnitsRequest;
use App\Unit;
use App\UnitModel;
use App\UnitImage;
use App\Renter;

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
        $rentersIDs = Renter::latest()->pluck('name', 'id');
        $rentersIDs = array_add($rentersIDs, '', '-None-');
        return view('units.create', compact('modelsNames', 'rentersIDs'));
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

        if($request->hasFile('images')){
            foreach ($request->file('images') as $unitImage) {
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
        return view('units.show2',compact('unit'));
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
        $rentersIDs = Renter::latest()->pluck('name', 'id');
        $rentersIDs = array_add($rentersIDs, '', '-None-');
        return view('units.edit', compact('unit', 'modelsNames', 'rentersIDs'));
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


        //if we upload new images
        if($request->hasFile('images')){
              foreach ($request->file('images') as $unitImage) {
                    if($unitImage->isValid()){
                          $image = $unitImage;
                          $imageNewName = str_random(64).'.'.$image->guessExtension();
                          $image->move('images/unit_images', $imageNewName);
                          $unit->images()->save(new UnitImage(['unit_image'=>$imageNewName]));
                    }
              }
        }
        //if we need to delete old images
        if($request->imageToDelete){
              foreach ($request->imageToDelete as $imageName){
                    $unit->images()->where('unit_image',$imageName)->get()->first()->delete();
                    $this->deleteFile('images/unit_images/'.$imageName);
              }
        }

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

        if(isset($unit->images) || !empty($unit->images)){
            foreach($unit->images as $image){
                $this->deleteFile('images/unit_images/'.$image->unit_image);
            }
        }

        $unit->delete();
        flash()->success('تم حذف الوحدة بنجاح')->important();
        return redirect()->action('UnitsController@index');
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

       $startTable = '<div class="table-responsive"><table id="units" class="table table-condensed table-hover table-bordered text-center">';
       $tHead = '<thead>
                       <tr>
                            <td><strong>تاريخ و وقت التعديل</strong></td>';
                            if(in_array('view_finance', auth()->user()->roles()->first()->permissions()->pluck('name')->toArray())){

                                  $tHead .=  '<td><strong>المديونية المستحقة</strong></td>';
                            }
                           
                            $tHead .= '<td><strong>هل الوحدة معروضة للإيجار؟</strong></td>
                            <td><strong>هل الوحدة للبيع؟</strong></td>
                            <td><strong>رقم عداد الكهرباء</strong></td>
                            <td><strong>رقم الدور</strong></td>
                            <td><strong>العنوان</strong></td>
                            
                            <td><strong>كود حساب الوحدة</strong></td>
                            <td><strong>نوع النموذج</strong></td>
                            <td><strong>أسماء المُلاَّك</strong></td>
                            <td><strong>كود الوحدة</strong></td>                          
                       </tr>
                </thead>';
        $tableBody = '<tbody>';
        

        

        $units = Unit::where('code', 'like', '%'.$key.'%')
                            ->orWhere('unit_account_code', 'like', '%'.$key.'%')
                            ->orWhereHas('owners', function($query) use($key) {
                                $query->where('name', 'like', '%'.$key.'%');
                            })->get();
        foreach ($units as $key => $unit) 
        {

            $ownersNames = '';
            foreach ($unit->owners as $key => $owner) {
                $ownersNames .= '-<a href="'.action('OwnersController@show',['slug'=>$owner->slug]).'" target="_blank">'.$owner->name.'</a><br>';
            }


            $tableBody .= '<tr>          

                                <td>'.$unit->updated_at.'</td>';
                                if(in_array('view_finance', auth()->user()->roles()->first()->permissions()->pluck('name')->toArray()))
                                    $tableBody .= '<td>'. $unit->the_current_unit_debt .'</td>';
                                    
                                $tableBody .= '<td>'.(($unit->for_rent)? "نعم":"لا").'</td>
                                <td>'.(($unit->for_sale)? "نعم":"لا").'</td>
                                <td>'.$unit->electricity_meter_number.'</td>
                                <td>'.$unit->floor_number.'</td>
                                <td>'.(($unit->address)? str_limit($unit->address, 30) : '').'</td>
                                <td>'.$unit->unit_account_code.'</td>
                                <td>';

                                if($unit->model)                                
                                  $tableBody  .= $unit->model->name;
                                    
                                
                                $tableBody .= '</td>
                                <td>'.$ownersNames.'</td>                                
                                <td><a href="'.action("UnitsController@show",["id"=>$unit->id]).'" target="_blank">'.$unit->code.'</a>
                                </td>                                
                        </tr>';
            $ownersNames = '';
        }
        $endTable = '</table></div>

    <script>
        $("#units").dataTable( {
                "paging": false,
                "searching": false,
                dom: "Bfrtip",
                buttons: [
                ';
                
                if(in_array('create_units', auth()->user()->roles()->first()->permissions()->pluck('name')->toArray()))
                {
                  $endTable .=  '"copy", "csv", "excel", "print"';
                }
                $endTable .='

                ]
            } );
    </script>
';
        
            return $startTable.$tHead.$tableBody.$endTable;
    }
}
