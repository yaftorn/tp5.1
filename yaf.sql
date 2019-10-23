/*
Navicat MySQL Data Transfer

Source Server         : localhost3306
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : yaf

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2019-09-30 17:51:10
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of yaf_admin
-- ----------------------------
INSERT INTO `yaf_admin` VALUES ('1', '15090674342', 'e10adc3949ba59abbe56e057f20f883e', '1558574585', '1569721250', '127.0.0.1', '1', '0');

-- ----------------------------
-- Table structure for yaf_article
-- ----------------------------
DROP TABLE IF EXISTS `yaf_article`;
CREATE TABLE `yaf_article` (
  `article_id` int(11) NOT NULL COMMENT '文章主键id',
  `article_title` varchar(100) NOT NULL COMMENT '文章标题',
  `article_keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `article_description` varchar(255) DEFAULT NULL COMMENT '描述',
  `artilce_content` text NOT NULL COMMENT '内容',
  `article_thumb` varchar(255) NOT NULL COMMENT '缩略图',
  `article_moreimg` text COMMENT '多图',
  `article_author` varchar(255) DEFAULT NULL COMMENT '作者',
  `article_sort` int(10) NOT NULL DEFAULT '0' COMMENT '排序',
  `artilce_status` int(2) NOT NULL DEFAULT '1' COMMENT '状态 0不显示 1显示',
  `article_recommend` int(2) NOT NULL DEFAULT '0' COMMENT '推荐 0 不推荐 1 推荐',
  `article_views` int(10) NOT NULL DEFAULT '0' COMMENT '点击量',
  `category_id` int(11) NOT NULL COMMENT '分类id',
  `article_addtime` int(50) NOT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yaf_article
-- ----------------------------

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yaf_article_category
-- ----------------------------
INSERT INTO `yaf_article_category` VALUES ('1', '新闻中心', '1', 'hangyedongtai', '0');
INSERT INTO `yaf_article_category` VALUES ('4', '官方公告', '0', '', '0');
INSERT INTO `yaf_article_category` VALUES ('6', '行业动态', '0', '', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='导航表';

-- ----------------------------
-- Records of yaf_limit
-- ----------------------------
INSERT INTO `yaf_limit` VALUES ('17', '管理员列表', 'admin', 'auth', 'adminList', '16', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('18', '角色列表', 'admin', 'auth', 'roleList', '16', '1', '1', '1');
INSERT INTO `yaf_limit` VALUES ('19', '导航列表', 'admin', 'auth', 'navList', '16', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('46', '删除角色', 'admin', 'auth', 'delRole', '18', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('45', '编辑角色', 'admin', 'auth', 'editRole', '18', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('16', '权限管理', 'admin', 'admin', '', '0', 'layui-icon-auz', '1', '1');
INSERT INTO `yaf_limit` VALUES ('1', '首页', 'admin', 'index', 'index', '0', 'layui-icon-app', '1', '0');
INSERT INTO `yaf_limit` VALUES ('30', '添加导航', 'admin', 'auth', 'addNav', '19', '', '0', '1');
INSERT INTO `yaf_limit` VALUES ('47', '删除管理员', 'admin', 'auth', 'delAdmin', '17', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('31', '编辑导航', 'admin', 'auth', 'editNav', '19', '', '0', '2');
INSERT INTO `yaf_limit` VALUES ('33', '添加管理员', 'admin', 'auth', 'addAdmin', '17', '', '0', '1');
INSERT INTO `yaf_limit` VALUES ('34', '编辑管理员', 'admin', 'auth', 'editAdmin', '17', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('35', '添加角色', 'admin', 'auth', 'addRole', '18', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('37', '设置', 'admin', 'set', '', '0', 'layui-icon-set', '1', '0');
INSERT INTO `yaf_limit` VALUES ('38', '基本设置', 'admin', 'set', 'setInfo', '37', '', '1', '1');
INSERT INTO `yaf_limit` VALUES ('39', '轮播图管理', 'admin', 'slider', '', '0', 'layui-icon-carousel', '0', '0');
INSERT INTO `yaf_limit` VALUES ('40', '轮播图位置', 'admin', 'slider', 'typeList', '39', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('41', '轮播图列表', 'admin', 'slider', 'sliderList', '39', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('42', '添加位置', 'admin', 'slider', 'addType', '40', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('43', '编辑位置', 'admin', 'slider', 'editType', '40', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('44', '删除位置', 'admin', 'slider', 'delType', '40', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('48', '删除导航', 'admin', 'auth', 'delNav', '19', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('49', '文章管理', 'admin', 'article', '', '0', 'layui-icon-read', '1', '0');
INSERT INTO `yaf_limit` VALUES ('50', '文章分类', 'admin', 'article', 'categoryList', '49', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('51', '文章列表', 'admin', 'article', 'articleList', '49', '', '1', '0');
INSERT INTO `yaf_limit` VALUES ('52', '添加分类', 'admin', 'article', 'addCategory', '50', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('53', '编辑分类', 'admin', 'article', 'editCategory', '50', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('54', '删除分类', 'admin', 'article', 'delCategory', '50', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('55', '添加文章', 'admin', 'article', 'addArtilce', '51', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('56', '编辑文章', 'admin', 'article', 'editArticle', '51', '', '0', '0');
INSERT INTO `yaf_limit` VALUES ('57', '删除文章', 'admin', 'article', 'delArticle', '51', '', '0', '0');

-- ----------------------------
-- Table structure for yaf_member
-- ----------------------------
DROP TABLE IF EXISTS `yaf_member`;
CREATE TABLE `yaf_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员主键id',
  `member_head` varchar(255) NOT NULL,
  `member_nickname` varchar(255) NOT NULL,
  `openid` varchar(255) NOT NULL,
  `member_gender` int(2) NOT NULL COMMENT '0未知 1男 2女',
  `member_county` varchar(255) DEFAULT NULL,
  `member_province` varchar(255) DEFAULT NULL,
  `member_city` varchar(255) DEFAULT NULL,
  `member_language` varchar(255) DEFAULT NULL COMMENT 'en 英文  zh_CN简体中文 zh_TW繁体中文',
  `addtime` int(11) NOT NULL,
  `user_unionid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yaf_member
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
INSERT INTO `yaf_role` VALUES ('2', '编辑人员', '[\"1\"]', '1558597662');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  PRIMARY KEY (`slider_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='轮播图';

-- ----------------------------
-- Records of yaf_slider
-- ----------------------------

-- ----------------------------
-- Table structure for yaf_slider_type
-- ----------------------------
DROP TABLE IF EXISTS `yaf_slider_type`;
CREATE TABLE `yaf_slider_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(255) DEFAULT NULL COMMENT '位置名称',
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='轮播图位置';

-- ----------------------------
-- Records of yaf_slider_type
-- ----------------------------
