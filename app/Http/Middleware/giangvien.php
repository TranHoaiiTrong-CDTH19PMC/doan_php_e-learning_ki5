<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class giangvien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->account_type_id == 1)
        {
            return $next($request);
          
        }
        return redirect()->route("trangchu")->with('error','Bạn không được phép để sử dụng quyền này');   
    }
}
