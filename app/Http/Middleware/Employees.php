<?php

namespace App\Http\Middleware;

use Closure;

class Employees
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
       
        if($request->route()->getName() == 'employees.index'      && in_array('view_employees', $permissions)){
            $response = $next($request);
        }else        
       
        if($request->route()->getName() == 'employees.show'       && in_array('view_employees', $permissions)){
        
           
            $response = $next($request);
        }else

        if($request->route()->getName() == 'employees.create'     && in_array('create_employees', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'employees.store'      && in_array('create_employees', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'employees.edit'         && in_array('update_employees', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'employees.update'       && in_array('update_employees', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'employees.destroy'      && in_array('delete_employees', $permissions)){
       
            $response = $next($request);
        }else

        if($request->route()->getName() == 'employees_gates_index_ajax'    && in_array('view_employees', $permissions)){

            $response = $next($request);
        }

        else
        {
            flash()->warning('<h3><img src="'.asset("images/helper_images/logo-accessdenied.png").'" width="80">  Ask IT Manager for Permission!</h3>');
        }

        return $response;
    }
}
