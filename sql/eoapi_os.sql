/*
Navicat MySQL Data Transfer

Source Server         : 172.16.121.42
Source Server Version : 50716
Source Host           : 172.16.121.42:3306
Source Database       : eoapi_os

Target Server Type    : MYSQL
Target Server Version : 50716
File Encoding         : 65001

Date: 2017-01-12 18:12:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for eo_api
-- ----------------------------
DROP TABLE IF EXISTS `eo_api`;
CREATE TABLE `eo_api` (
  `apiID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `apiName` varchar(255) COLLATE utf8_bin NOT NULL,
  `apiURI` varchar(255) COLLATE utf8_bin NOT NULL,
  `apiProtocol` tinyint(1) unsigned NOT NULL,
  `apiFailureMock` text COLLATE utf8_bin,
  `apiSuccessMock` text COLLATE utf8_bin,
  `apiRequestType` tinyint(1) unsigned NOT NULL,
  `apiSuccessMockType` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `apiFailureMockType` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `apiStatus` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `apiUpdateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `groupID` int(11) unsigned NOT NULL,
  `projectID` int(11) unsigned NOT NULL,
  `starred` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `removed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `removeTime` timestamp NULL DEFAULT NULL,
  `apiNoteType` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `apiNoteRaw` text COLLATE utf8_bin,
  `apiNote` text COLLATE utf8_bin,
  `apiRequestParamType` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `apiRequestRaw` text COLLATE utf8_bin,
  PRIMARY KEY (`apiID`,`groupID`,`apiURI`),
  KEY `groupID` (`groupID`),
  KEY `apiID` (`apiID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of eo_api
-- ----------------------------
INSERT INTO `eo_api` VALUES ('1', '示例接口', 'www.eoapi.cn/api/demo', '0', '', 0x7B2274797065223A2264656D6F222C22737461747573223A2273756363657373222C2264657363223A22E8BF99E698AFE8BF94E59B9EE7BB93E69E9CE79A84E7A4BAE4BE8BEFBC8CE682A8E58FAFE4BBA5E59CA8E6ADA4E8AEB0E5BD95E682A8E79A84E68EA5E58FA3E79A84E8BF94E59B9EE580BCE7A4BAE4BE8BEFBC8CE696B9E4BEBFE5AFB9E68EA5E4BABAE59198E69FA5E79C8BE38082E5908CE697B6E68891E4BBACE68F90E4BE9BE4BA86E5A49AE7A78DE6A0BCE5BC8FE695B4E79086E58A9FE883BDEFBC8CE682A8E58FAAE99C80E8A681E8BDBBE8BDBBE4B880E782B9E58DB3E58FAFE5BE97E588B0E7BE8EE58C96E78988E69CACE79A84E8BF94E59B9EE7BB93E69E9CEFBC8CE99D9EE5B8B8E696B9E4BEBFEFBC81227D, '0', '0', '0', '0', '2016-11-08 23:04:48', '1', '1', '0', '0', null, '1', 0x232323232020E68891E58FAFE4BBA5E4BDBFE794A8E5AF8CE69687E69CACE68896E880856D61726B646F776EE7BC96E8BE91E599A8E58EBBE8BF9BE8A18CE5A487E6B3A8E79A84E58699E4BD9CE38082, 0x266C743B68342069643D2671756F743B68342D2D6D61726B646F776E2D2671756F743B2667743B266C743B61206E616D653D2671756F743BE68891E58FAFE4BBA5E4BDBFE794A8E5AF8CE69687E69CACE68896E880856D61726B646F776EE7BC96E8BE91E599A8E58EBBE8BF9BE8A18CE5A487E6B3A8E79A84E58699E4BD9CE380822671756F743B20636C6173733D2671756F743B7265666572656E63652D6C696E6B2671756F743B2667743B266C743B2F612667743B266C743B7370616E20636C6173733D2671756F743B6865616465722D6C696E6B206F637469636F6E206F637469636F6E2D6C696E6B2671756F743B2667743B266C743B2F7370616E2667743BE68891E58FAFE4BBA5E4BDBFE794A8E5AF8CE69687E69CACE68896E880856D61726B646F776EE7BC96E8BE91E599A8E58EBBE8BF9BE8A18CE5A487E6B3A8E79A84E58699E4BD9CE38082266C743B2F68342667743B, '0', '');

-- ----------------------------
-- Table structure for eo_api_cache
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_cache`;
CREATE TABLE `eo_api_cache` (
  `cacheID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projectID` int(10) unsigned NOT NULL,
  `groupID` int(10) unsigned NOT NULL,
  `apiID` int(10) unsigned NOT NULL,
  `apiJson` longtext NOT NULL,
  `starred` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cacheID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_api_cache
-- ----------------------------
INSERT INTO `eo_api_cache` VALUES ('1', '1', '1', '1', '{\"baseInfo\":{\"apiID\":623,\"apiName\":\"\\u793a\\u4f8b\\u63a5\\u53e3\",\"apiURI\":\"www.eoapi.cn\\/api\\/demo\",\"apiProtocol\":0,\"apiFailureMock\":\"\",\"apiSuccessMock\":\"{\\\"type\\\":\\\"demo\\\",\\\"status\\\":\\\"success\\\",\\\"desc\\\":\\\"\\u8fd9\\u662f\\u8fd4\\u56de\\u7ed3\\u679c\\u7684\\u793a\\u4f8b\\uff0c\\u60a8\\u53ef\\u4ee5\\u5728\\u6b64\\u8bb0\\u5f55\\u60a8\\u7684\\u63a5\\u53e3\\u7684\\u8fd4\\u56de\\u503c\\u793a\\u4f8b\\uff0c\\u65b9\\u4fbf\\u5bf9\\u63a5\\u4eba\\u5458\\u67e5\\u770b\\u3002\\u540c\\u65f6\\u6211\\u4eec\\u63d0\\u4f9b\\u4e86\\u591a\\u79cd\\u683c\\u5f0f\\u6574\\u7406\\u529f\\u80fd\\uff0c\\u60a8\\u53ea\\u9700\\u8981\\u8f7b\\u8f7b\\u4e00\\u70b9\\u5373\\u53ef\\u5f97\\u5230\\u7f8e\\u5316\\u7248\\u672c\\u7684\\u8fd4\\u56de\\u7ed3\\u679c\\uff0c\\u975e\\u5e38\\u65b9\\u4fbf\\uff01\\\"}\",\"apiRequestType\":0,\"apiSuccessMockType\":0,\"apiFailureMockType\":0,\"apiStatus\":0,\"apiUpdateTime\":\"2016-11-08 23:04:48\",\"groupID\":275,\"projectID\":582,\"starred\":0,\"removed\":0,\"removeTime\":null,\"apiNoteType\":1,\"apiNoteRaw\":\"####  \\u6211\\u53ef\\u4ee5\\u4f7f\\u7528\\u5bcc\\u6587\\u672c\\u6216\\u8005markdown\\u7f16\\u8f91\\u5668\\u53bb\\u8fdb\\u884c\\u5907\\u6ce8\\u7684\\u5199\\u4f5c\\u3002\",\"apiNote\":\"&lt;h4 id=&quot;h4--markdown-&quot;&gt;&lt;a name=&quot;\\u6211\\u53ef\\u4ee5\\u4f7f\\u7528\\u5bcc\\u6587\\u672c\\u6216\\u8005markdown\\u7f16\\u8f91\\u5668\\u53bb\\u8fdb\\u884c\\u5907\\u6ce8\\u7684\\u5199\\u4f5c\\u3002&quot; class=&quot;reference-link&quot;&gt;&lt;\\/a&gt;&lt;span class=&quot;header-link octicon octicon-link&quot;&gt;&lt;\\/span&gt;\\u6211\\u53ef\\u4ee5\\u4f7f\\u7528\\u5bcc\\u6587\\u672c\\u6216\\u8005markdown\\u7f16\\u8f91\\u5668\\u53bb\\u8fdb\\u884c\\u5907\\u6ce8\\u7684\\u5199\\u4f5c\\u3002&lt;\\/h4&gt;\",\"apiRequestParamType\":0,\"apiRequestRaw\":\"\",\"mockCode\":\"AbKWQJuEZqQni9Hdpz2wYVEGl9qavDj2\"},\"headerInfo\":[{\"headerID\":562,\"headerName\":\"Accept-Encoding\",\"headerValue\":\"compress, gzip\"},{\"headerID\":563,\"headerName\":\"\\u8bf7\\u6c42\\u5934\\u90e8\\u7684\\u6807\\u7b7e\",\"headerValue\":\"\\u8fd9\\u91cc\\u53ef\\u4ee5\\u8bb0\\u5f55\\u5b8c\\u6574\\u7684\\u5934\\u90e8\\u4fe1\\u606f\"}],\"requestInfo\":[{\"paramID\":11288,\"paramName\":\"\\u53c2\\u6570\\u793a\\u4f8b1\",\"paramKey\":\"param1\",\"paramType\":0,\"paramLimit\":\"\\u6570\\u5b57\\u3001\\u82f1\\u6587\\u3001\\u4e0b\\u5212\\u7ebf\",\"paramValue\":\"eoapi_2016\",\"paramNotNull\":0,\"paramValueList\":[]},{\"paramID\":11289,\"paramName\":\"\\u53c2\\u6570\\u793a\\u4f8b2\",\"paramKey\":\"param2\",\"paramType\":0,\"paramLimit\":\"\\u8fd9\\u91cc\\u53ef\\u4ee5\\u8bb0\\u5f55\\u53c2\\u6570\\u7684\\u9650\\u5236\\u6761\\u4ef6\\uff0c\\u6bd4\\u59820~3\\u7684\\u6570\\u5b57\",\"paramValue\":\"0\",\"paramNotNull\":1,\"paramValueList\":[{\"valueID\":1562,\"value\":\"0\",\"valueDescription\":\"\\u53ef\\u80fd1\\uff0c\\u4ee3\\u8868x\"},{\"valueID\":1563,\"value\":\"1\",\"valueDescription\":\"\\u53ef\\u80fd2\\uff0c\\u4ee3\\u8868y\"},{\"valueID\":1564,\"value\":\"2\",\"valueDescription\":\"\\u53ef\\u80fd3\\uff0c\\u4ee3\\u8868z\"},{\"valueID\":1565,\"value\":\"3\",\"valueDescription\":\"\\u53ef\\u80fd4\\uff0c\\u4ee3\\u8868\\u03b1\"}]},{\"paramID\":11290,\"paramName\":\"\\u4e8c\\u7ea7\\u53c2\\u6570\\u793a\\u4f8b\",\"paramKey\":\"param2>>param3\",\"paramType\":0,\"paramLimit\":\"\",\"paramValue\":\"\",\"paramNotNull\":0,\"paramValueList\":[]}],\"resultInfo\":[{\"paramID\":10665,\"paramKey\":\"desc\",\"paramName\":\"\\u8bf4\\u660e\",\"paramNotNull\":1,\"paramValueList\":[{\"valueID\":9352,\"value\":\"*\",\"valueDescription\":\"\\u4f60\\u6ce8\\u610f\\u5230\\u4e86\\u4e48\\uff0c\\u8fd9\\u662f\\u4e00\\u4e2a\\u201c\\u975e\\u5fc5\\u542b\\u201d\\u7684\\u8fd4\\u56de\\u7ed3\\u679c\\uff0ceoapi\\u751a\\u81f3\\u53ef\\u4ee5\\u8bb0\\u5f55\\u8fd4\\u56de\\u7ed3\\u679c\\u662f\\u5426\\u8fd4\\u56de\\uff01\"}]},{\"paramID\":10666,\"paramKey\":\"status\",\"paramName\":\"\\u63a5\\u53e3\\u8bf7\\u6c42\\u72b6\\u6001\",\"paramNotNull\":0,\"paramValueList\":[{\"valueID\":9353,\"value\":\"error\",\"valueDescription\":\"\\u9519\\u8bef\"},{\"valueID\":9354,\"value\":\"failure\",\"valueDescription\":\"\\u5931\\u8d25\"},{\"valueID\":9355,\"value\":\"success\",\"valueDescription\":\"\\u6210\\u529f\\uff0c\\u4e0d\\u4ec5\\u8bf7\\u6c42\\u7684\\u53c2\\u6570\\u53ef\\u4ee5\\u8bb0\\u5f55\\u53ef\\u80fd\\u6027\\uff0c\\u8fde\\u8fd4\\u56de\\u503c\\u7684\\u4e5f\\u53ef\\u4ee5\\u8bb0\\u5f55\\u53ef\\u80fd\\u6027\\uff01\"}]},{\"paramID\":10667,\"paramKey\":\"type\",\"paramName\":\"\\u63a5\\u53e3\\u7c7b\\u578b\",\"paramNotNull\":0,\"paramValueList\":[{\"valueID\":9356,\"value\":\"demo\",\"valueDescription\":\"\"}]},{\"paramID\":10668,\"paramKey\":\"type::secondType\",\"paramName\":\"\\u4e8c\\u7ea7\\u8fd4\\u56de\\u7ed3\\u679c\\u793a\\u4f8b\",\"paramNotNull\":0,\"paramValueList\":[{\"valueID\":9357,\"value\":\"0\",\"valueDescription\":\"success\"},{\"valueID\":9358,\"value\":\"1\",\"valueDescription\":\"failure\"}]}]}', '0');

-- ----------------------------
-- Table structure for eo_api_group
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_group`;
CREATE TABLE `eo_api_group` (
  `groupID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupName` varchar(30) COLLATE utf8_bin NOT NULL,
  `projectID` int(11) unsigned NOT NULL,
  `parentGroupID` int(10) unsigned NOT NULL DEFAULT '0',
  `isChild` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupID`,`projectID`),
  KEY `groupID` (`groupID`),
  KEY `projectID` (`projectID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of eo_api_group
-- ----------------------------
INSERT INTO `eo_api_group` VALUES ('1', 'demo', '1', '0', '0');

-- ----------------------------
-- Table structure for eo_api_header
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_header`;
CREATE TABLE `eo_api_header` (
  `headerID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `headerName` varchar(255) NOT NULL,
  `headerValue` tinytext NOT NULL,
  `apiID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`headerID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_api_header
-- ----------------------------
INSERT INTO `eo_api_header` VALUES ('1', 'Accept-Encoding', 'compress, gzip', '1');
INSERT INTO `eo_api_header` VALUES ('2', '请求头部的标签', '这里可以记录完整的头部信息', '1');

-- ----------------------------
-- Table structure for eo_api_mock
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_mock`;
CREATE TABLE `eo_api_mock` (
  `mockID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mockCode` varchar(32) NOT NULL,
  `apiID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`mockID`,`mockCode`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_api_mock
-- ----------------------------
INSERT INTO `eo_api_mock` VALUES ('1', 'krMPzZmx1nNEansx6D28zUudft1qCWmr', '1');

-- ----------------------------
-- Table structure for eo_api_request_param
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_request_param`;
CREATE TABLE `eo_api_request_param` (
  `paramID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paramName` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paramKey` varchar(255) COLLATE utf8_bin NOT NULL,
  `paramValue` text COLLATE utf8_bin NOT NULL,
  `paramType` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `paramLimit` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `apiID` int(10) unsigned NOT NULL,
  `paramNotNull` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`paramID`),
  KEY `apiID` (`apiID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of eo_api_request_param
-- ----------------------------
INSERT INTO `eo_api_request_param` VALUES ('1', '参数示例1', 'param1', 0x656F6170695F32303136, '0', '数字、英文、下划线', '1', '0');
INSERT INTO `eo_api_request_param` VALUES ('2', '参数示例2', 'param2', 0x30, '0', '这里可以记录参数的限制条件，比如0~3的数字', '1', '1');
INSERT INTO `eo_api_request_param` VALUES ('3', '二级参数示例', 'param2>>param3', '', '0', '', '1', '0');

-- ----------------------------
-- Table structure for eo_api_request_value
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_request_value`;
CREATE TABLE `eo_api_request_value` (
  `valueID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` varchar(255) DEFAULT NULL,
  `valueDescription` varchar(255) DEFAULT NULL,
  `paramID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`valueID`),
  KEY `paramID` (`paramID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_api_request_value
-- ----------------------------
INSERT INTO `eo_api_request_value` VALUES ('1', '0', '可能1，代表x', '2');
INSERT INTO `eo_api_request_value` VALUES ('2', '1', '可能2，代表y', '2');
INSERT INTO `eo_api_request_value` VALUES ('3', '2', '可能3，代表z', '2');
INSERT INTO `eo_api_request_value` VALUES ('4', '3', '可能4，代表α', '2');

-- ----------------------------
-- Table structure for eo_api_result_param
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_result_param`;
CREATE TABLE `eo_api_result_param` (
  `paramID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `paramName` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paramKey` varchar(255) COLLATE utf8_bin NOT NULL,
  `apiID` int(11) unsigned NOT NULL,
  `paramNotNull` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`paramID`),
  KEY `apiID` (`apiID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of eo_api_result_param
-- ----------------------------
INSERT INTO `eo_api_result_param` VALUES ('1', '说明', 'desc', '1', '1');
INSERT INTO `eo_api_result_param` VALUES ('2', '接口请求状态', 'status', '1', '0');
INSERT INTO `eo_api_result_param` VALUES ('3', '接口类型', 'type', '1', '0');
INSERT INTO `eo_api_result_param` VALUES ('4', '二级返回结果示例', 'type::secondType', '1', '0');

-- ----------------------------
-- Table structure for eo_api_result_value
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_result_value`;
CREATE TABLE `eo_api_result_value` (
  `valueID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `value` text COLLATE utf8_bin NOT NULL,
  `valueDescription` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `paramID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`valueID`),
  KEY `resultParamID` (`paramID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of eo_api_result_value
-- ----------------------------
INSERT INTO `eo_api_result_value` VALUES ('1', 0x2A, '你注意到了么，这是一个“非必含”的返回结果，eoapi甚至可以记录返回结果是否返回！', '1');
INSERT INTO `eo_api_result_value` VALUES ('2', 0x6572726F72, '错误', '2');
INSERT INTO `eo_api_result_value` VALUES ('3', 0x6661696C757265, '失败', '2');
INSERT INTO `eo_api_result_value` VALUES ('4', 0x73756363657373, '成功，不仅请求的参数可以记录可能性，连返回值的也可以记录可能性！', '2');
INSERT INTO `eo_api_result_value` VALUES ('5', 0x64656D6F, '', '3');
INSERT INTO `eo_api_result_value` VALUES ('6', 0x30, 'success', '4');
INSERT INTO `eo_api_result_value` VALUES ('7', 0x31, 'failure', '4');

-- ----------------------------
-- Table structure for eo_api_test_history
-- ----------------------------
DROP TABLE IF EXISTS `eo_api_test_history`;
CREATE TABLE `eo_api_test_history` (
  `testID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apiID` int(10) unsigned NOT NULL,
  `requestInfo` longtext,
  `resultInfo` longtext,
  `testTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `projectID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`testID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_api_test_history
-- ----------------------------
INSERT INTO `eo_api_test_history` VALUES ('1', '1', '{\"apiProtocol\":\"0\",\"method\":\"POST\",\"URL\":\"www.eoapi.cn\\/api\\/demo\",\"headers\":[{\"name\":\"Accept-Encoding\",\"value\":\"compress, gzip\"},{\"name\":\"\\u8bf7\\u6c42\\u5934\\u90e8\\u7684\\u6807\\u7b7e\",\"value\":\"\\u8fd9\\u91cc\\u53ef\\u4ee5\\u8bb0\\u5f55\\u5b8c\\u6574\\u7684\\u5934\\u90e8\\u4fe1\\u606f\"}],\"requestType\":\"0\",\"params\":[{\"key\":\"param1\",\"value\":\"\"},{\"key\":\"param2\",\"value\":\"\"},{\"key\":\"param2>>param3\",\"value\":\"\"}]}', '', '2017-01-12 17:44:04', '1');

-- ----------------------------
-- Table structure for eo_conn_database
-- ----------------------------
DROP TABLE IF EXISTS `eo_conn_database`;
CREATE TABLE `eo_conn_database` (
  `connID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbID` int(10) unsigned NOT NULL,
  `userID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`connID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_conn_database
-- ----------------------------

-- ----------------------------
-- Table structure for eo_conn_project
-- ----------------------------
DROP TABLE IF EXISTS `eo_conn_project`;
CREATE TABLE `eo_conn_project` (
  `connID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `projectID` int(11) unsigned NOT NULL,
  `userID` int(11) unsigned NOT NULL,
  `userType` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`connID`,`projectID`,`userID`),
  KEY `projectID` (`projectID`),
  KEY `eo_conn_ibfk_2` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of eo_conn_project
-- ----------------------------
INSERT INTO `eo_conn_project` VALUES ('1', '1', '1', '0');

-- ----------------------------
-- Table structure for eo_database
-- ----------------------------
DROP TABLE IF EXISTS `eo_database`;
CREATE TABLE `eo_database` (
  `dbID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dbName` varchar(255) NOT NULL,
  `dbVersion` float unsigned NOT NULL,
  `dbUpdateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dbID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_database
-- ----------------------------

-- ----------------------------
-- Table structure for eo_database_table
-- ----------------------------
DROP TABLE IF EXISTS `eo_database_table`;
CREATE TABLE `eo_database_table` (
  `dbID` int(10) unsigned NOT NULL,
  `tableID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tableName` varchar(255) NOT NULL,
  `tableDescription` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tableID`,`dbID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_database_table
-- ----------------------------

-- ----------------------------
-- Table structure for eo_database_table_field
-- ----------------------------
DROP TABLE IF EXISTS `eo_database_table_field`;
CREATE TABLE `eo_database_table_field` (
  `fieldID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fieldName` varchar(255) NOT NULL,
  `fieldType` varchar(10) NOT NULL,
  `fieldLength` varchar(10) NOT NULL,
  `isNotNull` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `isPrimaryKey` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `fieldDescription` varchar(255) DEFAULT NULL,
  `tableID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`fieldID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_database_table_field
-- ----------------------------

-- ----------------------------
-- Table structure for eo_message
-- ----------------------------
DROP TABLE IF EXISTS `eo_message`;
CREATE TABLE `eo_message` (
  `msgID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `toUserID` int(10) unsigned NOT NULL,
  `fromUserID` int(10) unsigned NOT NULL,
  `msgSendTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `msgType` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `summary` varchar(255) DEFAULT NULL,
  `msg` text NOT NULL,
  `isRead` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `otherMsg` text,
  PRIMARY KEY (`msgID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_message
-- ----------------------------

-- ----------------------------
-- Table structure for eo_project
-- ----------------------------
DROP TABLE IF EXISTS `eo_project`;
CREATE TABLE `eo_project` (
  `projectID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `projectType` tinyint(1) unsigned NOT NULL,
  `projectName` varchar(30) COLLATE utf8_bin NOT NULL,
  `projectUpdateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `projectVersion` varchar(6) COLLATE utf8_bin NOT NULL DEFAULT '1.0',
  PRIMARY KEY (`projectID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of eo_project
-- ----------------------------
INSERT INTO `eo_project` VALUES ('1', '0', 'eoapi示例', '2017-01-12 17:44:04', '1.2');

-- ----------------------------
-- Table structure for eo_project_environment
-- ----------------------------
DROP TABLE IF EXISTS `eo_project_environment`;
CREATE TABLE `eo_project_environment` (
  `envID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `envName` varchar(255) NOT NULL,
  `envURI` varchar(255) NOT NULL,
  `projectID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`envID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_project_environment
-- ----------------------------

-- ----------------------------
-- Table structure for eo_project_status_code
-- ----------------------------
DROP TABLE IF EXISTS `eo_project_status_code`;
CREATE TABLE `eo_project_status_code` (
  `codeID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) NOT NULL,
  `codeDescription` varchar(255) NOT NULL,
  `groupID` int(10) unsigned NOT NULL,
  PRIMARY KEY (`codeID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_project_status_code
-- ----------------------------

-- ----------------------------
-- Table structure for eo_project_status_code_group
-- ----------------------------
DROP TABLE IF EXISTS `eo_project_status_code_group`;
CREATE TABLE `eo_project_status_code_group` (
  `groupID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `projectID` int(10) unsigned NOT NULL,
  `groupName` varchar(255) NOT NULL,
  `parentGroupID` int(10) unsigned NOT NULL DEFAULT '0',
  `isChild` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupID`,`projectID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_project_status_code_group
-- ----------------------------

-- ----------------------------
-- Table structure for eo_user
-- ----------------------------
DROP TABLE IF EXISTS `eo_user`;
CREATE TABLE `eo_user` (
  `userID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(16) NOT NULL,
  `userPassword` varchar(60) NOT NULL,
  `userNickName` varchar(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of eo_user
-- ----------------------------
INSERT INTO `eo_user` VALUES ('1', 'admin', '14e1b600b1fd579f47433b88e8d85291', '[随机]七夕青鸟');
