-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Хост: localhost
-- Время создания: Июн 24 2009 г., 15:58
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
  `1` varchar(20) NOT NULL default '',
  `2` varchar(20) NOT NULL default '',
  `3` varchar(20) NOT NULL default '',
  `4` varchar(20) NOT NULL default '',
  `5` varchar(20) NOT NULL default '',
  `6` varchar(20) NOT NULL default '',
  `7` varchar(20) NOT NULL default '',
  `8` varchar(20) NOT NULL default '',
  `9` varchar(20) NOT NULL default '',
  `10` varchar(20) NOT NULL default '',
  `11` varchar(20) NOT NULL default '',
  `12` varchar(20) NOT NULL default '',
  `13` varchar(20) NOT NULL default '',
  `14` varchar(20) NOT NULL default '',
  `15` varchar(20) NOT NULL default '',
  `16` varchar(20) NOT NULL,
  `17` varchar(20) NOT NULL,
  `18` varchar(20) NOT NULL,
  `19` varchar(20) NOT NULL,
  `20` varchar(20) NOT NULL,
  `21` varchar(20) NOT NULL,
  `22` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `Hend`
-- 

INSERT INTO `Hend` VALUES (1, '27_ydar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `Hend` VALUES (2, '40_mgnoven', '6_ydar', '34_ydar', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Структура таблицы `UserHend`
-- 

CREATE TABLE `UserHend` (
  `id` int(11) default NULL,
  `1` varchar(20) NOT NULL,
  `2` varchar(20) NOT NULL,
  `3` varchar(20) NOT NULL,
  `4` varchar(20) NOT NULL,
  `5` varchar(20) NOT NULL,
  `6` varchar(20) NOT NULL,
  `7` varchar(20) NOT NULL,
  `8` varchar(20) NOT NULL,
  `9` varchar(20) NOT NULL,
  `10` varchar(20) NOT NULL,
  `11` varchar(20) NOT NULL,
  `12` varchar(20) NOT NULL,
  `13` varchar(20) NOT NULL,
  `14` varchar(20) NOT NULL,
  `15` varchar(20) NOT NULL,
  `16` varchar(20) NOT NULL,
  `17` varchar(20) NOT NULL,
  `18` varchar(20) NOT NULL,
  `19` varchar(20) NOT NULL,
  `20` varchar(20) NOT NULL,
  `21` varchar(20) NOT NULL,
  `22` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `UserHend`
-- 

INSERT INTO `UserHend` VALUES (1, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `UserHend` VALUES (2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

-- 
-- Структура таблицы `UserKoloda`
-- 

CREATE TABLE `UserKoloda` (
  `id` int(11) default '0',
  `1` varchar(20) NOT NULL default '',
  `2` varchar(20) NOT NULL default '',
  `3` varchar(20) NOT NULL default '',
  `4` varchar(20) NOT NULL default '',
  `5` varchar(20) NOT NULL default '',
  `6` varchar(20) NOT NULL default '',
  `7` varchar(20) NOT NULL default '',
  `8` varchar(20) NOT NULL default '',
  `9` varchar(20) NOT NULL default '',
  `10` varchar(20) NOT NULL default '',
  `11` varchar(20) NOT NULL default '',
  `12` varchar(20) NOT NULL default '',
  `13` varchar(20) NOT NULL default '',
  `14` varchar(20) NOT NULL default '',
  `15` varchar(20) NOT NULL default '',
  `16` varchar(20) NOT NULL default '',
  `17` varchar(20) NOT NULL default '',
  `18` varchar(20) NOT NULL default '',
  `19` varchar(20) NOT NULL default '',
  `20` varchar(20) NOT NULL default '',
  `21` varchar(20) NOT NULL default '',
  `22` varchar(20) NOT NULL default '',
  `23` varchar(20) NOT NULL default '',
  `24` varchar(20) NOT NULL default '',
  `25` varchar(20) NOT NULL default '',
  `26` varchar(20) NOT NULL default '',
  `27` varchar(20) NOT NULL default '',
  `28` varchar(20) NOT NULL default '',
  `29` varchar(20) NOT NULL default '',
  `30` varchar(20) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `UserKoloda`
-- 

INSERT INTO `UserKoloda` VALUES (1, '10_ydar', '12_ydar', '17_mgnoven', '18_ydar', '19_mgnoven', '20_ydar', '21_ydar', '22_ydar', '23_ydar', '24_ydar', '25_ydar', '26_ydar', '27_ydar', '28_ydar', '3_mgnoven', '34_ydar', '35_mgnoven', '36_mgnoven', '37_mgnoven', '38_mgnoven', '39_ydar', '4_mgnoven', '40_mgnoven', '41_mgnoven', '42_mgnoven', '42_mgnoven', '43_ydar', '5_mgnoven', '6_ydar', '9_ydar');
INSERT INTO `UserKoloda` VALUES (2, '10_ydar', '12_ydar', '17_mgnoven', '18_ydar', '19_mgnoven', '20_ydar', '21_ydar', '22_ydar', '23_ydar', '24_ydar', '25_ydar', '26_ydar', '27_ydar', '28_ydar', '3_mgnoven', '34_ydar', '35_mgnoven', '36_mgnoven', '37_mgnoven', '38_mgnoven', '39_ydar', '4_mgnoven', '40_mgnoven', '41_mgnoven', '42_mgnoven', '42_mgnoven', '43_ydar', '5_mgnoven', '6_ydar', '9_ydar');

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

INSERT INTO `game_battle` VALUES (1, '2', '1', '1245770305', '1', '1', '<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 15\nStavr2: Р Р°РІРµРЅ 11\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Stavr2: </b>С†\n<b>Stavr2: </b>С†С†С†С†\n<b>Stavr: </b>wwww\n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РІРѕС?РµР» РІ Р±РѕРµРІРѕР№ СЂР°Р¶.\n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nРЎР»РёС?РєРѕРј РґР°Р»РµРєРѕ РґРѕ РїСЂРѕС‚РёРІРЅРёРєР°. Stavr РїСЂРѕРјР°С…РЅСѓР»СЃСЏ.\n<b>РўСЂРµС‚СЊРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ СѓРґР°СЂ \n<i>Р”Р°Р»СЊРЅРёР№ РІ Р±РµРґСЂРѕ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 25 \nStavr Р±СЊРµС‚ РІ Р±РµРґСЂРѕ Stavr2. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 10 РЅР° Р±Р»РѕРє - 10 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 25 РЅР° Р±Р»РѕРє - 36 \nStavr2 РѕС‚Р±РёР» СѓРґР°СЂ, Р° Stavr С‚РµСЂСЏРµС‚ СЂР°РІРЅРѕРІРµСЃРёРµ \n<b>Р§РµС‚РІРµСЂС‚РѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>РќРѕРіРѕР№ РІ РїР»РµС‡Рѕ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 18 \nStavr Р±СЊРµС‚ РІ РїР»РµС‡Рѕ Stavr2. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 7 РЅР° Р±Р»РѕРє - 10 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 18 РЅР° Р±Р»РѕРє - 39 \nStavr2 РѕС‚Р±РёР» СѓРґР°СЂ, Р° Stavr С‚РµСЂСЏРµС‚ СЂР°РІРЅРѕРІРµСЃРёРµ \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr2 С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 СЂР°Р·РІРµСЂРЅСѓР»СЃСЏ.\n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>РљСѓР»Р°РєРѕРј РІ РіСЂСѓРґСЊ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 37 \nStavr2 Р±СЊРµС‚ РІ РіСЂСѓРґСЊ Stavr. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 11 РЅР° Р±Р»РѕРє - 7 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 37 РЅР° Р±Р»РѕРє - 21 \nStavr2 РїРѕРїР°Р» \nРЎРёР»Р° СѓРґР°СЂР° 4 РєСѓР±РёРєРѕРІ, СЂРµР·СѓР»СЊС‚Р°С‚ 16\nStavr РїРѕР»СѓС‡Р°РµС‚ СЃСЂРµРґРЅРµРµ СЂР°РЅРµРЅРёРµ \nРњРѕРґРёС„РёРєР°С‚РѕСЂ РѕС‚ СЂР°РЅС‹:-2\n<b>РўСЂРµС‚СЊРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>РљСѓР»Р°РєРѕРј РІ РіСЂСѓРґСЊ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 43 \nStavr2 Р±СЊРµС‚ РІ РіСЂСѓРґСЊ Stavr. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 10 РЅР° Р±Р»РѕРє - 5 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 43 РЅР° Р±Р»РѕРє - 25 \nStavr2 РїРѕРїР°Р» \nРЎРёР»Р° СѓРґР°СЂР° 2 РєСѓР±РёРєРѕРІ, СЂРµР·СѓР»СЊС‚Р°С‚ 3\nStavr РїРѕР»СѓС‡Р°РµС‚ С†Р°СЂР°РїРёРЅСѓ \n<b>Р§РµС‚РІРµСЂС‚РѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ  \n<i>РҐСѓРє</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 26 \nStavr2 Р±СЊРµС‚ РІ РіРѕР»РѕРІСѓ Stavr. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 6 РЅР° Р±Р»РѕРє - 5 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 26 РЅР° Р±Р»РѕРє - 15 \nStavr2 РїРѕРїР°Р» \nРЎРёР»Р° СѓРґР°СЂР° 3 РєСѓР±РёРєРѕРІ, СЂРµР·СѓР»СЊС‚Р°С‚ 8\nStavr РїРѕР»СѓС‡Р°РµС‚ Р»РµРіРєРѕРµ СЂР°РЅРµРЅРёРµ \nStavr РєРѕРЅС‚СѓР¶РµРЅ, РїРѕС…РѕР¶Рµ РѕРЅ С‡С‚Рѕ-С‚Рѕ Р·Р°Р±С‹Р». \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 СЂРёРЅСѓР»СЃСЏ РІ Р±РѕР№ СЃРѕ РІСЃРµС… СЃРёР».\n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ  \n<i>РџСЂСЏРјРѕР№ СѓРґР°СЂ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 7 \nStavr2 Р±СЊРµС‚ РІ РіСЂСѓРґСЊ Stavr. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 2 РЅР° Р±Р»РѕРє - 5 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 7 РЅР° Р±Р»РѕРє - 13 \nStavr РѕС‚Р±РёР» СѓРґР°СЂ, Р° Stavr2 С‚РµСЂСЏРµС‚ СЂР°РІРЅРѕРІРµСЃРёРµ \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 11\nStavr2: Р Р°РІРµРЅ 12\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n', 0x31, 'Stavr', 'Stavr2', 1);
INSERT INTO `game_battle` VALUES (2, '1', '2', '1245771094', '1', '1', '<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 8\nStavr2: Р Р°РІРµРЅ 6\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РљСЂРёС‡РёС‚ РёР·Рѕ РІСЃРµР№ СЃРёР»С‹.\n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>РќРѕРіРѕР№ РІ РїР»РµС‡Рѕ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 3 \nStavr Р±СЊРµС‚ РІ РїР»РµС‡Рѕ Stavr2. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 2 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 3 РЅР° Р±Р»РѕРє - 10 \nStavr2 РѕС‚Р±РёР» СѓРґР°СЂ, Р° Stavr С‚РµСЂСЏРµС‚ СЂР°РІРЅРѕРІРµСЃРёРµ \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr2 С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 8\nStavr2: Р Р°РІРµРЅ 6\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nРЎР»РёС?РєРѕРј Р±Р»РёР·РєРѕ Рє РїСЂРѕС‚РёРІРЅРёРєСѓ. Stavr РїРѕР»СѓС‡Р°РµС‚ РґРѕРїРѕР»РЅРёС‚РµР»СЊРЅР№ РјРѕРґРёС„РёРєР°С‚РѕСЂ -2 РЅР° РїРѕРїРѕРґР°РЅРёРµ.\nStavr РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ  \n<i>РҐСѓРє</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 0 \nStavr РЅРµ РІ СЃРѕСЃС‚РѕСЏРЅРёРё РІС‹РїРѕР»РЅРёС‚СЊ СѓРґР°СЂ Stavr2. \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ  \n<i>РҐСѓРє</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 0 \nStavr РЅРµ РІ СЃРѕСЃС‚РѕСЏРЅРёРё РІС‹РїРѕР»РЅРёС‚СЊ СѓРґР°СЂ Stavr2. \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr2 С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>РќРѕРіРѕР№ РІ РїР»РµС‡Рѕ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 1 \nStavr2 РЅРµ РІ СЃРѕСЃС‚РѕСЏРЅРёРё РІС‹РїРѕР»РЅРёС‚СЊ СѓРґР°СЂ Stavr. \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 5\nStavr2: Р Р°РІРµРЅ 10\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РёСЃРїРѕР»СЊР·СѓРµС‚ С‚РµС…РЅРёРєСѓ Р›Р°РїР° С‚РёРіСЂР°.\nStavr2 РІРѕС?РµР» РІ Р±РѕРµРІРѕР№ СЂР°Р¶.\n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ  \n<i>РЈРґР°СЂ РІ СЂСѓРєСѓ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 14 \nStavr2 Р±СЊРµС‚ РІ СЂСѓРєСѓ Stavr. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 4 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 14 РЅР° Р±Р»РѕРє - 15 \nStavr РѕС‚Р±РёР» СѓРґР°СЂ. \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 6\nStavr2: Р Р°РІРµРЅ 7\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ  \n<i>РЈРґР°СЂ РІ СЂСѓРєСѓ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 10 \nStavr Р±СЊРµС‚ РІ СЂСѓРєСѓ Stavr2. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 3 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 10 РЅР° Р±Р»РѕРє - 14 \nStavr2 РѕС‚Р±РёР» СѓРґР°СЂ. \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr2: Р Р°РІРµРЅ 10\nStavr: Р Р°РІРµРЅ 10\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr2 С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РІРѕС?РµР» РІ Р±РѕРµРІРѕР№ СЂР°Р¶.\n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РІРѕС?РµР» РІ Р±РѕРµРІРѕР№ СЂР°Р¶.\n<b>РўСЂРµС‚СЊРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїРѕРґРїСЂС‹РіРЅСѓР».\n<b>Р§РµС‚РІРµСЂС‚РѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>Р›РѕРіС‚РµРј РІ РіРѕР»РѕРІСѓ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 9 \nStavr2 Р±СЊРµС‚ РІ РіРѕР»РѕРІСѓ Stavr. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 3 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 9 РЅР° Р±Р»РѕРє - 16 \nStavr РѕС‚Р±РёР» СѓРґР°СЂ. \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 5\nStavr2: Р Р°РІРµРЅ 9\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n', 0x31, 'Stavr', 'Stavr2', 0);
INSERT INTO `game_battle` VALUES (3, '2', '1', '1245771962', '1', '1', '<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr2: Р Р°РІРµРЅ 6\nStavr: Р Р°РІРµРЅ 10\nStavr РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr2 С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr2: Р Р°РІРµРЅ 8\nStavr: Р Р°РІРµРЅ 5\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РІРѕС?РµР» РІ Р±РѕРµРІРѕР№ СЂР°Р¶.\n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>РљСѓР»Р°РєРѕРј РІ РіСЂСѓРґСЊ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 18 \nStavr Р±СЊРµС‚ РІ РіСЂСѓРґСЊ Stavr2. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 6 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 18 РЅР° Р±Р»РѕРє - 17 \nStavr РїРѕРїР°Р» \nРЎРёР»Р° СѓРґР°СЂР° 1 РєСѓР±РёРєРѕРІ, СЂРµР·СѓР»СЊС‚Р°С‚ 5\nStavr2 РїРѕР»СѓС‡Р°РµС‚ С†Р°СЂР°РїРёРЅСѓ \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ  \n<i>Р›РѕРіС‚РµРј РІ РіРѕР»РѕРІСѓ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 3 \nStavr Р±СЊРµС‚ РІ РіРѕР»РѕРІСѓ Stavr2. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 1 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 3 РЅР° Р±Р»РѕРє - 13 \nStavr2 РѕС‚Р±РёР» СѓРґР°СЂ. \n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ РІС‹РїРѕР»РЅРёС‚СЊ  \n<i>РҐСѓРє</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 0 \nStavr РЅРµ РІ СЃРѕСЃС‚РѕСЏРЅРёРё РІС‹РїРѕР»РЅРёС‚СЊ СѓРґР°СЂ Stavr2. \nStavr РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, РїРѕСЂР° СЂРµС?РёС‚СЊ РєС‚Рѕ С…РѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>Р‘СЂРѕСЃРѕРє РёРЅРёС†РёР°С‚РёРІС‹</b> \nР РµР·СѓР»СЊС‚Р°С‚: \nStavr: Р Р°РІРµРЅ 8\nStavr2: Р Р°РІРµРЅ 9\nStavr2 РҐРѕРґРёС‚ РїРµСЂРІС‹Рј \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ  \n<i>РћС‚Р±РёС‚СЊ РїР»РµС‡Рѕ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 2 \nStavr2 РЅРµ РІ СЃРѕСЃС‚РѕСЏРЅРёРё РІС‹РїРѕР»РЅРёС‚СЊ СѓРґР°СЂ Stavr. \n<b>Р’С‚РѕСЂРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РІРѕС?РµР» РІ Р±РѕРµРІРѕР№ СЂР°Р¶.\n<b>РўСЂРµС‚СЊРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr2 РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ \n<i>РљРѕР»РµРЅРѕРј РІ С‚РѕСЂСЃ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 9 \nStavr2 Р±СЊРµС‚ РІ С‚РѕСЂСЃ Stavr. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 4 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 9 РЅР° Р±Р»РѕРє - 13 \nStavr РѕС‚Р±РёР» СѓРґР°СЂ. \nStavr2 РќРёС‡РµРіРѕ РЅРµ РґРµР»Р°РµС‚, СЌС‚Рѕ С?Р°РЅСЃ РґР»СЏ Stavr С‡С‚Рѕ Р±С‹ РѕС‚РІРµС‚РёС‚СЊ \n<b>РџРµСЂРІРѕРµ РґРµР№СЃС‚РІРёРµ</b> \nStavr РїС‹С‚Р°РµС‚СЃСЏ СѓРґР°СЂРёС‚СЊ \n<i>Р›РѕРіС‚РµРј РІ С‚РѕСЂСЃ</i> \nРќР° РІС‹РїРѕР»РЅРµРЅРёРµ - 11 \nStavr Р±СЊРµС‚ РІ С‚РѕСЂСЃ Stavr2. \nРљСѓР±РёРєРѕРІ РЅР° РїРѕРїР°РґР°РЅРёРµ - 3 РЅР° Р±Р»РѕРє - 4 \nР РµР·СѓР»СЊС‚Р°С‚ РќР° РїРѕРїР°РґР°РЅРёРµ - 11 РЅР° Р±Р»РѕРє - 16 \nStavr2 РѕС‚Р±РёР» СѓРґР°СЂ. \n', 0x30, '0', '0', 0);

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

INSERT INTO `game_user` VALUES ('1449b024df086c06ef7d9c34be1d9177', 1, 'Stavr', 'c4ca4238a0b923820dcc509a6f75849b', '1245772209', 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 12, 2, 0, 0, 0, 0, 0, 0, '22_ydar;;;;', '', '', -1, 0, 0, 0, 0, 0);
INSERT INTO `game_user` VALUES ('61a40595e9ed7b936d4b5877deaf05a9', 2, 'Stavr2', 'c4ca4238a0b923820dcc509a6f75849b', '1245772209', 0, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 15, 8, 1, 0, 0, 0, 0, 0, ';;;;', '', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

-- 
-- Структура таблицы `koloda`
-- 

CREATE TABLE `koloda` (
  `id` int(11) default '0',
  `1` varchar(20) NOT NULL default '',
  `2` varchar(20) NOT NULL default '',
  `3` varchar(20) NOT NULL default '',
  `4` varchar(20) NOT NULL default '',
  `5` varchar(20) NOT NULL default '',
  `6` varchar(20) NOT NULL default '',
  `7` varchar(20) NOT NULL default '',
  `8` varchar(20) NOT NULL default '',
  `9` varchar(20) NOT NULL default '',
  `10` varchar(20) NOT NULL default '',
  `11` varchar(20) NOT NULL default '',
  `12` varchar(20) NOT NULL default '',
  `13` varchar(20) NOT NULL default '',
  `14` varchar(20) NOT NULL default '',
  `15` varchar(20) NOT NULL default '',
  `16` varchar(20) NOT NULL default '',
  `17` varchar(20) NOT NULL default '',
  `18` varchar(20) NOT NULL default '',
  `19` varchar(20) NOT NULL default '',
  `20` varchar(20) NOT NULL default '',
  `21` varchar(20) NOT NULL default '',
  `22` varchar(20) NOT NULL default '',
  `23` varchar(20) NOT NULL default '',
  `24` varchar(20) NOT NULL default '',
  `25` varchar(20) NOT NULL default '',
  `26` varchar(20) NOT NULL default '',
  `27` varchar(20) NOT NULL default '',
  `28` varchar(20) NOT NULL default '',
  `29` varchar(20) NOT NULL default '',
  `30` varchar(20) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Дамп данных таблицы `koloda`
-- 

INSERT INTO `koloda` VALUES (1, '10_ydar', '12_ydar', '17_mgnoven', '18_ydar', '19_mgnoven', '20_ydar', '21_ydar', '22_ydar', '23_ydar', '24_ydar', '25_ydar', '26_ydar', '27_ydar', '28_ydar', '3_mgnoven', '34_ydar', '35_mgnoven', '36_mgnoven', '37_mgnoven', '38_mgnoven', '39_ydar', '4_mgnoven', '40_mgnoven', '41_mgnoven', '42_mgnoven', '42_mgnoven', '43_ydar', '5_mgnoven', '6_ydar', '9_ydar');
INSERT INTO `koloda` VALUES (2, '10_ydar', '12_ydar', '17_mgnoven', '18_ydar', '19_mgnoven', '20_ydar', '21_ydar', '22_ydar', '23_ydar', '24_ydar', '25_ydar', '26_ydar', '27_ydar', '28_ydar', '3_mgnoven', '34_ydar', '35_mgnoven', '36_mgnoven', '37_mgnoven', '38_mgnoven', '39_ydar', '4_mgnoven', '40_mgnoven', '41_mgnoven', '42_mgnoven', '42_mgnoven', '43_ydar', '5_mgnoven', '6_ydar', '9_ydar');

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

INSERT INTO `modificators` VALUES (1, 1000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        