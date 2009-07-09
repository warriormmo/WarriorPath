-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Хост: localhost
-- Время создания: Июн 30 2009 г., 12:57
-- Версия сервера: 5.0.45
-- Версия PHP: 5.2.4
-- 
-- БД: `phpmmorpg`
-- 

-- --------------------------------------------------------

-- 
-- Структура таблицы `Hend`
-- 

CREATE TABLE `Hend` (
  `id` int(11) default '0',
  `name` varchar(20) NOT NULL,
  `hend` text character set utf8 collate utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `Hend`
-- 

INSERT INTO `Hend` VALUES (2, '', '');
INSERT INTO `Hend` VALUES (1, '', '');

-- --------------------------------------------------------

-- 
-- Структура таблицы `UserHend`
-- 

CREATE TABLE `UserHend` (
  `id` int(11) default NULL,
  `name` varchar(15) NOT NULL,
  `hend` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `UserHend`
-- 

INSERT INTO `UserHend` VALUES (1, '', '');
INSERT INTO `UserHend` VALUES (2, '', '');

-- --------------------------------------------------------

-- 
-- Структура таблицы `UserKoloda`
-- 

CREATE TABLE `UserKoloda` (
  `id` int(11) default '0',
  `name` varchar(20) default NULL,
  `koloda` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `UserKoloda`
-- 

INSERT INTO `UserKoloda` VALUES (1, 'test', 'a:31:{i:0;s:12:"10_ydar_gray";i:1;s:12:"12_ydar_gray";i:2;s:15:"17_mgnoven_gray";i:3;s:12:"18_ydar_gray";i:4;s:15:"19_mgnoven_gray";i:5;s:11:"20_ydar_red";i:6;s:11:"21_ydar_red";i:7;s:11:"22_ydar_red";i:8;s:11:"23_ydar_red";i:9;s:11:"24_ydar_red";i:10;s:11:"25_ydar_red";i:11;s:11:"26_ydar_red";i:12;s:11:"27_ydar_red";i:13;s:11:"28_ydar_red";i:14;s:14:"3_mgnoven_gray";i:15;s:11:"34_ydar_red";i:16;s:14:"35_mgnoven_red";i:17;s:14:"36_mgnoven_red";i:18;s:14:"37_mgnoven_red";i:19;s:14:"38_mgnoven_red";i:20;s:11:"39_ydar_red";i:21;s:14:"4_mgnoven_gray";i:22;s:14:"40_mgnoven_red";i:23;s:14:"41_mgnoven_red";i:24;s:14:"42_mgnoven_red";i:25;s:14:"42_mgnoven_red";i:26;s:11:"43_ydar_red";i:27;s:14:"5_mgnoven_gray";i:28;s:11:"6_ydar_gray";i:29;s:11:"9_ydar_gray";i:30;s:0:"";}');
INSERT INTO `UserKoloda` VALUES (2, 'test', 'a:31:{i:0;s:12:"10_ydar_gray";i:1;s:12:"12_ydar_gray";i:2;s:15:"17_mgnoven_gray";i:3;s:12:"18_ydar_gray";i:4;s:15:"19_mgnoven_gray";i:5;s:11:"20_ydar_red";i:6;s:11:"21_ydar_red";i:7;s:11:"22_ydar_red";i:8;s:11:"23_ydar_red";i:9;s:11:"24_ydar_red";i:10;s:11:"25_ydar_red";i:11;s:11:"26_ydar_red";i:12;s:11:"27_ydar_red";i:13;s:11:"28_ydar_red";i:14;s:14:"3_mgnoven_gray";i:15;s:11:"34_ydar_red";i:16;s:14:"35_mgnoven_red";i:17;s:14:"36_mgnoven_red";i:18;s:14:"37_mgnoven_red";i:19;s:14:"38_mgnoven_red";i:20;s:11:"39_ydar_red";i:21;s:14:"4_mgnoven_gray";i:22;s:14:"40_mgnoven_red";i:23;s:14:"41_mgnoven_red";i:24;s:14:"42_mgnoven_red";i:25;s:14:"42_mgnoven_red";i:26;s:11:"43_ydar_red";i:27;s:14:"5_mgnoven_gray";i:28;s:11:"6_ydar_gray";i:29;s:11:"9_ydar_gray";i:30;s:0:"";}');

-- --------------------------------------------------------

-- 
-- Структура таблицы `UsersSpisokKart`
-- 

CREATE TABLE `UsersSpisokKart` (
  `id` int(11) default NULL,
  `AllKarts` text collate utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- 
-- Дамп данных таблицы `UsersSpisokKart`
-- 

INSERT INTO `UsersSpisokKart` VALUES (1, '10_ydar_gray;12_ydar_gray;17_mgnoven_gray;18_ydar_gray;19_mgnoven_gray;20_ydar_red;21_ydar_red;22_ydar_red;23_ydar_red;24_ydar_red;25_ydar_red;26_ydar_red;27_ydar_red;28_ydar_red;3_mgnoven_gray;34_ydar_red;35_mgnoven_red;36_mgnoven_red;37_mgnoven_red;38_mgnoven_red;39_ydar_red;4_mgnoven_gray;40_mgnoven_red;41_mgnoven_red;42_mgnoven_red;42_mgnoven_red;43_ydar_red;5_mgnoven_gray;6_ydar_gray;9_ydar_gray;');

-- --------------------------------------------------------

-- 
-- Структура таблицы `game_battle`
-- 

CREATE TABLE `game_battle` (
  `id` int(11) NOT NULL auto_increment,
  `user1` varchar(11) default '0',
  `user2` varchar(11) default '0',
  `lasttime` varchar(11) NOT NULL default '',
  `user1enter` varchar(20) NOT NULL,
  `user2enter` varchar(20) NOT NULL,
  `log` text,
  `end` binary(1) NOT NULL,
  `WinUser` varchar(20) NOT NULL,
  `LoseUser` varchar(20) NOT NULL,
  `dist` int(2) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Дамп данных таблицы `game_battle`
-- 

INSERT INTO `game_battle` VALUES (1, '2', '1', '1246290548', '1', '1', '<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 7\nStavr2: Р Р°РІРµРЅ 8\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr2: Р Р°РІРµРЅ 9\nStavr: Р Р°РІРµРЅ 9\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr2 С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 6\nStavr2: Р Р°РІРµРЅ 9\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr2: Р Р°РІРµРЅ 6\nStavr: Р Р°РІРµРЅ 5\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n', 0x31, 'Stavr', 'Stavr2', 1);
INSERT INTO `game_battle` VALUES (2, '1', '2', '1246332461', '1', '1', '<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 9\nStavr2: Р Р°РІРµРЅ 9\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr2: Р Р°РІРµРЅ 7\nStavr: Р Р°РІРµРЅ 7\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n', 0x31, 'Stavr2', 'Stavr', 1);
INSERT INTO `game_battle` VALUES (3, '1', '2', '1246332902', '1', '1', '<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 5\nStavr2: Р Р°РІРµРЅ 10\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr2: Р Р°РІРµРЅ 5\nStavr: Р Р°РІРµРЅ 7\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n', 0x30, '0', '0', 1);

-- --------------------------------------------------------

-- 
-- Структура таблицы `game_user`
-- 

CREATE TABLE `game_user` (
  `userid` varchar(40) default NULL,
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(40) NOT NULL default '',
  `pass` varchar(40) NOT NULL default '',
  `lasttime` varchar(11) NOT NULL default '0',
  `inbattle` tinyint(1) NOT NULL default '0',
  `Sila` int(6) NOT NULL default '0',
  `Lovkost` int(6) NOT NULL default '0',
  `Mishlenie` int(6) NOT NULL default '0',
  `Obrazovanie` int(6) default '0',
  `ydacha` int(6) NOT NULL default '0',
  `Boks` int(7) NOT NULL default '0',
  `schoolblue` int(2) NOT NULL,
  `schoolwhite` int(2) NOT NULL,
  `schoolred` int(2) NOT NULL,
  `schoolgreen` int(2) NOT NULL,
  `schoolblack` int(2) NOT NULL,
  `yklonenie` int(2) NOT NULL,
  `Hod` int(2) NOT NULL default '0',
  `image` int(3) NOT NULL default '1',
  `Carapina` int(2) NOT NULL default '0',
  `Legkoe` int(2) NOT NULL default '0',
  `Srednee` int(2) default '0',
  `Tyageloe` int(2) NOT NULL default '0',
  `Smertelnoe` int(2) NOT NULL default '0',
  `Smert` int(2) NOT NULL default '0',
  `lasthod` text NOT NULL,
  `technic` varchar(20) NOT NULL,
  `stoyka` varchar(20) NOT NULL,
  `moddeystvie` int(2) default NULL,
  `modranenie` int(2) NOT NULL,
  `modhit` int(2) NOT NULL,
  `moddamage` int(2) NOT NULL,
  `modyklonenie` int(2) NOT NULL,
  `modblock` int(2) NOT NULL,
  KEY `id` (`id`),
  FULLTEXT KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Дамп данных таблицы `game_user`
-- 

INSERT INTO `game_user` VALUES ('6f8233ebaa79e54f047fff3e15445ff7', 1, 'Stavr', 'c4ca4238a0b923820dcc509a6f75849b', '1246332928', 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 20, 2, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0);
INSERT INTO `game_user` VALUES ('81b68aa8c8bf75c2a737f0c3d5744309', 2, 'Stavr2', 'c4ca4238a0b923820dcc509a6f75849b', '1246332928', 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 21, 8, 0, 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Структура таблицы `koloda`
-- 

CREATE TABLE `koloda` (
  `id` int(11) default '0',
  `name` varchar(20) NOT NULL,
  `koloda` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `koloda`
-- 

INSERT INTO `koloda` VALUES (2, 'test', 'a:31:{i:0;s:12:"10_ydar_gray";i:1;s:12:"12_ydar_gray";i:2;s:15:"17_mgnoven_gray";i:3;s:12:"18_ydar_gray";i:4;s:15:"19_mgnoven_gray";i:5;s:11:"20_ydar_red";i:6;s:11:"21_ydar_red";i:7;s:11:"22_ydar_red";i:8;s:11:"23_ydar_red";i:9;s:11:"24_ydar_red";i:10;s:11:"25_ydar_red";i:11;s:11:"26_ydar_red";i:12;s:11:"27_ydar_red";i:13;s:11:"28_ydar_red";i:14;s:14:"3_mgnoven_gray";i:15;s:11:"34_ydar_red";i:16;s:14:"35_mgnoven_red";i:17;s:14:"36_mgnoven_red";i:18;s:14:"37_mgnoven_red";i:19;s:14:"38_mgnoven_red";i:20;s:11:"39_ydar_red";i:21;s:14:"4_mgnoven_gray";i:22;s:14:"40_mgnoven_red";i:23;s:14:"41_mgnoven_red";i:24;s:14:"42_mgnoven_red";i:25;s:14:"42_mgnoven_red";i:26;s:11:"43_ydar_red";i:27;s:14:"5_mgnoven_gray";i:28;s:11:"6_ydar_gray";i:29;s:11:"9_ydar_gray";i:30;s:0:"";}');
INSERT INTO `koloda` VALUES (1, 'test', 'a:31:{i:0;s:12:"10_ydar_gray";i:1;s:12:"12_ydar_gray";i:2;s:15:"17_mgnoven_gray";i:3;s:12:"18_ydar_gray";i:4;s:15:"19_mgnoven_gray";i:5;s:11:"20_ydar_red";i:6;s:11:"21_ydar_red";i:7;s:11:"22_ydar_red";i:8;s:11:"23_ydar_red";i:9;s:11:"24_ydar_red";i:10;s:11:"25_ydar_red";i:11;s:11:"26_ydar_red";i:12;s:11:"27_ydar_red";i:13;s:11:"28_ydar_red";i:14;s:14:"3_mgnoven_gray";i:15;s:11:"34_ydar_red";i:16;s:14:"35_mgnoven_red";i:17;s:14:"36_mgnoven_red";i:18;s:14:"37_mgnoven_red";i:19;s:14:"38_mgnoven_red";i:20;s:11:"39_ydar_red";i:21;s:14:"4_mgnoven_gray";i:22;s:14:"40_mgnoven_red";i:23;s:14:"41_mgnoven_red";i:24;s:14:"42_mgnoven_red";i:25;s:14:"42_mgnoven_red";i:26;s:11:"43_ydar_red";i:27;s:14:"5_mgnoven_gray";i:28;s:11:"6_ydar_gray";i:29;s:11:"9_ydar_gray";i:30;s:0:"";}');

-- --------------------------------------------------------

-- 
-- Структура таблицы `modificators`
-- 

CREATE TABLE `modificators` (
  `id` int(10) NOT NULL default '0',
  `time` int(5) NOT NULL default '0',
  `nadamage` int(2) default '0',
  `naarmor` int(2) default '0',
  `napopodanie` int(2) NOT NULL default '0',
  `nayklonenie` int(2) NOT NULL default '0',
  `nablok` int(2) NOT NULL default '0',
  `nasilu` int(2) NOT NULL default '0',
  `nalovkost` int(2) NOT NULL default '0',
  `namishlenie` int(2) NOT NULL default '0',
  `naobrazovanie` int(2) NOT NULL default '0',
  `stoyka` int(2) NOT NULL default '0',
  `technic` int(2) NOT NULL default '0',
  `prigok` int(2) NOT NULL default '0',
  `nokayt` int(2) NOT NULL default '0',
  `razvorot` int(2) NOT NULL default '0',
  `napopdaludaru` int(2) NOT NULL default '0',
  `napovdaludaru` int(2) NOT NULL default '0',
  `napopblgudaru` int(2) NOT NULL default '0',
  `napovblgudaru` int(2) NOT NULL default '0',
  `napopdaludarrukoy` int(2) NOT NULL default '0',
  `napovdaludarrukoy` int(2) NOT NULL default '0',
  `napopblgudarrukoy` int(2) NOT NULL default '0',
  `napovblgudarrukoy` int(2) NOT NULL default '0',
  `napopdaludarnogoy` int(2) NOT NULL default '0',
  `napovdaludarnogoy` int(2) NOT NULL default '0',
  `napopblgudarnogoy` int(2) NOT NULL default '0',
  `napovblgudarnogoy` int(2) NOT NULL default '0',
  `napopvgolovu` int(2) NOT NULL default '0',
  `napovvgolovu` int(2) NOT NULL default '0',
  `napopvruku` int(2) NOT NULL default '0',
  `napovvruku` int(2) NOT NULL default '0',
  `napopvtors` int(2) NOT NULL default '0',
  `napovvtors` int(2) NOT NULL default '0',
  `napopvnogu` int(2) NOT NULL default '0',
  `napovvnogu` int(2) NOT NULL default '0',
  `napopvpah` int(2) NOT NULL default '0',
  `napovvpah` int(2) NOT NULL default '0',
  `besstrashie` int(2) NOT NULL,
  `beschuvstvie` int(2) NOT NULL,
  `strah` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `modificators`
-- 

        