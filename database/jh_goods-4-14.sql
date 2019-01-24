# Host: localhost  (Version: 5.5.53)
# Date: 2018-04-14 01:05:13
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "jh_goods"
#

CREATE TABLE `jh_goods` (
  `goods_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `cat_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '分类id',
  `extend_cat_id` int(11) DEFAULT '0' COMMENT '扩展分类id',
  `goods_sn` varchar(60) NOT NULL DEFAULT '' COMMENT '商品编号',
  `goods_name` varchar(120) NOT NULL DEFAULT '' COMMENT '商品名称',
  `click_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '点击数',
  `brand_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '品牌id',
  `store_count` smallint(5) unsigned NOT NULL DEFAULT '10' COMMENT '库存数量',
  `comment_count` smallint(5) DEFAULT '0' COMMENT '商品评论数',
  `weight` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '商品重量克为单位',
  `market_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '本店价',
  `cost_price` decimal(10,2) DEFAULT '0.00' COMMENT '商品成本价',
  `price_ladder` text COMMENT '价格阶梯',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '商品关键词',
  `goods_remark` varchar(255) NOT NULL DEFAULT '' COMMENT '商品简单描述',
  `goods_content` text COMMENT '商品详细描述',
  `original_img` varchar(255) NOT NULL DEFAULT '' COMMENT '商品上传原始图',
  `is_virtual` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否为虚拟商品 1是，0否',
  `virtual_indate` int(11) DEFAULT '0' COMMENT '虚拟商品有效期',
  `virtual_limit` smallint(6) DEFAULT '0' COMMENT '虚拟商品购买上限',
  `virtual_refund` tinyint(1) DEFAULT '1' COMMENT '是否允许过期退款， 1是，0否',
  `is_on_sale` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否上架',
  `is_free_shipping` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否包邮0否1是',
  `on_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品上架时间',
  `sort` smallint(4) unsigned NOT NULL DEFAULT '50' COMMENT '商品排序',
  `is_recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `is_new` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否新品',
  `is_hot` tinyint(1) DEFAULT '0' COMMENT '是否热卖',
  `last_update` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `goods_type` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '商品所属类型id，取值表goods_type的cat_id',
  `spec_type` smallint(5) DEFAULT '0' COMMENT '商品规格类型，取值表goods_type的cat_id',
  `give_integral` mediumint(8) DEFAULT '0' COMMENT '购买商品赠送积分',
  `exchange_integral` int(10) DEFAULT '0' COMMENT '积分兑换：0不参与积分兑换，积分和现金的兑换比例见后台配置',
  `suppliers_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '供货商ID',
  `sales_sum` int(11) DEFAULT '0' COMMENT '商品销量',
  `prom_type` tinyint(1) DEFAULT '0' COMMENT '0默认1抢购2团购3优惠促销4预售5虚拟(5其实没用)6拼团',
  `prom_id` int(11) DEFAULT '0' COMMENT '优惠活动id',
  `commission` decimal(10,2) DEFAULT '0.00' COMMENT '佣金用于分销分成',
  `spu` varchar(128) DEFAULT '' COMMENT 'SPU',
  `sku` varchar(128) DEFAULT '' COMMENT 'SKU',
  `shipping_area_ids` varchar(255) NOT NULL DEFAULT '' COMMENT '配送物流shipping_area_id,以逗号分隔',
  `fenxiao_1` decimal(12,2) DEFAULT '0.00' COMMENT '一级分享得佣金，单位：元',
  `fenxiao_2` decimal(12,2) DEFAULT '0.00' COMMENT '二级分销得佣金，单位：元',
  `fenxiao_3` decimal(12,2) DEFAULT '0.00' COMMENT '三级分销得佣金，单位：元',
  `cx_price` decimal(12,2) DEFAULT '0.00' COMMENT '促销价格',
  `cx_start_time` int(20) DEFAULT NULL COMMENT '促销开始时间',
  `cx_end_time` int(20) DEFAULT NULL COMMENT '促销结束时间',
  `group_price2` decimal(12,2) DEFAULT '0.00' COMMENT '2人团价格',
  `group_price3` decimal(12,2) DEFAULT '0.00' COMMENT '3人团价格',
  `country_cat_id` int(12) DEFAULT NULL COMMENT '地域馆一级菜单',
  `country_cat_id_2` int(12) DEFAULT NULL COMMENT '地域馆二级菜单',
  `pack_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '优惠组合商品id',
  `pack_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '优惠套餐价',
  `is_pack_price` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有优惠套餐',
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_number` (`store_count`),
  KEY `goods_weight` (`weight`),
  KEY `sort_order` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

#
# Data for table "jh_goods"
#

INSERT INTO `jh_goods` VALUES (144,135,0,'TP0000144','HEMP hearts 五谷杂粮融合燕麦',88,0,10000,1,100,100.00,300.00,0.00,'a:2:{i:0;a:2:{s:6:\"amount\";i:100;s:5:\"price\";d:5;}i:1;a:2:{s:6:\"amount\";i:200;s:5:\"price\";d:20;}}','','很好。。。。。。。。。','&lt;p&gt;萨达萨达萨达萨达是&lt;/p&gt;','/public/upload/goods/2018/03-26/2f2fd2ac698dc4f129c39c9591467fd7.png',0,-28800,0,1,1,0,1522474725,50,0,1,0,0,0,0,0,NULL,0,0,0,0,0.00,'','','',2.00,1.00,0.50,20.00,0,0,28.00,25.00,1,18,0,0.00,0),(145,3,0,'TP0000145','测试商品2',231,194,9999,0,23,3000.00,1000.00,0.00,'','','v测试商品2','&lt;p&gt;萨达萨达萨达&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/public/upload/article/2018/03-18/f6bc1368ba9621bf7596be28296f0f3d.jpg&quot; alt=&quot;f6bc1368ba9621bf7596be28296f0f3d.jpg&quot;/&gt;&lt;/p&gt;','/public/upload/goods/thumb/143/goods_thumb_143_400_400.png',0,-28800,0,1,1,1,1523177152,50,0,1,0,0,0,0,0,NULL,0,1,0,0,0.00,'','','',3.00,2.00,1.00,60.00,1522252800,1522339200,90.00,80.00,1,18,0,0.00,0);
