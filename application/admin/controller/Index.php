<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Base;
use think\Request;

class Index  extends Controller
{
    public function _initialize() {
        $base = new Base();
        //调用验证方法判断是否登陆
        $base->isLogin();
    }
    public function index()
    {
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $jr_q=mktime(0,0,0,date('m'),date('d'),date('Y'));
        $jr_z=mktime(0,0,0,date('m'),date('d')+1,date('Y'))-1;
        $jr_xf = db('cost')->where('cost_time', 'between', [$jr_q, $jr_z])->column('cost_money');
        $jr_xf = array_sum($jr_xf);
        $this->assign('jr_xf',$jr_xf);
        $user_list = db('user')->column('user_id');
        $user_num = count($user_list); 
        $this->assign('user_num',$user_num);
        $income = db('cost')->column('cost_money');
        $income_num = array_sum($income);
        $this->assign('income_num',$income_num);
        $goods_list = db('goods')->column('goods_id');
        $goods_num = count($goods_list);
        $this->assign('goods_num',$goods_num);
        $t1k = mktime(0,0,0,date('m'),date('d')-date('w')+1,date('Y'));
		$t1j = mktime(23,59,59,date('m'),date('d')-date('w')+1,date('Y'));
		$z1_xf = db('cost')->where('cost_time', 'between', [$t1k, $t1j])->column('cost_money');
		$z1_xf = array_sum($z1_xf);
        $this->assign('z1_xf', $z1_xf);
        $user_zc1 = db('user')->where('user_reg_time', 'between', [$t1k, $t1j])->column('user_id');
        $user_zc1 = count($user_zc1);
        $this->assign('user_zc1',$user_zc1);
    	$t2k = mktime(0,0,0,date('m'),date('d')-date('w')+2,date('Y'));
		$t2j = mktime(23,59,59,date('m'),date('d')-date('w')+2,date('Y'));
		$z2_xf = db('cost')->where('cost_time', 'between', [$t2k, $t2j])->column('cost_money');
		$z2_xf = array_sum($z2_xf);
        $this->assign('z2_xf', $z2_xf);
        $user_zc2 = db('user')->where('user_reg_time', 'between', [$t2k, $t2j])->column('user_id');
        $user_zc2 = count($user_zc2);
        $this->assign('user_zc2',$user_zc2);
		$t3k = mktime(0,0,0,date('m'),date('d')-date('w')+3,date('Y'));
		$t3j = mktime(23,59,59,date('m'),date('d')-date('w')+3,date('Y'));
		$z3_xf = db('cost')->where('cost_time', 'between', [$t3k, $t3j])->column('cost_money');
		$z3_xf = array_sum($z3_xf);
        $this->assign('z3_xf', $z3_xf);
        $user_zc3 = db('user')->where('user_reg_time', 'between', [$t3k, $t3j])->column('user_id');
        $user_zc3 = count($user_zc3);
        $this->assign('user_zc3',$user_zc3);
		$t4k = mktime(0,0,0,date('m'),date('d')-date('w')+4,date('Y'));
		$t4j = mktime(23,59,59,date('m'),date('d')-date('w')+4,date('Y'));
		$z4_xf = db('cost')->where('cost_time', 'between', [$t4k, $t4j])->column('cost_money');
		$z4_xf = array_sum($z4_xf);
        $this->assign('z4_xf', $z4_xf);
        $user_zc4 = db('user')->where('user_reg_time', 'between', [$t4k, $t4j])->column('user_id');
        $user_zc4 = count($user_zc4);
        $this->assign('user_zc4',$user_zc4);
		$t5k = mktime(0,0,0,date('m'),date('d')-date('w')+5,date('Y'));
		$t5j = mktime(23,59,59,date('m'),date('d')-date('w')+5,date('Y'));
		$z5_xf = db('cost')->where('cost_time', 'between', [$t5k, $t5j])->column('cost_money');
		$z5_xf = array_sum($z5_xf);
        $this->assign('z5_xf', $z5_xf);
        $user_zc5 = db('user')->where('user_reg_time', 'between', [$t5k, $t5j])->column('user_id');
        $user_zc5 = count($user_zc5);
        $this->assign('user_zc5',$user_zc5);
		$t6k = mktime(0,0,0,date('m'),date('d')-date('w')+6,date('Y'));
		$t6j = mktime(23,59,59,date('m'),date('d')-date('w')+6,date('Y'));
		$z6_xf = db('cost')->where('cost_time', 'between', [$t6k, $t6j])->column('cost_money');
		$z6_xf = array_sum($z6_xf);
        $this->assign('z6_xf', $z6_xf);
        $user_zc6 = db('user')->where('user_reg_time', 'between', [$t6k, $t6j])->column('user_id');
        $user_zc6 = count($user_zc6);
        $this->assign('user_zc6',$user_zc6);
		$t7k = mktime(0,0,0,date('m'),date('d')-date('w')+7,date('Y'));
		$t7j = mktime(23,59,59,date('m'),date('d')-date('w')+7,date('Y'));
		$z7_xf = db('cost')->where('cost_time', 'between', [$t7k, $t7j])->column('cost_money');
		$z7_xf = array_sum($z7_xf);
		$this->assign('z7_xf', $z7_xf);
        $user_zc7 = db('user')->where('user_reg_time', 'between', [$t7k, $t7j])->column('user_id');
        $user_zc7 = count($user_zc7);
        $this->assign('user_zc7',$user_zc7);
        return view('index');
    }

    public function user()
    {
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        return view('admin_user');
    }

    public function upload(Request $request){

        // 接受前端传递过来的变量
        $file = $request->file('file');

        // 判断是否存在
        if($file){
            // 移动目录,同时添加验证
            $info = $file->validate(['ext'=>"jpg,jpeg,png,gif"])->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.session('user_id'),session('user_id'));
            // move返回的是一个布尔类型
            if($info){
                // 拼接url 传递到数据库
                $url =  '/'. 'uploads/'.session('user_id') . '/' . $info->getSaveName();
                db('user')->where('user_id',session('user_id'))->update(['user_img'=>$url]);
                return $url;
            }else{
                $file->getError();
            }
        }
    }

}
