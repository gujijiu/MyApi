/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50518
Source Host           : localhost:3306
Source Database       : my_api

Target Server Type    : MYSQL
Target Server Version : 50518
File Encoding         : 65001

Date: 2021-06-10 10:15:42
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `api_cost`
-- ----------------------------
DROP TABLE IF EXISTS `api_cost`;
CREATE TABLE `api_cost` (
  `cost_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '消费id',
  `user_id` int(20) NOT NULL COMMENT '用户id',
  `user_name` varchar(40) NOT NULL COMMENT '用户名',
  `goods_id` int(20) NOT NULL COMMENT '商品id',
  `goods_name` varchar(80) NOT NULL COMMENT '商品名称',
  `cost_time` varchar(20) NOT NULL COMMENT '消费时间',
  `cost_money` varchar(10) NOT NULL COMMENT '消费金额',
  PRIMARY KEY (`cost_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_cost
-- ----------------------------
INSERT INTO `api_cost` VALUES ('1', '1', 'lsy', '1', '二维码生成', '1622602739', '0.10');
INSERT INTO `api_cost` VALUES ('2', '1', 'lsy', '1', '二维码生成', '1622602870', '0.10');
INSERT INTO `api_cost` VALUES ('3', '1', 'lsy', '1', '二维码生成', '1622699460', '0.10');
INSERT INTO `api_cost` VALUES ('4', '1', 'lsy', '1', '二维码生成', '1622699478', '0.10');
INSERT INTO `api_cost` VALUES ('5', '1', 'lsy', '1', '二维码生成', '1622783044', '0.10');
INSERT INTO `api_cost` VALUES ('6', '1', 'lsy', '1', '二维码生成', '1622783131', '0.10');
INSERT INTO `api_cost` VALUES ('7', '1', 'lsy', '1', '二维码生成', '1622783179', '0.10');
INSERT INTO `api_cost` VALUES ('8', '1', 'lsy', '1', '二维码生成', '1622783252', '0.10');
INSERT INTO `api_cost` VALUES ('9', '1', 'lsy', '1', '二维码生成', '1622783261', '0.10');
INSERT INTO `api_cost` VALUES ('10', '1', 'lsy', '1', '二维码生成', '1622783330', '0.10');
INSERT INTO `api_cost` VALUES ('11', '1', 'lsy', '1', '二维码生成', '1622783472', '0.10');
INSERT INTO `api_cost` VALUES ('12', '1', 'lsy', '1', '二维码生成', '1622783658', '0.10');
INSERT INTO `api_cost` VALUES ('13', '1', 'lsy', '1', '二维码生成', '1622783671', '0.10');
INSERT INTO `api_cost` VALUES ('14', '1', 'lsy', '1', '二维码生成', '1622783680', '0.10');
INSERT INTO `api_cost` VALUES ('15', '1', 'lsy', '1', '二维码生成', '1622783997', '0.10');
INSERT INTO `api_cost` VALUES ('16', '1', 'lsy', '1', '二维码生成', '1622784511', '0.10');
INSERT INTO `api_cost` VALUES ('17', '1', 'lsy', '1', '二维码生成', '1622784621', '0.10');
INSERT INTO `api_cost` VALUES ('18', '1', 'lsy', '1', '二维码生成', '1622784669', '0.10');
INSERT INTO `api_cost` VALUES ('19', '1', 'lsy', '1', '二维码生成', '1622784708', '0.10');
INSERT INTO `api_cost` VALUES ('20', '1', 'lsy', '1', '二维码生成', '1622785015', '0.10');
INSERT INTO `api_cost` VALUES ('21', '1', 'lsy', '1', '二维码生成', '1622785072', '0.10');
INSERT INTO `api_cost` VALUES ('22', '1', 'lsy', '1', '二维码生成', '1622815167', '0.10');
INSERT INTO `api_cost` VALUES ('23', '1', 'lsy', '2', '发送邮件', '1622821370', '0.01');
INSERT INTO `api_cost` VALUES ('24', '1', 'lsy', '1', '二维码生成', '1622823599', '0.10');
INSERT INTO `api_cost` VALUES ('25', '1', 'lsy', '1', '二维码生成', '1622824124', '0.10');
INSERT INTO `api_cost` VALUES ('26', '1', 'lsy', '3', '名人名言', '1622851804', '0.00');
INSERT INTO `api_cost` VALUES ('27', '1', 'lsy', '3', '名人名言', '1622852071', '0.00');
INSERT INTO `api_cost` VALUES ('28', '1', 'lsy', '3', '名人名言', '1622852122', '0.00');
INSERT INTO `api_cost` VALUES ('29', '1', 'lsy', '3', '名人名言', '1622852158', '0.00');
INSERT INTO `api_cost` VALUES ('30', '1', 'lsy', '3', '名人名言', '1622852179', '0.00');
INSERT INTO `api_cost` VALUES ('31', '1', 'lsy', '3', '名人名言', '1622852380', '0.00');
INSERT INTO `api_cost` VALUES ('32', '1', 'lsy', '3', '名人名言', '1622852414', '0.00');
INSERT INTO `api_cost` VALUES ('33', '1', 'lsy', '3', '名人名言', '1622852687', '0.00');
INSERT INTO `api_cost` VALUES ('34', '1', 'lsy', '3', '名人名言', '1622852739', '0.00');
INSERT INTO `api_cost` VALUES ('35', '1', 'lsy', '3', '名人名言', '1622852768', '0.00');
INSERT INTO `api_cost` VALUES ('36', '1', 'lsy', '3', '名人名言', '1622853111', '0.00');
INSERT INTO `api_cost` VALUES ('37', '1', 'lsy', '3', '名人名言', '1622853218', '0.00');
INSERT INTO `api_cost` VALUES ('38', '1', 'lsy', '1', '二维码生成', '1622910850', '0.10');
INSERT INTO `api_cost` VALUES ('39', '1', 'lsy', '1', '二维码生成', '1622910954', '0.10');
INSERT INTO `api_cost` VALUES ('40', '1', 'lsy', '1', '二维码生成', '1622911004', '0.10');
INSERT INTO `api_cost` VALUES ('41', '1', 'lsy', '1', '二维码生成', '1622911021', '0.10');
INSERT INTO `api_cost` VALUES ('42', '1', 'lsy', '1', '二维码生成', '1622957717', '0.10');
INSERT INTO `api_cost` VALUES ('43', '1', 'lsy', '1', '二维码生成', '1622957924', '0.10');
INSERT INTO `api_cost` VALUES ('44', '1', 'lsy', '1', '二维码生成', '1622958978', '0.10');
INSERT INTO `api_cost` VALUES ('45', '1', 'lsy', '1', '二维码生成', '1623207854', '0.10');
INSERT INTO `api_cost` VALUES ('46', '1', 'lsy', '1', '二维码生成', '1623207860', '0.10');
INSERT INTO `api_cost` VALUES ('47', '1', 'lsy', '1', '二维码生成', '1623207869', '0.10');
INSERT INTO `api_cost` VALUES ('48', '1', 'lsy', '2', '发送邮件', '1623207936', '0.01');
INSERT INTO `api_cost` VALUES ('49', '1', 'lsy', '1', '二维码生成', '1623208013', '0.10');

-- ----------------------------
-- Table structure for `api_details`
-- ----------------------------
DROP TABLE IF EXISTS `api_details`;
CREATE TABLE `api_details` (
  `details_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '详情表id',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `details_fromat` varchar(20) NOT NULL DEFAULT 'json/text' COMMENT '返回格式',
  `details_mode` varchar(20) NOT NULL DEFAULT 'get/post' COMMENT '请求方式',
  `details_request` text COMMENT '请求示例',
  `details_return` text COMMENT '返回示例',
  `details_examples` text COMMENT '代码示例',
  PRIMARY KEY (`details_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_details
-- ----------------------------
INSERT INTO `api_details` VALUES ('1', '2', 'json/text', 'get/post', '/index.php/index/Api/email_user?key=用户密钥&toemail=收件邮箱地址&addresser_name=发件人名称&email_bt=邮件标题&email_text=邮件内容&user=发件邮箱地址&pwd=sll密码&dk=ssl端口号&smtp=邮箱服务器地址', '{\"status\":200,\"message\":\"true\"}', '暂无');
INSERT INTO `api_details` VALUES ('3', '1', 'json/text', 'get/post', 'http://localhost/my_api/public/index.php/index/Api/qrcode?key=用户密钥&url=需要生成二维码的链接', '<img src=\"http://localhost/my_api/public/index.php/index/Api/qrcode?key=b023ae634b281600a02febd494522d0e&url=http://baidu.com\">', 'HTML：\n<img src=\"调用接口\">');
INSERT INTO `api_details` VALUES ('4', '3', 'json/text', 'get/post', '/index.php/index/Api/yiyan?key=用户密钥', '{ \"status\": 200, \"message\": \"余将董道而不豫兮，固将重昏而终身。——《屈原·涉江》\" }', '暂无');

-- ----------------------------
-- Table structure for `api_goods`
-- ----------------------------
DROP TABLE IF EXISTS `api_goods`;
CREATE TABLE `api_goods` (
  `goods_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '商品表自增id',
  `goods_name` varchar(100) NOT NULL COMMENT 'API名称',
  `goods_description` text COMMENT 'API描述',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'API价格',
  `goods_browse` int(10) NOT NULL DEFAULT '0' COMMENT '商品浏览次数',
  `goods_call` int(20) NOT NULL DEFAULT '0' COMMENT '接口浏览次数',
  `goods_url` text COMMENT '调用地址',
  `goods_case` text COMMENT '调用案例',
  `goods_state` int(1) NOT NULL DEFAULT '1' COMMENT '商品开启状态',
  PRIMARY KEY (`goods_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_goods
-- ----------------------------
INSERT INTO `api_goods` VALUES ('1', '二维码生成', '将网址变成二维码图片！', '0.10', '0', '22', '/index.php/index/Api/qrcode', '/index.php/index/Api/qrcode?key=b023ae634b281600a02febd494522d0e&url=http://baidu.com', '1');
INSERT INTO `api_goods` VALUES ('2', '发送邮件', '通过接口发送邮件', '0.01', '0', '2', '/index.php/index/Api/email_user', '/index.php/index/Api/email_user?key=b023ae634b281600a02febd494522d0e&toemail=2991993849@qq.com&addresser_name=人之初&email_bt=通知标题&email_text=通知内容&user=gujijiu@126.com&pwd=PSZITIFTLTSGWJHT&dk=994&smtp=smtp.126.com', '1');
INSERT INTO `api_goods` VALUES ('3', '名人名言', '随机输入一句名人名言', '0.00', '0', '1', '/index.php/index/Api/yiyan', '/index.php/index/Api/yiyan?key=b023ae634b281600a02febd494522d0e', '1');

-- ----------------------------
-- Table structure for `api_request`
-- ----------------------------
DROP TABLE IF EXISTS `api_request`;
CREATE TABLE `api_request` (
  `request_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '请求id',
  `goods_id` int(10) NOT NULL COMMENT '商品id',
  `request_name` varchar(50) NOT NULL COMMENT '请求名称',
  `request_nece` int(1) NOT NULL DEFAULT '1' COMMENT '请求是否必填',
  `request_type` varchar(10) NOT NULL DEFAULT 'string' COMMENT '请求类型',
  `request_explain` text COMMENT '请求说明',
  PRIMARY KEY (`request_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_request
-- ----------------------------
INSERT INTO `api_request` VALUES ('1', '2', 'key', '1', 'String', '用户密钥');
INSERT INTO `api_request` VALUES ('2', '2', 'toemail', '1', 'String', '收件人地址');
INSERT INTO `api_request` VALUES ('3', '2', 'addresser_name', '1', 'String', '发件人名称');
INSERT INTO `api_request` VALUES ('4', '1', 'key', '1', 'String', '用户密钥');
INSERT INTO `api_request` VALUES ('5', '1', 'url', '1', 'String', '需要生成二维码的网址');
INSERT INTO `api_request` VALUES ('6', '2', 'email_bt', '1', 'String', '邮件标题');
INSERT INTO `api_request` VALUES ('7', '2', 'email_text', '1', 'String', '邮件内容');
INSERT INTO `api_request` VALUES ('8', '2', 'user', '1', 'String', '发件邮箱');
INSERT INTO `api_request` VALUES ('9', '2', 'pwd', '1', 'String', '邮箱ssl密码');
INSERT INTO `api_request` VALUES ('10', '2', 'dk', '1', 'String', 'ssl端口号');
INSERT INTO `api_request` VALUES ('11', '2', 'smtp', '1', 'String', '邮件服务器地址');
INSERT INTO `api_request` VALUES ('12', '3', 'key', '1', 'String', '用户密钥');

-- ----------------------------
-- Table structure for `api_return`
-- ----------------------------
DROP TABLE IF EXISTS `api_return`;
CREATE TABLE `api_return` (
  `return_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '返回id',
  `goods_id` int(20) NOT NULL COMMENT '商品id',
  `return_name` varchar(80) NOT NULL COMMENT '返回名称',
  `return_type` varchar(20) NOT NULL DEFAULT 'string' COMMENT '返回类型',
  `return_explain` text COMMENT '返回说明',
  PRIMARY KEY (`return_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_return
-- ----------------------------
INSERT INTO `api_return` VALUES ('1', '2', 'status', 'int', '状态码');
INSERT INTO `api_return` VALUES ('2', '2', 'message', 'String', '是否成功或失败原因');
INSERT INTO `api_return` VALUES ('3', '1', '图片链接', 'url/图片', '返回一个二维码图片地址');
INSERT INTO `api_return` VALUES ('4', '3', 'status', 'int', '状态码');
INSERT INTO `api_return` VALUES ('5', '3', 'message', 'String', '是否成功或失败原因');

-- ----------------------------
-- Table structure for `api_test`
-- ----------------------------
DROP TABLE IF EXISTS `api_test`;
CREATE TABLE `api_test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `test` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_test
-- ----------------------------
INSERT INTO `api_test` VALUES ('1', '\r\n        {\r\n            \"code\": 1,\r\n            \"info\": {\r\n                \"uin\": 774740085,\r\n                \"nickname\": \"ゆ、 音色 Cutey。\",\r\n                \"logo\": \"http:\\/\\/thirdqq.qlogo.cn\\/g?b=sdk&k=E6OgxqD3YO5KL06CB9q1Dg&s=100&t=1566808348\",\r\n                \"vip\": \"1\",\r\n                \"svip\": \"1\",\r\n                \"vip-level\": \"9\",\r\n                \"vip-year\": \"1\",\r\n                \"level\": \"121\",\r\n                \"level-num\": \"15296\",\r\n                \"today-num\": \"7.6\",\r\n                \"today-speed\": \"3.2\",\r\n                \"nex-level-day\": \"76\",\r\n                \"one-crown-day\": -10944,\r\n                \"two-crown-day\": 1600,\r\n                \"three-crown-day\": 22336,\r\n                \"four-crown-day\": 51264,\r\n                \"dg\": {\r\n                    \"phone\": true,\r\n                    \"pc\": \"1\",\r\n                    \"qzone\": \"1\",\r\n                    \"eye\": \"1\",\r\n                    \"medal\": \"1\",\r\n                    \"weishi\": \"0\",\r\n                    \"safe\": \"1\",\r\n                    \"game\": \"1\",\r\n                    \"walk\": \"1\"\r\n                }\r\n            }\r\n        }');
INSERT INTO `api_test` VALUES ('2', '\\\"\\\\r\\\\n        {\\\\r\\\\n            \\\\\\\"code\\\\\\\": 1,\\\\r\\\\n            \\\\\\\"info\\\\\\\": {\\\\r\\\\n                \\\\\\\"uin\\\\\\\": 774740085,\\\\r\\\\n                \\\\\\\"nickname\\\\\\\": \\\\\\\"\\\\u3086\\\\u3001 \\\\u97f3\\\\u8272 Cutey\\\\u3002\\\\\\\",\\\\r\\\\n                \\\\\\\"logo\\\\\\\": \\\\\\\"http:\\\\\\\\\\\\/\\\\\\\\\\\\/thirdqq.qlogo.cn\\\\\\\\\\\\/g?b=sdk&k=E6OgxqD3YO5KL06CB9q1Dg&s=100&t=1566808348\\\\\\\",\\\\r\\\\n                \\\\\\\"vip\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                \\\\\\\"svip\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                \\\\\\\"vip-level\\\\\\\": \\\\\\\"9\\\\\\\",\\\\r\\\\n                \\\\\\\"vip-year\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                \\\\\\\"level\\\\\\\": \\\\\\\"121\\\\\\\",\\\\r\\\\n                \\\\\\\"level-num\\\\\\\": \\\\\\\"15296\\\\\\\",\\\\r\\\\n                \\\\\\\"today-num\\\\\\\": \\\\\\\"7.6\\\\\\\",\\\\r\\\\n                \\\\\\\"today-speed\\\\\\\": \\\\\\\"3.2\\\\\\\",\\\\r\\\\n                \\\\\\\"nex-level-day\\\\\\\": \\\\\\\"76\\\\\\\",\\\\r\\\\n                \\\\\\\"one-crown-day\\\\\\\": -10944,\\\\r\\\\n                \\\\\\\"two-crown-day\\\\\\\": 1600,\\\\r\\\\n                \\\\\\\"three-crown-day\\\\\\\": 22336,\\\\r\\\\n                \\\\\\\"four-crown-day\\\\\\\": 51264,\\\\r\\\\n                \\\\\\\"dg\\\\\\\": {\\\\r\\\\n                    \\\\\\\"phone\\\\\\\": true,\\\\r\\\\n                    \\\\\\\"pc\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                    \\\\\\\"qzone\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                    \\\\\\\"eye\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                    \\\\\\\"medal\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                    \\\\\\\"weishi\\\\\\\": \\\\\\\"0\\\\\\\",\\\\r\\\\n                    \\\\\\\"safe\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                    \\\\\\\"game\\\\\\\": \\\\\\\"1\\\\\\\",\\\\r\\\\n                    \\\\\\\"walk\\\\\\\": \\\\\\\"1\\\\\\\"\\\\r\\\\n                }\\\\r\\\\n            }\\\\r\\\\n        }\\\"');
INSERT INTO `api_test` VALUES ('3', '\r\n        {\r\n            \\\"code\\\": 1,\r\n            \\\"info\\\": {\r\n                \\\"uin\\\": 774740085,\r\n                \\\"nickname\\\": \\\"ゆ、 音色 Cutey。\\\",\r\n                \\\"logo\\\": \\\"http:\\\\/\\\\/thirdqq.qlogo.cn\\\\/g?b=sdk&k=E6OgxqD3YO5KL06CB9q1Dg&s=100&t=1566808348\\\",\r\n                \\\"vip\\\": \\\"1\\\",\r\n                \\\"svip\\\": \\\"1\\\",\r\n                \\\"vip-level\\\": \\\"9\\\",\r\n                \\\"vip-year\\\": \\\"1\\\",\r\n                \\\"level\\\": \\\"121\\\",\r\n                \\\"level-num\\\": \\\"15296\\\",\r\n                \\\"today-num\\\": \\\"7.6\\\",\r\n                \\\"today-speed\\\": \\\"3.2\\\",\r\n                \\\"nex-level-day\\\": \\\"76\\\",\r\n                \\\"one-crown-day\\\": -10944,\r\n                \\\"two-crown-day\\\": 1600,\r\n                \\\"three-crown-day\\\": 22336,\r\n                \\\"four-crown-day\\\": 51264,\r\n                \\\"dg\\\": {\r\n                    \\\"phone\\\": true,\r\n                    \\\"pc\\\": \\\"1\\\",\r\n                    \\\"qzone\\\": \\\"1\\\",\r\n                    \\\"eye\\\": \\\"1\\\",\r\n                    \\\"medal\\\": \\\"1\\\",\r\n                    \\\"weishi\\\": \\\"0\\\",\r\n                    \\\"safe\\\": \\\"1\\\",\r\n                    \\\"game\\\": \\\"1\\\",\r\n                    \\\"walk\\\": \\\"1\\\"\r\n                }\r\n            }\r\n        }');

-- ----------------------------
-- Table structure for `api_user`
-- ----------------------------
DROP TABLE IF EXISTS `api_user`;
CREATE TABLE `api_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user` varchar(40) NOT NULL COMMENT '用户昵称',
  `user_name` varchar(20) NOT NULL COMMENT '用户账号',
  `user_pwd` varchar(40) NOT NULL COMMENT '用户密码',
  `user_phone` varchar(12) NOT NULL COMMENT '用户联系方式',
  `user_email` varchar(40) NOT NULL COMMENT '用户邮箱',
  `api_key` varchar(40) NOT NULL COMMENT 'api密钥',
  `user_money` decimal(20,2) NOT NULL DEFAULT '0.00' COMMENT '余额',
  `user_reg_ip` varchar(20) NOT NULL COMMENT '用户注册ip',
  `user_reg_time` int(20) NOT NULL COMMENT '用户注册时间戳',
  `user_log_ip` varchar(20) DEFAULT NULL COMMENT '用户当前或上次登陆IP',
  `user_log_time` int(20) DEFAULT NULL COMMENT '用户当前或上次登陆时间戳',
  `user_img` varchar(50) DEFAULT NULL,
  `user_permission` int(2) NOT NULL DEFAULT '0' COMMENT '用户权限',
  `user_del` int(1) NOT NULL DEFAULT '0' COMMENT '用户是否删除',
  `user_state` int(1) NOT NULL DEFAULT '0' COMMENT '用户激活状态',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of api_user
-- ----------------------------
INSERT INTO `api_user` VALUES ('1', '管理员', 'lsy', '5d93ceb70e2bf5daa84ec3d0cd2c731a', '15655862232', 'gujijiu@163.com', 'b023ae634b281600a02febd494522d0e', '99996.18', '::1', '1621146805', '::1', '1623207852', '/uploads/1/1.png', '99', '0', '1');
INSERT INTO `api_user` VALUES ('2', '古迹久', 'gujiju', '55e19765370960abaf54c58b80f96ccd', '18858087844', '2991993849@qq.com', 'c8e1094122543f17801e9d42088c0fac', '0.00', '::1', '1621004401', '::1', '1622859005', null, '0', '0', '1');
INSERT INTO `api_user` VALUES ('3', '啊啊啊', 'lishuanglong', 'e10adc3949ba59abbe56e057f20f883e', '13654171234', '1321766828@qq,com', '6e94ce5a9f4c11c9ee4fc3a2fdebb9fb', '0.00', '::1', '1621155881', null, null, null, '0', '0', '0');
INSERT INTO `api_user` VALUES ('4', '删除测试号呀呀', 'test1', 'e10adc3949ba59abbe56e057f20f883e', '13854181452', '6548608@qq.com', '13e13bf3b07b653d530bb990799d5f40', '10.00', '::1', '1621220484', null, null, null, '0', '0', '0');
INSERT INTO `api_user` VALUES ('5', '后台测试号', 'test2', 'e10adc3949ba59abbe56e057f20f883e', '13854198765', 'fgh@qq.com', 'fa756dbf7eec0d7744d6bdf1187f182e', '0.00', '::1', '1621342636', null, null, null, '0', '0', '1');
INSERT INTO `api_user` VALUES ('6', '后台测试号呀', 'test3', 'e10adc3949ba59abbe56e057f20f883e', '13854181453', 'ghf@qq.com', 'b527cf005660827321b408a6351801d7', '0.00', '::1', '1621342706', null, null, null, '0', '0', '1');
