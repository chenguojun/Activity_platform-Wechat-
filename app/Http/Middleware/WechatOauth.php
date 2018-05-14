<?php

namespace App\Http\Middleware;

use Closure;

class WechatOauth{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(!$request->session()->exists("userinfo")){
            $appid=env("WECHAT_APPID");
            $uri=urlencode(url("/checkcode"));
            $request->session()->put("from",url()->current());
            return redirect("https://open.weixin.qq.com/connect/oauth2/authorize?appid=$appid&redirect_uri=$uri&response_type=code&scope=snsapi_userinfo#wechat_redirect");
        }
        return $next($request);
    }
}
