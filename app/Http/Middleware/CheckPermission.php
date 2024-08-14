<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $modelName
     * @param  string  $action
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $modelName, $action)
    {
        $user = Auth::user();

        // Construct permission names
        $generalPermission = "{$modelName}:{$action}";
        $ownPermission = "{$modelName}:own:{$action}";

        // Attempt to get the model instance, if it exists
        $modelInstance = $this->getModelInstance($modelName, $request);

        // Check for general permission
        if ($this->hasPermission($user, $generalPermission)) {
            return $next($request);
        }

        // Check ownership permission if a model instance is present
        if ($modelInstance && $this->hasPermission($user, $ownPermission) && $this->isOwner($user, $modelInstance)) {
            return $next($request);
        }

        // If no permission, deny access
        return apiResponse(message: __("messages.non_authorized"),statusCode: 403);
    }

    /**
     * Get the model instance based on the model name and request.
     *
     * @param  string  $modelName
     * @param  \Illuminate\Http\Request  $request
     * @return mixed|null
     */
    protected function getModelInstance($modelName, $request)
    {
        $modelClass = '\\App\\Models\\' . ucfirst($modelName);
        $modelId = $request->route($modelName); // Assuming the route parameter is named after the model

        return $modelId ? app($modelClass)->find($modelId) : null;
    }

    /**
     * Check if the user has a specific permission.
     *
     * @param  \App\Models\User  $user
     * @param  string  $permission
     * @return bool
     */
    protected function hasPermission($user, $permission)
    {
        // Implement this based on how your permissions are stored
        return in_array($permission, $user->permissions);
    }

    /**
     * Check if the user owns the model instance.
     *
     * @param  \App\Models\User  $user
     * @param  mixed  $modelInstance
     * @return bool
     */
    protected function isOwner($user, $modelInstance)
    {
        return $modelInstance && $modelInstance->user_id === $user->id;
    }
}
