<?php
// TouchTunes API Wrapper
include 'http.php';

class api
{
	// Constants
	public $api_key = ""; // Add your TouchTunes API Key here!
	public $base_url = "http://dev.touchtunes.com";
	public $response = "";

	// Now Playing
	// curl -ks -X GET "http://dev.touchtunes.com/playqueue/000000B39BBC?api_key=XXXXXXXX"
	// Example: $api->now_playing("11770812");
	public function now_playing($device_id)
	{
		$hex_device_id = dechex($device_id);
		$now_playing_url = $this->base_url."/playqueue/".$hex_device_id."?api_key=".$this->api_key;
		$http = new http();
		$response = $http->get($now_playing_url);
		return $response;
	}

	// Keyword Search
	// http://dev.touchtunes.com/music/search?query=Smashing+Pumpkins&api_key=XXXXXXXX
	// $api->keyword_search("Van Halen");
	public function keyword_search($query)
	{
		$keyword_search_url = $this->base_url."/music/search?query=".urlencode($query)."&api_key=".$this->api_key;
		$http = new http();
		$response = $http->get($keyword_search_url);
		return $response;
	}

	// Song ID Search
	// curl -ks -X GET "http://dev.touchtunes.com/music/song?song_id=92684602&api_key=XXXXXXXX"
	// Example: $api->songid_search("1234567");
	public function songid_search($song_id)
	{
		$songid_search_url = $this->base_url."/music/song?song_id=".$song_id."&api_key=".$this->api_key;
		$http = new http();
		$response = $http->get($songid_search_url);
		return $response;
	}

	// Locate
	// curl -ks -X GET "http://dev.touchtunes.com/locations?latitude=40.942438&longitude=-72.990088&user_latitude=40.942438&user_longitude=-72.990088&user_horizontal_accuracy=0&radius=2555&limit=10&api_key=XXXXXXXX"
	// Example: $api->locate("40.942438","-72.990088","10");
	public function locate($latitude, $longitude, $limit)
	{
  		$locate_url = $this->base_url."/locations?latitude=".$latitude."&longitude=".$longitude."&user_latitude=".$latitude."&user_longitude=".$longitude."&user_horizontal_accuracy=0&radius=2555&limit=".$limit."&api_key=".$this->api_key;
		$http = new http();
		$response = $http->get($locate_url);
		return $response;
	}
}
?>