<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller {

	use ApiResponser;

	/**
	 * the service to consume the author microservice
	 * @var AuthorService
	 */
	public $authorService;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(AuthorService $authorService) {
		$this->authorService = $authorService;
	}

	public function index() {
		return $this->successResponse($this->authorService->obtainAuthors());
	}
	public function show($author) {
		return $this->successResponse($this->authorService->obtainAuthor($author));
	}
	public function store(Request $request) {
		return $this->successResponse($this->authorService->createAuthor($request->all(), Response::HTTP_CREATED));
	}
	public function update(Request $request, $author) {
		return $this->successResponse($this->authorService->updateAuthor($request->all(), $author));
	}
	public function destroy($author) {
		return $this->successResponse($this->authorService->deleteAuthor($author));
	}

	//
}
