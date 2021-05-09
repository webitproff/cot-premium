CREATE TABLE IF NOT EXISTS `cot_premium_count` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `date` varchar(255) collate utf8_unicode_ci default NULL,
  `area` varchar(255) collate utf8_unicode_ci default NULL,
  `code` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;