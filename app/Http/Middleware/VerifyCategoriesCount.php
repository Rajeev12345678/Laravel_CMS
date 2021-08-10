<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Categories;

class VerifyCategoriesCount
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
      if(Categories::all()->count() === 0){
        session()->flash('error', 'A category is required to create a post.');
        return redirect(route('categories.create'));
      }
        return $next($request);
    }
}
