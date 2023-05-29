<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\controller\Base;
use app\common\model\User as muser;
use app\common\model\Goods as mgoods;
use app\common\model\Request as mrequest;
use app\common\model\Returns as mreturn;
use app\common\model\Details as mdetails;

class Goods  extends Controller
{
    public function _initialize() {
        $base = new Base();
        //调用验证方法判断是否登陆
        $base->isLogin();
    }
    public function index()
    {
        $goods = db('goods')->select();
        $this->assign('goods_list',$goods);
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        return view('index');
    }

    public function install($goods_name,$goods_description,$goods_price,$goods_url,$goods_case,$goods_state){
        $mgoods = new mgoods();
        $data = [
            'goods_name' => $goods_name,
            'goods_description' => $goods_description,
            'goods_price' => $goods_price,
            'goods_url' => urldecode($goods_url),
            'goods_case' => urldecode($goods_case),
            'goods_state' => $goods_state
        ];
        $goods_inset = $mgoods->save($data);
        return 1;
    }

    public function del($id){
        db('goods')->where('goods_id',$id)->delete();
        db('request')->where('goods_id',$id)->delete();
        db('return')->where('goods_id',$id)->delete();
        db('details')->where('goods_id',$id)->delete();
        return 1;
    }

    public function upd($id){
        $cx = db('goods')->where('goods_id',$id)->find();
        $this->assign('vo',$cx);
        return view('update');
    }
    public function upd_goods_name($goods_id,$goods_name){
        db('goods')->where('goods_id',$goods_id)->update(['goods_name'=>$goods_name]);
        return 1;
    }
    public function upd_goods_description($goods_id,$goods_description){
        db('goods')->where('goods_id',$goods_id)->update(['goods_description'=>$goods_description]);
        return 1;
    }
    public function upd_goods_price($goods_id,$goods_price){
        db('goods')->where('goods_id',$goods_id)->update(['goods_price'=>$goods_price]);
        return 1;
    }
    public function upd_goods_case($goods_id,$goods_case){
        db('goods')->where('goods_id',$goods_id)->update(['goods_case'=>urldecode($goods_case)]);
        return 1;
    }
    public function upd_goods_url($goods_id,$goods_url){
        db('goods')->where('goods_id',$goods_id)->update(['goods_url'=>urldecode($goods_url)]);
        return 1;
    }
    public function upd_goods_state($goods_id,$goods_state){
        db('goods')->where('goods_id',$goods_id)->update(['goods_state'=>$goods_state]);
        return 1;
    }

    public function goods_request($id){
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $cx = db('request')->where('goods_id',$id)->select();
        $this->assign('vo',$cx);
        $this->assign('id',$id);
        return view('request');
    }

    public function request_del($id){
        db('request')->where('request_id',$id)->delete();
        return 1;
    }

    public function request_upd($id){
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $cx = db('request')->where('request_id',$id)->find();
        $this->assign('vo',$cx);
        return view('request_upd');
    }

    public function request_install($goods_id,$request_name,$request_nece,$request_type,$request_explain){
        $mrequest = new mrequest();
        if($request_type==""){
            $request_type = 'String';
        }
        $data = [
            'goods_id' => $goods_id,
            'request_name' => $request_name,
            'request_nece' => $request_nece,
            'request_type' => $request_type,
            'request_explain' => urldecode($request_explain)
        ];
        $goods_inset = $mrequest->save($data);
        return 1;
    }

    public function upd_request_name($request_id,$request_name){
        db('request')->where('request_id',$request_id)->update(['request_name'=>$request_name]);
        return 1;
    }
    public function upd_request_nece($request_id,$request_nece){
        db('request')->where('request_id',$request_id)->update(['request_nece'=>$request_nece]);
        return 1;
    }
    public function upd_request_type($request_id,$request_type){
        if($request_type==""){
            $request_type = 'String';
        }
        db('request')->where('request_id',$request_id)->update(['request_type'=>$request_type]);
        return 1;
    }
    public function upd_request_explain($request_id,$request_explain){
        db('request')->where('request_id',$request_id)->update(['request_explain'=>urldecode($request_explain)]);
        return 1;
    }

