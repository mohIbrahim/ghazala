<?php

namespace App\Http\Middleware;

use Closure;

class OwnersFamilyMembers
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = redirect(action('HomeController@welcome'));   


        $user = $request->user();
        $permissions = [];
        if(isset($user)){
            if( $user->roles() !== null && $user->roles()->first() !== null && $user->roles()->first()->permissions() !== null ){
                $permissions = $user->roles()->first()->permissions()->pluck('name')->toArray();
            }
            else
                return $response;
        }
       
        if($request->route()->getName() == 'owners_family_members.index'      && in_array('view_owners_family_members', $permissions)){
            $response = $next($request);
        }else        
       
        if($request->route()->getName() == 'owners_family_members.show'       && in_array('view_owners_family_members', $permissions)){
           
            $response = $next($request);
        }else

        if($request->route()->getName() == 'owners_family_members.create'     && in_array('create_owners_family_members', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'owners_family_members.store'      && in_array('create_owners_family_members', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'owners_family_members.edit'       && in_array('update_owners_family_members', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'owners_family_members.update'     && in_array('update_owners_family_members', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'owners_family_members.destroy'    && in_array('delete_owners_family_members', $permissions)){

            $response = $next($request);
        }else{
            flash()->warning('<h3><img src="'.asset("images/helper_images/logo-accessdenied.png").'" width="80">  Ask IT Manager for Permission!</h3>');
        }


        return $response;
    }
}
