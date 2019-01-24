/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : jhshop

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-05-17 01:13:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `jh_order`
-- ----------------------------
DROP TABLE IF EXISTS `jh_order`;
CREATE TABLE `jh_order` (
  `order_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `order_sn` varchar(20) NOT NULL DEFAULT '' COMMENT '订单编号',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `order_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态',
  `shipping_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '发货状态',
  `pay_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '支付状态',
  `consignee` varchar(60) NOT NULL DEFAULT '' COMMENT '收货人',
  `country` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '国家',
  `province` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '省份',
  `city` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '城市',
  `district` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '县区',
  `twon` int(11) DEFAULT '0' COMMENT '乡镇',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `zipcode` varchar(60) NOT NULL DEFAULT '' COMMENT '邮政编码',
  `mobile` varchar(60) NOT NULL DEFAULT '' COMMENT '手机',
  `email` varchar(60) NOT NULL DEFAULT '' COMMENT '邮件',
  `shipping_code` varchar(32) NOT NULL DEFAULT '' COMMENT '物流code',
  `shipping_name` varchar(120) NOT NULL DEFAULT '' COMMENT '物流名称',
  `pay_code` varchar(32) NOT NULL DEFAULT '' COMMENT '支付code',
  `pay_name` varchar(120) NOT NULL DEFAULT '' COMMENT '支付方式名称',
  `invoice_title` varchar(256) DEFAULT '' COMMENT '发票抬头',
  `goods_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品总价',
  `shipping_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '邮费',
  `user_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '使用余额',
  `coupon_price` decimal(10,2) DEFAULT '0.00' COMMENT '优惠券抵扣',
  `integral` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '使用积分',
  `integral_money` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '使用积分抵多少钱',
  `order_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '应付款金额',
  `total_amount` decimal(10,2) DEFAULT '0.00' COMMENT '订单总价',
  `add_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '下单时间',
  `shipping_time` int(11) DEFAULT '0' COMMENT '最后新发货时间',
  `confirm_time` int(10) DEFAULT '0' COMMENT '收货确认时间',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '支付时间',
  `transaction_id` varchar(255) DEFAULT NULL COMMENT '第三方平台交易流水号',
  `order_prom_type` tinyint(4) DEFAULT '0' COMMENT '0默认1抢购2团购3优惠4预售5虚拟6拼团',
  `order_prom_id` smallint(6) NOT NULL DEFAULT '0' COMMENT '活动id',
  `order_prom_amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '活动优惠金额',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格调整',
  `user_note` varchar(255) NOT NULL DEFAULT '' COMMENT '用户备注',
  `admin_note` varchar(255) DEFAULT '' COMMENT '管理员备注',
  `parent_sn` varchar(100) DEFAULT NULL COMMENT '父单单号',
  `is_distribut` tinyint(1) DEFAULT '0' COMMENT '是否已分成0未分成1已分成',
  `deleted` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户假删除标识,1:删除,0未删除',
  `paid_money` decimal(10,2) DEFAULT '0.00' COMMENT '订金',
  `is_pack` tinyint(4) DEFAULT '0' COMMENT '是否是套餐产品',
  PRIMARY KEY (`order_id`),
  UNIQUE KEY `order_sn` (`order_sn`),
  KEY `user_id` (`user_id`),
  KEY `add_time` (`add_time`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jh_order
-- ----------------------------
INSERT INTO `jh_order` VALUES ('1', '201805161123537987', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', '', '', '', '178.00', '0.00', '0.00', '0.00', '0', '0.00', '178.00', '178.00', '1526441033', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('2', '201805161130317966', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', 'weixin', '微信支付', '', '178.00', '0.00', '0.00', '0.00', '0', '0.00', '178.00', '178.00', '1526441431', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('3', '201805161140262078', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', 'weixin', '微信支付', '', '178.00', '0.00', '0.00', '0.00', '0', '0.00', '178.00', '178.00', '1526442026', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('4', '201805161147316269', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', 'alipayMobile', '手机网站支付宝', '', '178.00', '0.00', '0.00', '0.00', '0', '0.00', '178.00', '178.00', '1526442451', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('5', '201805161210558051', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', 'alipay', 'PC端支付宝', '', '178.00', '0.00', '0.00', '0.00', '0', '0.00', '178.00', '178.00', '1526443855', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('6', '201805161219552258', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', 'alipayMobile', '手机网站支付宝', '', '178.00', '0.00', '0.00', '0.00', '0', '0.00', '178.00', '178.00', '1526444395', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('7', '201805161221295402', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', 'alipay', 'PC端支付宝', '', '178.00', '0.00', '0.00', '0.00', '0', '0.00', '178.00', '178.00', '1526444489', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('8', '201805161929324167', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', '', '', '', '79.00', '0.00', '0.00', '0.00', '0', '0.00', '79.00', '79.00', '1526470172', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('9', '201805162301346451', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '257.00', '0.00', '0.00', '0.00', '0', '0.00', '257.00', '257.00', '1526482894', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('10', '201805162316452730', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '79.00', '0.00', '0.00', '0.00', '0', '0.00', '79.00', '79.00', '1526483805', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('11', '201805162349415275', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '79.00', '0.00', '0.00', '0.00', '0', '0.00', '179.00', '79.00', '1526485781', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('12', '201805170004254010', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '257.00', '0.00', '0.00', '0.00', '0', '0.00', '357.00', '257.00', '1526486665', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('13', '201805170009482942', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '257.00', '0.00', '0.00', '0.00', '0', '0.00', '357.00', '257.00', '1526486988', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('14', '201805170012085509', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '257.00', '0.00', '0.00', '0.00', '0', '0.00', '357.00', '257.00', '1526487128', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('15', '201805170036335909', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '179.00', '0.00', '0.00', '0.00', '0', '0.00', '179.00', '179.47', '1526488593', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '1');
INSERT INTO `jh_order` VALUES ('16', '201805170037495042', '3', '0', '0', '0', '阿萨德', '0', '7531', '7868', '7878', '7880', 'asdasdsadasd', '', '15769272583', '', 'shentong', '申通物流', '', '', '', '179.00', '0.00', '0.00', '0.00', '0', '0.00', '179.47', '179.00', '1526488669', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '1');
INSERT INTO `jh_order` VALUES ('17', '201805170054354613', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', 'alipayMobile', '手机网站支付宝', '', '79.00', '0.00', '0.00', '0.00', '0', '0.00', '79.00', '79.00', '1526489675', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '0');
INSERT INTO `jh_order` VALUES ('18', '201805170111346276', '2', '0', '0', '0', '萨达', '0', '338', '339', '347', '349', '水电费开奖号', '', '15769272583', '15769272583@163.com', 'shentong', '申通物流', '', '', '', '179.00', '0.00', '0.00', '0.00', '0', '0.00', '179.47', '179.00', '1526490694', '0', '0', '0', null, '0', '0', '0.00', '0.00', '', '', null, '0', '0', '0.00', '1');
