/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : study_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-09-18 21:47:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `addr`
-- ----------------------------
DROP TABLE IF EXISTS `addr`;
CREATE TABLE `addr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `sname` varchar(255) DEFAULT NULL,
  `stel` varchar(255) DEFAULT NULL,
  `addr` varchar(255) DEFAULT NULL,
  `addrInfo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of addr
-- ----------------------------
INSERT INTO `addr` VALUES ('1', '1', '陈小龙', '13480731740', '东莞市厚街镇', '三屯富怡花园', '403228075@qq.com');
INSERT INTO `addr` VALUES ('2', '3', '陈有根', '18779318806', '深圳市光明新区', '公明街道办', '13480731740@qq.com');

-- ----------------------------
-- Table structure for `goods`
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `info` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `text` text,
  `config` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '7', '2015宝来', '2015宝来2015宝来', '150573947816898.jpg', '126800', '3', '<p>2015宝来2015宝来2015宝来</p>', '<p>2015宝来2015宝来2015宝来</p>');
INSERT INTO `goods` VALUES ('2', '4', '苹果6S', '苹果6S苹果6S苹果6S', '150573953423888.jpg', '5000', '5', '<p>苹果6S苹果6S苹果6S</p>', '<p>苹果6S苹果6S苹果6S苹果6S苹果6S</p>');
INSERT INTO `goods` VALUES ('3', '5', '三星', '三星三星三星', '150573958324943.jpg', '3500', '6', '<p>三星三星三星</p>', '<p>三星三星三星三星</p>');

-- ----------------------------
-- Table structure for `goodsimg`
-- ----------------------------
DROP TABLE IF EXISTS `goodsimg`;
CREATE TABLE `goodsimg` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gid` int(11) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goodsimg
-- ----------------------------
INSERT INTO `goodsimg` VALUES ('1', '1', '150573948326387.jpg');
INSERT INTO `goodsimg` VALUES ('2', '1', '15057394834254.jpg');
INSERT INTO `goodsimg` VALUES ('3', '1', '150573948326495.jpg');
INSERT INTO `goodsimg` VALUES ('4', '2', '150573953819273.jpg');
INSERT INTO `goodsimg` VALUES ('5', '2', '150573953831822.jpg');
INSERT INTO `goodsimg` VALUES ('6', '2', '150573953829516.jpg');
INSERT INTO `goodsimg` VALUES ('7', '3', '150573958732380.jpg');
INSERT INTO `goodsimg` VALUES ('8', '3', '150573958721253.jpg');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `num` int(11) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `money` tinyint(4) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '0001', '1', '1', '126800', '2', '1', '20170910', '0', '1');
INSERT INTO `orders` VALUES ('2', '1100', '3', '2', '5000', '1', '2', '20170910', '1', '6');
INSERT INTO `orders` VALUES ('3', '1100', '3', '3', '3500', '3', '2', '20170910', '1', '6');

-- ----------------------------
-- Table structure for `orderstatu`
-- ----------------------------
DROP TABLE IF EXISTS `orderstatu`;
CREATE TABLE `orderstatu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of orderstatu
-- ----------------------------
INSERT INTO `orderstatu` VALUES ('1', '未付款');
INSERT INTO `orderstatu` VALUES ('2', '已发货');
INSERT INTO `orderstatu` VALUES ('3', '在途中');
INSERT INTO `orderstatu` VALUES ('4', '配送中');
INSERT INTO `orderstatu` VALUES ('5', '签收');
INSERT INTO `orderstatu` VALUES ('6', '已完成');

-- ----------------------------
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `is_lou` tinyint(4) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', '数码产品', '0', '0,', '1', '1', '手机', '数码产品，手机，相机', '数码产品所有品牌');
INSERT INTO `types` VALUES ('2', '汽车产品', '0', '0,', '1', '1', '汽车', '汽车品牌', '汽车品牌，所有品牌');
INSERT INTO `types` VALUES ('3', '手机', '1', '0,1,', '1', '1', '苹果6S', '苹果6S品牌', '苹果6S品牌是一部好手机');
INSERT INTO `types` VALUES ('4', '苹果', '3', '0,1,3,', '1', '1', '苹果6S', '苹果6S品牌', '苹果6S品牌是一部好手机');
INSERT INTO `types` VALUES ('5', '三星', '3', '0,1,3,', '1', '1', '三星手机', '三星手机品牌', '三星品牌是一部好手机');
INSERT INTO `types` VALUES ('6', '大众汽车', '2', '0,2,', '1', '1', '一汽大众', '一汽大众品牌', '一汽大众品牌德国');
INSERT INTO `types` VALUES ('7', '宝来', '6', '0,2,6,', '1', '1', '2015宝来', '宝来车', '宝来车宝来车');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `tel` varchar(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `aid` int(11) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '403228075@qq.com', '123456', '13480731740', '0', '20170910', '123456789', '0', '陈小龙');
INSERT INTO `user` VALUES ('2', '1350457808@qq.com', '123456', '13560763312', '1', '20170910', '123456789', '0', '占善冬');
INSERT INTO `user` VALUES ('3', '18779318806@qq.com', '123456', '18779318806', '2', '20170918', '123456789', '0', '陈有根');
