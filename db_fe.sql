/*
Navicat MySQL Data Transfer

Source Server         : Wamp
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : db_fe

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-04-20 14:04:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_fecode_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_fecode_admin`;
CREATE TABLE `tb_fecode_admin` (
  `FECodeA_User` varchar(20) NOT NULL,
  `FECodeA_Pwd` varchar(20) DEFAULT NULL,
  `FECodeA_Pow` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_fecode_admin
-- ----------------------------
INSERT INTO `tb_fecode_admin` VALUES ('000', '456', '1');
INSERT INTO `tb_fecode_admin` VALUES ('123456', '123321', '5');

-- ----------------------------
-- Table structure for tb_fecode_submit
-- ----------------------------
DROP TABLE IF EXISTS `tb_fecode_submit`;
CREATE TABLE `tb_fecode_submit` (
  `FECodeS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FECodeS_Task` int(11) DEFAULT NULL,
  `FECodeS_User` varchar(20) DEFAULT NULL,
  `FECodeS_Path` varchar(255) DEFAULT NULL,
  `FECodeS_Time` datetime DEFAULT NULL,
  PRIMARY KEY (`FECodeS_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_fecode_submit
-- ----------------------------

-- ----------------------------
-- Table structure for tb_fecode_task
-- ----------------------------
DROP TABLE IF EXISTS `tb_fecode_task`;
CREATE TABLE `tb_fecode_task` (
  `FECodeT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FECodeT_Title` varchar(255) DEFAULT NULL,
  `FECodeT_Desc` varchar(255) DEFAULT NULL,
  `FECodeT_Photo` varchar(255) DEFAULT NULL,
  `FECodeT_Count` int(255) DEFAULT NULL,
  `FECodeT_Time` datetime DEFAULT NULL,
  PRIMARY KEY (`FECodeT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_fecode_task
-- ----------------------------
INSERT INTO `tb_fecode_task` VALUES ('1', 'test', 'just test', '1.jpg', '1', '2017-02-01 00:00:00');
INSERT INTO `tb_fecode_task` VALUES ('2', '123', '123', '', '0', '2017-04-20 03:04:00');
INSERT INTO `tb_fecode_task` VALUES ('5', 'asd', 'sdad', '', '0', '2017-04-20 03:40:12');

-- ----------------------------
-- Table structure for tb_fecode_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_fecode_user`;
CREATE TABLE `tb_fecode_user` (
  `FECodeU_User` varchar(20) NOT NULL,
  `FECodeU_Pwd` varchar(20) DEFAULT NULL,
  `FECodeU_Name` varchar(20) DEFAULT NULL,
  `FECodeU_Photo` varchar(255) DEFAULT NULL,
  `FECodeU_Sign` varchar(255) DEFAULT NULL,
  `FECodeU_LTime` int(11) DEFAULT NULL,
  `FECodeU_Point` int(11) DEFAULT NULL,
  `FECodeU_Exp` int(255) DEFAULT NULL,
  `FECodeU_Reg` datetime DEFAULT NULL,
  PRIMARY KEY (`FECodeU_User`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_fecode_user
-- ----------------------------
INSERT INTO `tb_fecode_user` VALUES ('000', '123', 'Kong', 'test', 'test1', '55', '24', '1', '0000-00-00 00:00:00');
INSERT INTO `tb_fecode_user` VALUES ('123', '123', 'JJ', null, null, null, null, null, null);
INSERT INTO `tb_fecode_user` VALUES ('123456', '012345', 'Mary', null, null, null, null, null, null);
INSERT INTO `tb_fecode_user` VALUES ('312', '312', 'DD', null, null, null, null, null, null);
INSERT INTO `tb_fecode_user` VALUES ('789', '789', 'BB', null, null, null, null, null, null);
INSERT INTO `tb_fecode_user` VALUES ('987', '987', 'CC', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for tb_fecode_video
-- ----------------------------
DROP TABLE IF EXISTS `tb_fecode_video`;
CREATE TABLE `tb_fecode_video` (
  `FECodeV_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FECodeV_Title` varchar(255) DEFAULT NULL,
  `FECodeV_Desc` varchar(255) DEFAULT NULL,
  `FECodeV_Photo` varchar(255) DEFAULT NULL,
  `FECodeV_Addr` varchar(255) DEFAULT NULL,
  `FECodeV_Click` int(11) DEFAULT NULL,
  `FECodeV_Time` datetime DEFAULT NULL,
  `FECodeV_Class` varchar(255) DEFAULT NULL,
  `FECodeV_Level` int(11) DEFAULT NULL,
  PRIMARY KEY (`FECodeV_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_fecode_video
-- ----------------------------
INSERT INTO `tb_fecode_video` VALUES ('1', 'sa', 'sa', '', '', '0', '2017-04-20 03:42:49', 'HTML/CSS', '0');
INSERT INTO `tb_fecode_video` VALUES ('2', '123123123213', '213213213213', '', '', '0', '2017-04-20 03:53:24', 'HTML5', '0');
INSERT INTO `tb_fecode_video` VALUES ('4', 'ssss', 'asdsadsadsa', '', '', '0', '2017-04-20 03:58:27', 'HTML/CSS', '1');
INSERT INTO `tb_fecode_video` VALUES ('5', 'sad', 'asd', '2017419221143514030103.png', '2017419221143442406736.mp4', '0', '2017-04-20 04:11:43', 'Vue.js', '1');
INSERT INTO `tb_fecode_video` VALUES ('6', '1', '2', '2017420741501067316850.jpg', '2017420741502128893838.mp4', '0', '2017-04-20 13:41:50', 'HTML5', '0');
INSERT INTO `tb_fecode_video` VALUES ('7', '2', '2', '20174207426596830656.jpg', '201742074262057581072.mp4', '0', '2017-04-20 13:42:06', 'CSS3', '0');
