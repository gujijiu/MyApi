<?php
namespace app\index\controller;
use think\Controller;

class Base extends Controller
{
    public function _initialize() {
        //error_reporting(0);
        parent::_initialize();
        if(defined("USER_ID")){

        }else{
            define('USER_ID',session('user_id'));
        }
    }
    public function isLogin(){
        // echo is_null(USER_ID);
        // //var_dump(USER_ID);
        if(is_null(USER_ID)){
            $this->success('请先去登陆下','login/index');
        }
    }
    public function existLogin(){
        if(!is_null(USER_ID)){
            $this->error('您已登录，请勿重复登陆！','index/index');
        }
    }
}