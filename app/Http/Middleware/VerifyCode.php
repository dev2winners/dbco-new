<?php

namespace App\Http\Middleware;

use Closure;
use Auth;use Session;
class VerifyCode
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
        $user=Auth::user();
        if(!is_null($user)) {

            if ( $user->verify_code > 0) {

$array_url=['http://dbco.ru/lk/verify','https://dbco.ru/lk/verify','http://www.dbco.ru/lk/verify','https://www.dbco.ru/lk/verify'];


                if (!in_array(\Request::url(),$array_url)) {
                    return redirect('/lk/verify');
                }

            }
        }
        return $next($request);
    }
}
