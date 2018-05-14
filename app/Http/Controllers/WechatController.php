<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WechatController extends CommonController {
    function CheckCode(Request $request){
        $appid = env("WECHAT_APPID");
        $secret = env("WECHAT_APPSECRET");
        $code = $request->input("code");
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=$secret&code=$code&grant_type=authorization_code";
        $curl_result = json_decode($this->curl_get($url),true);
        if(empty($curl_result["errcode"])){
            $access_token = $curl_result["access_token"];
            $openid = $curl_result["openid"];
            $url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
            $userinfo = json_decode($this->curl_get($url));
            $request->session()->put('userinfo', $userinfo);
            $from = $request->session()->get("from");
            $request->session()->forget("from");
            var_dump($from);
            return redirect($from);
        }else{
            return redirect("/index");
        }
    }
}
