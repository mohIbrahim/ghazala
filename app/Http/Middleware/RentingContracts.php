<?php

namespace App\Http\Middleware;

use Closure;

class RentingContracts
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
       
        if($request->route()->getName() == 'renting_contracts.index'    && in_array('view_renting_contracts', $permissions)){
            $response = $next($request);
        }else        
       
        if($request->route()->getName() == 'renting_contracts.show'     && in_array('view_renting_contracts', $permissions)){
           
            $response = $next($request);
        }else

        if($request->route()->getName() == 'renting_contracts.create'   && in_array('create_renting_contracts', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'renting_contracts.store'    && in_array('create_renting_contracts', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'renting_contracts.edit'     && in_array('update_renting_contracts', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'renting_contracts.update'   && in_array('update_renting_contracts', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'renting_contracts.destroy'  && in_array('delete_renting_contracts', $permissions)){
       
            $response = $next($request); 
        }else
        if($request->route()->getName() == 'renting_contracts_index_ajax'   && in_array('view_renting_contracts', $permissions)){
       
            $response = $next($request); 
        }else
        {
            flash()->warning('<h3><img src="'.asset("images/helper_images/logo-accessdenied.png").'" width="80">  Ask IT Manager for Permission!</h3>');
        }


        return $response;
    }
}
