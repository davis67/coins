<?php

namespace App\Http\Middleware;

use Closure;

class checkTitle
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
        if($request->user() == null){
            return \redirect()->back()->with('error', 'You dont have rights to access this page, Contact the Administrator/It support team(info@ahcul.com) for more rights')->autoclose(5000);
        }
        $actions = $request->route()->getAction();

        $titles = isset($action['titles'])?$action['titles'] : null;

        if($request->user()->hasAnyTitle($titles) || !$titles){

            return $next($request);
            
        }


        return \redirect()->back()->with('error', 'You dont have rights to access this page, Contact the Administrator/It support team(info@ahcul.com) for more rights')->autoclose(5000);
        
    }
}
