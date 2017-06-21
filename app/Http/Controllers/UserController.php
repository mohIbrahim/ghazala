<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;


use Auth;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('users');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $rolesArray = $roles->pluck('name', 'id');
        return view('users.edit', compact('user','rolesArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);        
        $currentPassword = $request->current_password;

        //Check if the account owner how is changing the data
        if(\Hash::check($currentPassword, $user->password))
        {
            //Delete personal image and stay with defualt image
            if($request->delete_image && $user->personal_image != 'no_image.png')
            {
                $this->deleteFile('images/users_images/'.$user->personal_image);
                $user->update(['personal_image'=>'no_image.png']);
                return back()->withInput();
            }


            $fileNewName = '';

            //Check if the user upload image with form data
            //and make some process.
            if($request->hasFile('personal_image') && $request->file('personal_image')->isValid() )
            {
                //1- Delete user image if he already has one and let no_image.png as a default user image.
                if($user->personal_image != 'no_image.png'){
                    $this->deleteFile('images/users_images/'.$user->personal_image);
                }

                $file = $request->file('personal_image');
                $fileNewName = str_random(60).'.'.$file->guessExtension();
                $file->move('images/users_images', $fileNewName);
                $user->personal_image = $fileNewName;
            }           
            //Hashing new password
            if(!empty($request->password)){
                $user->password = \Hash::make($request->password);
            }

            $user->update($request->except(['personal_image', 'password']));            

            flash()->success('User has been updated successfully');
            return redirect()->action('HomeController@index');
        }else{           
            
            $this->validate($request, ['current_password'=>'exists:users,password']);            
        } 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $isDeleted = $user->delete();
         if($isDeleted){
            flash()->success('User has been deleted successfully');
            return redirect('users');
        }else{
            flash()->warning('Can not delete that user at this time');
            return redirect('users');
        }
    }


    private function deleteFile($source){        
        if(file_exists($source)){
            unlink($source);
        }    
    }
    
}
