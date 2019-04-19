<?php
$title = 'Creatures';

$race = isset($_GET['race']) ? $_GET['race'] : null;

if(empty($race)) {
	echo $twig->render('creatures/creatures.html.twig');
}
else {
	if(!ctype_alnum($race)) {
		echo 'Race contains illegal letters (a-z, A-Z and 0-9 only!).';
		return;
	}
	
	// with "dir"
	// .+\d\,\d\d\d (.+)\.html\.twig\r
	$creatures = array("amazon", "ancientscarab", "assassin", "bandit", "banshee", "bat", "bear", "behemoth", "beholder", "blackknight", "bluedjinn", "bonebeast", "bonelord", "braindeath", "breachbrood", "brimstonebug", "bug", "butterflypurple", "calamary", "carniphila", "carrionworm", "cat", "caverat", "centipede", "chicken", "cobra", "crab", "crocodile", "cryptshambler", "cyclops", "darkmonk", "deer", "defiler", "demon", "demonskeleton", "dog", "dragon", "dragonlord", "dwarf", "dwarfgeomancer", "dwarfguard", "dwarfminer", "dwarfsoldier", "dworcfleshhunter", "dworcvenomsniper", "dworcvoodoomaster", "efreet", "elderbeholder", "elephant", "elf", "elfarcanist", "elfscout", "energyelemental", "firedevil", "fireelemental", "fish", "flamingo", "frosttroll", "fury", "gargoyle", "gazer", "ghost", "ghoul", "giantspider", "gloomwolf", "goblin", "greendjinn", "grimreaper", "hero", "hunter", "hyaena", "hydra", "kongra", "ladybug", "larva", "lich", "lion", "lizardsentinel", "lizardsnakecharmer", "lizardtemplar", "marid", "merlkin", "minotaur", "minotaurarcher", "minotaurguard", "minotaurmage", "monk", "mummy", "necromancer", "noblelion", "northernpike", "orc", "orcberserker", "orcleader", "orcrider", "orcshaman", "orcspearman", "orcwarlord", "orcwarrior", "panda", "parrot", "penguin", "pig", "pigeon", "piratebuccaneer", "piratecorsair", "piratecutthroat", "pirateghost", "piratemarauder", "pirateskeleton", "pixie", "poacher", "poisonspider", "polarbear", "priestess", "rabbit", "rat", "redeemedsoul", "rotelemental", "rotworm", "salamander", "scarab", "scorpion", "seagull", "serpentspawn", "shark", "sheep", "sibang", "skeleton", "skeletonwarrior", "skunk", "slime", "slug", "smuggler", "snake", "souleater", "sparkion", "spider", "spitnettle", "squirrel", "stalker", "stonegolem", "swamptroll", "taintedsoul", "tarantula", "tarnishedspirit", "terrorbird", "tiger", "toad", "tortoise", "troll", "trollchampion", "valkyrie", "vampire", "warlock", "warwolf", "wasp", "waspoid", "waterelemental", "waterelementalmassive", "wildwarrior", "winterwolf", "wisp", "witch", "wolf", "wraith", "wyrm", "wyvern");
	$myCreature = array_search($race, $creatures);
	if($myCreature !== false) {	
		$topMenu = '<div style="position: relative; height: 15px; width: 100%;">';
		if($myCreature != sizeof($creatures)-1) {
			$creatureNext = $creatures[$myCreature+1];
			$topMenu .= '   <a style="float: right;" href="?subtopic=creatures&race='.$creatureNext.'">next <img src="images/arrow_right.gif" width="15" height="11" border="0"/></a>';
		}
		if($myCreature != 0) {
			$creaturePrev = $creatures[$myCreature+1];
			$topMenu .= '   <a style="position: absolute;" href="?subtopic=creatures&race='.$creaturePrev.'"><img src="images/arrow_left.gif" width="15" height="11" border="0"/> previous</a>';
		}
		$topMenu .= '<div style="position: absolute; width: 80%; margin-left: 10%; margin-right: 10%; text-align: center;"><a href="?subtopic=creatures"><img src="images/arrow_up.gif" width="11" height="15" border="0"/> back</a></div></div>';
		echo $topMenu;
		
		$file = 'creatures/' . $race . '.html.twig';
		if(file_exists(SYSTEM . 'templates/' . $file))
			echo $twig->render($file);
	}
}