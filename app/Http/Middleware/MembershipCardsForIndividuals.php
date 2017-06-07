<?php

namespace App\Http\Middleware;

use Closure;

class MembershipCardsForIndividuals
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
       
        if($request->route()->getName() == 'membership_cards_for_individuals.index'      && in_array('view_membership_cards_for_individuals', $permissions)){
            $response = $next($request);
        }else        
       
        if($request->route()->getName() == 'membership_cards_for_individuals.show'       && in_array('view_membership_cards_for_individuals', $permissions)){
           
            $response = $next($request);
        }else

        if($request->route()->getName() == 'membership_cards_for_individuals.create'     && in_array('create_membership_cards_for_individuals', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'membership_cards_for_individuals.store'      && in_array('create_membership_cards_for_individuals', $permissions)){

            $response = $next($request);
        }else

        if($request->route()->getName() == 'membership_cards_for_individuals.edit'       && in_array('update_membership_cards_for_individuals', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'membership_cards_for_individuals.update'     && in_array('update_membership_cards_for_individuals', $permissions)){
            
            $response = $next($request);
        }else

        if($request->route()->getName() == 'membership_cards_for_individuals.destroy'    && in_array('delete_membership_cards_for_individuals', $permissions)){

            $response = $next($request);
        }else{
            flash()->warning('<h3><img src="'.asset("images/helper_images/logo-accessdenied.png").'" width="80">  Ask IT Manager for Permission!</h3>');
        }


        return $response;
    }
}
