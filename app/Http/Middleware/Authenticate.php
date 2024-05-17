<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\Admin;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
       if($request->RouteIs('app.*')){
        return route('app.login');
       }elseif($request->RouteIs('admin.*')){
        $verifier_exist=Admin::all()->count();
        if($verifier_exist!=0){
        return route('admin.login');
        }else{
            return route('admin.register');
        }
       }
    }
}
