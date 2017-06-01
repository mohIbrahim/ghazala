<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OwnersRequest;
use App\Owner;

class OwnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
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
        return view('owners.edit', compact('owner'));
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
        //update new image if uploaded
        if ($request->hasFile('personal_image') && 
            $request->file('personal_image')->isValid()) 
        {
            $image = $request->file('personal_image');
            $imageNewName = str_random(64).'.'.$image->guessExtension();
            $image->move('images/owner_images', $imageNewName);
            $newArray['personal_image'] = $imageNewName;
            $this->deleteFile('images/owner_images/'.$owner->personal_image);
        }

        //if we need to delete old images
        if(isset($request->imageToDelete)){
            $this->deleteFile('images/owner_images/'.$request->imageToDelete);
            $owner->personal_image = 'no_image.png';
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

        //if we need to delete old contract
        if(isset($request->contractToDelete)){
            $this->deleteFile('images/owner_contracts_images/'.$request->contractToDelete); 
            $owner->contract_image = null;             
        }

        $owner->update($newArray);
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
        //
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
}
