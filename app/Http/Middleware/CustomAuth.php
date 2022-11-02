<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $act= explode("@",$request->route()->getActionName());
        $action=$act[1];
        if(! \Auth::guard('admin')->user()->hasRole([1])){
            $a=\Auth::guard('admin')->user()->getPermissionsViaRoles();
                foreach($a as $permission){
                    $permissions[]= $permission->name;
                }
                    if (!in_array($action, $permissions))
                        {
                            return redirect()->back()->with('error','you have no permission to perform this task');
                        }

        }
        return $next($request);
    }
}
