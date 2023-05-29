<?php
namespace app\index\controller;
use think\Controller;
use app\index\controller\Index as com ;
use app\common\model\User as muser;
use phpmailer\phpmailer;

class Login extends Base
{

    public function _initialize() {
        parent::_initialize();
        define('HARAN','haran');
        $this->template_dir = 'index/';
        define('URL',config('view_replace_str')['__url__']);
    }

    public function index(){
        $url = config('view_replace_str')['__url__'];
        $user_name = input('post.user_name');
        $user_pwd = input('post.user_pwd');
        if($user_name){
            $user_model = model('User');
            // $jg = muser::login($user_name,$user_pwd); 报错：should not be called statically
            $jg = $user_model->login($user_name,$user_pwd);
            // //var_dump($user_name);
            //var_dump($jg);
           
            if($jg == 1){
                // return action('index/index/index');
                // $com =new com();
                // $com->index();
                // $index = controller('Index');
                // return $this->fetch('index/index');
                @header("Location: " . url('index/index/index'));
                exit();
            }else if($jg == 404){
                //前端利用js方法插入提示信息/也可以直接使用$this->assign();输出变量到前端显示
                echo "<script src=\"http://".$url."/static/Login/js/register.js\"></script>\r\n";
                echo "<script language=\"JavaScript\">\r\n";
                echo "login_yhm();\r\n";
                echo "</script>\r\n";
                return $this->fetch('login/index');
            }else if($jg == 403){
                $user_email = db('user')->where('user_name',$user_name)->value('user_email');
                $api_key = db('user')->where('user_name',$user_name)->value('api_key');
                $this->email_verification($user_email,$api_key);
                //前端利用js方法插入提示信息/也可以直接使用$this->assign();输出变量到前端显示
                echo "<script src=\"http://".$url."/static/Login/js/register.js\"></script>\r\n";
                echo "<script language=\"JavaScript\">\r\n";
                echo "login_jh();\r\n";
                echo "</script>\r\n";
                return $this->fetch('login/index');
            }else{
                // //var_dump('sdfsd');
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
        if(session('?user_id')){

        }else{
            $this->success('成功退出，正在前往登陆页面！','login/index');
        }
        
    }

    public function register(){
        $user = input('post.user');
        $user_name = input('post.user_name');
        $user_pwd = input('post.user_pwd');
        $user_phone = input('post.user_phone');
        $user_email = input('post.user_email');
        // //var_dump(md5($user_name.$user_phone));
        if($user){
            $user_model = model('User');
            $jg = $user_model->register($user,$user_name,$user_pwd,$user_phone,$user_email);
            if($jg == 1){
                $this->email_verification($user_email,md5($user_name.$user_phone.md5($user_pwd)));
                echo "<script language=\"JavaScript\">\r\n";
                echo " alert(\"注册成功！\");\r\n";
                echo "</script>";
               // return '成功';
            }else{
                echo "<script language=\"JavaScript\">\r\n";
                echo " alert(\"注册失败！\");\r\n";
                echo "</script>";
                //return '失败';
            }
        }
        return $this->fetch('register/index');
    }

    public function email_verification($user_email,$user_key)
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
        $mail->setFrom('gujijiu@126.com','MY_API');
        $mail->addAddress($user_email,'test');
        $mail->addReplyTo("gujijiu@126.com","API");
        $mail->isHTML(true);   
        $mail->Subject = '请激活您的账户>>>My_api';//邮件标题
        $mail->Body = '<html><head><style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #050801;
            font-family: "Raleway", sans-serif;
            font-weight: bold;
        }
        a{
            position: relative;
            display: inline-block;
            padding: 25px 30px;
            margin: 40px 0;
            color: #03e9f4;
            text-decoration: none;
            text-transform: uppercase;
            transition: 0.5s;
            letter-spacing: 4px;
            overflow: hidden;
            margin-right: 50px;
           
        }
        a:hover{
            background: #03e9f4;
            color: #050801;
            box-shadow: 0 0 5px #03e9f4,
                        0 0 25px #03e9f4,
                        0 0 50px #03e9f4,
                        0 0 200px #03e9f4;
             -webkit-box-reflect:below 1px linear-gradient(transparent, #0005);
        }
        a:nth-child(1){
            filter: hue-rotate(270deg);
        }
        a:nth-child(2){
            filter: hue-rotate(110deg);
        }
        a span{
            position: absolute;
            display: block;
        }
        a span:nth-child(1){
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg,transparent,#03e9f4);
            animation: animate1 1s linear infinite;
        }
        @keyframes animate1{
            0%{
                left: -100%;
            }
            50%,100%{
                left: 100%;
            }
        }
        a span:nth-child(2){
            top: -100%;
            right: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(180deg,transparent,#03e9f4);
            animation: animate2 1s linear infinite;
            animation-delay: 0.25s;
        }
        @keyframes animate2{
            0%{
                top: -100%;
            }
            50%,100%{
                top: 100%;
            }
        }
        a span:nth-child(3){
            bottom: 0;
            right: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(270deg,transparent,#03e9f4);
            animation: animate3 1s linear infinite;
            animation-delay: 0.50s;
        }
        @keyframes animate3{
            0%{
                right: -100%;
            }
            50%,100%{
                right: 100%;
            }
        }
        
        
        a span:nth-child(4){
            bottom: -100%;
            left: 0;
            width: 2px;
            height: 100%;
            background: linear-gradient(360deg,transparent,#03e9f4);
            animation: animate4 1s linear infinite;
            animation-delay: 0.75s;
        }
        @keyframes animate4{
            0%{
                bottom: -100%;
            }
            50%,100%{
                bottom: 100%;
            }
        }
        </style>
        </head>
        <body>
        <h2>点击打开链接或者复制链接到浏览器进入网页激活您的账户http://'.URL.'/index.php/index/login/user_activation?user_key='.$user_key.'</h2>
            <a href="http://'.URL.'/index.php/index/login/user_activation?user_key='.$user_key.'">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                点击激活MY_API账号！
            </a>
            </body></html>';
        $mail->AltBody = '点击打开链接或者复制链接到浏览器进入网页激活您的账户http://'.URL.'/index.php/index/login/user_activation?user_key'.$user_key;// 邮件正文
        //'.URL.'/index.php/index/login/user_activation?user_key'.$user_key.'
        if(!$mail->send()){// 发送邮件
            // echo "Message could not be sent.";
            // echo "Mailer Error: ".$mail->ErrorInfo;
            return 'false';
        }else{
            return 'true';
        }
    }

    public function user_activation($user_key){
        // db('user')->where('api_key',$user_key)->update(['user_state' => 1]);
        $user = new muser();
        $user_state = $user->isUpdate(true)->save(['user_state'=>1],['api_key'=>$user_key]);
        //var_dump($user_state);
        if($user_state == 1)
        {
            $this->success('激活成功，请登陆！','login/index');
        }else{
            $this->error('链接错误或已激活，请重新登陆尝试！','login/index');
        }
    }

    public function test(){
        $user_model = model('User');
        $nm = $user_model->test();
        // $user_base = model('Base');
        // $user_base->isLogin();
        $this->isLogin();
        echo HARAN;
        return $nm;
    }

    public function test1(){
        $user_model = model('User');
        $jg = $user_model->login('123','123');
        //var_dump($jg);
        //return $jg;
        //return $this->fetch('test');
    }

    public function test2(){
        $user_model = model('User');
        $jg = $user_model->login('lsy','qwer1234');
        //var_dump($jg);
    }
    
    public function test3(){
        // $user_model = model('User');
        // $jg = $user_model->login('123','123');
        // return json(muser::select());
        $user_model = model('User');
        $jg = $user_model->test();
        //var_dump(json($jg));
    }
    
    public function test4(){
        $imgs_str = '
        {
            "code": 1,
            "info": {
                "uin": 774740085,
                "nickname": "ゆ、 音色 Cutey。",
                "logo": "http:\/\/thirdqq.qlogo.cn\/g?b=sdk&k=E6OgxqD3YO5KL06CB9q1Dg&s=100&t=1566808348",
                "vip": "1",
                "svip": "1",
                "vip-level": "9",
                "vip-year": "1",
                "level": "121",
                "level-num": "15296",
                "today-num": "7.6",
                "today-speed": "3.2",
                "nex-level-day": "76",
                "one-crown-day": -10944,
                "two-crown-day": 1600,
                "three-crown-day": 22336,
                "four-crown-day": 51264,
                "dg": {
                    "phone": true,
                    "pc": "1",
                    "qzone": "1",
                    "eye": "1",
                    "medal": "1",
                    "weishi": "0",
                    "safe": "1",
                    "game": "1",
                    "walk": "1"
                }
            }
        }';
        // $imgs_str = json_encode($imgs_str);  
        // $imgs_str = addslashes($imgs_str);  

        // db('test')->insert(['test'=>$imgs_str]);
        echo '<p>'.db('test')->where('id',1)->value('test').'</p>';
        // //var_dump(db('test')->where('id',3)->value('test'));
    }

}