    public function goods_return($id){
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $cx = db('return')->where('goods_id',$id)->select();
        $this->assign('vo',$cx);
        $this->assign('id',$id);
        return view('return');
    }

    public function return_del($id){
        db('return')->where('return_id',$id)->delete();
        return 1;
    }

    public function return_upd($id){
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $cx = db('return')->where('return_id',$id)->find();
        $this->assign('vo',$cx);
        return view('return_upd');
    }
    
    public function return_install($goods_id,$return_name,$return_type,$return_explain){
        $mreturn = new mreturn();
        if($return_type==""){
            $return_type = 'String';
        }
        $data = [
            'goods_id' => $goods_id,
            'return_name' => $return_name,
            'return_type' => $return_type,
            'return_explain' => urldecode($return_explain)
        ];
        $goods_inset = $mreturn->save($data);
        return 1;
    }

    public function upd_return_name($return_id,$return_name){
        db('return')->where('return_id',$return_id)->update(['return_name'=>$return_name]);
        return 1;
    }
	
    public function upd_return_type($return_id,$return_type){
        if($return_type==""){
            $return_type = 'String';
        }
        db('return')->where('return_id',$return_id)->update(['return_type'=>$return_type]);
        return 1;
    }
	
    public function upd_return_explain($return_id,$return_explain){
        db('return')->where('return_id',$return_id)->update(['return_explain'=>urldecode($return_explain)]);
        return 1;
    }

    public function goods_details($id){
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $cx = db('details')->where('goods_id',$id)->select();
        $this->assign('vo',$cx);
        $this->assign('id',$id);
        return view('details');
    }

    public function details_del($id){
        db('details')->where('details_id',$id)->delete();
        return 1;
    }

    public function details_upd($id){
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        $cx = db('details')->where('details_id',$id)->find();
        $this->assign('vo',$cx);
        return view('details_upd');
    }

    public function details_install($goods_id,$details_fromat,$details_mode,$details_request,$details_return,$details_examples){
        $mdetails = new mdetails();
        if($details_fromat==""){
            $details_fromat = 'json/text';
        }
        if($details_mode==""){
            $details_mode = 'get/post';
        }
        $data = [
            'goods_id' => $goods_id,
            'details_fromat' => $details_fromat,
            'details_mode' => $details_mode,
            'details_request' => urldecode($details_request),
            'details_return' => urldecode($details_return),
            'details_examples' => urldecode($details_examples)
        ];
        $goods_inset = $mdetails->save($data);
        return 1;
    }

    public function upd_details_fromat($details_id,$details_fromat){
        if($details_fromat==""){
            $details_fromat = 'json/text';
        }
        db('details')->where('details_id',$details_id)->update(['details_fromat'=>$details_fromat]);
        return 1;
    }
    public function upd_details_mode($details_id,$details_mode){
        if($details_mode==""){
            $details_mode = 'get/post';
        }
        db('details')->where('details_id',$details_id)->update(['details_mode'=>$details_mode]);
        return 1;
    }
    public function upd_details_request($details_id,$details_request){
        db('details')->where('details_id',$details_id)->update(['details_request'=>urldecode($details_request)]);
        return 1;
    }
    public function upd_details_return($details_id,$details_return){
        db('details')->where('details_id',$details_id)->update(['details_return'=>urldecode($details_return)]);
        return 1;
    }
	public function upd_details_examples($details_id,$details_examples){
        db('details')->where('details_id',$details_id)->update(['details_examples'=>urldecode($details_examples)]);
        return 1;
    }

    public function user(){
        $user = db('user')->select();
        return json($user);
    }
}