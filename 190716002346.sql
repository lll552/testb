/*
MySQL Backup
Source Server Version: 5.5.53
Source Database: test
Date: 2019/7/16 星期二 00:23:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
--  Table structure for `tp_admin`
-- ----------------------------
DROP TABLE IF EXISTS `tp_admin`;
CREATE TABLE `tp_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nick` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `status` enum('0','1') CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `is_super` enum('1','0') CHARACTER SET latin1 DEFAULT '0',
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_article`
-- ----------------------------
DROP TABLE IF EXISTS `tp_article`;
CREATE TABLE `tp_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `desc` text,
  `click` int(11) DEFAULT '0',
  `comm_num` int(11) DEFAULT '0',
  `tags` varchar(255) DEFAULT NULL,
  `content` longtext,
  `is_top` enum('1','0') CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `cate_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_cate`
-- ----------------------------
DROP TABLE IF EXISTS `tp_cate`;
CREATE TABLE `tp_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(20) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_catenav`
-- ----------------------------
DROP TABLE IF EXISTS `tp_catenav`;
CREATE TABLE `tp_catenav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catename` varchar(255) NOT NULL,
  `type` enum('0','1') NOT NULL DEFAULT '1',
  `pid` tinyint(4) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_comment`
-- ----------------------------
DROP TABLE IF EXISTS `tp_comment`;
CREATE TABLE `tp_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `article_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_member`
-- ----------------------------
DROP TABLE IF EXISTS `tp_member`;
CREATE TABLE `tp_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `tp_system`
-- ----------------------------
DROP TABLE IF EXISTS `tp_system`;
CREATE TABLE `tp_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `webname` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records 
-- ----------------------------
INSERT INTO `tp_admin` VALUES ('1','','',NULL,NULL,'1561911915','1562515327','0','0','1562515327'), ('2','','',NULL,NULL,'1561911935','1562515335','0','1','1562515335'), ('3','','',NULL,NULL,'1561911971','1562515343','0','0','1562515343'), ('4','','',NULL,NULL,'1561912059','1562515362','0','0','1562515362'), ('5','7','7','7','7@ee.com','1561912229','1561912229','0','0',NULL), ('6','at','at','at','at@de.com','1561990914','1561990914','0','0',NULL), ('7','1','1','11','1@ds.com','1561992712','1562514857','1','1',NULL), ('8','2','2','2','2@ee.com','1561992753','1561992753','1','0',NULL), ('9','ta','39584','ta','lianlihe@163.com','1561993902','1562086858','0','1',NULL), ('10','cc','cc','cc','lianlihe@163.com','1561994195','1561994195','0','0',NULL), ('11','ee','ee','ee','lianlihe@163.com','1561994923','1561994923','0','0',NULL), ('12','eew','ee','ee','lianlihe@163.com','1561995046','1561995046','0','0',NULL), ('13','eewe','ee','ee','lianlihe@163.com','1561995317','1562512454','1','0',NULL), ('14','sadf','a','a','lianlihe@163.com','1561995342','1562512360','1','1',NULL), ('15','a','a','a','lianlihe@163.com','1561995493','1561995493','0','0',NULL), ('16','','',NULL,NULL,'1562086649','1562515352','1','0','1562515352'), ('17','abc','abc','abc','adbc@abc.com','1562510949','1562510949','0','0',NULL);
INSERT INTO `tp_article` VALUES ('1','php','lian','555','0','0','php','<p>555</p>','1','11','1562388629','1562518607',NULL), ('2','java','Jack','','12','0','java','','0','11','1562388742','1562388742',NULL), ('3','c','John','','0','0','c','','0','12','1562388763','1562519347','1562519347'), ('4','python','Lili','aaaaeeeeeee','0','0','python','<p>dddddddcccccceeeccddddddddddddddddddddddddeeeee</p>','','12','1562388810','1562519347','1562519347'), ('5','rrr','Mick','rrr','0','0','rrr','<p>rrr</p>','0','2','1562388946','1562432311',NULL), ('6','php','Max','adf','0','0','dds','<p>adf</p>','0','3','1562390245','1562431330',NULL), ('7','php','Poal','adf','12','0','dds','<p>adf</p>','1','3','1562390246','0',NULL), ('8','laravle','Brany','laravle','24','0','laravle|php|mysql','<p>laravle</p>','1','13','1562429327','1563038036',NULL), ('9','','Lisy',NULL,'0','0',NULL,NULL,'0','0','0','0',NULL), ('10','数据库',NULL,'aaaaaaaaaaaaaaaa','22','0','php','<p>ddddddddddddddddddddddddddddd</p>','1','13','1563035827','1563035827',NULL);
INSERT INTO `tp_cate` VALUES ('1','','0','1562251844','1562344318','1562344318'), ('2','55','5','1562252745','1562432311','1562432311'), ('3','555','2','1562252761','1563031801',NULL), ('4','aabb','0','1562252884','1562344823','1562344823'), ('5','','22','1562258087','1562344902','1562344902'), ('6','','1','1562258097','1562344592','1562344592'), ('7','','1','1562258145','1562344721','1562344721'), ('8','','3','1562258190','1562344895','1562344895'), ('9','','1','1562258204','1562344780','1562344780'), ('10','','1','1562258223','1562344813','1562344813'), ('11','abcd','1','1562344873','1562344931',NULL), ('12','eee','2','1562344887','1562519347','1562519347'), ('13','ccc','1','1563031667','1563031667',NULL);
INSERT INTO `tp_comment` VALUES ('1','aaaaaaaaaa','8','5','1562518607','1562518607',NULL), ('2','bbbb','7','4','0','1562518878',NULL), ('3','ccccccc','4','5','0','1562519347','1562519347'), ('4','aaaaaaaa','10','6','1563206001','1563206001',NULL), ('5','eeeeeee','10','6','1563206043','1563206043',NULL), ('6','eeeeeee','10','6','1563206269','1563206269',NULL), ('7','vvvvvvv','10','6','1563206277','1563206277',NULL);
INSERT INTO `tp_member` VALUES ('1','','','',NULL,'1562479423','1562479423',NULL), ('2','','','',NULL,'1562480341','1562480341',NULL), ('3','','','',NULL,'1562480415','1562484501','1562484501'), ('4','55','55','55','7@ee.com','1562480542','1562518878','1562518878'), ('5','1','1','aaaa','7@ee.com','1562483018','1562483605',NULL), ('6','ww','ww','ww','a@ss.g','1563123073','1563123073',NULL);
INSERT INTO `tp_system` VALUES ('1','lib','www.lib.com','0','1563031939',NULL), ('2','?',NULL,NULL,NULL,NULL);
