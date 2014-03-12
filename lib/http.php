<?
class http {
	
	public function get($url)
	{
		$response = "";
		$curl = curl_init();
		curl_setopt_array($curl, array(
    		CURLOPT_RETURNTRANSFER => 1,
    		CURLOPT_URL => $url,
		));
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}
}
?>