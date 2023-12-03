<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Group;
use App\Models\Recipe;
use Illuminate\Http\Request;

class EditorCheck
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
        if($request['group']){
            $group = $request['group'];
            if(!$group instanceof Group){
                $group = Group::find($group);
            }
            $editor = $group -> editor() -> first();           
        }
        else if($request['recipe']){
            $recipe = $request['recipe'];
            if(!$recipe instanceof Recipe){
                $recipe = Recipe::find($recipe);
            }
            $editor = $recipe -> group() -> first() -> editor() -> first();
        }
        // $groupId = $request->route('group');

        if($request->user() && $editor && $request->user()->id == $editor->id){
            return $next($request);
        }
        
        abort(403, 'Neteisėta prieiga');
    }
}
