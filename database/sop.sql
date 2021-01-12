/*
 Navicat MySQL Data Transfer

 Source Server         : 192.190.10.229
 Source Server Type    : MySQL
 Source Server Version : 50621
 Source Host           : 192.190.10.229:3306
 Source Schema         : sop

 Target Server Type    : MySQL
 Target Server Version : 50621
 File Encoding         : 65001

 Date: 12/01/2021 11:56:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for db
-- ----------------------------
DROP TABLE IF EXISTS `db`;
CREATE TABLE `db`  (
  `db_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `db_username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_databasename` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_host` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `db_active` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`db_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for email_information
-- ----------------------------
DROP TABLE IF EXISTS `email_information`;
CREATE TABLE `email_information`  (
  `email_id` int(10) NOT NULL AUTO_INCREMENT,
  `email_user` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email_password` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`email_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for member_new
-- ----------------------------
DROP TABLE IF EXISTS `member_new`;
CREATE TABLE `member_new`  (
  `mid` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Fname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Lname` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ecode` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Dept` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `Dept2` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `DeptCode` int(5) NULL DEFAULT NULL,
  `DeptCode2` int(5) NULL DEFAULT NULL,
  `memberemail` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `posi` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`mid`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sop_distance
-- ----------------------------
DROP TABLE IF EXISTS `sop_distance`;
CREATE TABLE `sop_distance`  (
  `d_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `d_number` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`d_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_forcast
-- ----------------------------
DROP TABLE IF EXISTS `sop_forcast`;
CREATE TABLE `sop_forcast`  (
  `f_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `f_msprocode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `f_procode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `f_proyear` int(4) NULL DEFAULT NULL,
  `f_year` int(4) NULL DEFAULT NULL,
  `f_use` decimal(28, 2) NULL DEFAULT NULL,
  `f_money` decimal(28, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`f_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 124 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_jobstatus
-- ----------------------------
DROP TABLE IF EXISTS `sop_jobstatus`;
CREATE TABLE `sop_jobstatus`  (
  `j_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `j_statusname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`j_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_master
-- ----------------------------
DROP TABLE IF EXISTS `sop_master`;
CREATE TABLE `sop_master`  (
  `m_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `m_procode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_detail` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_customer` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_owner` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_productgroup` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_distance` int(3) NULL DEFAULT NULL,
  `m_user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_user_deptcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_user_deptname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_user_ecode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `m_datetime_create` datetime(0) NULL DEFAULT NULL,
  `m_datetime_modify` datetime(0) NULL DEFAULT NULL,
  `m_day` int(2) NULL DEFAULT NULL,
  `m_month` int(2) NULL DEFAULT NULL,
  `m_year` int(4) NULL DEFAULT NULL,
  PRIMARY KEY (`m_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_productgroup
-- ----------------------------
DROP TABLE IF EXISTS `sop_productgroup`;
CREATE TABLE `sop_productgroup`  (
  `p_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `p_groupname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`p_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_submaster
-- ----------------------------
DROP TABLE IF EXISTS `sop_submaster`;
CREATE TABLE `sop_submaster`  (
  `ms_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `ms_procode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_m_procode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_productname` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_productuse` decimal(28, 2) NULL DEFAULT NULL,
  `ms_percensuccess` int(3) NULL DEFAULT NULL,
  `ms_ideaprice` decimal(10, 2) NULL DEFAULT NULL,
  `ms_jobstatus` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_jobtype` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_user_deptcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_user_deptname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_user_ecode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `ms_user_datetime_create` datetime(0) NULL DEFAULT NULL,
  `ms_user_datetime_modify` datetime(0) NULL DEFAULT NULL,
  `ms_day` int(2) NULL DEFAULT NULL,
  `ms_month` int(2) NULL DEFAULT NULL,
  `ms_year` int(4) NULL DEFAULT NULL,
  `ms_status` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ms_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_success
-- ----------------------------
DROP TABLE IF EXISTS `sop_success`;
CREATE TABLE `sop_success`  (
  `s_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `s_number` int(3) NULL DEFAULT NULL,
  PRIMARY KEY (`s_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_transfollow
-- ----------------------------
DROP TABLE IF EXISTS `sop_transfollow`;
CREATE TABLE `sop_transfollow`  (
  `trn_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `trn_followdetail` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `trn_procode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trn_msid` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trn_user_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trn_user_deptcode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trn_user_deptname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trn_user_ecode` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `trn_user_datetime_create` datetime(0) NULL DEFAULT NULL,
  `trn_user_datetime_modify` datetime(0) NULL DEFAULT NULL,
  `trn_day` int(2) NULL DEFAULT NULL,
  `trn_month` int(2) NULL DEFAULT NULL,
  `trn_year` int(4) NULL DEFAULT NULL,
  PRIMARY KEY (`trn_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_useractivity
-- ----------------------------
DROP TABLE IF EXISTS `sop_useractivity`;
CREATE TABLE `sop_useractivity`  (
  `u_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `u_ecode` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `u_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `u_activity` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `u_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`u_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for sop_worktype
-- ----------------------------
DROP TABLE IF EXISTS `sop_worktype`;
CREATE TABLE `sop_worktype`  (
  `w_autoid` int(11) NOT NULL AUTO_INCREMENT,
  `w_typename` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`w_autoid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Compact;

-- ----------------------------
-- View structure for projectlist
-- ----------------------------
DROP VIEW IF EXISTS `projectlist`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `projectlist` AS SELECT
sop_master.m_autoid,
sop_master.m_procode,
sop_master.m_detail,
sop_master.m_customer,
sop_master.m_owner,
sop_master.m_productgroup,
sop_master.m_distance,
sop_master.m_user_name,
sop_master.m_user_deptcode,
sop_master.m_user_deptname,
sop_master.m_user_ecode,
sop_master.m_datetime_create,
sop_master.m_datetime_modify,
sop_master.m_day,
sop_master.m_month,
sop_master.m_year
FROM
sop_master
ORDER BY sop_master.m_autoid DESC ;

SET FOREIGN_KEY_CHECKS = 1;
