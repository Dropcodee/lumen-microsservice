<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller {
	use ApiResponser;

	public function __construct() {
		//
	}

	public function index() {
		$users = User::all();
		return $this->indoorResponse($users, Response::HTTP_OK);
	}

	public function store(Request $request) {

		$rules = [
			'name' => 'required|max:255',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:8|confirmed',
		];

		$this->validate($request, $rules);

		$fields = $request->all();
		$fields['password'] = Hash::make($request->password);

		$user = User::create($fields);
		return $this->successResponse($user, Response::HTTP_CREATED);

	}
	public function show($user) {
		$verifiedUser = User::findOrFail($user);
		return $this->successResponse($verifiedUser, Response::HTTP_OK);
	}

	public function update(Request $request, $user) {

		# validate inputs before updating data
		$rules = [
			'name' => 'max:255',
			'email' => 'email|unique:users,email',
			'password' => 'min:8|confirmed',
		];
		$this->validate($request, $rules);
		$verifiedUser = User::findOrFail($user);
		$verifiedUser->fill($request->all());

		if ($request->has('password')) {
			$verifiedUser->password = Hash::make($request->password);
		}

		if ($verifiedUser->isClean()) {

			return $this->errorResponse('Sorry there is nothing to update.', Response::HTTP_UNPROCESSABLE_ENTITY);
		}
		$verifiedUser->save();
		return $this->successResponse($verifiedUser, Response::HTTP_OK);
	}
	public function destroy($user) {
		$verifiedUser = User::findOrFail($user);

		$verifiedUser->delete();
		return $this->successResponse($verifiedUser, Response::HTTP_OK);

	}

	public function me(Request $request) {
		return $this->indoorResponse($request->user());
	}

	//
}
