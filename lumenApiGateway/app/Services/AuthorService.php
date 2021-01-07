<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class AuthorService {
	use ConsumeExternalServices;
/**
 * base url to consume the authors service
 * @var string
 */
	public $baseUri;
	/**
	 * base secret key to comsume the authors service
	 * @var [type]
	 */
	public $secret;

	public function __construct() {
		$this->baseUri = config('services.authors.base_uri');
		$this->secret = config('services.authors.secret');
	}

	public function obtainAuthors() {
		return $this->performRequests('GET', '/authors');
	}

	public function createAuthor($data) {
		return $this->performRequests('POST', '/authors', $data);
	}

	public function obtainAuthor($author) {
		return $this->performRequests('GET', "/authors/{$author}");
	}

	public function updateAuthor($data, $author) {
		return $this->performRequests('PUT', "/authors/update/{$author}", $data);
	}
	public function deleteAuthor($data, $author) {
		return $this->performRequests('DELETE', "/authors/delete/{$author}");
	}
}