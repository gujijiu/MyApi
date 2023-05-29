<?php

namespace app\common\model;

use think\Model;

class User extends Model
{
    public function index(){

    }

    public function login($user_name,$user_pwd){
        $pwd = db('user')->where('user_name',$user_name)->value('user_pwd');
        $user_state = db('user')->where('user_name',$user_name)->where('user_del',0)->value('user_state');
        if($user_state == 0){
            return 403;
        }
        if($pwd){
            if(md5($user_pwd) == $pwd){
                $user_id = db('user')->where('user_name',$user_name)->value('user_id');
                $user_permission = db('user')->where('user_name',$user_name)->value('user_permission');
                session('user_id',$user_id);
                $data = [
                    'user_log_ip' => $this->getip(),
                    'user_log_time' => time()
                ];
                $insert = db('user')->where('user_id',$user_id)->update($data);
                if($user_permission > 60){
                    session('admin_user_id',$user_id);
                }
                return 1;
            }else{
                return 0;
            }
        }else{
            return 404;
        }
        return $pwd;
    }

    public function admin_login($user_name,$user_pwd){
        $pwd = db('user')->where('user_name',$user_name)->where('user_permission','>',60)->where('user_del',0)->value('user_pwd');
        if($pwd){
            if(md5($user_pwd) == $pwd){
                $user_id = db('user')->where('user_name',$user_name)->value('user_id');
                session('admin_user_id',$user_id);
                session('user_id',$user_id);
                $data = [
                    'user_log_ip' => $this->getip(),
                    'user_log_time' => time()
                ];
                $insert = db('user')->where('user_id',$user_id)->update($data);
                return 1;
            }else{
                return 0;
            }
        }else{
            return 404;
        }
        
    }

    public function register($user,$user_name,$user_pwd,$user_phone,$user_email){
        $data = [
            'user' => $user,
            'user_name' => $user_name,
            'user_pwd' => md5($user_pwd),
            'user_phone' => $user_phone,
            'user_email' => $user_email,
            'api_key' => md5($user_name.$user_phone.md5($user_pwd)),
            'user_reg_ip' => $this->getip(),
            'user_reg_time' => time()
        ];
        $insert = db('user')->insert($data);
        if($insert<=1){
            return 1;
        }else{
            return 0;
        }
    }
    public function test(){
        // return  $ip = $_SERVER['REMOTE_ADDR'];
        //var_dump ($this->where('user_id',1)->select());
    }
    public function getip() {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP") , "unknown")) {
            $ip = getenv("HTTP_CLIENT_IP");
        } else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR") , "unknown")) {
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR") , "unknown")) {
            $ip = getenv("REMOTE_ADDR");
        } else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = "unknown";
        }
        return $ip;
    }

}