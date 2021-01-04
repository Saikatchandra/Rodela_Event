/*
Navicat MySQL Data Transfer

Source Server         : jamil1
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : lms2

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-07-19 22:33:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` int(100) NOT NULL,
  `roll` int(6) NOT NULL,
  `reg` int(6) NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('2', 'jamil', 'ahammed', 'jamil@gmail.com', 'sdfsdfssfsdf', '0', '122244', '334455', '11554446', null, '0', '2020-07-07 11:49:18');
INSERT INTO `students` VALUES ('4', 'jibon', 'ahammed', 'jamildsdd@gmail.com', 'sadsaddd', '0', '147852', '334455', '11554446', null, '0', '2020-07-07 11:50:00');
