<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->group(['middleware' => 'client.credentials'], function () use ($router) {
	/*
		Routes for authors microservice
	*/
	$router->get('authors', 'AuthorController@index');
	$router->post('authors', 'AuthorController@store');
	$router->get('authors/{author}', 'AuthorController@show');
	$router->put('authors/update/{author}', 'AuthorController@update');
	$router->delete('authors/delete/{author}', 'AuthorController@destroy');

	/*
		Routes for books microservice
	*/

	$router->get('books', 'BooksController@index');
	$router->post('books', 'BooksController@store');
	$router->get('books/{book}', 'BooksController@show');
	$router->put('books/update/{book}', 'BooksController@update');
	$router->delete('books/delete/{book}', 'BooksController@destroy');

	/*
		Routes for users microservice
	*/
	$router->post('users', 'UserController@store');
	$router->get('users/{user}', 'UserController@show');
	$router->put('users/update/{user}', 'UserController@update');
	$router->delete('users/delete/{user}', 'UserController@destroy');
});
$router->group(['middleware' => 'auth:api '], function () use ($router) {
	$router->get('users/me', 'UserController@me');
}
