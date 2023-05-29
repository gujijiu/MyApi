<?php
namespace app\admin\controller;
use think\Controller;
use think\facade\Request;

class Base extends Controller
{
    public function _initialize() {
        parent::_initialize();
        //全局调用
        define('USER_ID',session('admin_user_id'));
    }
    public function isLogin(){
        if(is_null(USER_ID)){
            //session为空执行
            $this->error('请勿尝试非法进入！','login/index');
        }
    }
    public function existLogin(){
        if(!is_null(USER_ID)){
            //session不为空执行
            $this->error('您已登录，请勿重复登陆！','index/index');
        }
    }
}