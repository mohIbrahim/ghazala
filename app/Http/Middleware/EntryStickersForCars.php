<?php

namespace App\Http\Middleware;

use Closure;

class EntryStickersForCars
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
       
        if($request->route()->getName() == 'entry_stickers_for_cars.index'      && in_array('view_entry_stickers_for_cars', $permissions)){

            $response = $next($request);
        }else        
       
        if($request->route()->getName() == 'entry_stickers_for_cars.show'       && in_array('view_entry_stickers_for_cars', $permissions)){
           
            $response = $next($request);
        }else

        if($request->route()->getName() == 'entry_stickers_for_cars.create'     && in_array('create_entry_stickers_for_cars', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'entry_stickers_for_cars.store'      && in_array('create_entry_stickers_for_cars', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'entry_stickers_for_cars.edit'       && in_array('update_entry_stickers_for_cars', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'entry_stickers_for_cars.update'     && in_array('update_entry_stickers_for_cars', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'entry_stickers_for_cars.destroy'    && in_array('delete_entry_stickers_for_cars', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'entry_stickers_for_cars_index_ajax'    && in_array('view_entry_stickers_for_cars', $permissions)){

            $response = $next($request);
        }else 

        {
            flash()->warning('<h3><img src="'.asset("images/helper_images/logo-accessdenied.png").'" width="80">  Ask IT Manager for Permission!</h3>');
        }


        return $response;
    }
}
