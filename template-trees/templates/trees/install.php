<?php
defined('MYAAC') or die('Direct access not allowed!');

if(tableExist(TABLE_PREFIX . 'menu')) {
	$query = $db->query('SELECT `id` FROM `' . TABLE_PREFIX . 'menu` WHERE `template` = ' . $db->quote('trees') . ' LIMIT 1;');
	if($query->rowCount() > 0) {
		return;
	}
}
else {
	return;
}

$db->query("
/* home */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Home', 'news', 1, 0);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'News Archive', 'news/archive', 1, 1);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Changelog', 'changelog', 1, 2);
/* home */
/* account */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Account Management', 'account/manage', 2, 0);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Server Rules', 'rules', 2, 1);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Report Bug', 'bugtracker', 2, 2);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Downloads', 'downloads', 2, 3);
/* account */
/* community */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Characters', 'characters', 3, 0);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Online', 'online', 3, 1);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Highscores', 'highscores', 3, 2);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Last Kills', 'lastkills', 3, 3);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Houses', 'houses', 3, 4);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Guilds', 'guilds', 3, 5);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Bans', 'bans', 3, 6);
/* library */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Monsters', 'creatures', 4, 0);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Spells', 'spells', 4, 1);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Commands', 'commands', 4, 2);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Server Info', 'serverInfo', 4, 3);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Gallery', 'gallery', 4, 4);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Experience Table', 'experienceTable', 4, 5);
/* forum */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Forum', 'forum', 5, 0);
/* help */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Support', 'team', 6, 0);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'FAQ', 'faq', 6, 1);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Downloads', 'downloads', 6, 2);
/* shop */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Buy Points', 'points', 7, 0);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Shop Offer', 'gifts', 7, 1);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Shop History', 'gifts/history', 7, 2);
/* account menu */
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'My Account', 'account/manage', 8, 0);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Register Account', 'account/register', 8, 1);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Create Character', 'account/character/create', 8, 2);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Delete Character', 'account/character/delete', 8, 3);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Change Info', 'account/info', 8, 4);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Change Password', 'account/password', 8, 5);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Change Email', 'account/email', 8, 6);
INSERT INTO `myaac_menu` (`template`, `name`, `link`, `category`, `ordering`) VALUES ('trees', 'Logout', 'account/logout', 8, 7);
");