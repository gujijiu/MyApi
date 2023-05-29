<?php
namespace app\index\controller;

use think\Controller;
use app\index\controller\Base;
use think\Request;
use PHPExcel;//导入PHPExcel
use PHPExcel_IOFactory;//导入PHPExcel__IOFactory

class Index  extends Controller
{
    public function index(Request $request)
    {
        $key = $request->param('key'); 
        if($key){
            if(session('?user_id')){
                $user = db('user')->where('user_id',session('user_id'))->find();
                $this->assign('user',$user);
            }else{
            }
            $goods_list = db('goods')->select();
            $goods_num = count($goods_list);
            $key_list = db('goods')->where('goods_name','like',"%".$key."%")->select();
            $this->assign('goods_num',$goods_num);
            $this->assign('goods_list',$key_list);
            return view('index');
        }else{
        if(session('?user_id')){
            $user = db('user')->where('user_id',session('user_id'))->find();
            $this->assign('user',$user);
        }else{
        }
        $goods_list = db('goods')->select();
        $goods_num = count($goods_list);
        $this->assign('goods_num',$goods_num);
        $this->assign('goods_list',$goods_list);
        return view('index');
        }
    }

    public function p($id){
        $goods_list = db('goods')->where('goods_id',$id)->find();
        $this->assign('goods_list',$goods_list);
        $request_list = db('request')->where('goods_id',$id)->select();
        $this->assign('request_list',$request_list);
        $return_list = db('return')->where('goods_id',$id)->select();
        $this->assign('return_list',$return_list);
        $details_list =db('details')->where('goods_id',$id)->find();
        $this->assign('details_list',$details_list);
        db('goods')->where('goods_id',$id)->setInc('goods_call');
        return view('p');
    }
    public function user(){
        $base = new Base();
        //调用验证方法判断是否登陆
        $base->isLogin();
        $user = db('user')->where('user_id',session('user_id'))->find();
        $this->assign('user',$user);
        return view('user');
    }
    public function export()
    {

        //Excle文件名
        $xlsName = date('Ymd',time()).rand();
        //标题
        $xlsCell = array(
            array('id', '序号'),
            array('tittle', '标题'),
        );
        //查询数据
        // $xlsData = Db::table('excel')->select();

        //Excel工作表名
        $setTitle = 'sheet1';
        $Api = model('Api');
        // $Api->exportExcel($xlsName,$xlsCell,$xlsData,$setTitle);
    }
    public function test(){
        $url = 'http://www.nesdc.org.cn/sdo/getData?prodId=&searchKey=&tags=&dataFormat=&sortName=createTime&rid=&sortTagData=%7B%7D&ecosystemType=&ecosystemElements=&getDataMethod=&dataSource=&hotSports=&pageNo=1&pageSize=10';
        $test = file_get_contents($url);
        var_dump($test); 
    }

}
