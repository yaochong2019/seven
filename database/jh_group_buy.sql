# Host: localhost  (Version: 5.5.53)
# Date: 2018-03-28 04:07:48
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "jh_group_buy"
#

CREATE TABLE `jh_group_buy` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '拼团订单ID',
  `group_id` int(11) NOT NULL DEFAULT '2' COMMENT '现有拼团id：2人团/3人团',
  `order_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '订单id',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `head_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '团长ID',
  `goods_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品ID',
  `item_id` bigint(20) DEFAULT '0' COMMENT '对应spec_goods_price商品规格id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '拼团标题',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '团购价格',
  `user_num` int(10) DEFAULT '0' COMMENT '参团人数',
  `goods_num` int(10) DEFAULT '0' COMMENT '商品参团数',
  `buy_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品已购买数',
  `order_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '已下单人数',
  `goods_price` decimal(10,2) NOT NULL COMMENT '商品原价',
  `goods_name` varchar(200) NOT NULL DEFAULT '' COMMENT '商品名称',
  `is_end` tinyint(1) DEFAULT '0' COMMENT '是否结束',
  `head_pic` varchar(255) DEFAULT NULL COMMENT '头像',
  `province` int(6) DEFAULT '0' COMMENT '省份',
  `city` int(6) DEFAULT '0' COMMENT '市区',
  `is_purchase` tinyint(1) DEFAULT '0' COMMENT '是否已购买',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='团购商品表';

#
# Data for table "jh_group_buy"
#

INSERT INTO `jh_group_buy` VALUES (7,2,0,0,0,100,0,' 金地珠宝足金花之恋金花3D硬金吊坠优雅大方时尚百搭唯美花朵黄金吊坠项坠',1457712000,1551715200,1300.00,0,50,0,0,1405.00,'金地珠宝足金花之恋金花3D硬金吊坠优雅大方时尚百搭唯美花朵黄金吊坠项坠',0,NULL,0,0,0),(9,3,0,0,0,122,193,'就立刻解决',1457712000,1551715200,0.00,0,0,0,0,0.00,'黛尔尼曼20000M蘋果6s手机通用超薄移动电源冲充电宝MIUI便携毫安颜色:土豪金',1,NULL,0,0,0),(10,2,0,0,0,118,187,'顾客顾客',1457712000,1551715200,0.00,0,0,0,0,0.00,'ROMOSS/罗马仕 sense4 正品10000+毫安移动电源 手机通用充电宝颜色:宝石蓝',1,NULL,0,0,0);
