<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeExternalServices {

	/**
	 * Send Requests to any specified service
	 * @return array or objects
	 */

	public function performRequests($methods, $requestUrl, $formParams = [], $headers = []) {
		$client = new Client([
			'base_uri' => $this->baseUri,
		]);
		if (isset($this->secret)) {
			$headers['Authorization'] = $this->secret;
		}
		$response = $client->request($methods, $requestUrl, ['form_params' => $formParams, 'headers' => $headers]);

		return $response->getBody()->getContents();
	}
}