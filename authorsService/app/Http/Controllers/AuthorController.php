<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthorController extends Controller {
	use ApiResponser;

	public function __construct() {
		//
	}

	public function index() {
		$authors = Author::all();
		return $authors;
	}

	public function store(Request $request) {

		$rules = [
			'name' => 'required|max:255',
			'gender' => 'required|max:255|in:male,female',
			'country' => 'required|max:255',
		];

		$this->validate($request, $rules);
		$author = Author::create($request->all());
		return $this->successResponse($author, Response::HTTP_CREATED);

	}
	public function show($author) {
		$verifiedAuthor = Author::findOrFail($author);
		return $this->successResponse($verifiedAuthor, Response::HTTP_OK);
	}

	public function update(Request $request, $author) {

		# validate inputs before updating data
		$rules = [
			'name' => 'max:255',
			'gender' => 'max:255|in:male,female',
			'country' => 'max:255',
		];
		$this->validate($request, $rules);
		$verifiedAuthor = Author::findOrFail($author);
		$verifiedAuthor->fill($request->all());
		if ($verifiedAuthor->isClean()) {

			return $this->errorResponse('Sorry there is nothing to update.', Response::HTTP_UNPROCESSABLE_ENTITY);
		}
		$verifiedAuthor->save();
		return $this->successResponse($verifiedAuthor, Response::HTTP_OK);
	}
	public function destroy($author) {
		$verifiedAuthor = Author::findOrFail($author);

		$verifiedAuthor->delete();
		return $this->successResponse($verifiedAuthor, Response::HTTP_OK);

	}

}