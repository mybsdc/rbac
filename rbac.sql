/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : rbac

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-08-03 21:51:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for llf_access
-- ----------------------------
DROP TABLE IF EXISTS `llf_access`;
CREATE TABLE `llf_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '0' COMMENT '权限页面的标题',
  `url` varchar(100) NOT NULL DEFAULT '0' COMMENT '页面对应的url，这里用json存储',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '权限是否有效 1 有效 0 无效',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `update_time` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='luolongf 权限表';

-- ----------------------------
-- Records of llf_access
-- ----------------------------
INSERT INTO `llf_access` VALUES ('3', '权限A', '[\"9999999999\\r\",\"2222\"]', '1', '1501338890', '1501460467');
INSERT INTO `llf_access` VALUES ('4', '权限B', '[\"test1\\r\",\"test2\"]', '1', '1501338909', '1501460435');
INSERT INTO `llf_access` VALUES ('5', '权限C', '[\"\\/home\\/test\\/test1\"]', '1', '1501427508', '0');
INSERT INTO `llf_access` VALUES ('6', '权限D', '[\"\\/home\\/test\\/page2\"]', '1', '1501427549', '0');
INSERT INTO `llf_access` VALUES ('7', '用户管理页面', '[\"home\\/user\\/index\\r\",\"home\\/user\\/setUser\"]', '1', '1501685962', '1501685996');

-- ----------------------------
-- Table structure for llf_role
-- ----------------------------
DROP TABLE IF EXISTS `llf_role`;
CREATE TABLE `llf_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '角色状态 1 有效 0 无效',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='luolongf 角色表';

-- ----------------------------
-- Records of llf_role
-- ----------------------------
INSERT INTO `llf_role` VALUES ('23', '主编', '1', '1501140799', '1501460515');
INSERT INTO `llf_role` VALUES ('24', '运营', '1', '1501140809', '1501140809');
INSERT INTO `llf_role` VALUES ('25', '管理', '1', '1501140822', '1501460511');
INSERT INTO `llf_role` VALUES ('26', '大总裁', '1', '1501140835', '1501460506');
INSERT INTO `llf_role` VALUES ('27', '用户管理员', '1', '1501685915', '1501685915');

-- ----------------------------
-- Table structure for llf_role_access
-- ----------------------------
DROP TABLE IF EXISTS `llf_role_access`;
CREATE TABLE `llf_role_access` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应role的id字段',
  `access_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应access表的id字段',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='luolongf 角色权限对应表';

-- ----------------------------
-- Records of llf_role_access
-- ----------------------------
INSERT INTO `llf_role_access` VALUES ('32', '27', '7', '1501686013');

-- ----------------------------
-- Table structure for llf_user
-- ----------------------------
DROP TABLE IF EXISTS `llf_user`;
CREATE TABLE `llf_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '用户名',
  `pwd` char(32) NOT NULL COMMENT '用户密码',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否管理员',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态 1 启用 0禁用',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='luolongf 用户表';

-- ----------------------------
-- Records of llf_user
-- ----------------------------
INSERT INTO `llf_user` VALUES ('20', '飞飞', 'e10adc3949ba59abbe56e057f20f883e', '2@qq.com', '0', '1', '1501655312', '1501686031');

-- ----------------------------
-- Table structure for llf_user_role
-- ----------------------------
DROP TABLE IF EXISTS `llf_user_role`;
CREATE TABLE `llf_user_role` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应user表的id',
  `role_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对应role表的id字段',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='luolongf 用户角色对应表';

-- ----------------------------
-- Records of llf_user_role
-- ----------------------------
INSERT INTO `llf_user_role` VALUES ('6', '16', '26', '1501228459');
INSERT INTO `llf_user_role` VALUES ('7', '16', '25', '1501228460');
INSERT INTO `llf_user_role` VALUES ('8', '16', '24', '1501228460');
INSERT INTO `llf_user_role` VALUES ('9', '1', '23', '1501249262');
INSERT INTO `llf_user_role` VALUES ('14', '17', '24', '1501295592');
INSERT INTO `llf_user_role` VALUES ('13', '17', '25', '1501295592');
INSERT INTO `llf_user_role` VALUES ('15', '17', '23', '1501295592');
INSERT INTO `llf_user_role` VALUES ('16', '18', '26', '1501296585');
INSERT INTO `llf_user_role` VALUES ('17', '19', '26', '1501462128');
INSERT INTO `llf_user_role` VALUES ('21', '20', '27', '1501686031');
