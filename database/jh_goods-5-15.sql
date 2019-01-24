# Host: localhost  (Version: 5.5.53)
# Date: 2018-05-15 01:21:53
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "jh_goods"
#

DROP TABLE IF EXISTS `jh_goods`;
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
  `exchange_integral` int(10) NOT NULL DEFAULT '0' COMMENT '积分兑换：0不参与积分兑换，积分和现金的兑换比例见后台配置',
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
  `pack_id` char(50) NOT NULL DEFAULT '0' COMMENT '优惠组合商品id',
  `is_pack_price` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否有优惠套餐',
  `pack_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '优惠套餐价',
  `tax_price` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '税费',
  `declare` varchar(120) NOT NULL DEFAULT '支持七天无忧退货' COMMENT '说明',
  PRIMARY KEY (`goods_id`),
  KEY `goods_sn` (`goods_sn`),
  KEY `cat_id` (`cat_id`),
  KEY `last_update` (`last_update`),
  KEY `brand_id` (`brand_id`),
  KEY `goods_number` (`store_count`),
  KEY `goods_weight` (`weight`),
  KEY `sort_order` (`sort`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

#
# Data for table "jh_goods"
#

/*!40000 ALTER TABLE `jh_goods` DISABLE KEYS */;
INSERT INTO `jh_goods` VALUES (1,11,0,'TP0000001','法国进口红酒 拉菲（LAFITE）',74,17,100,0,110,188.00,178.00,0.00,'','','传奇波尔多干红葡萄酒 双支礼盒装带酒具 750ml*2瓶','&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/43c3215993876683c85ba24ceeed22ca.jpg&quot; title=&quot;43c3215993876683c85ba24ceeed22ca.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/82d807ca038f0e33bf68e7dddfa91c82.jpg&quot; title=&quot;82d807ca038f0e33bf68e7dddfa91c82.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/d8628d266f3f76c5372986062ca48e2c.jpg&quot; title=&quot;d8628d266f3f76c5372986062ca48e2c.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/a00a5bf198c8337d10d1f40983b89db4.jpg&quot; title=&quot;a00a5bf198c8337d10d1f40983b89db4.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/46c802b695e58c69f55d42dd54ca4a16.jpg&quot; title=&quot;46c802b695e58c69f55d42dd54ca4a16.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/4554ea742c085be46c18252ac56f7bf3.jpg&quot; title=&quot;4554ea742c085be46c18252ac56f7bf3.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/1c59a3eab782fd240aff52ba97519c8a.jpg&quot; title=&quot;1c59a3eab782fd240aff52ba97519c8a.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/a1277bf259e1cef63fe36876ec9ecb15.jpg&quot; title=&quot;a1277bf259e1cef63fe36876ec9ecb15.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/d53ed495aa2a841b6231ca9800b87c71.jpg&quot; title=&quot;d53ed495aa2a841b6231ca9800b87c71.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/59f57bfedf91b5935af90ae6fe758e21.jpg&quot; title=&quot;59f57bfedf91b5935af90ae6fe758e21.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/40595fddb40489e8fd2053015440fe59.jpg&quot; title=&quot;40595fddb40489e8fd2053015440fe59.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/012ef97c2bfe8014b77fb64cad19666e.jpg&quot; title=&quot;012ef97c2bfe8014b77fb64cad19666e.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;br/&gt;&lt;/p&gt;','/public/upload/goods/2018/04-17/c14af6c87adca59d3ff4cb79abae95d6.jpg',0,-28800,0,1,1,1,1525876414,50,0,1,1,0,0,0,0,0,0,0,0,0,0.00,'','','',0.00,0.00,0.00,0.00,0,0,175.00,170.00,1,18,'2+1',1,0.00,0.32,'支持七天无忧退货'),(2,7,0,'TP0000002','香纳兰',27,1,100,0,0,80.00,79.00,0.00,'','','泰米 原粮进口 湄菩诗泰国香米大米 5kg','&lt;p style=&quot;text-align: center&quot;&gt;&lt;video class=&quot;edui-upload-video  vjs-default-skin video-js&quot; controls=&quot;&quot; preload=&quot;none&quot; width=&quot;697&quot; height=&quot;333&quot; src=&quot;/public/upload/temp/2018/04-17/8dbf3ccba1566623a304f34f0051fdd6.mp4&quot; data-setup=&quot;{}&quot;&gt;&lt;/video&gt;&lt;/p&gt;&lt;p style=&quot;text-align:center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/79570ec66b9009257c47f366c29adfd5.jpg&quot; title=&quot;79570ec66b9009257c47f366c29adfd5.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/02d36235e18c4b73083cd5ce097366d3.jpg&quot; title=&quot;02d36235e18c4b73083cd5ce097366d3.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/29b46bf2f498b2e5d3665d2802863c21.jpg&quot; title=&quot;29b46bf2f498b2e5d3665d2802863c21.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/cc125c34800bd0e45a23d315e0597d3e.jpg&quot; title=&quot;cc125c34800bd0e45a23d315e0597d3e.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/8c420c53c159eea8f48a2a8e24feff8f.jpg&quot; title=&quot;8c420c53c159eea8f48a2a8e24feff8f.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center&quot;&gt;&lt;img src=&quot;/public/upload/temp/2018/04-17/2f691358322994c4207bd0998bdda3f1.jpg&quot; title=&quot;2f691358322994c4207bd0998bdda3f1.jpg&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-align: center;&quot;&gt;&lt;br/&gt;&lt;/p&gt;','/public/upload/goods/2018/04-17/fc52d1f652cb6b7703e65c231f37892a.jpg',0,-28800,0,1,1,1,1523978630,50,1,1,0,0,0,0,0,0,0,0,0,0,0.00,'','','24,37,25,35,36,38,39',0.00,0.00,0.00,0.00,0,0,75.00,70.00,5,10,'0',0,0.00,0.15,'支持七天无忧退货');
/*!40000 ALTER TABLE `jh_goods` ENABLE KEYS */;
