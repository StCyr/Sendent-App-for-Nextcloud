<?php

namespace OCA\Sendent\Service\Http;

class LicenseHttpClient {
	protected $baseUrl;
	public function __construct($baseUrl) {
		$this->baseUrl = $baseUrl;
	}

	public function Get($request) {
		//Initiate cURL.
		$ch = curl_init($this->baseUrl . $request);
		
		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_HTTPGET, 1);
		
		//Execute the request
		$result = curl_exec($ch);
		return $result;
	}

	public function Post($request, $data) {
		$url = $this->baseUrl . $request;
		$options = [
			'http' => [
				'method' => 'POST',
				'content' => json_encode($data),
				'header' => "api-version:1\r\n".
							"Content-Type: application/json\r\n" .
							"Accept: application/json\r\n"
			]
		];

		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$response = json_decode($result);
		return $response;
	}

	public function Put($request, $data) {
		//Initiate cURL.
		$ch = curl_init($this->baseUrl . $request);
		
		//Encode the array into JSON.
		$jsonDataEncoded = json_encode($data);
		
		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_PUT, 1);

		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
		
		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
		
		//Execute the request
		$result = curl_exec($ch);
		return $result;
	}
}
