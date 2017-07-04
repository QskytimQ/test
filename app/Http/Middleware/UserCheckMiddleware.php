<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\testPost;

class UserCheckMiddleware
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
        // dd($request->id);
        $article = testPost::where("id",$request->id)->first();
        // dd($article->user_id);
        if(Auth::user()->id != $article->user_id)
        {
            return redirect('article/'.$request->id);
        }
        return $next($request);
    }
}
