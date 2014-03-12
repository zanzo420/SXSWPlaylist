<?php
header('Access-Control-Allow-Origin: *');
include "lib/api.php";

$api = new api();
$songid = $_GET['songid'];
$started = 0;

// http://songsnear.me/playlist/proxy.php?action=playlist
if ($_GET['action']=="playlist")
{
	echo $api->now_playing("YOUR_JUKEBOX_ID");
}

// http://songsnear.me/playlist/proxy.php?action=song&songid=37830101
if ($_GET['action']=="song")
{
	$jukebox = $api->now_playing("12518570");
	$juke_json = json_decode($jukebox, true);
	$songs = $juke_json["jukeboxPlayQueue"]["songs"];

	echo "{\"songs\":[";

	foreach($songs as $s){
		if ($started==0)
		{
			$started=1;
		} else {
			echo ",";
		}
		$song = $api->songid_search($s["id"]);
		$song_json = json_decode($song, true);
		$tunes = $song_json["response"]["songs"];
		echo "{\"title\":\"".$tunes[0]["title"]."\",";
		echo "\"name\":\"".$tunes[0]["artist"]["name"]."\",";
		echo "\"artwork\":\"".$tunes[0]["artist"]["jackets"]["290"]."\"}";
	}

	echo "]}";
}
?>