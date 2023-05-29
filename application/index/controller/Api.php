<?php
namespace app\index\controller;
use think\Controller;
use phpmailer\phpmailer;
use app\common\model\Api as mapi;

class Api extends Controller{
	public function _initialize() {
        parent::_initialize();
        define('URL',config('view_replace_str')['__url__']);
    }

    public function index(){

    }

//二维码生成
    public function qrcode($key) {
		$mapi = new mapi();
		$id = 1;
		$price = db('goods')->where('goods_id',$id)->value('goods_price');
		$money = db('user')->where('api_key',$key)->value('user_money');
		if(!$money){return $mapi->error('密钥错误，请注册获取密钥！');}
		if($money>=$price){
			$kf = db('user')->where('api_key',$key)->setDec('user_money',$price);
			if($kf || intval($price)==0){
					$this->xf($key,$id);
				 //引入类文件
				 	import('qrcode.phpqrcode', EXTEND_PATH);
				 //获取传入网址
					 $value = strip_tags(htmlspecialchars_decode(input('get.url')));
				 //这个参数可传递的值分别是L(QR_ECLEVEL_L，7%)、M(QR_ECLEVEL_M，15%)、Q(QR_ECLEVEL_Q，25%)、H(QR_ECLEVEL_H，30%)，这个参数控制二维码容错率，不同的参数表示二维码可被覆盖的区域百分比，也就是被覆盖的区域还能识别；
					 $errorCorrectionLevel = "L";
				 //二维码图片大小
					 $matrixPointSize = "4";
				 //最后一个传入的是空白区域大小
					 \QRcode::png($value, false, $errorCorrectionLevel, $matrixPointSize,2);
					 exit;
			}
		}else{
			return $mapi->error('余额不足');
		}
    }

    public function email_admin($toemail,$addresser_name,$email_bt,$email_text)
		{
            // import('phpmailer.phpmailer', EXTEND_PATH);
			// $toemail 收件人邮箱
			$mail = new phpmailer();
			$mail->isSMTP();
			$mail->CharSet = "utf8";
			$mail->Host = "smtp.126.com";
			$mail->SMTPAuth = true;
			$mail->Username = "gujijiu@126.com";
			$mail->Password = "PSZITIFTLTSGWJHT";
			$mail->SMTPSecure = "ssl";
			$mail->Port = 994;
            //#addresser_name 发件人名称#   addresser_email 发件人邮箱显示
			$mail->setFrom('gujijiu@126.com',$addresser_name);
			$mail->addAddress($toemail,'test');
			$mail->addReplyTo("gujijiu@126.com","API");

 
			$mail->Subject = $email_bt;//邮件标题
			$mail->Body = $email_text;// 邮件正文
 
			if(!$mail->send()){// 发送邮件
			    echo "Message could not be sent.";
                echo "Mailer Error: ".$mail->ErrorInfo;
                return 'false';
			}else{
			    return 'true';
			}
        }
        
        public function email_user($key,$toemail,$addresser_name,$email_bt,$email_text,$user,$pwd,$dk,$smtp)
		{
			$mapi = new mapi();
			$id = 2;
			$price = db('goods')->where('goods_id',$id)->value('goods_price');
			$money = db('user')->where('api_key',$key)->value('user_money');
			if(!$money){return $mapi->error('密钥错误，请注册获取密钥！');}
			if($money>=$price){
			$kf = db('user')->where('api_key',$key)->setDec('user_money',$price);
			if($kf || intval($price)==0){
					$this->xf($key,$id);
					// import('phpmailer.phpmailer', EXTEND_PATH);
					// $toemail 收件人邮箱
					$mail = new phpmailer();
					$mail->isSMTP();
					$mail->CharSet = "utf8";
					$mail->Host = $smtp;
					$mail->SMTPAuth = true;
					//$user 邮箱账户 $pwd 邮箱ssl密码 $dk 邮箱端口号
					$mail->Username = $user;
					$mail->Password = $pwd;
					$mail->SMTPSecure = "ssl";
					$mail->Port = $dk;
					//#addresser_name 发件人名称#   addresser_email 发件人邮箱显示
					$mail->setFrom($user,$addresser_name);
					$mail->addAddress($toemail,'test');
					$mail->addReplyTo($user,"API");

		
					$mail->Subject = $email_bt;//邮件标题
					$mail->Body = $email_text;// 邮件正文
		
					if(!$mail->send()){// 发送邮件
						// echo "Message could not be sent.";
						// echo "Mailer Error: ".$mail->ErrorInfo;
						return $mapi->error('false');

					}else{
						return $mapi->success('true');
					}
				}
			}else{
				return $mapi->error('余额不足');
			}
		}

		public function yiyan($key){
			$mapi = new mapi();
			$id = 3;
			$price = db('goods')->where('goods_id',$id)->value('goods_price');
			$money = db('user')->where('api_key',$key)->value('user_money');
			if(!$money){return $mapi->error('密钥错误，请注册获取密钥！');}
			if($money>=$price){
			$kf = db('user')->where('api_key',$key)->setDec('user_money',$price);
			if($kf || intval($price)==0){
					$this->xf($key,$id);
					// 存储数据的文件
					$filename = 'http://'.URL.'/data.dat';        
					// 指定页面编码
					header('Content-type: text/html; charset=utf-8');
					//file_exists函数不能访问网络文件
					// if(!file_exists($filename)) {
					// 	die($filename . ' 数据文件不存在');
					// }
					// 读取整个数据文件
					$data = file_get_contents($filename);
					// 按换行符分割成数组
					$data = explode(PHP_EOL, $data);
					// 随机获取一行索引
					$result = $data[array_rand($data)];
					// 去除多余的换行符（保险起见）
					$result = str_replace(array("\r","\n","\r\n"), '', $result);
					//把预定义的字符 "<" （小于）和 ">" （大于）转换为 HTML 实体
					return $mapi->success(htmlspecialchars($result));
				}
			}else{
				return $mapi->error('余额不足');
			}
		}

		public function xf($key,$id){
			$user_id = db('user')->where('api_key',$key)->value('user_id');
			$user_name = db('user')->where('api_key',$key)->value('user_name');
			$goods_name = db('goods')->where('goods_id',$id)->value('goods_name');
			$price = db('goods')->where('goods_id',$id)->value('goods_price');
			$data = [
				'user_id' =>$user_id,
				'user_name' =>$user_name,
				'goods_id' => $id,
				'goods_name' => $goods_name,
				'cost_time' => time(),
				'cost_money' => $price
			];
			$xf = db('cost')->insert($data);
		}
}
