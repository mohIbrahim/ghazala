<?php

namespace App\Http\Middleware;

use Closure;

class Jobs
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
       
        if($request->route()->getName() == 'jobs.index'      && in_array('view_jobs', $permissions)){
            $response = $next($request);
        }else        
       
        if($request->route()->getName() == 'jobs.show'       && in_array('view_jobs', $permissions)){
           
            $response = $next($request);
        }else

        if($request->route()->getName() == 'jobs.create'     && in_array('create_jobs', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'jobs.store'      && in_array('create_jobs', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'jobs.edit'       && in_array('update_jobs', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'jobs.update'     && in_array('update_jobs', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'jobs.destroy'    && in_array('delete_jobs', $permissions)){

            $response = $next($request);
        }else
                
        {
            flash()->warning('<h3><img src="'.asset("images/helper_images/logo-accessdenied.png").'" width="80">  Ask IT Manager for Permission!</h3>');
        }


        return $response;
    }
}
