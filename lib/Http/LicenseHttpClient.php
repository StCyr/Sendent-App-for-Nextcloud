<?php

namespace OCA\Sendent\Http;

use Exception;
use OCA\Sendent\Service\NotFoundException;

class LicenseHttpClient {
	protected $baseUrl;
	public function __construct() {
		$this->baseUrl = "https://api.scwcloud.sendent.nl/";
	}

	/**
	 * @return bool|string
	 */
	public function Get($request) {
		//Initiate cURL.
		$ch = curl_init($this->baseUrl . $request);
		
		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_HTTPGET, 1);
		
		//Execute the request
		$result = curl_exec($ch);
		return $result;
	}

	/**
	 * @param string $request
	 */
	public function Post(string $request, Dto\SubscriptionIn $data) {
		try {
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
			$status = "";
			$status_line = "";
			$result = "";
			$context = stream_context_create($options);
			try {
				$result = file_get_contents($url, false, $context);
			} catch (Exception $e) {
			}
			if (isset($http_response_header) && count($http_response_header) > 0) {
				$status_line = $http_response_header[0];
			}

			preg_match('{HTTP\/\S*\s(\d{3})}', $status_line, $match);

			if (isset($match) && count($match) > 0) {
				$status = $match[1];
			}
			if ($status !== "200" && $status !== "404") {
				error_log(print_r("LICENSEHTTPCLIENT-STATUS-NOT-200-NOT-404", true));
				error_log(print_r("unexpected response status: {$status_line}\n" . $result, true));
				return null;
			}
			if ($status == "404") {
				error_log(print_r("LICENSEHTTPCLIENT-STATUS-404", true));
				throw new Exception();
			} else {
				error_log(print_r("LICENSEHTTPCLIENT-STATUS-200", true));
				$response = json_decode($result);
				return $response;
			}
		
		
			// in order to be able to plug in different storage backends like files
		// for instance it is a good idea to turn storage related exceptions
		// into service related exceptions so controllers and service users
		// have to deal with only one type of exception
		} catch (Exception $e) {
			error_log(print_r("LICENSEHTTPCLIENT-STATUS-THROW", true));
			throw new Exception();

			//throw new NotFoundException($e->getMessage());
		}
	}

	/**
	 * @return bool|string
	 */
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
	/**
	 * @return never
	 */
	private function handleException($e) {
		throw new NotFoundException($e->getMessage());
	}
}
