<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BooksController extends Controller {
	use ApiResponser;
	/**
	 * The service to consume the book microservice
	 * @var BookService
	 */
	public $bookService;
	/**
	 * The service to consume the author microservice
	 * @var AuthorService
	 */
	public $authorService;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(BookService $bookService, AuthorService $authorService) {
		$this->bookService = $bookService;
		$this->authorService = $authorService;
	}

	public function index() {
		return $this->successResponse($this->bookService->obtainBooks());
	}
	public function show($book) {
		return $this->successResponse($this->bookService->obtainBook($book));
	}
	public function store(Request $request) {
		$this->authorService->obtainAuthor($request->author_id);

		return $this->successResponse($this->bookService->createBook($request->all(), Response::HTTP_CREATED));
	}
	public function update(Request $request, $book) {
		return $this->successResponse($this->bookService->updateBook($request->all(), $book));
	}
	public function destroy($book) {
		return $this->successResponse($this->bookService->deleteBook($book));
	}
}
