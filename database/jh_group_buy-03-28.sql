/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : jhshop

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-03-28 14:07:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `jh_group_buy`
-- ----------------------------
DROP TABLE IF EXISTS `jh_group_buy`;
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
  `user_1` mediumint(18) DEFAULT '0' COMMENT '参与人id',
  `user_2` mediumint(18) DEFAULT '0' COMMENT '参与人id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='团购商品表';

-- ----------------------------
-- Records of jh_group_buy
-- ----------------------------
INSERT INTO `jh_group_buy` VALUES ('12', '2', '0', '2598', '2598', '144', '0', '啊实打实的', '1522210857', '1522297257', '28.00', '2', '0', '0', '0', '0.00', '', '1', null, '0', '0', '0', '2600', '0');
INSERT INTO `jh_group_buy` VALUES ('16', '3', '0', '2598', '2598', '145', '0', '工会经费估计会发', '1522217048', '1522303448', '90.00', '3', '0', '0', '0', '0.00', '', '1', null, '0', '0', '0', '2600', '2601');
