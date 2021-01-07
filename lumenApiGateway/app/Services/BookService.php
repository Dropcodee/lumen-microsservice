<?php

namespace App\Services;

use App\Traits\ConsumeExternalServices;

class BookService {
	use ConsumeExternalServices;
	/**
	 * base url to consume the books service
	 * @var string
	 */
	public $baseUri;
	/**
	 * base secret key to comsume the books service
	 * @var [type]
	 */
	public $secret;

	public function __construct() {
		$this->baseUri = config('services.books.base_uri');
		$this->secret = config('services.books.secret');
	}

	public function obtainBooks() {
		return $this->performRequests('GET', '/books');
	}

	public function createBook($data) {
		return $this->performRequests('POST', '/books', $data);
	}

	public function obtainBook($book) {
		return $this->performRequests('GET', "/books/{$book}");
	}

	public function updateBook($data, $book) {
		return $this->performRequests('PUT', "/books/update/{$book}", $data);
	}
	public function deleteBook($book) {
		return $this->performRequests('DELETE', "/books/delete/{$book}");
	}
}