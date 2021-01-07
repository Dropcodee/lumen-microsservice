<?php

return [
	'authors' => [
		'base_uri' => env('AUTHORS_SERVICES_BASE_URL'),
		'secret' => env('AUTHORS_SERVICES_SECRET'),
	],

	'books' => [
		'base_uri' => env('BOOKS_SERVICES_BASE_URL'),
		'secret' => env('BOOKS_SERVICES_SECRET'),
	],
];