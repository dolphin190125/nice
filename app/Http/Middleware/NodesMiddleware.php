<?php

namespace App\Http\Middleware;

use Closure;

class NodesMiddleware
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
        // 获取session 可以操作的控制器和方法名
        $nodes = session('admin_user_nodes');
        // dump($nodes);
        // dump($nodes);
        // 获取所有可以操作的控制器
        $controller_all = array_keys($nodes);
        // dump($controller_all);

       
        // 获取当前  正在操作的控制器和方法名
        $actions=explode('\\', \Route::current()->getActionName());
        //或$actions=explode('\\', \Route::currentRouteAction());
        $modelName=$actions[count($actions)-2]=='Controllers'?null:$actions[count($actions)-2];
        $func=explode('@', $actions[count($actions)-1]);
        $controllerName=strtolower($func[0]);
        $actionName=strtolower($func[1]);

        // dump($controllerName);
        // dump($actionName);

        // dd();

        if(!in_array($controllerName,$controller_all)){
            // echo '没有权限 ---- 控制器';
            // exit;
            return redirect('/admin/rbac');
            exit;
        }

         // 获取可以操作的方法
        $action_all = $nodes[$controllerName];

        if(!in_array($actionName,$action_all)){
            // echo '没有权限 ---- 方法名';
            // exit;
             return redirect('/admin/rbac');
             exit;
        }


        return $next($request);
    }
}
