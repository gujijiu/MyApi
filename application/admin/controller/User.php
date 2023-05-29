<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Base;
use app\common\model\User as muser;

class User  extends Controller
{
    public function _initialize() {
        
    }
    public function index()
    {
        $base = new Base();
        //调用验证方法判断是否登陆
        $base->isLogin();
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $user_list = db('user')->select();
        $this->assign('user_list',$user_list);
        return view('index');
    }
    public function prohibit($user_id){
        db('user')->where('user_id',$user_id)->update(['user_del'=>1]);
        return 1;
    }
    public function recovery($user_id){
        db('user')->where('user_id',$user_id)->update(['user_del'=>0]);
        return 1;
    }
    public function del($user_id){
        db('user')->where('user_id',$user_id)->delete();
        return 1;
    }
    public function upd($user_id){
        $base = new Base();
        //调用验证方法判断是否登陆
        $base->isLogin();
        $cx = db('user')->where('user_id',$user_id)->find();
        $this->assign('vo',$cx);
        return view('update');
    }
    public function upd_user($user_id,$user){
        db('user')->where('user_id',$user_id)->update(['user'=>$user]);
        return 1;
    }
    public function upd_user_name($user_id,$user_name){
        db('user')->where('user_id',$user_id)->update(['user_name'=>$user_name]);
        return 1;
    }
    public function upd_user_pwd($user_id,$user_pwd){
        db('user')->where('user_id',$user_id)->update(['user_pwd'=>md5($user_pwd)]);
        session('admin_user_id',null);
        session('user_id',null);
        return 1;
    }
    public function upd_user_phone($user_id,$user_phone){
        db('user')->where('user_id',$user_id)->update(['user_phone'=>$user_phone]);
        return 1;
    }
    public function upd_user_email($user_id,$user_email){
        db('user')->where('user_id',$user_id)->update(['user_email'=>$user_email]);
        return 1;
    }
    public function upd_user_money($user_id,$user_money){
        db('user')->where('user_id',$user_id)->update(['user_money'=>$user_money]);
        return 1;
    }
    public function upd_user_permission($user_id,$user_permission){
        db('user')->where('user_id',$user_id)->update(['user_permission'=>$user_permission]);
        return 1;
    }
    public function upd_user_del($user_id,$user_del){
        db('user')->where('user_id',$user_id)->update(['user_del'=>$user_del]);
        return 1;
    }
    public function upd_user_state($user_id,$user_state){
        db('user')->where('user_id',$user_id)->update(['user_state'=>$user_state]);
        return 1;
    }
    public function install_user($user,$user_name,$user_pwd,$user_phone,$user_email,$user_money,$user_permission,$user_del,$user_state){
        $muser = new muser();
        $data = [
            'user' => $user,
            'user_name' => $user_name,
            'user_pwd' => md5($user_pwd),
            'user_phone' => $user_phone,
            'user_email' => $user_email,
            'api_key' => md5($user_name.$user_phone.md5($user_pwd)),
            'user_reg_ip' => $muser->getip(),
            'user_reg_time' => time(),
            'user_permission' => $user_permission,
            'user_del' => $user_del,
            'user_state' => $user_state
        ];
        $user_inset = $muser->save($data);
        // db('user')->insert($data);
        return 1;
    }
}