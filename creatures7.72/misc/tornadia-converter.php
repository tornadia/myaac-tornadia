<?php
ini_set('max_execution_time', 0); 
function get_inner_html( $node ) {
	$innerHTML= '';
	$children = $node->childNodes;
	foreach ($children as $child) {
		$innerHTML .= $child->ownerDocument->saveXML( $child );
	}
	
	return $innerHTML;  }

echo 'Downloading creatures.html...';
$content = file_get_contents('http://www.tibia.com/library/?subtopic=creatures');
file_put_contents('creatures.html', $content);
echo 'DONE' . PHP_EOL;

$dom = new DOMDocument();
@$dom->loadHTMLFile('creatures.html');

$creatures_downloaded = 0;
$images_downloaded = 0;
$divs = $dom->getElementsByTagName('div');
foreach ($divs as $div) {
	if($div->getAttribute('class') == 'BoxContent')
	{
		$content = get_inner_html($div);
		$dom = new DOMDocument();
		$dom->loadHTML($content);
		
		// link to creature
		$content = preg_replace('/(https:\/\/www.tibia.com\/library\/\?subtopic=creatures&amp;race=(.*?))/si', '?subtopic=creatures&race=$2', $content);
		
		// image of creature
		$content = preg_replace('/(https:\/\/ssl-static-tibia.akamaized.net\/images\/library\/(.*?))/si', 'images/creatures/$2', $content);
		
		$hrefs = $dom->getElementsByTagName('a');
		foreach ($hrefs as $href) {
			$href_url = $href->getAttribute('href');
			$tmp = explode('race=', $href_url);
			$filename = $tmp[1];
			if(!file_exists('creatures-twig/' . $filename . '.html.twig')) {
				$content = str_replace('?subtopic=creatures&race='.$filename, '', $content);
				$content = str_replace('images/creatures/'.$filename, '', $content);
			} else {
				//$gif = file_get_contents('http://localhost/images2/'.$filename.'.gif');
				//file_put_contents('creatures-images/' . $filename . '.gif', $gif);
			}
			$creatures_downloaded++;
		}
		
		// (.+)<div style="width: 100px; height: 100px; margin: 0px; float: left;">\n(.+)<a href=""><img src=".gif" border="0"\/><\/a>(.+)\n(.+)\n(.+)
		// .+<div style="width: 100px; height: 100px; margin: 0px; float: left;">\n.+\n.+<div>(.+)<\/div>\n.+
		
		file_put_contents('creatures-twig/creatures.html.twig', $content);
		
	}
}

echo 'Total creatures downloaded: ' . $creatures_downloaded . PHP_EOL;
echo 'Total images downloaded: ' . $images_downloaded;