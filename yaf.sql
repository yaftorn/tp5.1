/*
Navicat MySQL Data Transfer

Source Server         : localhost3306
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : yaf

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-10-23 18:51:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for yaf_admin
-- ----------------------------
DROP TABLE IF EXISTS `yaf_admin`;
CREATE TABLE `yaf_admin` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_account` varchar(255) NOT NULL COMMENT '管理员账号',
  `admin_password` varchar(255) NOT NULL COMMENT '管理员密码',
  `admin_addtime` int(20) NOT NULL COMMENT '管理添加时间',
  `admin_endtime` int(20) DEFAULT NULL COMMENT '管理员最后登录时间',
  `admin_ip` varchar(255) DEFAULT NULL COMMENT '登录ip',
  `role_id` int(4) DEFAULT NULL COMMENT '角色id',
  `status` int(4) NOT NULL DEFAULT '0' COMMENT '0正常 1冻结',
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of yaf_admin
-- ----------------------------
INSERT INTO `yaf_admin` VALUES ('1', '15090674342', 'e10adc3949ba59abbe56e057f20f883e', '1558574585', '1571826665', '127.0.0.1', '1', '0');
INSERT INTO `yaf_admin` VALUES ('8', '123456', 'e10adc3949ba59abbe56e057f20f883e', '1571361083', '1571361692', '127.0.0.1', '2', '0');

-- ----------------------------
-- Table structure for yaf_article
-- ----------------------------
DROP TABLE IF EXISTS `yaf_article`;
CREATE TABLE `yaf_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章主键id',
  `article_title` varchar(100) NOT NULL COMMENT '文章标题',
  `article_keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `article_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `article_content` text COMMENT '内容',
  `article_thumb` varchar(255) DEFAULT NULL COMMENT '缩略图',
  `article_moreimg` text COMMENT '多图',
  `article_author` varchar(255) DEFAULT NULL COMMENT '来源',
  `article_sort` int(10) DEFAULT '0' COMMENT '排序',
  `artilce_status` int(2) DEFAULT '1' COMMENT '状态 0不显示 1显示',
  `article_recommend` int(2) DEFAULT '0' COMMENT '推荐 0 不推荐 1 推荐',
  `article_views` int(10) DEFAULT '0' COMMENT '点击量',
  `category_id` int(11) DEFAULT NULL COMMENT '分类id',
  `article_addtime` int(50) DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of yaf_article
-- ----------------------------
INSERT INTO `yaf_article` VALUES ('1', '文章标题', '文章标题', '文章标题', '<p><img src=\"../../public/uploads/20191017/f3c7e2efda92a87766d08a63d5d92d8a.jpg\" alt=\"\" width=\"258\" height=\"258\" />阿萨斯</p>', '/public/uploads/20191017/c16420809c8d441b9aaa394a260e2101.jpg', '[\"\\/public\\/uploads\\/20191017\\/329388644c582773def946824f68551c.jpg\",\"\\/public\\/uploads\\/20191017\\/75dff6ab03fbe1b05feecef71ba0603b.jpg\"]', '文章标题', '0', '0', '1', '0', '6', '1571306001');

-- ----------------------------
-- Table structure for yaf_article_category
-- ----------------------------
DROP TABLE IF EXISTS `yaf_article_category`;
CREATE TABLE `yaf_article_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) NOT NULL DEFAULT '0' COMMENT '分类标题',
  `sort` int(10) DEFAULT '0' COMMENT '排序',
  `category_ftitle` varchar(255) DEFAULT NULL COMMENT '分类副标题',
  `parent_id` int(11) DEFAULT '0' COMMENT '父id',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of yaf_article_category
-- ----------------------------
INSERT INTO `yaf_article_category` VALUES ('1', '新闻中心', '1', 'hangyedongtai', '0');
INSERT INTO `yaf_article_category` VALUES ('4', '官方公告', '0', '', '0');

-- ----------------------------
-- Table structure for yaf_goods
-- ----------------------------
DROP TABLE IF EXISTS `yaf_goods`;
CREATE TABLE `yaf_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品主键id',
  `goods_name` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `category_id` int(11) DEFAULT NULL COMMENT '分类id',
  `goods_description` varchar(255) DEFAULT NULL COMMENT '商品摘要',
  `goods_thumb` varchar(255) DEFAULT NULL COMMENT '商品缩略图',
  `goods_photos` varchar(255) DEFAULT NULL COMMENT '商品相册',
  `goods_value` int(2) DEFAULT '0' COMMENT '0单属性  1多属性',
  `market_price` decimal(10,2) DEFAULT NULL COMMENT '市场价',
  `sell_price` decimal(10,2) DEFAULT NULL COMMENT '售价',
  `cost_price` decimal(10,2) DEFAULT NULL COMMENT '成本价',
  `goods_content` text COMMENT '详情',
  `sales` int(11) DEFAULT NULL COMMENT '销量',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `goods_status` int(2) DEFAULT '1' COMMENT '0不上架 1上架',
  `recommend` int(2) DEFAULT NULL COMMENT '0不推荐  1推荐',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of yaf_goods
-- ----------------------------

-- ----------------------------
-- Table structure for yaf_goods_category
-- ----------------------------
DROP TABLE IF EXISTS `yaf_goods_category`;
CREATE TABLE `yaf_goods_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_title` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of yaf_goods_category
-- ----------------------------
INSERT INTO `yaf_goods_category` VALUES ('1', '测试', '1', null, '0');
INSERT INTO `yaf_goods_category` VALUES ('3', '测试2', '1', null, '1');

-- ----------------------------
-- Table structure for yaf_goods_key
-- ----------------------------
DROP TABLE IF EXISTS `yaf_goods_key`;
CREATE TABLE `yaf_goods_key` (
  `key_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL COMMENT '商品分类',
  `key_name` varchar(255) DEFAULT NULL,
  `addtime` int(11) DEFAULT NULL,
  `sort` int(4) DEFAULT NULL,
  PRIMARY KEY (`key_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='商品属性表';

-- ----------------------------
-- Records of yaf_goods_key
-- ----------------------------
INSERT INTO `yaf_goods_key` VALUES ('12', '1', '颜色', '1571389829', '1');
INSERT INTO `yaf_goods_key` VALUES ('13', '0', '尺寸', '1571642169', '0');

-- ----------------------------
-- Table structure for yaf_goods_value
-- ----------------------------
DROP TABLE IF EXISTS `yaf_goods_value`;
CREATE TABLE `yaf_goods_value` (
  `value_id` int(11) NOT NULL AUTO_INCREMENT,
  `key_id` int(11) DEFAULT NULL,
  `value_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`value_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='商品属性表内容';

-- ----------------------------
-- Records of yaf_goods_value
-- ----------------------------
INSERT INTO `yaf_goods_value` VALUES ('14', '12', '紫色');
INSERT INTO `yaf_goods_value` VALUES ('15', '12', '黑色');
INSERT INTO `yaf_goods_value` VALUES ('16', '13', '小号');
INSERT INTO `yaf_goods_value` VALUES ('17', '13', '米');
INSERT INTO `yaf_goods_value` VALUES ('18', '13', '升');

-- ----------------------------
-- Table structure for yaf_limit
-- ----------------------------
DROP TABLE IF EXISTS `yaf_limit`;
CREATE TABLE `yaf_limit` (
  `limit_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `limit_name` varchar(20) NOT NULL COMMENT '权限名称',
  `module` varchar(50) NOT NULL COMMENT '模块名',
  `controller` varchar(50) NOT NULL COMMENT '控制器名',
  `action` varchar(50) NOT NULL COMMENT '方法名',
  `parent_id` int(11) NOT NULL COMMENT '上级权限',
  `icon` varchar(50) DEFAULT NULL COMMENT '图标',
  `display` int(4) NOT NULL DEFAULT '1' COMMENT '0不显示 1显示',
  `sort` int(4) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`limit_id`)
) ENGINE=MyISAM AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 COMMENT='导航表';

-- ----------------------------
-- Records of yaf_limit
-- ----------------------------
INSERT INTO `yaf_limit` VALUES ('17', '管理员列表', 'admin', 'auth', 'adminList', '16', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('18', '角色列表', 'admin', 'auth', 'roleList', '16', '1', '1', '1');
INSERT INTO `yaf_limit` VALUES ('19', '导航列表', 'admin', 'auth', 'navList', '16', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('46', '删除角色', 'admin', 'auth', 'delRole', '18', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('45', '编辑角色', 'admin', 'auth', 'editRole', '18', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('16', '权限管理', 'admin', 'admin', '', '0', 'layui-icon-auz', '1', '1');
INSERT INTO `yaf_limit` VALUES ('1', '首页', 'admin', 'index', 'index', '0', 'layui-icon-app', '1', '0');
INSERT INTO `yaf_limit` VALUES ('30', '添加导航', 'admin', 'auth', 'addNav', '19', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('47', '删除管理员', 'admin', 'auth', 'delAdmin', '17', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('31', '编辑导航', 'admin', 'auth', 'editNav', '19', '', '1', '2');
INSERT INTO `yaf_limit` VALUES ('33', '添加管理员', 'admin', 'auth', 'addAdmin', '17', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('34', '编辑管理员', 'admin', 'auth', 'editAdmin', '17', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('35', '添加角色', 'admin', 'auth', 'addRole', '18', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('37', '设置', 'admin', 'set', '', '0', 'layui-icon-set', '1', '0');
INSERT INTO `yaf_limit` VALUES ('38', '基本设置', 'admin', 'set', 'setInfo', '37', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('39', '轮播图管理', 'admin', 'slider', '', '0', 'layui-icon-carousel', '1', '0');
INSERT INTO `yaf_limit` VALUES ('40', '轮播图位置', 'admin', 'slider', 'typeList', '39', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('41', '轮播图列表', 'admin', 'slider', 'sliderList', '39', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('42', '添加位置', 'admin', 'slider', 'addType', '40', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('43', '编辑位置', 'admin', 'slider', 'editType', '40', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('44', '删除位置', 'admin', 'slider', 'delType', '40', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('48', '删除导航', 'admin', 'auth', 'delNav', '19', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('49', '文章管理', 'admin', 'article', '', '0', 'layui-icon-read', '1', '0');
INSERT INTO `yaf_limit` VALUES ('50', '文章分类', 'admin', 'article', 'categoryList', '49', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('51', '文章列表', 'admin', 'article', 'articleList', '49', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('52', '添加分类', 'admin', 'article', 'addCategory', '50', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('53', '编辑分类', 'admin', 'article', 'editCategory', '50', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('54', '删除分类', 'admin', 'article', 'delCategory', '50', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('55', '添加文章', 'admin', 'article', 'addArtilce', '51', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('56', '编辑文章', 'admin', 'article', 'editArticle', '51', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('57', '删除文章', 'admin', 'article', 'delArticle', '51', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('58', '添加文章', 'admin', 'article', 'addArticle', '51', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('59', '添加轮播图', 'admin', 'slider', 'addSlider', '41', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('60', '编辑轮播图', 'admin', 'slider', 'editSlider', '41', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('61', '删除轮播图', 'admin', 'slider', 'delSlider', '41', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('62', '商品管理', 'admin', 'goods', '', '0', 'layui-icon-cart-simple', '1', '5');
INSERT INTO `yaf_limit` VALUES ('63', '商品列表', 'admin', 'goods', 'goodsList', '62', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('64', '商品分类', 'admin', 'goods', 'goodsCategory', '62', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('65', '添加分类', 'admin', 'goods', 'addCategory', '64', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('66', '编辑分类', 'admin', 'goods', 'editCategory', '64', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('67', '删除分类', 'admin', 'goods', 'delCategory', '64', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('68', '添加商品', 'admin', 'goods', 'addGoods', '63', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('69', '编辑商品', 'admin', 'goods', 'editGoods', '63', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('70', '删除商品', 'admin', 'goods', 'delGoods', '63', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('71', '商品属性', 'admin', 'Goods', 'goodsKey', '62', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('72', '添加属性', 'admin', 'goods', 'addKey', '71', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('73', '编辑属性', 'admin', 'gooda', 'editGoods', '71', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('74', '删除属性', 'admin', 'goods', 'delKey', '71', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('75', '会员管理', 'admin', 'member', '', '0', 'layui-icon-user', '1', '0');
INSERT INTO `yaf_limit` VALUES ('76', '会员列表', 'admin', 'member', 'memberList', '75', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('77', '会员详情', 'admin', 'member', 'memberInfo', '76', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('78', '删除会员', 'admin', 'member', 'delMember', '76', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('79', '订单管理', 'admin', 'orders', 'ordersList', '0', 'layui-icon-form', '1', '0');
INSERT INTO `yaf_limit` VALUES ('80', '订单列表', 'admin', 'orders', 'ordersList', '79', '', '1', '0');

-- ----------------------------
-- Table structure for yaf_member
-- ----------------------------
DROP TABLE IF EXISTS `yaf_member`;
CREATE TABLE `yaf_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员主键id',
  `member_head` varchar(255) NOT NULL COMMENT '会员头像',
  `member_nickname` varchar(255) NOT NULL COMMENT '会员昵称',
  `openid` varchar(255) NOT NULL,
  `member_gender` int(2) NOT NULL COMMENT '0未知 1男 2女',
  `member_county` varchar(255) DEFAULT NULL,
  `member_province` varchar(255) DEFAULT NULL,
  `member_city` varchar(255) DEFAULT NULL,
  `member_language` varchar(255) DEFAULT NULL COMMENT 'en 英文  zh_CN简体中文 zh_TW繁体中文',
  `addtime` int(11) NOT NULL,
  `user_unionid` varchar(255) DEFAULT NULL,
  `member_tel` varchar(255) DEFAULT NULL COMMENT '手机号',
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of yaf_member
-- ----------------------------
INSERT INTO `yaf_member` VALUES ('2', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for yaf_orders
-- ----------------------------
DROP TABLE IF EXISTS `yaf_orders`;
CREATE TABLE `yaf_orders` (
  `orders_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_sn` varchar(255) DEFAULT NULL,
  `orders_state` int(4) NOT NULL DEFAULT '0' COMMENT '订单状态（0 待支付 1已支付，待发货 2已发货，待收货 3完成，待评价 ）',
  `orders_price` decimal(10,2) DEFAULT NULL COMMENT '订单价格',
  `pay_type` int(4) DEFAULT NULL COMMENT '支付方式 0余额支付 1微信支付 2支付宝支付',
  `pay_price` decimal(10,2) DEFAULT NULL COMMENT '支付金额',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  `addtime` int(11) DEFAULT NULL,
  `postage` decimal(10,2) DEFAULT NULL COMMENT '邮费',
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `pay_time` int(11) DEFAULT NULL COMMENT '支付时间',
  `goods_name` varchar(255) DEFAULT NULL,
  `goods_thumb` varchar(255) DEFAULT NULL,
  `goods_price` decimal(10,2) DEFAULT NULL,
  `post_time` int(11) DEFAULT NULL COMMENT '发货时间',
  `post_name` varchar(255) DEFAULT NULL COMMENT '物流名称',
  `post_sn` varchar(255) DEFAULT NULL COMMENT '运单号',
  `suretime` int(11) DEFAULT NULL COMMENT '确定收货时间',
  PRIMARY KEY (`orders_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yaf_orders
-- ----------------------------
INSERT INTO `yaf_orders` VALUES ('1', '1', '2', '1.00', '1', null, '11', null, null, null, null, null, null, null, null, null, null, null, '1571823379', '阿达', '1111', null);

-- ----------------------------
-- Table structure for yaf_oredrs_goods
-- ----------------------------
DROP TABLE IF EXISTS `yaf_oredrs_goods`;
CREATE TABLE `yaf_oredrs_goods` (
  `orders_goods_id` int(11) NOT NULL AUTO_INCREMENT,
  `orders_id` int(11) DEFAULT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `goods_name` varchar(255) DEFAULT NULL,
  `goods_thumb` varchar(255) DEFAULT NULL,
  `goods_price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`orders_goods_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yaf_oredrs_goods
-- ----------------------------

-- ----------------------------
-- Table structure for yaf_role
-- ----------------------------
DROP TABLE IF EXISTS `yaf_role`;
CREATE TABLE `yaf_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(50) NOT NULL COMMENT '角色名称',
  `role_auth` varchar(255) DEFAULT NULL COMMENT '角色权限集合（json字符串）',
  `role_addtime` int(50) NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of yaf_role
-- ----------------------------
INSERT INTO `yaf_role` VALUES ('1', '总管理员', '[\"1\"]', '1558517925');
INSERT INTO `yaf_role` VALUES ('2', '编辑人员', '[\"16\",\"18\",\"46\",\"45\",\"35\",\"19\",\"48\",\"30\",\"31\",\"17\",\"47\",\"34\",\"33\"]', '1558597662');

-- ----------------------------
-- Table structure for yaf_session
-- ----------------------------
DROP TABLE IF EXISTS `yaf_session`;
CREATE TABLE `yaf_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `session_id` varchar(255) NOT NULL,
  `session_key` varchar(255) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `unionid` varchar(255) DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  `oldtime` int(11) NOT NULL COMMENT 'session_key过期时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='session表';

-- ----------------------------
-- Records of yaf_session
-- ----------------------------

-- ----------------------------
-- Table structure for yaf_site
-- ----------------------------
DROP TABLE IF EXISTS `yaf_site`;
CREATE TABLE `yaf_site` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '网站设置主键id',
  `site_title` text COMMENT '网站title',
  `site_keywords` text COMMENT '网站关键词',
  `site_description` text COMMENT '网站描述',
  `site_logo` varchar(255) DEFAULT NULL COMMENT '网站logo',
  `site_copyright` text COMMENT '版权信息',
  `site_icp` varchar(255) DEFAULT NULL COMMENT '备案信息',
  `site_code` varchar(255) DEFAULT NULL COMMENT '网站二维码',
  `site_tel` varchar(50) DEFAULT NULL COMMENT '联系电话',
  `site_phone` varchar(20) DEFAULT NULL COMMENT 'l联系手机号',
  `site_name` varchar(255) DEFAULT NULL COMMENT '网站名称',
  `file_size` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `site_email` varchar(255) DEFAULT NULL,
  `appid` varchar(50) DEFAULT NULL COMMENT '小程序appid',
  `appsecret` varchar(50) DEFAULT NULL COMMENT 'appsecret',
  `key` varchar(50) DEFAULT NULL COMMENT '商户密匙',
  `mchid` int(11) DEFAULT NULL COMMENT '商户号',
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='基本设置';

-- ----------------------------
-- Records of yaf_site
-- ----------------------------
INSERT INTO `yaf_site` VALUES ('1', '网站标题', '关键词                                                                                                                                                                                                                                       ', '站点描述站点描述站点描述站点描述站点描述站点描述站点描述站点描述站点描述站点描述站点描述站点描述站点描述站点描述', '/public/uploads/20190925/14375288f7ec758a5b2bef57e27bedd6.png', '版权信息', '版权信息', '/public/uploads/20190925/588b667968bfc0411d5b0ef32d152db2.jpg', '400-400-400', '15090674342', '后台管理', '2048', 'png|gif|jpg|jpeg|zip|rar', '841097322@qq.ocm', '1111', '22222222222', '3333333', '4444444');

-- ----------------------------
-- Table structure for yaf_slider
-- ----------------------------
DROP TABLE IF EXISTS `yaf_slider`;
CREATE TABLE `yaf_slider` (
  `slider_id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_thumb` varchar(255) DEFAULT NULL COMMENT '轮播图',
  `type_id` int(11) DEFAULT NULL COMMENT '位置id',
  `slider_status` int(2) DEFAULT NULL COMMENT '0不显示 1显示',
  `slider_addtime` int(11) DEFAULT NULL COMMENT '添加时间',
  `slider_sort` int(4) DEFAULT NULL COMMENT '排序',
  `slider_name` varchar(10) DEFAULT NULL COMMENT '轮播图名称',
  `slider_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='轮播图';

-- ----------------------------
-- Records of yaf_slider
-- ----------------------------
INSERT INTO `yaf_slider` VALUES ('2', '/public/uploads/20191017/7874a1d4a41a88e868ea2354f31c8025.jpg', '2', '1', null, '0', '轮播图', '');

-- ----------------------------
-- Table structure for yaf_slider_type
-- ----------------------------
DROP TABLE IF EXISTS `yaf_slider_type`;
CREATE TABLE `yaf_slider_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL COMMENT '位置名称',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='轮播图位置';

-- ----------------------------
-- Records of yaf_slider_type
-- ----------------------------
INSERT INTO `yaf_slider_type` VALUES ('1', '电脑端');
INSERT INTO `yaf_slider_type` VALUES ('2', '手机端');
