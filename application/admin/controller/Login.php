<?php
namespace app\admin\controller;
use think\Controller;

class Login extends Base
{

    public function _initialize() {
        parent::_initialize();
        define('HARAN','haran');
        $this->template_dir = 'index/';
    }

    public function index(){
        //获取config文件中定义的项目路径
        $url = config('view_replace_str')['__url__'];
        //调用验证方法判断是否重复登陆
        $this->existLogin();
        $user_name = input('post.user_name');
        $user_pwd = input('post.user_pwd');
        if($user_name){
            $user_model = model('User');
            //执行model层登陆方法
            $jg = $user_model->admin_login($user_name,$user_pwd);
            // //var_dump($jg);
            //验证成功   
            if($jg == 1){
                @header("Location: " . url('admin/index/index'));
                exit();
                // return $this->fetch('index/index');
            //用户不存在
            }else if($jg == 404){
                //前端利用js方法插入提示信息/也可以直接使用$this->assign();输出变量到前端显示
                echo "<script src=\"http://".$url."/static/Login/js/register.js\"></script>\r\n";
                echo "<script language=\"JavaScript\">\r\n";
                echo "login_yhm();\r\n";
                echo "</script>\r\n";
                return $this->fetch('login/index');
            //密码错误
            }else{
                //前端利用js方法插入提示信息/也可以直接使用$this->assign();输出变量到前端显示
                echo "<script src=\"http://".$url."/static/Login/js/register.js\"></script>\r\n";
                echo "<script language=\"JavaScript\">\r\n";
                echo "login_mm();\r\n";
                echo "</script>\r\n";
                return $this->fetch('login/index');
            }
        }else{
            $this->existLogin();
        }
        return view('index');
    }
    public function login_out(){
        //删除session
        session('admin_user_id',null);
        session('user_id',null);
        // dump(session('?admin_user_id'));
        //保险起见做了个判断后执行跳转
        if(session('?admin_user_id')){

        }else{
            $this->success('成功退出，正在前往登陆页面！','login/index');
        }
        
    }
    public function test(){
        $user_model = model('User');
        $jg = $user_model->admin_login('lsy','qwer1234');
        //var_dump($jg);
    }
    

}