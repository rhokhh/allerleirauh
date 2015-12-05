CREATE TABLE `bl_book` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(1024) NOT NULL default '',
  `author` varchar(1024) NOT NULL default '',
  `year` varchar(64),
  `category` varchar(64),
  `tag` varchar(64),
  `no` varchar(64),
  `isbn` varchar(64),
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
