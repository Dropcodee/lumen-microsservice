<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BooksController extends Controller {
	use ApiResponser;

	public function __construct() {
		//
	}

	public function index() {
		$books = Book::all();
		return $this->successResponse($books, Response::HTTP_OK);
	}

	public function store(Request $request) {

		$rules = [
			'title' => 'required|max:255',
			'description' => 'required|max:255',
			'price' => 'required|numeric|min:1',
			'author_id' => 'required|numeric|min:1',
		];

		$this->validate($request, $rules);
		$book = Book::create($request->all());
		return $this->successResponse($book, Response::HTTP_CREATED);

	}
	public function show($book) {
		$verifiedBook = Book::findOrFail($book);
		return $this->successResponse($verifiedBook, Response::HTTP_OK);
	}

	public function update(Request $request, $book) {

		# validate inputs before updating data
		$rules = [
			'title' => 'max:255',
			'description' => 'max:255',
			'price' => 'numeric|min:1',
			'author_id' => 'numeric|min:1',
		];
		$this->validate($request, $rules);
		$verifiedBook = Book::findOrFail($book);
		$verifiedBook->fill($request->all());
		if ($verifiedBook->isClean()) {

			return $this->errorResponse('Sorry there is nothing to update.', Response::HTTP_UNPROCESSABLE_ENTITY);
		}
		$verifiedBook->save();
		return $this->successResponse($verifiedBook, Response::HTTP_OK);
	}
	public function destroy($book) {
		$verifiedBook = Book::findOrFail($book);

		$verifiedBook->delete();
		return $this->successResponse($verifiedBook, Response::HTTP_OK);

	}

	//
}
