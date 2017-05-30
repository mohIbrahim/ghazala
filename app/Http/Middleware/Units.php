<?php

namespace App\Http\Middleware;

use Closure;

class Units
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
       
        if($request->route()->getName() == 'units.index'      && in_array('view_units', $permissions)){
            $response = $next($request);
        }else        
       
        if($request->route()->getName() == 'units.show'       && in_array('view_units', $permissions)){
           
            $response = $next($request);
        }else

        if($request->route()->getName() == 'units.create'     && in_array('create_units', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'units.store'      && in_array('create_units', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'units.edit'       && in_array('update_units', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'units.update'     && in_array('update_units', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'units.destroy'    && in_array('delete_units', $permissions)){

            $response = $next($request);
        }else{
            flash()->warning('<h3><img src="'.asset("images/helper_images/logo-accessdenied.png").'" width="80">  Ask IT Manager for Permission!</h3>');
        }


        return $response;
    }
}
